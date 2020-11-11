<?php

namespace App\Controllers;

use App\Helpers\EntityHelper;
use App\Models\Usuario;
use Doctrine\DBAL\Types\ArrayType;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class UsuarioController extends EntityHelper
{
    public $entity;

    public function __construct()
    {
        $this->entity = (new EntityHelper())->getEntity();
    }

    /**
     * Listagem usuario
     * @param [type] $request
     * @param [type] $response
     * @param [type] $args
     * @return Response
     */
    public function select($request, $response, $args)
    {
        $usuarios = $this->getRepo()->findAll();

        if (is_null($usuarios)) {
            return  $response->withJson("There are no user records", 404)
                ->withHeader('Content-type', 'application/json');
        }

        return  $response->withJson($usuarios, 200)
            ->withHeader('Content-type', 'application/json');
    }

    /**
     * Atualiza o Usuario
     * @param [type] $request
     * @param [type] $response
     * @param [type] $args
     * @return Response
     */
    public function update($request, $response, $args)
    {
        /* Recebe o objeto que sera alterado */
        $parametro = $request->getParsedBody();
        /* Procura o usuário e seta aqui */
        $usuario = $this->getRepo()->find($parametro['id']);

        /* Verifica se existe um usuario com o id informado */
        if (!$usuario) {
            return $response->withJson("User not Found", 404)
                ->withHeader('Content-type', 'application/json');
        }

        /* Setando os novos parametros */
        $usuario->setNome($parametro['nome']);
        $usuario->setEmail($parametro['email']);
        $usuario->setSenha($parametro['senha']);

        /*  */
        /* $this->entityManager->persist($usuario); */
        $this->entity->flush($usuario);

        return $response->withJson("User updated successfully", 200)
            ->withHeader('Content-type', 'application/json');
    }
    /**
     * Cadastro usuario
     * @param [type] $request
     * @param [type] $response
     * @param [type] $args
     * @return Response
     */
    public function cadastro($request, $response, $args)
    {
        /* Recebe o objeto que sera alterado */
        $parametro = $request->getParsedBody();

        $usuario = $this->getRepo()->findBy(array('email' => $parametro['email']));

        if (!$usuario == null) {
            return $response->withJson("Invalid e-mail", 409)
                ->withHeader('Content-type', 'application/json');
        }

        /* Criando usuário */
        $usuario = new Usuario;

        /* Setando os valores no usuário */
        $usuario->setNome($parametro['nome']);
        $usuario->setEmail($parametro['email']);
        $usuario->setSenha($parametro['senha']);

        try {
            $this->entity->persist($usuario);
        } catch (\Throwable $th) {
            return $response->withJson($th, 500)
                ->withHeader('Content-type', 'application/json');
        }

        $this->entity->flush();

        return  $response->withJson("User successfully registered", 201)
            ->withHeader('Content-type', 'application/json');
    }
    /**
     * Cadastro usuario
     * @param [type] $request
     * @param [type] $response
     * @param [type] $args
     * @return Response
     */
    public function delete($request, $response, $args)
    {
        if (!is_null($request->getParsedBody())) {
            $parametro = $request->getParsedBody()['id'];
        } elseif (!is_null($args['id'])) {
            $parametro = $args['id'];
        }

        $usuario = $this->getRepo()->find($parametro);

        if (!$usuario) {
            return  $response->withJson("User not-found", 404)
                ->withHeader('Content-type', 'application/json');
        }

        $this->entity->remove($usuario);
        $this->entity->flush();

        return  $response->withJson("User successfully deleted", 200)
            ->withHeader('Content-type', 'application/json');
    }

    /*  */
    public function getRepo()
    {

        return $this->entity->getRepository('App\Models\Usuario');
    }
}

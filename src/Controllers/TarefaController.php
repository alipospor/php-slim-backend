<?php

namespace App\Controllers;

use App\Helpers\EntityHelper;

class TarefaController
{

    private $entity;

    public function __construct()
    {
        $this->entity = (new EntityHelper())->getEntity();
    }

    /**
     * Listagem Tarefas
     * @param [type] $request
     * @param [type] $response
     * @param [type] $args
     * @return Response
     */
    public function select($request, $response, $args)
    {
        $tarefas = $this->getRepo()->findAll();

        var_dump($tarefas);
        if (is_null($tarefas)) {
            return  $response->withJson("There are no user records", 404)
                ->withHeader('Content-type', 'application/json');
        }
        
        return  $response->withJson($tarefas, 200)
            ->withHeader('Content-type', 'application/json');
    }



    /*  */
    public function getRepo()
    {

        return $this->entity->getRepository('App\Models\Tarefa');
    }
}

<?php

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function () {

    /* Grupo rotas do Usuario */
    $this->group('/usuarios', function () {
        /* Rota de Login */
        $this->get('/login', 'App\Controllers\UsuarioController:login');
        /* Rota para listar todos os usuário */
        $this->group('/listar', function () {
            $this->get('', 'App\Controllers\UsuarioController:select');
            $this->get('/{id:[0-9]+}', 'App\Controllers\UsuarioController:selectById');
        });
        /* Rota para atualização de usuário*/
        $this->put('/atualizar', 'App\Controllers\UsuarioController:update');
        /* Rota cadastro de usuário */
        $this->post('/cadastrar', 'App\Controllers\UsuarioController:insert');
        /* Rota delete de usuário */
        $this->group('/deletar', function () {
            $this->delete('', 'App\Controllers\UsuarioController:delete');
            $this->delete('/{id:[0-9]+}', 'App\Controllers\UsuarioController:delete');
        });
    });
    /* Grupo rota de Tarefas */
    $this->group('/tarefas', function () {
        /* Rota listar tarefas */
        $this->get('/listar', 'App\Controllers\TarefaController:select');
    });
});

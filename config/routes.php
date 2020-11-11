<?php

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function () {

    $this->group('/usuarios', function () {
        /* Rota para listar todos os usuário */
        $this->get('/listar', 'App\Controllers\UsuarioController:select');
        /* Rota para atualização de usuário*/
        $this->put('/atualizar', 'App\Controllers\UsuarioController:update');
        /* Rota cadastro de usuário */
        $this->post('/cadastrar', 'App\Controllers\UsuarioController:cadastro');

        /* Rota delete de usuário */
        $this->group('/deletar', function () {
            $this->delete('', 'App\Controllers\UsuarioController:delete');
            $this->delete('/{id:[0-9]+}', 'App\Controllers\UsuarioController:delete');
        });
    });

    /* grupo geral */
});

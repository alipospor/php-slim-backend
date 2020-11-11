<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../config/bootstrap.php';

$app = new \Slim\App($container);

require '../config/routes.php';

$app->run();

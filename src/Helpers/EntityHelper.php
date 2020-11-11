<?php

namespace App\Helpers;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class EntityHelper extends EntityManager
{
    private $params = [
        'url' => "mysql://root:@localhost/viverbd"
    ];
    private $paths = [__DIR__ . "../src/Models"];


    public function __construct()
    {
    }

    public function getEntity()
    {
        $config = Setup::createAnnotationMetadataConfiguration($this->paths, true);

        //Obter a instância da classe Entity Manager
        $entityManager = EntityManager::create($this->params, $config);

        return $entityManager;
    }
}

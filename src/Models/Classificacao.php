<?php

namespace App\Models;

/**
 * @Entity
 * @Table(name="classificacao")
 */
class Classificacao
{
    /**
     * @Id 
     * @Column(name="`id`", type="integer") 
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(name="`desc_class`", type="string") 
     */
    private $desc_class;

    /* Getters e Setters */

    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->desc_class;
    }

    public function setDescricao($descricao)
    {
        $this->desc_class = $descricao;
    }
}

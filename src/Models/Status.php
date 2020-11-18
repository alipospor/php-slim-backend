<?php

namespace App\Models;

/**
 * @Entity
 * @Table(name="status")
 */
class Status
{
    /**
     * @Id 
     * @Column(name="`id`", type="integer")
     * @OneToMany(targetEntity="Tarefa")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(name="`desc_status`", type="string") 
     */
    private $desc_status;

    /* Getters e Setters */

    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->desc_status;
    }

    public function setDescricao($descricao)
    {
        $this->desc_status = $descricao;
    }
}

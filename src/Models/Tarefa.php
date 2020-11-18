<?php

namespace App\Models;


/**
 * @Entity
 * @Table(name="tarefa")
 */
class Tarefa
{
    /**
     * @Id 
     * @Column(name="`id`", type="integer") 
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(name="`descricao`", type="string") 
     */
    private $descricao;

    /**
     * @ManyToOne(targetEntity="Status")
     * @JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    
    private $classificacao;

    /* Getters e Setters */

    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getClassificacao()
    {
        return $this->classificacao;
    }

    public function setClassificacao($classificacao)
    {
        $this->classificacao = $classificacao;
    }
}

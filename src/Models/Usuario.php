<?php

namespace App\Models;

/**
 * @Entity
 * @Table(name="usuario")
 */
class Usuario
{
    /**
     * @Id 
     * @Column(name="`id`", type="integer") 
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(name="`nome`", type="string") 
     */
    protected $nome;

    /**
     * @Column(name="`senha`", type="string") 
     */
    protected $senha;

    /**
     * @Column(name="`email`", type="string") 
     */
    protected $email;


    /* Getters e setters */
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return App\Models\Usuario
     */
    public function getValues()
    {
        return get_object_vars($this);
    }
}

<?php

class Funcionario
{
    private $id;
    private $nome;
    private $genero;
    private $idade;
    private $salario;

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

    public function getGenero() 
    {
        return $this->genero;
    }

    public function setGenero($genero) 
    {
        $this->genero = $genero;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    public function getSalario() 
    {
        return $this->salario;
    }

    public function setSalario($salario)
    {
        $this->salario = $salario;
    }

    public function __construct($id, $nome, $genero, $idade, $salario)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->genero = $genero;
        $this->idade = $idade;
        $this->salario = $salario;
    }

    public function insertUsuario()
    {
        
    }
}

?>
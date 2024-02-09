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

    public function __toString()
    {
        return json_encode(array(
            "id"=>$this->id,
            "nome"=>$this->nome,
            "genero"=>$this->genero,
            "idade"=>$this->idade,
            "salario"=>$this->salario
        ));
    }

    public function insertFuncionario($conn, $funcionario)
    {
        try
        {
            $sql = "INSERT INTO funcionarios (nome, genero, idade, salario) VALUES ('" . $funcionario->getNome() . "', '"
            . $funcionario->getGenero() . "', '" . $funcionario->getIdade() . "', '" . $funcionario->getSalario() . "')";
            $stmt = $conn->prepare($sql);
            $retorno = $stmt->execute();
            return "Usuário inserido com sucesso!";
        }
        catch(PDOException $erro)
        {
            echo "Erro ao inserir usuário: " . $erro->getMessage();
        }
    }

    public function getFuncionario($conn, $id)
    {
        try
        {
            $sql = "SELECT * FROM funcionarios WHERE id = '$id'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        }
        catch(PDOException $erro)
        {
            echo "Erro ao buscar usuário: " . $erro->getMessage();
        } 
    }

    public function updateFuncionario($conn, $id, $nome, $genero, $idade, $salario)
    {
        try
        {
            $sql = "UPDATE funcionarios SET nome = '$nome', genero = '$genero', 
            idade = '$idade', salario = '$salario'
            WHERE id = '$id'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return "Funcionário atualizado com sucesso";  
        }
        catch(PDOException $erro)
        {
            echo "Erro ao alterar usuário: " . $erro->getMessage();
        }   
    }

    public function deleteFuncionario($conn, $id)
    {
        try
        {
            $sql = "DELETE FROM funcionarios WHERE id = '$id'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return "Usuário deletado com sucesso";  
        }
        catch(PDOException $erro)
        {
            echo "Erro ao deletar usuário: " . $erro->getMessage();
        }
    }
    
    public function getTodosFuncionarios($conn)
    {
        try
        {
            $sql = "SELECT * FROM funcionarios";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $erro)
        {
            echo "Erro ao buscar usuários";
        }
    }
}

?>
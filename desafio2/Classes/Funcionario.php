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

    public function insertFuncionario($conn, $nome, $genero, $idade, $salario)
    {
        $sql = "INSERT INTO funcionarios (nome, genero, idade, salario) VALUES ('$nome', '$genero', '$idade', '$salario')";
        $stmt = $conn->prepare($sql);
        if($stmt->execute())
        {
            return "Usuário inserido com sucesso!";
        }
        else
        {
            return "Erro durante a inserção: "; 
        }
    }

    public function getFuncionario($conn, $id)
    {
        $sql = "SELECT * FROM funcionarios WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        if($stmt->execute())
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return "Erro durante a inserção: "; 
        }
    }

    public function updateFuncionario($conn, $id, $nome, $genero, $idade, $salario)
    {
        $sql = "UPDATE funcionarios SET nome = '$nome', genero = '$genero', 
        idade = '$idade', salario = '$salario'
        WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        if($stmt->execute())
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return "Erro durante alteração"; 
        }    
    }

    public function deleteFuncionario($conn, $id)
    {
        $sql = "DELETE FROM funcionarios WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        if($stmt->execute())
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return "Erro durante alteração"; 
        } 
    }
    
    public function getTodosFuncionarios($conn)
    {
        $sql = "SELECT * FROM funcionarios";
        $stmt = $conn->prepare($sql);
        if($stmt->execute())
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return "Erro durante consulta";
        }
    }

    public function setSalarioFuncionario($conn, $id, $percentualAumento)
    {
        $funcionario = new Funcionario("","","","","");
        $funcionario = $funcionario->getFuncionario($conn, $id);
        $sql = "SELECT * FROM funcionarios WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        if($stmt->execute())
        {
            $arrayFun = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $func = new Funcionario($arrayFun[0]['id'], $arrayFun[0]['nome'], $arrayFun[0]['genero'], $arrayFun[0]['idade'], $arrayFun[0]['salario']);
            
            $salario = $func->getSalario();
            
            
            $func->setSalario($salario + (($salario/100) * $percentualAumento));
            echo "Novo salário: " . $func->getSalario();
            $func->updateFuncionario($conn, $func->getId(), $func->getNome(), $func->getGenero(), $func->getIdade(), $func->getSalario());
        }
        else
        {
            echo "Erro durante a busca: "; 
        }
        
    }
}

?>
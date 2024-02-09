<?php

require_once('Banco/conexaoBanco.php');
require_once('Classes/Funcionario.php');

$arrayPessoas = (array(
    array("nome"=>"João", "genero"=>"Masculino", "idade"=>20, "salario"=>1700),
    array("nome"=>"Eduardo", "genero"=>"Masculino", "idade"=>36, "salario"=>2000),
    array("nome"=>"Maria", "genero"=>"Feminino", "idade"=>29, "salario"=>4000),
    array("nome"=>"Giovanna", "genero"=>"Feminino", "idade"=>21, "salario"=>3000),
));

//Realizando 4 cadastros
foreach ($arrayPessoas as $pessoa)
{
    $funcionario = new Funcionario("", $pessoa["nome"], $pessoa["genero"], $pessoa["idade"], $pessoa["salario"]);    
    echo $funcionario->insertFuncionario($conn, $funcionario);
}

//Aleterar nomes e salários
$funcionario = new Funcionario("","","","","");
$todosFuncionarios = $funcionario->getTodosFuncionarios($conn);
$percentualAumento = 10;

foreach($todosFuncionarios as $func)
{
    $funcionario = new Funcionario($func['id'], $func['nome'], 
    $func['genero'], $func['idade'], $func['salario']);
    echo $funcionario->updateFuncionario($conn, $funcionario->getId(), "Outro nome", "Home", 40, 
    ($funcionario->getSalario() + (($funcionario->getSalario()/100) * $percentualAumento)));
    $percentualAumento += 10;
}

//Listar todos funcionários
$todosFuncionarios = $funcionario->getTodosFuncionarios($conn);
print_r($todosFuncionarios);

// Pegar o id de um funcionario, dar unset no objeto e instanciar esse mesmo funcionário novamente
$funcionario = new Funcionario($todosFuncionarios[0]['id'],$todosFuncionarios[0]['nome'],$todosFuncionarios[0]['genero'],$todosFuncionarios[0]['idade'],$todosFuncionarios[0]['salario']);
$idFuncionario = $funcionario->getId();
unset($funcionario);
$funcionario = new Funcionario("","","","","");
$funcionarioArray = $funcionario->getFuncionario($conn, $idFuncionario);
$funcionario = new Funcionario($funcionarioArray['id'], $funcionarioArray['nome'], 
$funcionarioArray['genero'], $funcionarioArray['idade'], $funcionarioArray['salario']);
echo $funcionario;

//Excluindo funcionário
echo $funcionario->deleteFuncionario($conn, $funcionario->getId());

?>
<?php

require_once('Banco/conexaoBanco.php');
require_once('Classes/Funcionario.php');

$arrayPessoas = (array(
    array("nome"=>"João", "genero"=>"Masculino", "idade"=>20, "salario"=>1700),
    array("nome"=>"Eduardo", "genero"=>"Masculino", "idade"=>36, "salario"=>2000),
    array("nome"=>"Maria", "genero"=>"Feminino", "idade"=>29, "salario"=>4000),
    array("nome"=>"Giovanna", "genero"=>"Feminino", "idade"=>21, "salario"=>3000),
));

//print_r($arrayPessoas);


/*
foreach ($arrayPessoas as $pessoa)
{
    $funcionario = new Funcionario("", $pessoa["nome"], $pessoa["genero"], $pessoa["idade"], $pessoa["salario"]);    
    $funcionario->insertFuncionario($conn, $funcionario);
}
*/
$funcionario = new Funcionario("","","","","");

$todosFuncionarios = $funcionario->getTodosFuncionarios($conn);
$percentualAumento = 10;
foreach($todosFuncionarios as $func)
{
    $fun = new Funcionario($func['id'], $func['nome'], 
    $func['genero'], $func['idade'], $func['salario']);
    $fun->updateFuncionario($conn, $fun->getId(), "Juão", "Home", 40, ($fun->getSalario() + (($fun->getSalario()/100) * $percentualAumento)));
    $percentualAumento += 10;
}
print_r($todosFuncionarios);


//$retorno = $funcionario->insertFuncionario($conn, "Giovanna", "Feminino", 21, 3000);

//$retorno = $funcionario->getFuncionario($conn, 1);

//$retorno = $funcionario->updateFuncionario($conn, 1, "Juão", "Home", 40, 10000);

//$retorno = $funcionario->deleteFuncionario($conn, 1);

//$retorno = $funcionario->getTodosFuncionarios($conn);

//$funcionario->setSalarioFuncionario($conn, 2, 10);

//print_r($retorno);
?>
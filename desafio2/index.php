<?php

require_once('Banco/conexaoBanco.php');
require_once('Classes/Funcionario.php');


$funcionario = new Funcionario("","","","","");

//$retorno = $funcionario->insertFuncionario($conn, "Giovanna", "Feminino", 21, 3000);

//$retorno = $funcionario->getFuncionario($conn, 1);

//$retorno = $funcionario->updateFuncionario($conn, 1, "Juão", "Home", 40, 10000);

//$retorno = $funcionario->deleteFuncionario($conn, 1);

//$retorno = $funcionario->getTodosFuncionarios($conn);

$funcionario->setSalarioFuncionario($conn, 2, 10);

print_r($retorno);
?>
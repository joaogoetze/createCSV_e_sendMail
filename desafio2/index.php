<?php

require_once('Banco/conexaoBanco.php');
require_once('Classes/Funcionario.php');


$funcionario = new Funcionario("","","","","");

//$retorno = $funcionario->insertFuncionario($conn, "João", "Masculino", 20, 1700);

//$retorno = $funcionario->getFuncionario($conn, 1);

//$retorno = $funcionario->updateFuncionario($conn, 1, "Juão", "Home", 40, 10000);

$retorno = $funcionario->deleteFuncionario($conn, 1);
print_r($retorno);
?>
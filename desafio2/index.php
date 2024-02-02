<?php

require_once('Banco/conexaoBanco.php');
require_once('Classes/Funcionario.php');


$funcionario = new Funcionario("","","","","");

//$retorno = $funcionario->insertFuncionario($conn, "João", "Masculino", 20, 1700);

$retorno = $funcionario->getFuncionario($conn, 16);
print_r($retorno);
?>
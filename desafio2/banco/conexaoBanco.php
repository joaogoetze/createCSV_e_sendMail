<?php

$host = '127.0.0.1'; 
$dbname = 'empresa';
$user = 'postgres';
$password = 'root';
$port = '5432';

try 
{
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    // Configura para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida";
} 
catch (PDOException $e)
{
    echo "Erro de conexão: " . $e->getMessage();
}

?>
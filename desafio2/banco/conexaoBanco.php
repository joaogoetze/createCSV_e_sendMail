<?php

$host = '127.0.0.1'; 
$dbname = 'empresa';
$user = 'postgres';
$password = 'root';
$port = '5432';

try 
{
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    // Configura para lançar exceções em caso de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida <br><br>";
} 
catch (PDOException $e)
{
    echo "Erro de conexão: " . $e->getMessage();
}

?>
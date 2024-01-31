<?php

//Pegar os itens do arquivo products.csv
//Criar objetos do tipo Product com os dados (cada linha)
//Colocar esses objetos em um array

//Após terminar, posso colocar esse método que lê o CSV dentro da classe Products

function readCSV()
{
    $filename = 'base/products.csv';
    $file = fopen($filename, 'r');

    while(! feof($file))
    {
        echo "<br>";
        print_r(fgetcsv($file)[0]);
    }
    fclose($file);
}





readCSV();




























/*
$row = 1;
if (($handle = fopen("csv.csv", "r")) !== FALSE)
{
    //Passagem pelas linhas
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
        $num = count($data);
        $row++;
        // Passagem pelas colunas
        for ($col = 0; $col < $num; $col++)
        {
            //Printando apenas a coluna 14
            if ($col == 14)
            {
                echo 'Exibindo valor para linha:'.$row.' e para a coluna: '.$data[$col] . "<br />\n";
            }
        }
    }
    fclose($handle);
}*/

?>

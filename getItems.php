<?php

include 'Classes/Order.php';
include 'Classes/Product.php';

$product = new Product();
$order = new Order();

$productsArray = $product->readProductsCSV();
echo "<br><br><br>";
$ordersArray = $order->readOrderCSV();
//print_r($ordersArray);

//Aqui já tenho todas as ordens e produtos

$noRepeatProductsArray = array();

//Listar todos os produtos sem repetir
foreach ($ordersArray as $order)
{
    $product_id = $order->product_id;
    if(!in_array($product_id, $noRepeatProductsArray))
    {
        array_push($noRepeatProductsArray, $product_id);
    }
    
}
//print_r($noRepeatProductsArray);

foreach($noRepeatProductsArray as $noRepeatProduct)
{
    //echo $noRepeatProduct . "<br>";
    $product->getProductById($noRepeatProduct);
}













/*
foreach ($productsArray as $product)
{
    echo $product . "<br>";
}
*/
/*
foreach ($ordersArray as $order)
{
    echo $order . "<br>";
}
*/

?>
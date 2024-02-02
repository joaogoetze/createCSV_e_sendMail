<?php

include 'Classes/Order.php';
include 'Classes/Product.php';
include 'CreateCSV.php';
include 'SendMail.php';

$product = new Product("","","");
$order = new Order("","","","");

$productsArray = $product->readProductsCSV();
$ordersArray = $order->readOrderCSV();

foreach ($ordersArray as $order) 
{
    $product_id = $order->product_id;
    $produto = $product->getProductById($productsArray, $product_id);

    // O produto já foi vendido antes?
    if (isset($salesArray[$product_id])) 
    {
        // A data da venda desse produto é maior que a data da última venda desse mesmo produto?
        if ($order->date > $salesArray[$product_id]['date']) 
        {
            $salesArray[$product_id]['product_id'] = $order->product_id;
            $salesArray[$product_id]['date'] = $order->date;
            $salesArray[$product_id]['quantity'] += $order->quantity; // Soma a quantidade vendida
            $salesArray[$product_id]['valor'] = $produto->getPrice();
        }
    } 
    else
    {
        // Esse produto não havia sido vendido antes? Adiciona no array
        $salesArray[$product_id] = array(
            'product_id' => $order->product_id,
            'date' => $order->date,
            'quantity' => $order->quantity,
            'valor' => $produto->getPrice(),
        );
    }
}

// Cria o array que será usado no arquivo CSV, começa adicionando o cabeçalho
$finalArray = array(
    ['product_id','preco','date','quantity','valor_total']
);

foreach($salesArray as $sales)
{
    $vendas_total = ($sales['quantity'])*($sales['valor']);
    $venda = array(
        'product_id' => $sales['product_id'],
        'preco' => $sales['valor'],
        'date' => $sales['date'],
        'quantity' => $sales['quantity'],
        'valor_total' => $vendas_total,
    );
    array_push($finalArray, $venda);  
}

new createCSV($finalArray);

new SendMail;

?>
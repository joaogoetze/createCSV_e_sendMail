<?php

include 'Classes/Order.php';
include 'Classes/Product.php';
include 'createCSV.php';

$product = new Product("","","");
$order = new Order("","","","");

$productsArray = $product->readProductsCSV();
$ordersArray = $order->readOrderCSV();
//Aqui já tenho todas as ordens e produtos

$noRepeatProductsIdArray = array();

//Listar todos os produtos das ordens sem repetir
foreach ($ordersArray as $order)
{
    $product_id = $order->product_id;
    if(!in_array($product_id, $noRepeatProductsIdArray))
    {
        array_push($noRepeatProductsIdArray, $product_id);
    }
}

//Pegar produto por ID
foreach($noRepeatProductsIdArray as $produto)
{
    $a = $product->getProductById($productsArray, $produto);
    //echo $a . "<br>";
}

//Pega o id do produto a ultima venda dele e a quatidade de vendas desse produto
$last_sales = array();

foreach ($ordersArray as $order) 
{
    $product_id = $order->product_id;
    $produto = $product->getProductById($productsArray, $product_id);

    // Verifica se o produto já foi vendido antes
    if (isset($last_sales[$product_id])) 
    {
        // Verifica se a data deste pedido é posterior à data da última venda deste produto
        if ($order->date > $last_sales[$product_id]['date']) 
        {
            // Atualiza as informações da última venda deste produto
            $last_sales[$product_id]['product_id'] = $order->product_id;
            $last_sales[$product_id]['date'] = $order->date;
            $last_sales[$product_id]['quantity'] += $order->quantity; // Soma a quantidade vendida
            $last_sales[$product_id]['valor'] = $produto->getPrice();
        }
    } 
    else
    {
        // Se o produto ainda não foi vendido antes, adiciona-o ao array
        $last_sales[$product_id] = array(
            'product_id' => $order->product_id,
            'date' => $order->date,
            'quantity' => $order->quantity,
            'valor' => $produto->getPrice(),
        );
    }
}

$finalArray = array(
    ['product_id','preco','date','quantity','valor_total']
);
foreach($last_sales as $sales)
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

//print_r($finalArray);

new createCSV($finalArray);

$para = "joaoaugustoferreira5@gmail.com";
$assunto = "Assunto do e-mail";
$mensagem = "Este é o corpo do e-mail.";

// Para enviar HTML mail, o cabeçalho Content-type deve ser definido
$cabecalhos  = "MIME-Version: 1.0" . "\r\n";
$cabecalhos .= "Content-type: text/html; charset=UTF-8" . "\r\n";

// Cabeçalhos adicionais
$cabecalhos .= "From: remetente@example.com" . "\r\n";
$cabecalhos .= "Cc: copia@example.com" . "\r\n";
$cabecalhos .= "Bcc: copia_oculta@example.com" . "\r\n";

// Envie o e-mail
if(mail($para, $assunto, $mensagem, $cabecalhos)) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Falha ao enviar o e-mail.";
}
?>
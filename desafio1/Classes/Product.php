<?php

Class Product
{
    //Atributos
    public $product_id;
    public $name;
    /** @var float */
    public $price;

    //Getters e Setters
    public function getProduct_id()
    {
        return $this->product_id;
    }

    public function setProduct_id($value)
    {
        $this->product_id = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($value)
    {
        $this->price = $value;
    }

    //Método construtor
    public function __construct($product_id, $name, $price)
    {
        $this->product_id = $product_id;
        $this->name = $name;
        $this->price = $price;
    }

    //Método para printar usuário
    public function __toString()
    {
        return json_encode(array(
            "product_id"=>$this->product_id,
            "name"=>$this->name,
            "price"=>$this->price
        ));
    }
    
    //Método que lê os produtos que estão do csv
    function readProductsCSV()
    {
    
        $filename = 'Base/products.csv';
        $file = fopen($filename, 'r');
        $productsArray = array();
        $lineCount = 0;

        while(! feof($file))
        { 
            $product = new Product("","","");
            $data = fgetcsv($file);

            if ($lineCount == 0) 
            {
                $lineCount++;
                continue;
            }
            if (!empty($data)) 
            {
                $product->setProduct_id($data[0]);
                $product->setName($data[1]);
                $product->setPrice($data[2]);
                array_push($productsArray, $product);
            }
        }
        //print_r($productsArray);
        return $productsArray;
        fclose($file);
    }

    //Método que pega o produto por ID                    
    public function getProductById($productsArray, $product_id) //Em qual array quero pro curar //Qual item quero procurar
    {
        $product = new Product("","","");
        foreach($productsArray as $teste)
        {
            if($teste->product_id == $product_id)
            {   
                $product->setProduct_id($teste->product_id);
                $product->setName($teste->name);
                $product->setPrice($teste->price);
                
                return $product;
            }
        }
        return null;
    }  
}


?>
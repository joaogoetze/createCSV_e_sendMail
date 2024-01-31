<?php

Class Product
{
    public $product_id;
    public $name;
    public $price;

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

    public function __construct($product_id = "", $name = "", $price = "")
    {
        $this->product_id = $product_id;
        $this->name = $name;
        $this->price = $price;
    }

    public function __toString()
    {
        return json_encode(array(
            "product_id"=>$this->product_id,
            "name"=>$this->name,
            "price"=>$this->price
        ));
    }
    
    function readProductsCSV()
    {
    
        $filename = 'Base/products.csv';
        $file = fopen($filename, 'r');
        $productsArray = array();
        $lineCount = 0;

        while(! feof($file))
        { 
            $product = new Product();
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

    public function getProductById($product_id)
    {
        $product = new Product();
        $array = $product->readProductsCSV();
        //print_r($array);
        foreach($array as $item)
        {
            //echo $item ."<br>";
            
        
            if($item->product_id == $product_id)
            {
                echo $item->price . "<br>";
            }
            
        }
    }
}


?>
<?php

Class Product
{
    private $product_id;
    private $name;
    private $price;

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

    public function __construct($product_id, $name, $price)
    {
        $this->product_id = $product_id;
        $this->name = $name;
        $this->price = $price;
    }
}

?>
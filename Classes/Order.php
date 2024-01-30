<?php

Class Order
{
    private $order_id;
    private $product_id;
    private $date;
    private $quantity;

    public function getOrder_id()
    {
        return $this->order_id;
    }

    public function setOrder_id($value)
    {
        $this->order_id = $value;
    }

    public function getProduct_id()
    {
        return $this->product_id;
    }

    public function setProduct_id($value)
    {
        $this->product_id = $value;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($value)
    {
        $this->date = $value;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($value)
    {
        $this->quantity = $value;
    }
}

?>
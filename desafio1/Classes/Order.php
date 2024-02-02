<?php

Class Order
{
    public $order_id;
    public $product_id;
    public $date;
    public $quantity;

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

    public function __construct($order_id, $product_id, $date, $quantity)
    {
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->date = $date;
        $this->quantity = $quantity;
    }

    public function __toString()
    {
        return json_encode(array(
            "order_id"=>$this->order_id,
            "product_id"=>$this->product_id,
            "date"=>$this->date,
            "quantity"=>$this->quantity
        ));
    }

    function readOrderCSV()
    {
        $filename = 'Base/orders.csv';    
        $file = fopen($filename, 'r');
        $ordersArray = array();
        $lineCount = 0;

        while(! feof($file))
        { 
            $data = fgetcsv($file);

            if ($lineCount == 0) 
            {
                $lineCount++;
                continue;
            }
            if (!empty($data)) 
            {
                $order = new Order($data[0], $data[1], $data[2], $data[3]);
                array_push($ordersArray, $order);
            }
        }
        fclose($file);
        return $ordersArray;
    }
}

?>
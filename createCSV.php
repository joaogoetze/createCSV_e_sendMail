<?php

class CreateCsv
{

    private $array = array();

    public function __construct($array) 
    {
        $this->array = $array;
        $this->createCSV($array);
    }

    function createCSV($array)
    {
        $csv_name = 'file.csv';
        $fp = fopen($csv_name, 'w');

        foreach($array as $item)
        {
            fputcsv($fp, $item);
        }

        fclose($fp);
    }


    
    
}

?>
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
        $file = fopen($csv_name, 'w');

        foreach($array as $item)
        {
            fputcsv($file, $item);
        }

        fclose($file);
    }
}

?>
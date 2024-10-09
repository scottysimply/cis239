<?php
    // $data = [
    //     ['Facebook', 129.30],
    //     ['Google', 120.30],
    //     ['Ebay', 133.00]
    // ];
    
    // $filename = 'data.csv';
    // $file = fopen($filename, 'w');

    // if (!$file) {
    //     die('Error opening file');
    // }
    // else {
    //     foreach ($data as $row) {
    //         fputcsv($file, $row);
    //     }
    // }

    // fclose($file);
    $stocks[] = [];
    $file = fopen('data.csv','rb');
    while (!feof($file)) {
        array_push($stocks, fgetcsv($file));
    }
    print_r($stocks);
    fclose($file);
?>
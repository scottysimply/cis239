<?php

    function getProducts()
    {
        $file = fopen('model/products.csv', 'rb');
        
        $products = array();
        while (!feof($file)){
            $product = fgetcsv($file); 
            if ($product === false) continue;
            $products[] = $product;
        }

        // print_r($products);
        return $products;
    }
    

    function getProduct($id)
    {
        
        $aryProducts = getProducts();
        // var_dump($aryProducts);
        foreach($aryProducts as $oneProd)
        {
            if ($oneProd[0] === $id)
            {
                return $oneProd;
            }
        }
    }

    function addProducts($id, $name, $price)
    {
        if ($id === null || $name === null || $price === null) {
            // If any parameter is null, return false
            return false;
        }
        $products = array($id, $name, $price);
        //print_r($products);
        $file = fopen('model/products.csv', 'ab');
        
        // foreach($products as $prod)
        // {
            fputcsv($file, $products);
        // }
    
        
        fclose($file);
        return true; 
        
        
    }

    
?>
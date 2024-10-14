<?php

/**
 * Retrieves products from a CSV file and returns them as an array.
 *
 * This function opens a CSV file located at 'model/products.csv', reads its contents,
 * and parses each line into an array representing a product. The products are
 * then stored in an array and returned.
 *
 * @return array An array of products where each product is represented as an array of values.
 */
    function getProducts()
    {
        // Open the CSV file for reading in binary mode
        $file = fopen('model/products.csv', 'rb');
        
        // Initialize an empty array to store the products
        $products = array();
        
        // Loop through the file until the end is reached
        while (!feof($file)){
            // Read a line from the CSV file and parse it as a CSV record
            $product = fgetcsv($file); 
            
            // If we've reached the end of the file, continue to the next iteration
            if ($product === false) continue;
            
            // Add the parsed product to the products array
            $products[] = $product;
        }

        // Close the file
        fclose($file);
        
        // Return the array of products
        return $products;
    }


/**
 * Retrieves a product by its ID from a list of products.
 *
 * This function fetches a list of products using the 'getProducts()' function
 * and then searches for a product with the specified ID within that list.
 *
 * @param string $id The ID of the product to retrieve.
 *
 * @return array|false If a product with the specified ID is found, it is returned
 *                    as an array of values. If no matching product is found, it returns false.
 */
    function getProduct($id)
    {
        // Fetch the list of products from the 'getProducts()' function
        $aryProducts = getProducts();
        
        // Iterate through the list of products
        foreach($aryProducts as $oneProd)
        {
            // Check if the current product's ID matches the specified ID
            if ($oneProd[0] === $id)
            {
                // If a match is found, return the product
                return $oneProd;
            }
        }
        
        // If no matching product is found, return false
        return false;
    }

/**
 * Adds a new product to a CSV file.
 *
 * This function creates an array representing a new product using the provided
 * ID, name, and price. It then appends this product to a CSV file located at
 * 'model/products.csv'.
 *
 * @param string $id    The ID of the new product.
 * @param string $name  The name of the new product.
 * @param float  $price The price of the new product.
 *
 * @return bool Returns true if the product was added successfully, false otherwise.
 */
    function addProducts($id, $name, $price)
    {
        // Check if any of the parameters are null
        if ($id === null || $name === null || $price === null) {
            // If any parameter is null, return false
            return false;
        }
        // Create an array representing the new product
        $product = array($id, $name, $price);
        
        // Open the CSV file for appending in binary mode
        $file = fopen('model/products.csv', 'ab');
        
        // Write the new product to the CSV file
        fputcsv($file, $product);
        
        // Close the CSV file
        fclose($file);
        return true;
    }

    
?>
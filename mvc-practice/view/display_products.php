<?php

// Fetch the list of products using the 'getProducts()' function
$aryProducts = getProducts();


// Loop through the list of products and generate links for each product
foreach ($aryProducts as $aryProd) {
    // Create a link for each product, where the 'id' parameter is set to the product's ID
    echo "<a href='?id=$aryProd[0]'>$aryProd[1] $aryProd[2]</a><br>";
}
?>

<?php
// Retrieve product information for a given 'id' using the 'getProduct' function
$oneProduct = getProduct($id);

// Display the product information in an HTML heading and paragraph
echo ("<h1>$oneProduct[0]</h1><p>$oneProduct[1] $oneProduct[2]");
?>

<!-- Create a link to show all products and wrap it in a 'div' element -->
<div><a href="."> Show all Products</a></div>

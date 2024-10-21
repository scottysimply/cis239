<?php
    //  include "models/product_db.php";
    
    $aryProducts = getProducts();
    // print_r($aryProducts);
    foreach($aryProducts as $aryProd)
    {
        echo "<a href='?id=$aryProd[0]'>$aryProd[1] $aryProd[2]</a><br>";
    }
?>
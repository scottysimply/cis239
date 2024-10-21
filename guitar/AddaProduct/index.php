<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

<?php 
   
    include "view/nav.php" ;
?>

    <div class="container">

  
<?php

    include "model/product_db.php";

    $id = filter_input(INPUT_GET, 'id') ;

    // todays lecture takes the starter files which are like the video game and
    // adds the following block of code

    // $action = filter_input(INPUT_GET, 'action');



    // This is for the nav menu
    $action = filter_input(INPUT_GET, 'action');
    // returns get for nav menu or post for the form post
    $action ? $action : $action = filter_input(INPUT_POST, 'action');
    


    switch ($action)
    {
        // nav was clicked
        case "add_product":
            include "view/show_add_form.php";
            break;
        case "save_product": // form was posted
            $id = filter_input(INPUT_POST, 'id');
            $name = filter_input(INPUT_POST, 'product');
            $price = filter_input(INPUT_POST, 'price');
            $added = addProducts($id, $name, $price);
            if($added)
            {
                echo "<p>$name Added</p>";
            }
              include "view/display_products.php";
            break;
        default:
            //this if block was in the starter files
            if ($id)
            {
                echo ($id);
                include "view/display_product.php"  ;
            } else {
                include "view/display_products.php";

            }

    }

        


  
?>
      </div>
</body>
</html>
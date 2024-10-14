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
    // Include the navigation bar and the product database functions
    include "view/nav.php";
    include "model/product_db.php";

    // Start the main content container
    ?>

    <div class="container">

        <?php
        // Include the product database functions (assuming 'model/product_db.php' contains the necessary functions)

        // Get the 'id' parameter from the query string
        $id = filter_input(INPUT_GET, 'id');
        $action = filter_input(INPUT_GET,'action');

        // Check for adding record with ternary
        $action ? $action : $action = filter_input(INPUT_GET, 'action');
        if ($action == 'save_product') {
            // Get info
            $product = filter_input(INPUT_GET,'product');
            $price = filter_input(INPUT_GET,'price');
            // Add record
            addProducts($id, $product, $price);
        }

        switch ($action) {
            case "add_product":
                include "view/show_add_form.php";
                break;
            default:
                // Check if 'id' parameter is present
                if ($id) {        
                    // Include the product display template (assuming 'view/display_product.php' contains the product display HTML)
                    include "view/display_product.php";
                } else {
                    // Include the product list template (assuming 'view/display_products.php' contains the product list HTML)
                    include "view/display_products.php";
                }
        }
        ?>
    </div>
</body>
</html>
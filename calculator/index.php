<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <!--
        author: scott
        date: 9/18/24
        document: index.php
    -->
</head>
<body>
    <?php
        // Include functions
        include 'functions.php';
        // If the form has not been submitted, display facts and print
        // $_GET will not have any values set if the form has not been submitted yet
        if (!(isset($_GET["length"]) && isset($_GET["width"]))) {
            $count = mathFacts();
            echo("<p>The array had " . $count . " elements.</p>\n");
        }
        else { // If the form has been submitted, calculate the area and display input values
            $length = $_GET["length"];
            $width = $_GET["width"];
            // Display area and values
            echo("<p>For a rectangle with length " . $length . " and width " . $width . ", the area is " . calculateArea($length, $width) . ".</p>\n");
        }
        // IN EITHER CIRCUMSTANCE, SHOW FORM
        include 'form.php';
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "functions.php";
    if (!isset($_GET['name']) || !isset($_GET['email']) || !isset($_GET['phone'])) {
        echo('Please enter all of your information');
    }
    else {
        if (!validate($_GET['name'], "/^[a-zA-Z ]+$/")) {
            echo('Name is not valid<br/>');
        }
        if (!validate($_GET['email'], "/^[a-zA-Z0-9_]+@[a-zA-Z0-9_]+.[a-zA-Z0-9_]+/")) {
            echo('Email is not valid<br/>');
        }
        if (!validate($_GET['phone'], "/^(\d{3}(\-|\.|)|\(\d{3}\)\ )\d{3}(\-|\.|)\d{4}/")) {
            echo('Phone is not valid<br/>');
        }
    }



    ?>
    <form action="" method="get">
        <input type="text" name="name" placeholder="Enter your name">
        <input type="text" name="email" placeholder="Enter email">
        <input type="text" name="phone" placeholder="Enter phone">
        <input type="submit" value="Submit your information">
    </form>
</body>
</html>
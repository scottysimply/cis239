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
    if (validate($_GET['name'], "/^[a-zA-Z ]+$/")) {
        echo('Name is not valid');
    }
    if (validate($_GET['email'], "/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/")) {
        echo('Email is not valid');
    }
    if (validate($_GET['phone'], "/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.\-]\d{3}[\s.\-]\d{4}$/")) {
        echo('Phone is not valid');
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
<?php
    $dsn = "mysql:host=localhost;dbname=my_guitar_shop2";
    $username = "root";
    $password = "";

    try {
        $db = new PDO($dsn, $username, $password);
        echo("Connected to db");
    }
    catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo ("Error connecting to db: $error_message");
        exit();
    }

    $query = "SELECT * FROM customers, addresses WHERE customers.customerID = addresses.customerID; ";
    $result = $db->query($query);
    print_r($result);
    $customers = $result->fetchAll();
    print_r($customers);
    foreach ($customers as $customer) {
        echo(" $customer[1] $customer[2]\n");
    }
?>
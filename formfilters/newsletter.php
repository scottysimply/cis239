<?php
    if (!isset($_GET['login']) || $_GET['login'] == "false") {
        header("Location:index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include 'nav.php'; ?>
    <h1>Newsletter</h1>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            include 'submitted-form.php';
        }
        else {
            include 'subscribe-form.php';
        }
    ?>
</body>
</html>
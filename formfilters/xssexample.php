<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['comment'])) {
            echo(htmlspecialchars($_GET['comment']));
        }
    ?>

    <form action="xssexample.php">
        <input type="text" name="comment">
        <input type="submit" value="Add Comment">
    </form>
</body>
</html>
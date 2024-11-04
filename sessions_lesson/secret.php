<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello, <?=$_SESSION['username']?></h1>
    <form method="GET" action="/cis239/sessions_lesson/">
        <input hidden name="logout" value="true">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
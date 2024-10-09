<?php
    $tmpName = $_FILES['datafile'];
    echo $tmpName['name'];
    $path_to_file = 'uploads/' . $tmpName['name'];

    // Make file
    copy($tmpName['tmp_name'], $path_to_file);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>File uploaded!</h1>
    
</body>
</html>
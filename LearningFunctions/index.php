<?php
    declare(strict_types = 1);

    $classes = [
        'CIS-131' => ['Name' => 'Javascript', 'students' => 13],
        'CIS-239' => ['Name' => 'Backend', 'students' => 9]
    ]


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($classes as $course => $data) { ?>
        <h3><?= $course ?></h3>
        <p>Course Name: <?= $data['Name'] ?></p>
        <p>Number of Students: <?= $data['students'] ?></p>
    <?php } ?>
</body>
</html>
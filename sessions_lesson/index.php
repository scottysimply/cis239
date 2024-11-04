<?php
    session_start();
    if (isset($_GET['logout'])) {
        unset($_GET['logout']);
        setcookie(session_name(), "", time() - 42000);
        session_destroy();
    }
    else {
        $user = filter_input(INPUT_POST, 'username');
        if ($user == 'scotty') {
            $_SESSION['username'] = $user;
            header('Location: secret.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'login.php';
    ?>
</body>
</html>
<?php
    include_once 'models/user.php';
    // index.php will serve as the controller for this app
    // All of this code is up above since this is session logic. This will always run before rendering
    // begin session
    session_start();
    // make sure that the session variable exists
    if (!isset($_SESSION['loggedIn'])) {
        $_SESSION['loggedIn'] = false;
    }
    // check if we attempted a login. there's no sense in running this code unnecessarily, especially if it were to, say, validate the form
    $attempted_login = filter_input(INPUT_POST, "triedLogin");
    if ($attempted_login) {
        // try to log in user according to csv
        $username = filter_input(INPUT_POST, "username");
        $password = filter_input(INPUT_POST, "password");
        // check if login successful
        if (shouldUserLogIn($username, $password)) {
            // log in successful! set session variable
            $_SESSION['loggedIn'] = true;
            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Video Game Db</title>
</head>
<body>
    <?php
    // Use games model
    include_once 'models/games.php';

    // If not logged in, showcase the form
    if (!$_SESSION['loggedIn']) {
        include_once 'views/login.php';
        return; // i really love early return
    }
    // Always show nav
    include_once 'views/nav.php';

    // If a game is expected to be added, add the game
    if (isset($_POST['addSubmit'])) {
        addGame();
    }
    // If a game is expected to be edited, edit the game
    else if (isset($_POST['editSubmit'])) {
        editGame();
    }

    // Now for some neat logic taken from the guitar app. We will show a navbar and utilize a GET variable to dictate which page we're on. The default will be to show all games
    $action = filter_input(INPUT_GET, 'action');
    switch ($action) {
        case 'edit':
            // Show the edit page
            include_once 'views/editGame.php';
            break;
        case 'add':
            // Show the add a game page
            include_once 'views/addGame.php';
            break;
        default:
            // Show all page view
            include_once 'views/allGamesView.php';
            break;
    }
    ?>
</body>
</html>
<?php
    include_once 'controller.php';
    // contact the controller to determine if logged in
    Controller::validateForm();

    // If not logged in, force redirect to the home page to prompt a log in
    if (!Controller::$LoggedIn) {
        // Redirect
        header("Location: /cis239/video-game-mvc/");
        exit();
    }
    // redirect to main page
    header("Location: /cis239/video-game-mvc?login=true")
?>

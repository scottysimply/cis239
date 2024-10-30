<?php
    // class Controller {
    //     /**
    //      * Attempts to log a user in.
    //      * @param string $username
    //      * @param string $password
    //      * @return bool Whether or not the user exists.
    //      */
    //     public static function logInUser(string $username, string $password) : bool {
    //         // read CSV
    //         $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/cis239/video-game-mvc/data/users.csv", "rb");
    //         while (!feof($file)) {
    //             // If the user is in the csv, close stream and return
    //             $loginInfo = fgetcsv($file);
    //             if ($username === $loginInfo[0] && $password === $loginInfo[1]) {
    //                 // close stream, return true
    //                 fclose($file);
    //                 return true;
    //             }
    //         }
    //         // close stream
    //         fclose($file);
    //         // User was not found, return false
    //         return false;
    //     }
    //     public static bool $LoggedIn = false;
    //     public static bool $failedLogin = false;
    //     public static bool $invalidName = false;
    //     public static ?string $username = "";
    //     public static ?string $password = "";
    //     public static function validateForm() {
    //         Controller::$failedLogin = false;
    //         Controller::$invalidName = false;
    //         Controller::$username = filter_input(INPUT_POST, 'username');
    //         Controller::$password = filter_input(INPUT_POST,'password');
    //         // If set, the user has attempted to login
    //         if (Controller::$username && Controller::$password) {
    //             // Attempt to login the user
    //             Controller::$LoggedIn = Controller::logInUser(Controller::$username, Controller::$password);
    //             $_POST['loggedIn'] = Controller::$LoggedIn;
    //             // If logged in, send to games page _with_ login info
    //             if (Controller::$LoggedIn) {
    //                 header("Location: /cis239/video-game-mvc?login=true");
    //                 exit();
    //             }

    //             if (Controller::$username) {
    //                 Controller::$invalidName = true;
    //             }
    //             // Else, display error message
    //             Controller::$failedLogin = true;
    //         }
    //         else { // User or password was unset. Display required warnings
    //             if (Controller::$username) {
    //                 Controller::$invalidName = true;
    //             }
    //             Controller::$failedLogin = true;
    //         }
    //     }
    // }

?>
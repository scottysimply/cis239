<?php
    function shouldUserLogIn(string $username, string $password) : bool {
        // Read CSV
        $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/cis239/video-game-final/models/users.csv", 'rb');
        while (!feof($file)) {
            $login = fgetcsv($file);
            if ($login[0] === $username && $login[1] === $password) {
                fclose($file);
                return true;
            }
        }
        fclose($file);
        return false;
    }

?>
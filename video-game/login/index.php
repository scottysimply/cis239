<?php
    /**
     * Attempts to log a user in.
     * @param string $username
     * @param string $password
     * @return bool Whether or not the user exists.
     */
    function logInUser(string $username, string $password) : bool {
        // read CSV
        $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/cis239/video-game/data/users.csv", "rb");
        while (!feof($file)) {
            // If the user is in the csv, close stream and return
            $loginInfo = fgetcsv($file);
            if ($username === $loginInfo[0] && $password === $loginInfo[1]) {
                // close stream, return true
                fclose($file);
                return true;
            }
        }
        // close stream
        fclose($file);
        // User was not found, return false
        return false;
    }
    $failedLogin = false;
    $invalidName = false;
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST,'password');
    // If set, the user has attempted to login
    if ($username && $password) {
        // Attempt to login the user
        $loggedIn = logInUser($username, $password);
        // If logged in, send to games page _with_ login info
        if ($loggedIn) {
            // Add to GET
            $_GET['login'] = "true";
            header("Location: /cis239/video-game/games?login=true");
            exit();
        }
        if ($username) {
            $invalidName = true;
        }
        // Else, display error message
        $failedLogin = true;
    }
    else { // User or password was unset. Display required warnings
        if ($username) {
            $invalidName = true;
        }
        $failedLogin = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!--Always include navbar-->
    <?php include '../nav.php'; ?>

    <!--Login form-->
    <div class="container-md col-5 mt-3">
        <h1 class="fw-semibold">Login</h1>
        <form class="border border-primary-subtle rounded bg-primary bg-opacity-10 p-3" action="/cis239/video-game/login/" method="post">
            <div class="mb-3">
                <label for="userLogin" class="form-label">Username</label>
                <input class="form-control" type="text" name="username" id="userLogin">
                <?php
                    if ($failedLogin && $username && $invalidName) {
                        echo('<p class="text-danger" fs-5">Invalid username ' . htmlspecialchars($username) . '.</p>' . "\n"); 
                    }
                    else if ($failedLogin && !$username) { 
                        echo('<p class="text-danger" fs-5">Please type a username.</p>' . "\n"); 
                    }
                ?>
            </div>
            <div class="mb-3">
                <label for="passLogin" class="form-label">Password</label>
                <input class="form-control" type="text" name="password" id="passLogin">
                <?php if ($failedLogin && !$password) echo('<p class="text-danger" fs-5">Please type a password.</p>' . "\n"); ?>
            </div>
            <input class="btn btn-primary" type="submit" value="Login">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
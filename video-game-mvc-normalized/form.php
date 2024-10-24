<!--Login form-->
<?php include_once 'controller.php'; ?>
<div class="container-md col-5 mt-3">
    <h1 class="fw-semibold">Login</h1>
    <form class="border border-primary-subtle rounded bg-primary bg-opacity-10 p-3" action="/cis239/video-game-mvc/redirector.php" method="post">
        <div class="mb-3">
            <label for="userLogin" class="form-label">Username</label>
            <input class="form-control" type="text" name="username" id="userLogin">
            <?php
                if (Controller::$failedLogin && Controller::$username && Controller::$invalidName) {
                    echo('<p class="text-danger" fs-5">Invalid username ' . htmlspecialchars(Controller::$username) . '.</p>' . "\n"); 
                }
                else if (Controller::$failedLogin && !Controller::$username) { 
                    echo('<p class="text-danger" fs-5">Please type a username.</p>' . "\n"); 
                }
            ?>
        </div>
        <div class="mb-3">
            <label for="passLogin" class="form-label">Password</label>
            <input class="form-control" type="text" name="password" id="passLogin">
            <?php if (Controller::$failedLogin && !Controller::$password) echo('<p class="text-danger" fs-5">Please type a password.</p>' . "\n"); ?>
        </div>
        <input class="btn btn-primary" type="submit" value="Login">
    </form>
</div>
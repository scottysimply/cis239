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
    <?php //include 'nav.php'; ?>
    <?php include_once 'controller.php'; ?>

    <?php
        if (isset($_GET['login']) && $_GET['login']) {
            // The following code was previously on the 'addgame.php' file. However, I actually need this to run before including 'games.php' so it has been extracted here.
            $addedGame = false;
            // If the form was submitted, try to add to the database.
            if (isset($_POST['submitted'])) {
                $gameData = Controller::getGameDataFromPost();
                if ($gameData->titleValidated && $gameData->genreValidated && $gameData->platformValidated && $gameData->imagePathValidated) {
                    $addedGame = Controller::tryAddGame($gameData);
                }
            }
            include 'games.php';
            include 'addgame.php';
        }
        else {
            include 'form.php';
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
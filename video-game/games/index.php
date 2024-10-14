<?php
    // If not logged in, force redirect to the home page to prompt a log in
    if (!isset($_GET['login']) || $_GET['login'] == "false") {
        // Redirect
        header("Location: /cis239/video-game/login/");
        exit();
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
    <?php
        // Navbar 
        include '../nav.php'; 

        // Obtain games from csv
        $games = [];
        $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/cis239/video-game/data/games.csv", "rb");
        while (!feof($file)) {
            // Add to data
            array_push($games, fgetcsv($file));
        }
        // close stream
        fclose($file);
    ?>
    <!--Card container-->
    <div class="container">
        <div class="row align-items-center g-3">
        <?php
            // Display a card for each object in the CSV
            foreach ($games as $game) {
        ?>
        <div class="col-12 col-sm-6 col-lg-3 h-100">
            <div class="card bg-primary bg-opacity-10 h-100">
                <img class="card-img-top rounded-top img-fluid" style="object-fit: cover; width: 100%; height: 25%; min-height: 150px; max-height: 150px" src="/cis239/video-game/images/<?=$game[3]?>" alt="<?=$game[0]?>">
                <div class="card-body h-100">
                    <h3 class="card-title"><?=htmlspecialchars($game[0])?></h3>
                    <p>Genre: <?=htmlspecialchars($game[1])?></p>
                    <p>Play on <?=htmlspecialchars($game[2])?></p>
                </div>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
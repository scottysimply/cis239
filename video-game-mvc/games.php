<?php
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
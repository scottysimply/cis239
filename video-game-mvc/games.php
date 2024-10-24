<?php
    include_once 'controller.php';
    // Get games from controller
    $games = Controller::getGames();
?>

<!--Card container-->
<div class="container mt-5">
        <div class="row align-items-center g-3">
        <?php
            // Display a card for each object in the CSV
            foreach ($games as $game) {
        ?>
        <div class="col-12 col-sm-6 col-lg-3 h-100">
            <div class="card bg-primary bg-opacity-10 h-100">
                <img class="card-img-top rounded-top img-fluid" style="object-fit: cover; width: 100%; height: 25%; min-height: 150px; max-height: 150px" src="/cis239/video-game/images/<?=$game->image_path?>" alt="<?=$game->title?>">
                <div class="card-body h-100">
                    <h3 class="card-title"><?=htmlspecialchars($game->title)?></h3>
                    <p>Genre: <?=htmlspecialchars($game->genre)?></p>
                    <p>Play on: <?=htmlspecialchars($game->platform)?></p>
                </div>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>
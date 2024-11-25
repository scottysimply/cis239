<?php
    include_once 'models/games.php';
    $games = getAllGames();
?>
<div class="container mt-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        <?php
            // Display a card for each game
            foreach ($games as $game) {
        ?>
            <div class="col">
                <div class="card bg-primary bg-opacity-10 h-100">
                    <img class="card-img-top rounded-top" style="object-fit: cover;" src="/cis239/video-game-final/images/<?=$game->image_path?>" alt="<?=$game->title?>">
                    <div class="card-body">
                        <!--This card title is going to send a GET request with this game's ID, so that we can navigate to the edit page.-->
                        <h3 class="card-title"><a href="?action=edit&id=<?=$game->id?>"><?=htmlspecialchars($game->title)?></a></h3>
                        <p>Genre: <?=htmlspecialchars($game->genre)?></p>
                        <p>Play on: <?=htmlspecialchars($game->platform)?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
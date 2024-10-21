<?php
        class Game {
            public int $id;
            public string $name;
            public array $platforms;
            public array $genres;
            public string $image_path;
            public function __construct() {

            }
            public static function newGame(int $id, string $name, array $platform, array $genre, string $image): Game {
                $game = new Game();
                $game->id = $id;
                $game->name = $name;
                $game->platforms = $platform;
                $game->genres = $genre;
                $game->image_path = $image;
                return $game;
            }
        }
        // Obtain games from database
        $games = [];
        // Query database for games
        try {
            $db = new PDO("mysql:host=localhost;dbname=sp0989061", "root", "");
        
            /*
             * ORDER OF QUERIES
             * get games
             * get relations between game id and genre id
             * get relations between game id and platform id
             * get relations between game id and image id
             * at the very end, we can map IDs to the actual data
             */
            $game_query = 
           "SELECT game.game_id, game.game_title
            FROM vg_games AS game
            ";

            $genre_query =
           "SELECT game.game_id, genre.genre_name
            FROM vg_games AS game
            JOIN vg_game_genres AS genre ON game.game_id = genre.game_id
            JOIN vg_genre AS g ON genre.genre_id = g.genre_id;
            ";

            $platform_query = 
           "SELECT game.game_id, platform.platform_name
            FROM vg_games AS game
            JOIN vg_game_platforms AS platform ON game.game_id = platform.game_id
            JOIN vg_platform AS p ON platform.platform_id = p.platform_id;
            ";

            $image_query = 
           "SELECT game.game_id, image.image_path
            FROM vg_games AS game
            JOIN vg_game_images AS img ON game.game_id = img.game_id
            JOIN vg_images AS i ON img.image_id = i.image_id;
            ";

            // Do the queries
            $game_titles = $db->query($game_query)->fetchAll();
            $game_genres = $db->query($genre_query)->fetchAll();
            $game_platforms = $db->query($platform_query)->fetchAll();
            $game_images = $db->query($image_query)->fetchAll();

            // Map results to our object
            $addingData = true;
            while ($addingData) {
                $game = new Game();
                for
            }
        
        }
        catch (PDOException $e) {
        }
    
    
    
    
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
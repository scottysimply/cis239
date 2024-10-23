<?php
    /**
     * Returns a new array that contains elements that satisfy a condition. Returns an empty array if nothing satisfies the condition.
     * @param array $input_array
     * @param callable $condition
     * @return array The set of elements that satisfies the condition.
     */
    function where($input_array, $condition) : array {
        $output = array();
        foreach ($input_array as $value) {
            if ($condition($value)) {
                array_push($output, $value);
            }
        }
        return $output;
    }
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
        "SELECT game.game_id, g.genre_name
        FROM vg_games AS game
        JOIN vg_game_genres AS genre ON game.game_id = genre.game_id
        JOIN vg_genre AS g ON genre.genre_id = g.genre_id;
        ";

        $platform_query = 
        "SELECT game.game_id, p.platform_name
        FROM vg_games AS game
        JOIN vg_game_platforms AS platform ON game.game_id = platform.game_id
        JOIN vg_platform AS p ON platform.platform_id = p.platform_id;
        ";

        $image_query = 
        "SELECT game.game_id, i.image_path
        FROM vg_games AS game
        JOIN vg_game_images AS img ON game.game_id = img.game_id
        JOIN vg_image AS i ON img.image_id = i.image_id;
        ";

        // Do the queries
        $game_titles = $db->query($game_query)->fetchAll();
        $game_genres = $db->query($genre_query)->fetchAll();
        $game_platforms = $db->query($platform_query)->fetchAll();
        $game_images = $db->query($image_query)->fetchAll();
        // Map results to our objects
        $number_of_games = count($game_titles); // This will yield the number of games that must be retrieved
        for ($i = 0; $i < $number_of_games; $i++) {
            // ID and name (easy!)
            $this_game = new Game();
            $this_game->id = $game_titles[$i]['game_id'];
            $this_game->name = $game_titles[$i]['game_title'];
            // Closure to find data where the ID equals the current game's id.
            $whereIdEquals = function ($data) use ($this_game) : bool {
                return $data['game_id'] == $this_game->id;
            };
            // Use my linq-esque 'where' clause to find which games are a part of this id.
            $this_game->platforms = where($game_platforms, $whereIdEquals);
            $this_game->genres = where($game_genres, $whereIdEquals);
            $this_game->image_path = where($game_images, $whereIdEquals)[0]['image_path'];
            array_push($games, $this_game);
        }
    
    }
    catch (PDOException $e) {
        echo $e->getMessage();
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
                <img class="card-img-top rounded-top img-fluid" style="object-fit: cover; width: 100%; height: 25%; min-height: 150px; max-height: 150px" src="/cis239/video-game/images/<?=$game->image_path?>" alt="<?=$game->name?>">
                <div class="card-body h-100">
                    <h3 class="card-title"><?=htmlspecialchars($game->name)?></h3>
                    <p>Genre: <?php $string = "";
                                    foreach ($game->genres as $index => $genre) {
                                        $string .= $genre['genre_name'];
                                        if ($index != count($game->genres) - 1) {
                                            $string .= ", ";
                                        }
                                    }
                                    echo $string;
                                ?></p>
                    <p>Play on <?php $string = "";
                                     foreach ($game->platforms as $index => $platform) {
                                        $string .= $platform['platform_name'];
                                        if ($index != count($game->platforms) - 1) {
                                            $string .= ", ";
                                        }
                                        if ($index == count($game->platforms) - 2) {
                                            $string .= "and ";
                                        }
                                    }
                                    echo $string;
                                ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>
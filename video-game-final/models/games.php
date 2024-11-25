<?php
    // This file handles the database connection for the games. 
    class Game {
        public int $id;
        public string $title;
        public string $genre;
        public string $platform;
        public string $img_path;
    }
    /**
     * Connects to the database and returns the connection.
     * @return PDO
     */
    function getPDO() : PDO {
        return new PDO("mysql:host=localhost;dbname=videogame_simplified", "root", "");
    }
    /**
     * Retrieves the full list of games
     * @return array
     */
    function getAllGames() : array {
        $output = [];
        try {
            $db = getPDO();
            $query = "SELECT * FROM vg_games";
            $results = $db->query($query)->fetchAll();
            // Serialize
            foreach ($results as $game) {
                $this_game = new Game();
                    $this_game->title = $game['title'];
                    $this_game->id = $game['game_id'];
                    $this_game->genre = $game['genre'];
                    $this_game->platform = $game['platform'];
                    $this_game->image_path = $game['image_path'];
                    // Push game
                    array_push($output, $this_game);
            }
        }
        catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $output;
    }
    /**
     * Gets a single game by id
     * @param int $id
     * @return Game
     */
    function getGameById(int $id) : Game {
        try {
            $db = getPDO();
            $query = "SELECT * FROM vg_games WHERE game_id = :id";
            $prepared = $db->prepare($query);
            $prepared->execute([':id' => $id]);
            $game = $prepared->fetch();
            if ($game != null && $game != []) {
                // Assemble game
                $actualGame = new Game();
                $actualGame->id = $id;
                $actualGame->title = $game['title'];
                $actualGame->genre = $game['genre'];
                $actualGame->platform = $game['platform'];
                $actualGame->image_path = $game['image_path'];
                return $actualGame;
            }
        }
        catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return new Game();
    }
    /**
     * Adds a game to the database using data already in POST
     */
    function addGame() {
        try {
            $db = getPDO();
            // Get information for the game. It is the assumption that these are set, considering the we're calling this function at all.
            $title = $_POST['addTitle'];
            $genre = $_POST['addGenre'];
            $platform = $_POST['addPlatform'];
            $img = $_FILES['addImage'];
            // Do some more work on the image
            $target_file = 'images/' . $img['name'];
            if (!file_exists($target_file) && strlen($img['name']) < 32) {
                // Upload the image
                if (move_uploaded_file($img['tmp_name'], $target_file)) {
                    $imagePath = $img['name'];
                    // IMPORTANT: Making it to this part of the function means we can continue

                    // Get the max id
                    $max_value = $db->query("SELECT MAX(game_id) FROM vg_games")->fetchAll()[0][0];
                    // setup query
                    $query = "INSERT INTO vg_games
                              VALUES (:id, :title, :genre, :platform, :img_path)";
                    // prepare
                    $prepared = $db->prepare($query);
                    // execute with parameters
                    $prepared->execute([':id' => $max_value + 1, ':title' => $title, ':genre' => $genre, ':platform' => $platform, 'img_path' => $imagePath]);
                }
            }
            // We must unset all of these variables
            unset($_POST['addSubmit']);
            unset($_POST['addTitle']);
            unset($_POST['addGenre']);
            unset($_POST['addPlatform']);
            unset($_FILES['addImage']);
        }
        catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    /**
     * Edits a game with parameters from POST
     * @return void
     */
    function editGame() {
        try {
            $db = getPDO();
            // Get information for the game. It is the assumption that these are set, considering the we're calling this function at all.
            $id = $_POST['editId'];
            $title = $_POST['editTitle'];
            $genre = $_POST['editGenre'];
            $platform = $_POST['editPlatform'];
            // setup query
            $query = "UPDATE vg_games
                        SET title = :title, genre = :genre, platform = :platform
                        WHERE game_id = :id;";
            // prepare
            $prepared = $db->prepare($query);
            // execute with parameters
            $prepared->execute([':title' => $title, ':genre' => $genre, ':platform' => $platform, ':id' => $id]);
            // We must unset all of these variables
            unset($_POST['addSubmit']);
            unset($_POST['addTitle']);
            unset($_POST['addGenre']);
            unset($_POST['addPlatform']);
            unset($_FILES['addImage']);
        }
        catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
?>
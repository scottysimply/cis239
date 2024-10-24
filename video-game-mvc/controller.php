<?php
    class Game {
        public int $id;
        public string $title;
        public string $platform;
        public string $genre;
        public string $image_path;
        public function __construct() {

        }
    }
    class GamePostData {
        public string $title;
        public bool $titleValidated = false;
        public string $platform;
        public bool $platformValidated = false;
        public string $genre;
        public bool $genreValidated = false;
        public string $imagePath;
        public bool $imagePathValidated = false;
        public function __construct($title, $platform, $genre, $image_path)
        {
            $this->title = $title;
            $this->platform = $platform;
            $this->genre = $genre;
            $this->imagePath = $image_path;
            // Validate
            if (isset($title) && strlen($title) < 48 && $title != "") {
                $this->titleValidated = true;
            }
            if (isset($platform) && strlen($platform) < 64 && $platform != "") {
                $this->platformValidated = true;
            }
            if (isset($genre) && strlen($genre) < 64 && $genre != "") {
                $this->genreValidated = true;
            }
            if (isset($image_path) && strlen($image_path) < 32 && $image_path != "") {
                $this->imagePathValidated = true;
            }
        }
    }
    class Controller {
        /**
         * Attempts to log a user in.
         * @param string $username
         * @param string $password
         * @return bool Whether or not the user exists.
         */
        public static function logInUser(string $username, string $password) : bool {
            // read CSV
            $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/cis239/video-game-mvc/data/users.csv", "rb");
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
        public static bool $LoggedIn = false;
        public static bool $failedLogin = false;
        public static bool $invalidName = false;
        public static ?string $username = "";
        public static ?string $password = "";
        public static function validateForm() {
            Controller::$failedLogin = false;
            Controller::$invalidName = false;
            Controller::$username = filter_input(INPUT_POST, 'username');
            Controller::$password = filter_input(INPUT_POST,'password');
            // If set, the user has attempted to login
            if (Controller::$username && Controller::$password) {
                // Attempt to login the user
                Controller::$LoggedIn = Controller::logInUser(Controller::$username, Controller::$password);
                $_POST['loggedIn'] = Controller::$LoggedIn;
                // If logged in, send to games page _with_ login info
                if (Controller::$LoggedIn) {
                    header("Location: /cis239/video-game-mvc?login=true");
                    exit();
                }

                if (Controller::$username) {
                    Controller::$invalidName = true;
                }
                // Else, display error message
                Controller::$failedLogin = true;
            }
            else { // User or password was unset. Display required warnings
                if (Controller::$username) {
                    Controller::$invalidName = true;
                }
                Controller::$failedLogin = true;
            }
        }
        /**
         * Gets all of the games in the database. Returns an empty array if nothing was found.
         */
        public static function getGames() : array {
            // Obtain games from database
            $games = [];
            // Query database for games
            try {
                $db = new PDO("mysql:host=localhost;dbname=videogame_simplified", "root", "");
                // Begin query
                $game_query = 
                "SELECT *
                FROM vg_games AS game
                ";
        
                // Execute query
                $game_results = $db->query($game_query)->fetchAll();
                // Map results to our objects
                foreach ($game_results as $game) {
                    $this_game = new Game();
                    $this_game->title = $game['title'];
                    $this_game->id = $game['game_id'];
                    $this_game->genre = $game['genre'];
                    $this_game->platform = $game['platform'];
                    $this_game->image_path = $game['image_path'];
                    // Push game
                    array_push($games, $this_game);
                }
            
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
            return $games;
        }
        /**
         * Gets game data from a POST requests.
         */
        public static function getGameDataFromPost() : GamePostData {
            // I know this is a very wordy initialization, but this is so form error messages can be correctly raised.
            $title = "";
            $genre = "";
            $platform = "";
            $imagePath = "";
            if (isset($_POST['gameTitle'])) {
                $title = $_POST['gameTitle'];
            }
            if (isset($_POST['gameGenre'])) {
                $genre = $_POST['gameGenre'];
            }
            if (isset($_POST['gamePlatform'])) {
                $platform = $_POST['gamePlatform'];
            }
            // We have to get the image situated now.
            if (isset($_FILES['gameImage'])) {
                $image = $_FILES['gameImage'];
                // Try to save the image
                $target_file = 'images/' . $image['name'];
                if (!file_exists($target_file) && strlen($image['name']) < 32) {
                    // Upload the image
                    if (move_uploaded_file($image['tmp_name'], $target_file)) {
                        $imagePath = $image['name'];
                    }
                }
            }
            // Assemble our game data
            return new GamePostData($title, $genre, $platform, $imagePath);
        }
        /**
         * Tries to add a game to the database. Returns whether it successfully added the game.
         */
        public static function tryAddGame(GamePostData $gameData) : bool {
            try {
                // Setup database
                $db = new PDO("mysql:host=localhost;dbname=videogame_simplified", "root", "");
                $max_value = $db->query("SELECT MAX(game_id) + 1 FROM vg_games")->fetchAll()[0][0];
                $insert_statement = 
               "INSERT INTO vg_games
                VALUES ($max_value, '$gameData->title', '$gameData->genre', '$gameData->platform', '$gameData->imagePath')
                ";
                // Execute query. If nothing bad happened, it succeeded.
                $db->query($insert_statement);
                // Since we succeeded, unset everything in post.
                unset($_POST['gameTitle']);
                unset($_POST['gameGenre']);
                unset($_POST['gamePlatform']);
                unset($_POST['gameImage']);
                unset($_POST['submitted']);
                unset($_FILES['gameImage']);
                return true;
            }
            catch (PDOException $ex) {
                echo $ex;
            }
            return false;
        }
    }
?>
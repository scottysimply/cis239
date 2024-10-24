<?php
    include_once 'controller.php';
?>
<div class="container mt-5 col-5 col-3-md mb-5">
    <h3>Add Game</h3>
    <form method="post" class="form border p-2 border-primary-subtle rounded" enctype="multipart/form-data">
        <!--This input is what i use to know if the form was submitted. This is something i picked up from asp.net-->
        <input value="true" name="submitted" hidden/>
        <label for="game-title">Title: </label>
        <input type="text" name="gameTitle" id="game-title" class="w-100 form-control"><br/>
        <?php
            if (isset($_POST['submitted']) && !$gameData->titleValidated) {
                $error_msg = "";
                if ($gameData->title == "") {
                    $error_msg .= "Please enter a title.";
                }
                else {
                    $error_msg .= "Title must be shorter than 48 characters.";
                }
                echo("<p class=\"text-danger\" fs-5>$error_msg</p>"); 
            }
        ?>
        <label for="game-genre">Genre: </label>
        <input type="text" name="gameGenre" id="game-genre" class="w-100 form-control"><br/>
        <?php
            if (isset($_POST['submitted']) && !$gameData->genreValidated) {
                $error_msg = "";
                if ($gameData->genre == "") {
                    $error_msg .= "Please enter the genre(s).";
                }
                else {
                    $error_msg .= "Genre(s) must be shorter than 64 characters.";
                }
                echo("<p class=\"text-danger\" fs-5>$error_msg</p>"); 
            }
        ?>
        <label for="game-platform">Platform: </label>
        <input type="text" name="gamePlatform" id="game-platform" class="w-100 form-control"><br/>
        <?php
            if (isset($_POST['submitted']) && !$gameData->platformValidated) {
                $error_msg = "";
                if ($gameData->platform == "") {
                    $error_msg .= "Please enter the platform(s).";
                }
                else {
                    $error_msg .= "Platform(s) must be shorter than 64 characters.";
                }
                echo("<p class=\"text-danger\" fs-5>$error_msg</p>"); 
            }
        ?>
        <label for="game-image">Image: </label>
        <input type="file" name="gameImage" id="game-image" class="form-control"><br/>
        <?php
            if (isset($_POST['submitted']) && !$gameData->imagePathValidated) {
                $error_msg = "The image could not be added.";
                echo("<p class=\"text-danger\" fs-5>$error_msg</p>"); 
            }
        ?>
        <button type="submit" class="btn rounded-1 btn-primary">Add Game</button>
    </form>
</div>
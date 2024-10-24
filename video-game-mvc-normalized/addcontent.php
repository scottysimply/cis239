<?php
    // Retrieve from GET if exists
    $addingGenre = isset($_POST['genreAddGenreName']);
    if ($addingGenre) {
        $genre = $_POST['genreAddGenreName'];
    }
?>


<div class="container">
    <!--Add a genre form-->
    <!-- <form method="post" action="/?login=true">
        <input type="text" name="genreAddGenreName" id="add-genre-name">
        <button type="submit">Add Genre</button>
    </form>
    Add a platform form
    <form method="post" action="/?login=true">

    </form> -->
    <form method="post" action="/?login=true">
        <input type="text" name="" id="">
        <input type="text" name="" id="">
        <input type="text" name="" id="">
        <div class="collapse">

        </div>
        <button type="submit"></button>
    </form>
</div>
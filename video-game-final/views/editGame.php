<?php
    include_once 'models/games.php';
    $currentGame = getGameById($_GET['id']);
?>
<div>
    <h3>Edit Game</h3>
    <form method="post" action=".">
        <input value="true" name="editSubmit" hidden>
        <input name="editId" id="edit-id" value="<?=$currentGame->id?>" hidden>
        <label for="edit-title">Title: </label>
        <input type="text" required name="editTitle" id="edit-title" value="<?=$currentGame->title?>">
        <label for="edit-genre">Genre: </label>
        <input type="text" required name="editGenre" id="edit-genre" value="<?=$currentGame->genre?>">
        <label for="edit-platform">Platform: </label>
        <input type="text" required name="editPlatform" id="edit-platform" value="<?=$currentGame->platform?>">
        <button type="submit">Update Game</button>
    </form>
</div>
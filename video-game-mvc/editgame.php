<?php
    include_once 'controller.php';
    // Get the current game using the GET variable. We know $_GET is "safe" because this page wouldn't display if it wasn't set.
    $currentGame = getGameById($_GET['editId']);
?>
<div>
    <h3>Edit Game</h3>
    <!--Since this form will be editing something in the DB, it uses POST.-->
    <form method="post" action="?login=true">
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
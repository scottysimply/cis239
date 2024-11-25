<div>
    <h3>Add Game</h3>
    <!--Since this form will be adding something to the DB, it uses POST.-->
    <form method="post" action="." enctype="multipart/form-data">
        <input value="true" name="addSubmit" hidden>
        <label for="add-title">Title: </label>
        <input type="text" required name="addTitle" id="add-title">
        <label for="add-genre">Genre: </label>
        <input type="text" required name="addGenre" id="add-genre">
        <label for="add-platform">Platform: </label>
        <input type="text" required name="addPlatform" id="add-platform">
        <label for="add-image">Image: </label>
        <input type="file" required name="addImage" id="add-image">
        <button type="submit">Add Game</button>
    </form>
</div>
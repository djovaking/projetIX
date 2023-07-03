<h1>Edit Media</h1>

<form method="POST" action="updatemedia">
    <input type="hidden" name="mediaId" value="<?php echo $_GET['mediaId']; ?>">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $_GET['name']; ?>">
    </div>
    <div>
        <label for="description">Description:</label>
        <input type="text" name="description" value="<?php echo $_GET['description']; ?>">
    </div>
    <button type="submit">Update</button>
</form>
<form method="POST" action="deleteMedia">
    <input type="hidden" name="mediaId" value="<?php echo $_GET['mediaId']; ?>">
    <button type="submit" onclick="return confirm('Are you sure you want to delete this media ?')">Supprimer le media</button>
</form>
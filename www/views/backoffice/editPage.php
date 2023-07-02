<h1>Edit Page</h1>

<form method="POST" action="updatepage">
    <input type="hidden" name="pageId" value="<?php echo $_GET['pageId']; ?>">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $_GET['name']; ?>">
    </div>
    <div>
        <label for="active">Active:</label>
        <select name="active">
            <option value="t" <?php if ($_GET['active'] === 't') echo 'selected'; ?>>Active</option>
            <option value="f" <?php if ($_GET['active'] === 'f') echo 'selected'; ?>>Inactive</option>
        </select>
    </div>
    <div>
        <label for="identifier">Identifier:</label>
        <input type="text" name="identifier" value="<?php echo $_GET['identifier']; ?>">
    </div>
    <button type="submit">Update</button>
</form>
<form method="POST" action="deletePage">
    <input type="hidden" name="pageId" value="<?php echo $_GET['pageId']; ?>">
    <button type="submit" onclick="return confirm('Are you sure you want to delete this page?')">Supprimer la page</button>
</form>
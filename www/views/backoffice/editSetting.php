<h1>Edit Setting</h1>

<form method="POST" action="updatesetting">
    <input type="hidden" name="settingId" value="<?php echo $_GET['settingId']; ?>">
    <div>
        <label for="name">Couleur:</label>
        <input type="text" name="color" value="<?php echo $_GET['color']; ?>">
    </div>
    <div>
        <label for="time">Font:</label>
        <input type="text" name="font" value="<?php echo $_GET['font']; ?>">
    </div>
    <button type="submit">Update</button>
    <form method="POST" action="deleteSetting">
        <input type="hidden" name="settingId" value="<?php echo $_GET['settingId']; ?>">
        <button type="submit" onclick="return confirm('Are you sure you want to delete this setting ?')">Supprimer le paramètre</button>
    </form>
</form>
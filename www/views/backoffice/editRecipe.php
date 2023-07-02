<h1>Edit Recipe</h1>

<form method="POST" action="updaterecipe">
    <input type="hidden" name="recipeId" value="<?php echo $_GET['recipeId']; ?>">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $_GET['name']; ?>">
    </div>
    <div>
        <label for="time_preparation">Temps de préparation:</label>
        <input type="text" name="time_preparation" value="<?php echo $_GET['time_preparation']; ?>">
    </div>
    <div>
        <label for="difficulty">Difficulté:</label>
        <input type="text" name="difficulty" value="<?php echo $_GET['difficulty']; ?>">
    </div>
    <div>
        <label for="preparation">Préparation:</label>
        <input type="text" name="preparation" value="<?php echo $_GET['preparation']; ?>">
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
<form method="POST" action="deleteRecipe">
    <input type="hidden" name="recipeId" value="<?php echo $_GET['recipeId']; ?>">
    <button type="submit" onclick="return confirm('Are you sure you want to delete this recipe?')">Supprimer la recette</button>
</form>
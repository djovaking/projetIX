<h1>Edit Ingredient</h1>

<form method="POST" action="updateingredient">
    <input type="hidden" name="ingredientId" value="<?php echo $_GET['ingredientId']; ?>">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $_GET['name']; ?>">
    </div>
    <button type="submit">Update</button>
</form>
<form method="POST" action="deleteIngredient">
    <input type="hidden" name="ingredientId" value="<?php echo $_GET['ingredientId']; ?>">
    <button type="submit" onclick="return confirm('Are you sure you want to delete this ingredient?')">Supprimer l'ingrédient'</button>
</form>
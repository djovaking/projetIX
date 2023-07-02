<h1>Edit Categorie</h1>

<form method="POST" action="updatecategorie">
    <input type="hidden" name="categorieId" value="<?php echo $_GET['categorieId']; ?>">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $_GET['name']; ?>">
    </div>
    <button type="submit">Update</button>
</form>
<form method="POST" action="deleteCategorie">
    <input type="hidden" name="categorieId" value="<?php echo $_GET['categorieId']; ?>">
    <button type="submit" onclick="return confirm('Are you sure you want to delete this categorie?')">Supprimer la catégorie</button>
</form>
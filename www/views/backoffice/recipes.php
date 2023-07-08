<?php if (empty($recipes)) : ?>
    <p>Aucune recette n'a été trouvée.</p>
<?php else : ?>
    <table>
        <h1>Recipe Management</h1>
        <thead>
            <tr>
                <?php foreach (array_keys($recipes[0]) as $column) : ?>
                    <?php if ($column !== 'created_at' && $column !== 'updated_at' && $column !== 'identifier') : ?>
                        <th><?php echo $column; ?></th>
                    <?php endif; ?>
                <?php endforeach; ?>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recipes as $recipe) : ?>
                <tr>
                    <?php foreach ($recipe as $column => $value) : ?>
                        <?php if ($column !== 'created_at' && $column !== 'updated_at' && $column !== 'identifier') : ?>
                        <td><?php echo $value; ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td><a href="editRecipe?recipeId=<?php echo $recipe["id"]; ?>&name=<?php echo $recipe["name"]; ?>&time_preparation=<?php echo $recipe["time_preparation"]; ?>&difficulty=<?php echo $recipe["difficulty"]; ?>&preparation=<?php echo $recipe["preparation"]; ?>&active=<?php echo $recipe["active"]; ?>&identifier=<?php echo $recipe["identifier"]; ?>">Edit</a></td>
                    <td><a href="deleteRecipe?recipeId=<?php echo $recipe["id"]; ?>">Delete</a></td>               
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<h1>Recipe Management</h1>

<?php if (empty($recipes)) : ?>
    <p>Aucune page n'a été trouvée.</p>
<?php else : ?>

    <table>
        <thead>
            <tr>
                <?php foreach (array_keys($recipes[0]) as $column) : ?>
                    <th><?php echo $column; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recipes as $recipe) : ?>
                <tr>
                    <td>
                        <a href="deleterecipe?recipeId=<?php echo $recipe["id"]; ?>">Delete</a>
                    </td>
                    <?php foreach ($recipe as $value) : ?>
                        <td><?php echo $value; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>
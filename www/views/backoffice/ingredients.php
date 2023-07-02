<?php if (empty($ingredients)) : ?>
    <p>Aucun ingredient n'a été trouvé.</p>
<?php else : ?>
    <table>
        <thead>
            <tr>
                <?php foreach (array_keys($ingredients[0]) as $column) : ?>
                    <th><?php echo $column; ?></th>
                <?php endforeach; ?>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ingredients as $ingredient) : ?>
                <tr>
                    <?php foreach ($ingredient as $value) : ?>
                        <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td><a href="editIngredient?ingredientId=<?php echo $ingredient["id"]; ?>&name=<?php echo $ingredient["name"]; ?>">Edit</a></td>
                        <td><a href="deleteIngredient?ingredientId=<?php echo $ingredient["id"]; ?>">Delete</a></td>               
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<?php if (empty($categories)) : ?>
    <p>Aucune catégorie n'a été trouvée.</p>
<?php else : ?>
    <table>
        <thead>
            <tr>
                <?php foreach (array_keys($categories[0]) as $column) : ?>
                    <th><?php echo $column; ?></th>
                <?php endforeach; ?>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $categorie) : ?>
                <tr>
                    <?php foreach ($categorie as $value) : ?>
                        <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td><a href="editCategorie?categorieId=<?php echo $categorie["id"]; ?>&name=<?php echo $categorie["name"]; ?>">Edit</a></td>
                        <td><a href="deleteCategorie?categorieId=<?php echo $categorie["id"]; ?>">Delete</a></td>               
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<h1>Recipe Management</h1>

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
                <?php foreach ($recipe as $value) : ?>
                    <td><?php echo $value; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
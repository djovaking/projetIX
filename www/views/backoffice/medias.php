<?php if (empty($medias)) : ?>
    <p>Aucun média n'a été trouvé.</p>
<?php else : ?>
    <table>
        <h1>Media Management</h1>
        <thead>
            <tr>
                <?php foreach (array_keys($medias[0]) as $column) : ?>
                    <?php if ($column !== 'created_at' && $column !== 'updated_at' && $column !== 'identifier') : ?>
                        <th><?php echo $column; ?></th>
                    <?php endif; ?>
                <?php endforeach; ?>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medias as $media) : ?>
                <tr>
                    <?php foreach ($media as $column => $value) : ?>
                        <?php if ($column !== 'created_at' && $column !== 'updated_at' && $column !== 'identifier') : ?>
                            <td><?php echo $value; ?></td>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <td><a href="editMedia?mediaId=<?php echo $media["id"]; ?>&name=<?php echo $media["name"]; ?>&description=<?php echo $media["description"]; ?>">Edit</a></td>
                        <td><a href="deleteMedia?mediaId=<?php echo $media["id"]; ?>">Delete</a></td>               
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
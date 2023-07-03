<?php if (empty($medias)) : ?>
    <p>Aucune média n'a été trouvé.</p>
<?php else : ?>
    <table>
        <thead>
            <tr>
                <?php foreach (array_keys($medias[0]) as $column) : ?>
                    <th><?php echo $column; ?></th>
                <?php endforeach; ?>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medias as $media) : ?>
                <tr>
                    <?php foreach ($media as $value) : ?>
                        <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td><a href="editMedia?mediaId=<?php echo $media["id"]; ?>&name=<?php echo $media["name"]; ?>&description=<?php echo $media["description"]; ?>">Edit</a></td>
                        <td><a href="deleteMedia?mediaId=<?php echo $media["id"]; ?>">Delete</a></td>               
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
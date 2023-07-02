<?php if (empty($comments)) : ?>
    <p>Aucun commentaire n'a été trouvé.</p>
<?php else : ?>
    <table>
        <thead>
            <tr>
                <?php foreach (array_keys($comments[0]) as $column) : ?>
                    <th><?php echo $column; ?></th>
                <?php endforeach; ?>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment) : ?>
                <tr>
                    <?php foreach ($comment as $value) : ?>
                        <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td><a href="editComment?commentId=<?php echo $comment["id"]; ?>&text=<?php echo $comment["text"]; ?>">Edit</a></td>
                        <td><a href="deleteComment?commentId=<?php echo $comment["id"]; ?>">Delete</a></td>               
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<?php if (empty($pages)) : ?>
    <p>Aucune page n'a été trouvée.</p>
<?php else : ?>
    <table>
        <thead>
            <tr>
                <?php foreach (array_keys($pages[0]) as $column) : ?>
                    <th><?php echo $column; ?></th>
                <?php endforeach; ?>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pages as $page) : ?>
                <tr>
                    <?php foreach ($page as $value) : ?>
                        <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td><a href="editPage?pageId=<?php echo $page["id"]; ?>&name=<?php echo $page["name"]; ?>&active=<?php echo $page["active"]; ?>&identifier=<?php echo $page["identifier"]; ?>">Edit</a></td>
                        <td><a href="deletePage?pageId=<?php echo $page["id"]; ?>">Delete</a></td>               
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
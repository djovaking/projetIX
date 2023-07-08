<?php if (empty($pages)) : ?>
    <p>Aucune page n'a été trouvée.</p>
<?php else : ?>
    <table>
        <h1>Page Management</h1>
        <thead>
            <tr>
                <?php foreach (array_keys($pages[0]) as $column) : ?>
                    <?php if ($column !== 'date_updated' && $column !== 'date_created' && $column !== 'identifier') : ?>
                        <th><?php echo $column; ?></th>
                    <?php endif; ?>
                <?php endforeach; ?>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pages as $page) : ?>
                <tr>
                    <?php foreach ($page as $column => $value) : ?>
                        <?php if ($column !== 'date_updated' && $column !== 'date_created' && $column !== 'identifier') : ?>
                            <td><?php echo $value; ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                        <td><a href="editPage?pageId=<?php echo $page["id"]; ?>&name=<?php echo $page["name"]; ?>&active=<?php echo $page["active"]; ?>&identifier=<?php echo $page["identifier"]; ?>">Edit</a></td>
                        <td><a href="deletePage?pageId=<?php echo $page["id"]; ?>">Delete</a></td>               
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
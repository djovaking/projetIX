<?php if (empty($settings)) : ?>
    <p>Aucun paramètre n'a été trouvé.</p>
<?php else : ?>
    <table>
        <h1>Setting Management</h1>
        <thead>
            <tr>
                <?php foreach (array_keys($settings[0]) as $column) : ?>
                    <th><?php echo $column; ?></th>
                <?php endforeach; ?>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($settings as $setting) : ?>
                <tr>
                    <?php foreach ($setting as $value) : ?>
                        <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td><a href="editSetting?settingId=<?php echo $setting["id"]; ?>&color=<?php echo $setting["color"]; ?>&font=<?php echo $setting["font"]; ?>">Edit</a></td>
                        <td><a href="deleteSetting?settingId=<?php echo $setting["id"]; ?>">Delete</a></td>               
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
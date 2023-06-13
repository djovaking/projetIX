<h1>User Management</h1>

<table>
    <thead>
        <tr>
            <?php foreach (array_keys($users[0]) as $column) : ?>
                <th><?php echo $column; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <?php foreach ($user as $value) : ?>
                    <td><?php echo $value; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
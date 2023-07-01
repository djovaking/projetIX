<h1>User Management</h1>

<table>
    <thead>
        <tr>
            <th></th>
            <?php foreach (array_keys($users[0]) as $column) : ?>
                <?php if ($column !== 'pwd' && $column !== 'id' && $column !== 'date_inserted' && $column !== 'date_updated') : ?>
                    <th><?php echo $column; ?></th>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td>
                    <a href="edituser?userId=<?php echo ($user["id"]); ?>&firstName=<?php echo $user['firstname']; ?>&lastName=<?php echo $user['lastname']; ?>&status=<?php echo $user['status']; ?>&userRole=<?php echo $user['user_role']; ?>&email=<?php echo $user['email']; ?>">Edit</a>
                    <form method="POST" action="deleteuser">
                        <input type="hidden" name="userId" value="<?php echo $_GET['userId']; ?>">
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Supprimer le user</button>
                    </form>
                </td>

                <?php foreach ($user as $column => $value) : ?>
                    <?php if ($column !== 'pwd' && $column !== 'id' && $column !== 'date_inserted' && $column !== 'date_updated') : ?>
                        <td class="editable" data-field="<?php echo $column; ?>">
                            <div> <?php echo $value; ?></div>
                        </td>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>


<button onclick="showAddUserForm()">Add User</button>
<div id="addUserForm" style="display: none;">
    <form id="addUserForm">
        <div>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>
        </div>
        <div>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Add User</button>
        </div>
    </form>
</div>
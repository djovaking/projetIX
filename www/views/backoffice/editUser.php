<!-- edituser.php -->

<h1>Edit User</h1>

<form method="POST" action="updateuser.php">
    <input type="hidden" name="userId" value="<?php echo $userId; ?>">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>">
    </div>
    <div>
        <label for="role">Role:</label>
        <select name="role">
            <option value="admin" <?php if ($user['role'] === 'admin') echo 'selected'; ?>>Admin</option>
            <option value="user" <?php if ($user['role'] === 'user') echo 'selected'; ?>>User</option>
        </select>
    </div>
    <button type="submit">Update</button>
</form>
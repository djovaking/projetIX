<!-- edituser.php -->

<h1>Edit User</h1>
<form method="POST" action="updateuser">
    <input type="hidden" name="userId" value="<?php echo $_GET['userId']; ?>">
    <div>
        <label for="firstame">firstame:</label>
        <input type="text" name="firstame" value="<?php echo $_GET['firstName']; ?>">
    </div>
    <div>
        <label for="lastname">Name:</label>
        <input type="text" name="lastname" value="<?php echo $_GET['lastName']; ?>">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $_GET['email']; ?>">
    </div>
    <div>
        <label for="role">Role:</label>
        <select name="role">
            <option value="admin" <?php if ($_GET['userRole'] === 'admin') echo 'selected'; ?>>Admin</option>
            <option value="basic" <?php if ($_GET['userRole'] === 'basic') echo 'selected'; ?>>User</option>
        </select>
    </div>
    <button type="submit">Update</button>
</form>
<form method="POST" action="deleteuser">
    <input type="hidden" name="userId" value="<?php echo $_GET['userId']; ?>">
    <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Supprimer le user</button>
</form>
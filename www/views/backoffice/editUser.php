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
            <option value="1" <?php if ($_GET['roleId'] === '1') echo 'selected'; ?>>Admin</option>
            <option value="0" <?php if ($_GET['roleId'] === '0') echo 'selected'; ?>>User</option>
        </select>
    </div>
    <button type="submit">Update</button>
</form>
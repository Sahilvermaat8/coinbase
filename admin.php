<?php
session_start();
$conn = new mysqli("localhost", "root", "", "user_auth");

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

// ADD USER
if (isset($_POST['add_user'])) {
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users (username, email, password) VALUES ('$uname', '$email', '$pass')");
}

// DELETE USER
if (isset($_POST['delete_user'])) {
    $del_id = $_POST['delete_id'];
    $conn->query("DELETE FROM users WHERE id = $del_id");
}

$result = $conn->query("SELECT id, username, email, created_at FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body { font-family: sans-serif; background: #f0f0f0; padding: 20px; }
        h2 { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; background: white; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        th { background: #333; color: white; }
        .logout { float: right; }
        form { background: #fff; padding: 15px; border: 1px solid #ccc; margin-bottom: 30px; max-width: 500px; }
        input { padding: 8px; margin: 5px 0; width: 100%; }
        button { padding: 8px 15px; margin-top: 10px; }
    </style>
</head>
<body>

<h2>Admin Dashboard <a href="logout.php" class="logout">Logout</a></h2>

<!-- ✅ Add New User Form -->
<h3>Add New User</h3>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="add_user">Add User</button>
</form>

<!-- ✅ User Table with Delete Button -->
<h3>Registered Users</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Registered At</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
                    <button type="submit" name="delete_user" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

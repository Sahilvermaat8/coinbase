<?php
session_start();

// Admin credentials (static, ya DB se bhi le sakte ho)
$admin_user = "admin";
$admin_pass = "admin123"; // plain text for demo

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === $admin_user && $pass === $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid admin credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body { font-family: sans-serif; background: #eee; padding: 50px; }
        .box { background: white; max-width: 400px; margin: auto; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.2); }
        input, button { width: 100%; padding: 10px; margin-top: 10px; }
        .error { color: red; margin-top: 10px; }
    </style>
</head>
<body>
<div class="box">
    <h2>Admin Login</h2>
    <?php if ($error): ?><div class="error"><?= $error ?></div><?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Admin Username" required>
        <input type="password" name="password" placeholder="Admin Password" required>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>

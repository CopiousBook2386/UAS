<?php
require "../config/db.php";

if (isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Login Shop9</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Login Shop9</h2>

<?php if (isset($_GET['error'])): ?>
    <p style="color:red;">Username atau password salah</p>
<?php endif; ?>

<form method="POST" action="login_process.php">
    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>

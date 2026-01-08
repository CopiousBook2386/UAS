<?php
require "../config/db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

if ($user && $password === $user['password']) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $user['username'];
    header("Location: ../index.php");
    exit;
} else {
    header("Location: login.php?error=1");
    exit;
}

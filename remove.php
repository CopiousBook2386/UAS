<?php
session_start();
require "../config/db.php";

if (!isset($_POST['id'])) {
    http_response_code(400);
    exit("ID tidak ada");
}

$id = (int)$_POST['id'];

// kalau item tidak ada di cart, tidak usah lanjut
if (!isset($_SESSION['cart'][$id])) {
    echo "ok";
    exit;
}

// kembalikan stok
$conn->query("UPDATE products SET stock = stock + 1 WHERE id=$id");

// kurangi qty di cart
$_SESSION['cart'][$id]--;

if ($_SESSION['cart'][$id] <= 0) {
    unset($_SESSION['cart'][$id]);
}

echo "ok";
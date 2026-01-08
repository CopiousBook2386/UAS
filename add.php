<?php
session_start();
require '../config/db.php';

if (!isset($_POST['id'])) {
    http_response_code(400);
    exit("ID tidak ada");
}

$id = (int)$_POST['id'];

$cek = $conn->query("SELECT stock FROM products WHERE id=$id");
$p = $cek->fetch_assoc();

if (!$p) {
    http_response_code(404);
    exit("Produk tidak ditemukan");
}

if ($p['stock'] <= 0) {
    http_response_code(409);
    exit("Stok habis");
}

// kurangi stok
$conn->query("UPDATE products SET stock = stock - 1 WHERE id=$id");

// simpan ke cart
$_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;

echo "OK";
<?php
session_start();
require "../config/db.php";

// kalau tidak ada cart, langsung selesai
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "ok";
    exit;
}

// kembalikan semua stok
foreach ($_SESSION['cart'] as $id => $qty) {

    $id = (int)$id;
    $qty = (int)$qty;

    if ($qty > 0) {
        $conn->query("UPDATE products SET stock = stock + $qty WHERE id=$id");
    }
}

// kosongkan keranjang
$_SESSION['cart'] = [];

echo "ok";
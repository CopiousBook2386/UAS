<?php
session_start();
require "../config/db.php";

// jika belum ada cart
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo json_encode([
        "items" => [],
        "total" => 0
    ]);
    exit;
}

$items = [];
$total = 0;

foreach ($_SESSION['cart'] as $id => $qty) {

    $id = (int)$id;
    $qty = (int)$qty;

    $res = mysqli_query($conn, "SELECT name, price FROM products WHERE id=$id LIMIT 1");
    if (!$res) continue;

    $row = mysqli_fetch_assoc($res);

    $subtotal = $row['price'] * $qty;
    $total += $subtotal;

    $items[] = [
        "id" => $id,
        "name" => $row['name'],
        "qty" => $qty,
        "subtotal" => $subtotal
    ];
}

echo json_encode([
    "items" => $items,
    "total" => $total
]);

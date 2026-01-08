<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$conn = mysqli_connect("localhost", "root", "", "shop9");
if (!$conn) die("KONEKSI  DATABASE ERROR");

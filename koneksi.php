<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "zoourdan";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // WAJIB
}
?>
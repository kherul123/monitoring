<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "monitoring_suhu_bahan_mentah";

// Buat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>

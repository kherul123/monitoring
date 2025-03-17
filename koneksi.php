<?php
$servername = "localhost";
$username = "admin"; // Ganti sesuai username MySQL Anda
$password = "balapulang"; // Ganti sesuai password MySQL Anda
$dbname = "monitoring_suhu_bahan_mentah"; // Ganti sesuai nama database Anda

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// Mengatur mode error PDO ke exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Koneksi gagal: " . $e->getMessage();
	die();
}

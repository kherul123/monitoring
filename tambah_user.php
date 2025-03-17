<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "monitoring_suhu_bahan_mentah";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['tambah'])) {
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$sql = "INSERT INTO users (nama, username, password) VALUES ('$nama', '$username', '$password')";

	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('User berhasil ditambahkan!'); window.location='user.php';</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah User</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			background-color: #f3f4f6;
			margin: 0;
		}

		.container {
			background: white;
			padding: 30px;
			border-radius: 12px;
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
			width: 100%;
			max-width: 400px;
		}

		h2 {
			text-align: center;
			margin-bottom: 20px;
			color: #333;
		}

		input[type="text"],
		input[type="password"] {
			width: 100%;
			padding: 12px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 8px;
			box-sizing: border-box;
			font-size: 14px;
		}

		button {
			width: 100%;
			padding: 12px;
			background-color: #3b82f6;
			color: white;
			border: none;
			border-radius: 8px;
			cursor: pointer;
			font-size: 16px;
			transition: background-color 0.3s ease;
		}

		button:hover {
			background-color: #2563eb;
		}

		@media (max-width: 480px) {
			.container {
				padding: 20px;
			}
		}
	</style>
</head>

<body>
	<div class="container">
		<h2>Tambah User</h2>
		<form method="POST">
			<input type="text" name="nama" placeholder="Nama" required>
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<button type="submit" name="tambah">Tambah</button>
		</form>
	</div>
</body>

</html>
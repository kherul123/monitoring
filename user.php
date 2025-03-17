<?php

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "monitoring_suhu_bahan_mentah";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
	die("Koneksi gagal: " . $conn->connect_error);
}

// DELETE - Hapus User
if (isset($_GET['hapus'])) {
	$id = $_GET['hapus'];
	$sql = "DELETE FROM users WHERE id=$id";
	$conn->query($sql);
}

// READ - Tampil Data User
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title>CRUD User</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
	<style>
		.sidebar {
			z-index: 9999;
			position: fixed;
			height: 100vh;
			width: 16rem;
			background-color: #1f2937;
		}

		.content {
			margin-left: 16rem;
			width: calc(100% - 16rem);
		}
	</style>
</head>

<body class="bg-gray-100">
	<div class="flex min-h-screen">
		<!-- Sidebar -->
		<div class="bg-gray-900 text-white w-64 min-h-screen shadow-lg sidebar">
			<div class="flex items-center justify-center h-16 bg-blue-600">
				<span class="text-2xl font-extrabold text-white-500">Monitoring</span>
			</div>
			<nav class="mt-10 flex-1">
				<a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="dashboard.php">
					<i class="fas fa-home"></i> Beranda
				</a>
				<a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="tabel.php">
					<i class="fas fa-table"></i> Tabel
				</a>
				<a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="grafik.php">
					<i class="fas fa-chart-bar"></i> Grafik
				</a>
				<a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="user.php">
					<i class="fas fa-user mr-2"></i> User
				</a>
				<a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="login.php">
					<i class="fas fa-sign-out-alt mr-2"></i> Logout
				</a>
			</nav>
		</div>
		<!-- Konten Utama -->
		<div class="content p-10">
			<div class="flex justify-between items-center mb-6">
				<h2 class="text-2xl font-semibold">Daftar User</h2>
				<a href="tambah_user.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah User</a>
			</div>
			<div class="bg-white shadow-md rounded-lg p-6">
				<table class="min-w-full bg-white">
					<thead>
						<tr>
							<th class="py-2 px-4 border-b border-r bg-gray-100 text-center">ID</th>
							<th class="py-2 px-4 border-b border-r bg-gray-100 text-center">Nama</th>
							<th class="py-2 px-4 border-b border-r bg-gray-100 text-center">Username</th>
							<th class="py-2 px-4 border-b bg-gray-100 text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($row = $result->fetch_assoc()) : ?>
							<tr class="border-b">
								<td class="py-2 px-4 border-r text-center"><?= $row['id'] ?></td>
								<td class="py-2 px-4 border-r text-center"><?= $row['nama'] ?></td>
								<td class="py-2 px-4 border-r text-center"><?= $row['username'] ?></td>
								<td class="py-2 px-4 text-center">
									<a class="text-red-500 hover:text-red-700" href="?hapus=<?= $row['id'] ?>">Hapus</a>
									<a class="text-blue-500 hover:text-blue-700 ml-4" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>

<?php $conn->close(); ?>
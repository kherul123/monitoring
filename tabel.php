<?php
// Data yang disimulasikan (ganti dengan query database yang sebenarnya)
$data = [
	['id' => 1, 'suhu' => 27.30, 'kelembapan' => 64.20, 'berat basah' => 1, 'berat kering' => 0.5, 'tanggal' => '12-03-2025 10:34:10'],
	['id' => 2, 'suhu' => 28.00, 'kelembapan' => 65.00, 'berat basah' => 1, 'berat kering' => 0.5, 'tanggal' => '11-03-2025 22:00:00'],
	// Tambahkan data lainnya sesuai kebutuhan
];

// Path gambar logo, bisa diganti manual sesuai file di folder proyek
$logo = 'images/rempah.jpeg'; // Contoh file di folder "images"
?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title>Tabel data rempah</title>
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
				<img alt="Monitoring logo" class="mr-2" height="70" src="rempah.jpeg" width="70" />
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
					<i class="fas fa-user mr-2">
					</i>
					User
				</a>
				<a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="login.php">
					<i class="fas fa-sign-out-alt mr-2">
					</i>
					Logout
				</a>
			</nav>
		</div>
		<!-- Konten Utama -->
		<div class="content">
			<!-- Header -->
			<div class="bg-blue-600 text-white flex items-center justify-between h-16 w-full">
				<div class="flex items-center space-x-2">
				</div>
			</div>
			<!-- Konten -->
			<div class="flex-1 p-10 text-gray-900">
				<div class="bg-white shadow-md rounded-lg p-6">
					<div class="flex justify-between items-center border-b pb-3 mb-4">
						<h1 class="text-2xl font-semibold">Tabel <span class="text-gray-500">Suhu dan Kelembapan</span></h1>
						<div class="flex items-center space-x-2">
							<a class="text-gray-500 hover:text-gray-700" href="dashboard.php">
								<i class="fas fa-home"></i> Beranda
							</a>
						</div>
					</div>
					<div class="flex justify-between items-center mb-4">
						<div>
							<label class="mr-2" for="recordsPerPage">Rekaman per halaman</label>
							<select class="border rounded p-1" id="recordsPerPage">
								<option>10</option>
								<option>20</option>
								<option>30</option>
							</select>
						</div>
						<div>
							<label class="mr-2" for="search">Cari:</label>
							<input class="border rounded p-1" id="search" type="text" />
						</div>
					</div>
					<table class="min-w-full bg-white">
						<thead>
							<tr>
								<th class="py-2 px-4 border-b border-r bg-gray-100 text-center">ID</th>
								<th class="py-2 px-4 border-b border-r bg-gray-100 text-center">Suhu (°C)</th>
								<th class="py-2 px-4 border-b border-r bg-gray-100 text-center">Kelembapan (%RH)</th>
								<th class="py-2 px-4 border-b border-r bg-gray-100 text-center">Berat basah (kg)</th>
								<th class="py-2 px-4 border-b border-r bg-gray-100 text-center">Berat kering (kg)</th>
								<th class="py-2 px-4 border-b bg-gray-100 text-center">Tanggal dan Waktu</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data as $row): ?>
								<tr class="border-b">
									<td class="py-2 px-4 border-r text-center"><?php echo $row['id']; ?></td>
									<td class="py-2 px-4 border-r text-center"><?php echo $row['suhu']; ?></td>
									<td class="py-2 px-4 border-r text-center"><?php echo $row['kelembapan']; ?></td>
									<td class="py-2 px-4 border-r text-center"><?php echo $row['berat basah']; ?></td>
									<td class="py-2 px-4 border-r text-center"><?php echo $row['berat kering']; ?></td>
									<td class="py-2 px-4 text-center"><?php echo $row['tanggal']; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<footer style="text-align: center; width: 100%; padding: 10px 0; position: absolute; bottom: 0; background-color: #f8f9fa;">
		© 2025. Monitoring Suhu dan Kelembapan rempah. All rights reserved.<br>
		Khoerul Anwar Hasbiyan
		<p>Powered by <a class="text-black-500" href="https://www.netflix.com/id/title/81948027?source=35">sudah malam atau sudah tahu</a></p>
	</footer>

</body>

</html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title>monitoring</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
	<style>
		.card {
			transition: transform 0.2s, box-shadow 0.2s;
		}

		.card:hover {
			transform: translateY(-10px);
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
		}

		.sidebar {
			transition: transform 0.2s, box-shadow 0.2s;
		}

		.sidebar:hover {
			transform: translateX(-10px);
			box-shadow: 10px 0 20px rgba(0, 0, 0, 0.2);
		}
	</style>
</head>


<body class="bg-gray-100">
	<div class="flex">
		<div class="bg-gray-900 text-white w-64 min-h-screen shadow-lg sidebar">
			<div class="flex items-center justify-center h-16 bg-blue-600">
				<img alt="Monitoring logo" class="mr-2" height="80" src="rempah.jpeg" width="80" />
				<span class="text-xl font-bold">Monitoring</span>
			</div>
			<nav class="mt-10">
				<a class="flex items-center py-2 px-6 bg-gray-800 text-white shadow-md" href="dashboard.php">
					<i class="fas fa-home mr-3"></i> Beranda
				</a>
				<a class="flex items-center py-2 px-6 text-gray-400 hover:bg-gray-800 hover:text-white shadow-md" href="tabel.php">
					<i class="fas fa-table mr-3"></i> Tabel
				</a>
				<a class="flex items-center py-2 px-6 text-gray-400 hover:bg-gray-800 hover:text-white shadow-md" href="grafik.php">
					<i class="fas fa-chart-line mr-3"></i> Grafik
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
		<div class="flex-1">
			<header class="bg-blue-600 text-white h-16 flex justify-between items-center shadow-lg">
				<h1 class="text-xl font-bold ">Suhu dan Kelembapan rempah</h1>
				<nav>
					<a class="text-white" href="dashboard.php">Beranda</a> &gt; <a class="text-white" href="dashboard.php">Beranda</a>
				</nav>
			</header>
			<main class="p-6">
				<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
					<div class="bg-blue-400 text-white p-8 rounded-lg shadow-md card">
						<div class="text-5xl font-bold">27.30 °C</div>
						<div class="mt-4 text-xl">Suhu</div>
						<div class="mt-6 bg-blue-500 p-3 rounded">Suhu rempah</div>
					</div>
					<div class="bg-green-500 text-white p-8 rounded-lg shadow-md card">
						<div class="text-5xl font-bold">64.20 %RH</div>
						<div class="mt-4 text-xl">Kelembapan</div>
						<div class="mt-6 bg-green-600 p-3 rounded">Kelembapan Rempah</div>
					</div>
					<div class="bg-yellow-500 text-white p-8 rounded-lg shadow-md card">
						<div class="text-3xl font-bold">26-Jul-2025 21:34:10</div>
						<div class="mt-4 text-xl">Tanggal dan waktu</div>
						<div class="mt-6 bg-yellow-600 p-3 rounded">Tanggal Terakhir Update</div>
					</div>
					<div class="bg-orange-500 text-white p-8 rounded-lg shadow-md card">
						<div class="text-5xl font-bold">2 kg</div>
						<div class="mt-4 text-xl">Berat</div>
						<div class="mt-6 bg-orange-600 p-3 rounded">Berat rempah</div>
					</div>
				</div>
			</main>
			<footer class="bg-white text-center p-4 mt-6 shadow-inner">
				<p>Copyright © 2025. Monitoring Suhu dan Kelembapan rempah. All rights reserved.</p>
				<p>Khoerul Anwar Hasbiyan</p>
				<p>Powered by <a class="text-black-500" href="kherul.html">kherul</a></p>
			</footer>
		</div>
	</div>
</body>

</html>
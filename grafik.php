<?php
// grafik.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title>Grafik data rempah</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 min-h-screen flex">
	<!-- Sidebar -->
	<div class="w-64 bg-gray-800 text-white min-h-screen fixed">
		<div class="flex items-center justify-center h-16 bg-blue-600">
			<img alt="Monitoring logo" class="mr-2" height="80" src="rempah.jpeg" width="80" />
			<span class="text-xl font-semibold">Monitoring</span>
		</div>
		<nav class="mt-10">
			<a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="dashboard.php">
				<i class="fas fa-home mr-2"></i> Beranda
			</a>
			<a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="tabel.php">
				<i class="fas fa-table mr-2"></i> Tabel
			</a>
			<a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 bg-gray-700" href="grafik.php">
				<i class="fas fa-chart-line mr-2"></i> Grafik
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
	<!-- Main Content -->
	<div class="ml-64 flex-1 flex flex-col min-h-screen">
		<div class="flex-1 p-6">
			<div class="flex justify-between items-center mb-6">
				<h1 class="text-2xl font-semibold">Statistik</h1>
				<div class="text-gray-500">
					<a class="hover:underline" href="dashboard.php">Beranda</a> /
					<a class="hover:underline" href="grafik.php">grafik</a>
				</div>
			</div>
			<div class="bg-white p-6 rounded-lg shadow-lg">
				<h2 class="text-center text-xl font-semibold mb-4">Monitor Temperature dan Kelembaban Ruangan</h2>
				<div class="overflow-x-auto">
					<canvas id="temperatureChart" class="w-full" height="400"></canvas>
				</div>
			</div>
		</div>
		<footer class="bg-white text-center p-4 shadow-inner">
			<p>Copyright © 2025. Monitoring Suhu dan Kelembapan rempah. All rights reserved.</p>
			<p>Khoerul Anwar Hasbiyan</p>
			<p>Powered by <a class="text-black-500" href="https://www.netflix.com/id/title/81948027?source=35">sudah malam atau sudah tahu</a></p>
		</footer>
	</div>

	<script>
		const ctx = document.getElementById('temperatureChart').getContext('2d');
		const temperatureChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM', '6:00 PM', '7:00 PM', '8:00 PM', '9:00 PM', '10:00 PM', '11:00 PM', '12:00 AM', '1:00 AM', '2:00 AM', '3:00 AM', '4:00 AM', '5:00 AM', '6:00 AM', '7:00 AM'],
				datasets: [{
					label: 'Data Berat (kg)',
					data: [0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 3.5, 3, 2.5, 2, 1.5, 1, 0.5, 0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 3.5, 3],
					borderColor: 'blue',
					borderWidth: 1,
					fill: false,
					tension: 0.1
				}]
			},
			options: {
				responsive: true,
				scales: {
					x: {
						display: true,
						title: {
							display: true,
							text: 'Time'
						}
					},
					y: {
						display: true,
						title: {
							display: true,
							text: 'Data Berat (kg)'
						},
						suggestedMin: 0.5,
						suggestedMax: 4,
						ticks: {
							stepSize: 0.5,
							callback: function(value) {
								return Number.isInteger(value) ? value : value.toFixed(1).replace('.0', '');
							}
						}
					}

				}
			}
		});
	</script>

</body>

</html>
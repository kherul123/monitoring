<?php
session_start();
include 'config.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($koneksi, $query);
	$user = mysqli_fetch_assoc($result);

	// Menggunakan password_hash dan password_verify untuk keamanan
	if ($user && password_verify($password, $user['password'])) {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = 'login';
		header('Location: dashboard.php');
		exit();
	} else {
		echo "<script>alert('Username atau password salah!');</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title> Halaman Login Kherul</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
	<style>
		.shadow-3d {
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
		}
	</style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
	<div class="bg-white shadow-3d rounded-lg flex max-w-4xl w-full">
		<div class="bg-gradient-to-b from-blue-500 to-blue-700 text-white p-8 rounded-l-lg flex flex-col items-center justify-center w-1/2 shadow-3d">
			<img alt="Image of ginger and turmeric" class="mb-4 shadow-3d rounded-full border-4 border-white" height="150" src="https://storage.googleapis.com/a1aa/image/Lndi5D-AMQgWhPUUCYjoEOvtEJWEMDHTcTQhFrNpfc0.jpg" width="150" />
			<h2 class="text-3xl font-bold mb-4 shadow-3d p-2 rounded bg-white text-black">Hello Kherul</h2>
			<p class="text-center text-lg shadow-3d p-2 rounded bg-white text-black font-bold">Web Monitoring Suhu Bahan Mentah Jamu</p>
		</div>
		<div class="p-8 w-1/2 shadow-3d">
			<div class="shadow-3d p-6 rounded">
				<h2 class="text-3xl font-bold mb-6">Login Account</h2>
				<form method="post">
					<div class="mb-4">
						<label class="block text-gray-700 text-lg" for="username">Username</label>
						<input class="w-full p-3 border border-gray-300 rounded mt-1 text-lg shadow-3d" id="username" name="username" placeholder="Username" type="text" required />
					</div>
					<div class="mb-4">
						<label class="block text-gray-700 text-lg" for="password">Password</label>
						<input class="w-full p-3 border border-gray-300 rounded mt-1 text-lg shadow-3d" id="password" name="password" placeholder="Password" type="password" required />
					</div>

					<button class="w-full bg-blue-600 text-white p-3 rounded text-lg shadow-3d" type="submit">LOGIN</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
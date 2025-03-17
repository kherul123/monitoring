<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Gunakan prepared statement untuk keamanan
	$stmt = mysqli_prepare($koneksi, "SELECT * FROM users WHERE username = ?");
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$user = mysqli_fetch_assoc($result);

	if ($user && password_verify($password, $user['password'])) {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = 'login';
		header('Location: dashboard.php');
		exit();
	} else {
		echo "<script>alert('Username atau password salah!'); window.location.href='login.php';</script>";
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Login Kherul</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style>
		.shadow-3d {
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
		}

		.bg-glass {
			background: rgba(255, 255, 255, 0.2);
			backdrop-filter: blur(10px);
			border-radius: 10px;
			padding: 20px;
		}
	</style>
</head>

<body class="h-screen">
	<input type="file" id="backgroundInput" class="hidden" accept="image/*">
	<div class="flex items-center justify-center h-full" id="backgroundContainer"
		style="background-image: url('https://placehold.co/1920x1080?text=Background+Image+of+Ice+Crystals'); background-size: cover; background-position: center;">
		<div class="p-8 w-1/3 bg-glass shadow-3d">
			<h2 class="text-3xl font-bold mb-6 text-center text-white">Login Monitoring</h2>
			<form method="POST" action="">
				<div class="mb-4">
					<label class="block text-white text-lg" for="username"><i class="fas fa-user"></i> Username</label>
					<input class="w-full p-3 border border-gray-300 rounded mt-1 text-lg shadow-3d bg-white bg-opacity-50 placeholder-gray-700"
						id="username" name="username" placeholder="Username" type="text" required>
				</div>
				<div class="mb-6 relative">
					<label class="block text-white text-lg" for="password"><i class="fas fa-lock"></i> Password</label>
					<input class="w-full p-3 border border-gray-300 rounded mt-1 text-lg shadow-3d bg-white bg-opacity-50 placeholder-gray-700 pr-10"
						id="password" name="password" placeholder="Password" type="password" required>
					<i class="fas fa-eye absolute right-3 top-10 text-gray-600 cursor-pointer" id="togglePassword"></i>
				</div>
				<button class="w-full bg-blue-600 text-white p-3 rounded text-lg shadow-3d hover:bg-blue-700 transition"
					type="submit">LOGIN</button>
			</form>
		</div>
	</div>

	<button class="fixed bottom-4 right-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
		onclick="document.getElementById('backgroundInput').click()">Change Background</button>

	<script>
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#password');
		const backgroundInput = document.querySelector('#backgroundInput');
		const backgroundContainer = document.querySelector('#backgroundContainer');

		togglePassword.addEventListener('click', function() {
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			this.classList.toggle('fa-eye-slash');
		});

		backgroundInput.addEventListener('change', function(e) {
			const file = e.target.files[0];
			if (file) {
				const reader = new FileReader();
				reader.onload = function(event) {
					backgroundContainer.style.backgroundImage = `url(${event.target.result})`;
				};
				reader.readAsDataURL(file);
			}
		});
	</script>
</body>

</html>
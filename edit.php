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

// Ambil data user
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

// Update data user
if (isset($_POST['update'])) {
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$sql = "UPDATE users SET nama='$nama', username='$username', password='$password' WHERE id=$id";
	if ($conn->query($sql) === TRUE) {
		header('Location: user.php');
	}
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title>Edit User</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
	<div class="min-h-screen flex items-center justify-center">
		<div class="bg-white shadow-md rounded-lg p-8 w-full max-w-lg">
			<h2 class="text-2xl font-semibold mb-6">Edit Data User</h2>
			<form method="POST">
				<div class="mb-4">
					<label class="block text-gray-700">Nama</label>
					<input type="text" name="nama" value="<?php echo $user['nama']; ?>" class="w-full border rounded-lg p-2" required />
				</div>
				<div class="mb-4">
					<label class="block text-gray-700">Username</label>
					<input type="text" name="username" value="<?php echo $user['username']; ?>" class="w-full border rounded-lg p-2" required />
				</div>
				<div class="mb-4">
					<label class="block text-gray-700">Password</label>
					<input type="password" name="password" class="w-full border rounded-lg p-2" required />
				</div>
				<div>
					<button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>

<?php $conn->close(); ?>
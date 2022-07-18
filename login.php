<?php

session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$koneksi = new mysqli("localhost", "root", "", "inventori");


?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
	<link rel="stylesheet" href="css/loginadmin.css">
	<!-- Fontawesome CDN Link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="container">
		<input type="checkbox" id="flip">
		<div class="cover">
			<div class="front">
				<img src="img/games.jpg" alt="">
				<div class="text">
					<span class="text-1">SISTEM INFORMASI <br> DHADHU BOARD GAME & CAFE</span>
					<span class="text-2">KOTA SEMARANG</span>
				</div>
			</div>
		</div>
		<div class="forms">
			<div class="form-content">
				<div class="login-form">
					<div class="title">Login</div>
					<form action="#" method="POST">
						<div class="input-boxes">
							<div class="input-box">
								<i class="fas fa-envelope"></i>
								<input type="text" name="username" placeholder="Username" required>
							</div>
							<div class="input-box">
								<i class="fas fa-lock"></i>
								<input type="password" name="password" placeholder="Password" required>
							</div>
							<select name="level" class="form-control" required>
								<option value="">Pilih Level User</option>
								<option value="superadmin">Super Admin</option>
								<option value="member">Member</option>
							</select>
							<div class="button input-box">
								<input type="submit" name="login" value="Masuk">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>

</body>

</html>

<?php

$username = $_POST['username'];
$password = md5($_POST['password']);
$login = $_POST['login'];
$level = $_POST['level'];

if ($login) {
	$sql = $koneksi->query("select * from users where username='$username' and password='$password'");
	$ketemu = $sql->num_rows;
	$data = $sql->fetch_assoc();

	if ($ketemu >= 1) {
		session_start();

		if ($data['level'] == 'superadmin' && $level == 'superadmin') {
			$_SESSION['superadmin'] = $data['id'];

			header("location:index3.php");
		}
	} else if ($data['level'] == 'member' && $level == 'member') {
		$_SESSION['member'] = $data['id'];

		header("location:index2.php");
	}
} else {
	echo '<center><div class="alert alert-danger">Upss...!!! Login gagal. Silakan Coba Kembali</div></center>';
}


?>
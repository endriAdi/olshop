<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/login.css">
</head>
<body>
	<div class="hero">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Log In</button>
				<button type="button" class="toggle-btn" onclick="register()">Register</button>
			</div>

				<div class="input-group" id="login">
					<form method="post">
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="input-field" placeholder="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="input-field" placeholder="password">
						</div>
						<button class="submit-btn" name="login">Login</button>
					</form>
				</div>

				<div class="input-group" id="register">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="input-field" placeholder="Username">
						</div>
						<div class="form-group">
							<label>Telephone</label>
							<input type="number" name="telepon" class="input-field" placeholder="Telephone">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="input-field" placeholder="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="input-field" placeholder="password">
						</div>
						<div class="form-group">
							<label>Foto</label>
							<div class="input-field" style="margin-bottom: 10px">
								<input type="file" required name="foto">
							</div>
						</div>
						<button class="submit-btn" name="register">Register</button>
					</form>
				</div>

			<!-- <form class="input-group" id="login">
				<input type="text" class="input-field" placeholder="email" required name="email">
				<input type="password" class="input-field" placeholder="password" required name="password">
				<input type="checkbox" class="check-box" name="ingat"> <span>Remember Password</span>
				<button type="submit" class="submit-btn" name="login">Login</button>
			</form> -->
			<!-- <form class="input-group" id="register">
				<input type="text" class="input-field" placeholder="username" required name="username">
				<input type="text" class="input-field" placeholder="email" required name="email">
				<input type="password" class="input-field" placeholder="password" required name="password">
				<input type="checkbox" class="check-box" name="setuju"> <span>I Agree to the terms conditional</span>
				<button type="submit" class="submit-btn" name="register">Register</button>
			</form> -->
		</div>
	</div>

<!-- Login -->
	<?php 
	//Jika ada tombol login(ditekan)
	if (isset($_POST["login"])) 
	{
		$email=$_POST["email"];
		$password=$_POST["password"];

		//lakukan pengecekan database
		$ambil=$koneksi->query("SELECT * FROM pelanggan 
			WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

		//Ngitung akun yang terpanggil
		$akunyangcocok=$ambil->num_rows;

		//jika 1 akun yang cocok, maka login berhasil
		if ($akunyangcocok==1) 
		{
			//anda sudah login
			$akun=$ambil->fetch_assoc();
			$_SESSION["pelanggan"]=$akun;
			echo "<script>alert('Anda Berhasil Login');</script>";
			
			//jika sudah belanja
			if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
			{
				echo "<script>location='checkout.php';</script>";
			}
			else
			{
				echo "<script>location='index.php';</script>";	
			}
		}
		else
		{
			//anda gagal login
			echo "<script>alert('Anda Gagal Login');</script>";
			echo "<script>location='login.php';</script>";
		}

		}

	 ?>
<!-- Akhir Login -->

<!-- Register -->
	<?php 
	//jika ditekan tombol daftar
	if (isset($_POST["register"])) 
	{
		//mengambil isian nama,email,telepon,alamat,password
		$nama=$_POST["username"];
		$telepon=$_POST["telepon"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$foto=$_FILES['foto']['name'];
		$lokasi=$_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi[0], "foto_pelanggan/".$foto[0]);

		//cek apakah email sudah digunakan
		$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' || nama_pelanggan='$nama'");
		$yangcocok=$ambil->num_rows;

		if ($yangcocok==1) 
		{
			echo "<script>alert('Register gagal!!, Email Atau Username sudah digunakan');</script>";
			echo "<script>location='login.php';</script>";	
		}
		else
		{
			//query insert ke tabel pelanggan
			$koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,foto_pelanggan) 
				VALUES ('$email','$password','$nama','$telepon','$foto') ");

			echo "<script>alert('Register Success, Silahkan Login');</script>";
			echo "<script>location='login.php';</script>";	
		}
	}
	?>
<!-- Akhir Register -->



	<?php include 'js.php'; ?>

	<script>
		var x= document.getElementById("login");
		var y= document.getElementById("register");
		var z= document.getElementById("btn");

		function register(){
			x.style.left="-400px";
			y.style.left="50px";
			z.style.left="110px";
		}
		function login(){
			x.style.left="50px";
			y.style.left="450px";
			z.style.left="0px";
		}

	</script>
	

</body>
</html>
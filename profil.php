<?php session_start(); include 'koneksi.php'; ?>
<?php  
	$id_pelanggan=$_GET['id'];
	$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
	$detail=$ambil->fetch_assoc();

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Profile</title>
	<?php include 'css.php'; ?>
</head>
<body>
	<!-- Navbar -->
		<?php include 'menu.php'; ?>
	<!-- Akhir Navbar -->

	<!-- Isi -->
		<section class="profil">
			<div class="container">
				<h3 style="margin-top: 100px" class="d-flex justify-content-center">PROFILE ACCOUNT</h3>
    			<hr>
				<div class="row justify-content-center">
					<div class="col-4">
						<img class="img-fluid" src="foto_pelanggan/<?php echo $detail["foto_pelanggan"]; ?>">
					</div>				
					<div class="col-4">
						<table class="table">
							<thead>
								<tr>
									<th>Nama</th>
									<td><?php echo $detail['nama_pelanggan']; ?></td>	
								</tr>
								<tr>
									<th>Email</th>
									<td><?php echo $detail["email_pelanggan"]; ?></td>
								</tr>
								<tr>
									<th>Telephone</th>
									<td><?php echo $detail["telepon_pelanggan"]; ?></td>
								</tr>
								<tr>
									<th>Password</th>
									<td><?php echo $detail["password_pelanggan"]; ?></td>
								</tr>
							</thead>
						</table>
						<a href="ubahprofile.php" class="btn btn-warning text-white">Edit Profile</a>
					</div>				
				</div>
			</div>
		</section>
	<!-- Akhir Isi -->


	<!-- Footer -->
		<?php include 'footer.php'; ?>
	<!-- Akhir Footer -->
	<!-- JavaScript -->
		<?php include 'js.php'; ?>
	<!-- Akhir JavaScript -->
</body>
</html>
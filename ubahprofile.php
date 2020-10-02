<?php session_start(); include 'koneksi.php'; ?>
<?php
	$id_pelanggan=$_GET["id"]; 
	$ambil =$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
	$pecah =$ambil->fetch_assoc();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<?php include 'css.php'; ?>
</head>
<body>
	<!-- Navbar -->
		<?php include 'menu.php'; ?>
	<!-- Akhir Navbar -->

	<!-- Ubah Profile -->
		<section class="editprofil">
			<div class="container">
				<h3 style="margin-top: 100px" class="d-flex justify-content-center">EDIT PROFILE</h3>
    			<hr>
				<dic class="row">
					<div class="col">
						<form method="post" enctype="multipart/form-data">
						 	<div class="form-group">
						 		<label>Nama</label>
						 		<input type="text" required name="nama_pelanggan" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>">
						 	</div>
						 	<div class="form-group">
						 		<label>Telephone</label>
						 		<input type="number" required name="telepon_pelanggan" class="form-control" value="<?php echo $pecah['telepon_pelanggan']; ?>">
						 	</div>
						 	<div class="form-group">
						 		<label>Email</label>
						 		<input type="email" required name="email_pelanggan" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>">
						 	</div>
						 	<div class="form-group">
						 		<label>Password</label>
						 		<input type="text" required name="password_pelanggan" class="form-control" value="<?php echo $pecah['password_pelanggan']; ?>">
						 	</div>
						 	<div class="form-group">
						 		<label>Ganti Foto</label>
						 		<input type="file" name="fotoganti" class="form-control">
						 	</div>
						 	<button class="btn btn-primary" name="edit">Simpan Perubahan</button>
						 </form>

					</div>
				</dic>

		 <?php 
		 	if (isset($_POST['edit'])) 
		 	{
		 		$namafoto =$_FILES['fotoganti']['name'];
		 		$lokasifoto =$_FILES['fotoganti']['tmp_name'];
		 		//JIKA FOTO DIRUBAH
		 		if (!empty($lokasifoto)) 
		 		{
		 			move_uploaded_file($lokasifoto, "foto_pelanggan/$namafoto");

		 			$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama_pelanggan]',telepon_pelanggan='$_POST[telepon_pelanggan]',foto_pelanggan='$namafoto', email_pelanggan='$_POST[email_pelanggan]',password_pelanggan='$_POST[password_pelanggan]' WHERE id_pelanggan='$_GET[id]'");
		 		}
		 		else
		 		{
		 			$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama_pelanggan]',telepon_pelanggan='$_POST[telepon_pelanggan]',foto_pelanggan='$namafoto', email_pelanggan='$_POST[email_pelanggan]',password_pelanggan='$_POST[password_pelanggan]' WHERE id_pelanggan='$_GET[id]'");
		 		}



		 		echo "<script>alert ('Data Berhasil Diubah');</script>";
		 		echo "<script>location='index.php?halaman=produk';</script>";		
		 	}
		  ?>
			</div>
		</section>
	<!-- Akhir Ubah Profile -->


	<!-- fOOTER -->
		<?php include 'footer.php'; ?>
	<!-- Akhir fOOTER -->

	<!-- JavaScript -->
		<?php include 'js.php'; ?>
	<!-- Akhir JavaScript -->
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>tambah kategori</title>
</head>
<body>

	<section class="tambah-kategori">
		<div class="container">
			<h2>Tambah Kategori</h2>
			<div class="col-md-5">
				<form method="post">
					<div class="form-group">
						<label>Nama Kategori</label>
						<input type="text" required name="nama_kategori" class="form-control">
					</div>
				  <button class="btn btn-primary" name="simpan">Tambahkan</button>
				</form>
			</div>
		</div>
	</section>

	<?php 
		if (isset($_POST["simpan"])) 
		{
			$nama_kategori=$_POST["nama_kategori"];	
			$koneksi->query("INSERT INTO kategori(id_kategori,nama_kategori) 
				VALUES ('$_POST[id_kategori]','$nama_kategori')");
			
			echo "<div class='alert alert-info'>Data Tersimpan</div>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
		}

	 ?>

</body>
</html>
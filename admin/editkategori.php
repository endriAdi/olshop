<?php 
	$ambil =$koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
	$pecah =$ambil->fetch_assoc();

 ?>
<div class="container">
	<div class="row">
		<h2>Edit Kategori</h2>
		<div class="col-md-5">
			<form method="post">
				<div class="form-group">
			 		<label>Nama Kategori</label>
			 		<input type="text" required name="nama_kategori" class="form-control" value="<?php echo $pecah['nama_kategori']; ?>">
			 	</div>
 					<button class="btn btn-primary" name="edit">Simpan Perubahan</button>
			</form>
		</div>
	</div>
</div>

<?php 
	if (isset($_POST["edit"])) 
	{
		$koneksi->query("UPDATE kategori SET nama_kategori='$_POST[nama_kategori]' WHERE id_kategori='$_GET[id]'");	
		echo "<script>alert ('Data Berhasil Diubah');</script>";
 		echo "<script>location='index.php?halaman=kategori';</script>";
	}
?>

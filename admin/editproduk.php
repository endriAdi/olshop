<?php 
	$ambil =$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
	$pecah =$ambil->fetch_assoc();

 ?>
 <?php 
$datakategori=array();
$ambil=$koneksi->query("SELECT * FROM Kategori");
while($tiap=$ambil->fetch_assoc())
{
	$datakategori[]=$tiap;
}
?>

<h2>EDIT PRODUK</h2>

 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Nama Produk</label>
 		<input type="text" required name="nama_produk" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Kategori</label>
 		<select class="form-control" required name="id_kategori">
 			<?php foreach ($datakategori as $key => $value): ?>
 			<option value="<?php echo["id_kategori"] ?>" 
 				<?php if ($pecah["id_kategori"]==$value["id_kategori"]) 
		 			{
		 				echo "selected";
		 			} 
		 			?>>
 				<?php echo $value["nama_kategori"]; ?>
 			</option>
 
 			<?php endforeach ?>
 		</select>
 	</div>
 	<div class="form-group">
 		<label>Harga</label>
 		<input type="number" required name="harga_produk" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
 	</div>
 	<div class="form-group">
 		<label>stok</label>
 		<input type="number" required name="stok_produk" class="form-control" value="<?php echo $pecah['stok_produk']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Berat (gr)</label>
 		<input type="number" required name="berat_produk" class="form-control" value="<?php echo $pecah['berat_produk']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Foto Produk</label> <br>
 		<img src="../images/<?php echo $pecah['foto'] ?>" width="290">
 	</div>
 	<div class="form-group">
 		<div class="letak-input" style="margin-bottom: 10px">
			<input type="file"  name="foto[]" class="form-control">
		</div>
 		<span class="btn btn-primary btn-tambah">
			<i class="glyphicon glyphicon-plus"></i> Tambah Foto
		</span>
 	</div>
 	<div class="form-group">
 		<label>Ganti Foto</label>
 		<input type="file" name="fotoganti" class="form-control"	>
 	</div>
 	<div class="form-group">
 		<label>Deskripsi</label>
 		<textarea class="form-control" name="deskripsi" rows="10"><?php echo $pecah['deskripsi']; ?></textarea>
 	</div>
 	<button class="btn btn-primary" name="edit">Simpan Perubahan</button>
 </form>

 <?php 
 	if (isset($_POST['edit'])) 
 	{
 		$namafoto =$_FILES['fotoganti']['name'];
 		$lokasifoto =$_FILES['fotoganti']['tmp_name'];
 		//JIKA FOTO DIRUBAH
 		if (!empty($lokasifoto)) 
 		{
 			move_uploaded_file($lokasifoto, "../images/$namafoto");

 			$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama_produk]',harga_produk='$_POST[harga_produk]',foto='$namafoto', deskripsi='$_POST[deskripsi]',stok_produk='$_POST[stok_produk]',berat_produk='$_POST[berat_produk]',id_kategori='$_POST[id_kategori]' WHERE id_produk='$_GET[id]'");
 		}
 		else
 		{
 			$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama_produk]',harga_produk='$_POST[harga_produk]', deskripsi='$_POST[deskripsi]', stok_produk='$_POST[stok_produk]',berat_produk='$_POST[berat_produk]',id_kategori='$_POST[id_kategori]' WHERE id_produk='$_GET[id]'");
 		}



 		echo "<script>alert ('Data Berhasil Diubah');</script>";
 		echo "<script>location='index.php?halaman=produk';</script>";		
 	}
  ?>

  <script>
 	$(document).ready(function(){
 		$(".btn-tambah").on("click",function(){
 			$(".letak-input").append("<input type='file' name='foto[]' class='form-control' style='margin-top: 10px'>");
 		})
 	})
  </script>




























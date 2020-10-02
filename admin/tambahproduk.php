<?php 
$datakategori=array();
$ambil=$koneksi->query("SELECT * FROM Kategori");
while($tiap=$ambil->fetch_assoc())
{
	$datakategori[]=$tiap;
}
?>

<h2>TAMBAH PRODUK</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" required name="nama_produk" class="form-control">
	</div>
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" required name="id_kategori">
			<option value="">Pilih Kategori</option>
			<?php foreach ($datakategori as $key => $value): ?>
			<option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
				
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" required name="harga_produk" class="form-control">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" required name="stok_produk" class="form-control">
	</div>
	<div class="form-group">
		<label>Berat (gr)</label>
		<input type="number" required name="berat_produk" class="form-control">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<div class="letak-input" style="margin-bottom: 10px">
			<input type="file" required name="foto[]" class="form-control">
		</div>
		<span class="btn btn-primary btn-tambah">
			<i class="glyphicon glyphicon-plus"></i>
		</span>
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<button class="btn btn-primary" name="save"><i class="glyphicon glyphicon-plus"></i> Tambahkan</button>
	
</form>

<?php 
	if (isset($_POST['save']))
	{
		$nama =$_FILES['foto']['name'];
		$lokasi =$_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi[0], "../images/".$nama[0]);
		$koneksi->query("INSERT INTO produk 
			(nama_produk,harga_produk,foto,deskripsi,stok_produk,berat_produk,id_kategori) 
			VALUES ('$_POST[nama_produk]','$_POST[harga_produk]','$nama[0]','$_POST[deskripsi]','$_POST[stok_produk]','$_POST[berat_produk]','$_POST[id_kategori]')");

		//mendapatkan id produk barusan
		$id_produk_barusan=$koneksi->insert_id;

		foreach ($nama as $key => $tiap_nama) 
		{
			$tiap_lokasi=$lokasi[$key];
			move_uploaded_file($tiap_lokasi, "../images/".$tiap_nama);

		//simpan ke database (tapi kita perlu tau id_produknya berapa)
		$koneksi->query("INSERT INTO foto_produk (id_produk,nama_foto_produk)  
			VALUES('$id_produk_barusan','$tiap_nama')");
		}
		


		echo "<div class='alert alert-info'>Data Tersimpan</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
	}
 ?>


 <script>
 	$(document).ready(function(){
 		$(".btn-tambah").on("click",function(){
 			$(".letak-input").append("<input type='file' name='foto[]' class='form-control' style='margin-top: 10px'>");
 		})
 	})
 </script>








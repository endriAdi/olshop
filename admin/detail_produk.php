<?php 
$id_produk=$_GET["id"];

$ambil=$koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detailproduk=$ambil->fetch_assoc();

$fotoproduk=array();
$ambilfoto=$koneksi->query("SELECT * FROM foto_produk WHERE id_produk='$id_produk'");

while($tiap=$ambilfoto->fetch_assoc())
{
	$fotoproduk[]=$tiap;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>detail produk</title>
</head>
<body>
	<h2>DETAIL PRODUK</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-10">

				<table class="table table-bordered">
					<tr>
						<th>Id Produk</th>
						<td><?php echo $detailproduk["id_produk"] ?></td>
					</tr>
					<tr>
						<th>Nama Produk</th>
						<td><?php echo $detailproduk["nama_produk"] ?></td>
					</tr>
					<tr>
						<th>Harga Produk</th>
						<td>Rp. <?php echo number_format($detailproduk["harga_produk"]) ?></td>
					</tr>
					<tr>
						<th>Kategori</th>
						<td><?php echo $detailproduk["nama_kategori"] ?></td>
					</tr>
					<tr>
						<th>Stok</th>
						<td><?php echo $detailproduk["stok_produk"] ?></td>
					</tr>
					<tr>
						<th>Berat (gr)</th>
						<td><?php echo $detailproduk["berat_produk"] ?></td>
					</tr>
					<tr>
						<th>Deskripsi</th>
						<td><?php echo $detailproduk["deskripsi"] ?></td>
					</tr>
				</table>
					<strong>Foto Produk :</strong>
			</div>
		</div>
		<div class="row" style="margin-top: 10px">
			<?php foreach ($fotoproduk as $key => $value): ?>
			<div class="col-md-3 text-center">
				<img src="../images/<?php echo $value["nama_foto_produk"] ?>" class="img-responsive margin-auto">
				<a href="index.php?halaman=hapusfotoproduk&idfoto=<?php echo $value["id_foto_produk"] ?>&idproduk=<?php echo $id_produk ?>" class="btn btn-danger" style="margin-top: 10px">Hapus</a>
			</div>
			<?php endforeach ?>
		</div>
	</div>


</body>
</html>
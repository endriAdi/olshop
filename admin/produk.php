
<!DOCTYPE html>
<html>
<head>
	<title>produk</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
	<!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
</head>
<body>
	<section class="produk">
		<div class="container">
			<h2>HALAMAN PRODUK</h2>
			<div class="col-md-10">
			<a href="index.php?halaman=tambahproduk" class="btn btn-primary" style="margin-bottom: 10px">+ Tambah Data</a>
				<table class="table table-bordered" id="datatables">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Harga</th>
							<th>Stok</th>
							<th>Berat (gr)</th>
							<th>kategori</th>
							<th>Foto</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor=1; ?>
						<?php $ambil=$koneksi->query("SELECT * FROM produk LEFT JOIN kategori 
						ON produk.id_kategori=kategori.id_kategori"); ?>
						<?php while ($pecah = $ambil->fetch_assoc()){ ?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah['nama_produk']; ?></td>
								<td><?php echo $pecah['harga_produk']; ?></td>
								<td><?php echo $pecah['stok_produk']; ?></td>
								<td><?php echo $pecah['berat_produk']; ?></td>
								<td><?php echo $pecah['nama_kategori']; ?></td>
								<td>
									<img src="../images/<?php echo $pecah['foto'] ?>" width="120">
								</td>
								<td class="p-2">
									<a href="index.php?halaman=hapusproduk&id= <?php echo $pecah['id_produk']; ?>" class="btn btn-danger ml-2 mr-2  btn-block"><i class="glyphicon glyphicon-trash"></i></a>
									<a href="index.php?halaman=editproduk&id= <?php echo $pecah['id_produk']; ?>" class="btn btn-warning ml-2 mr-2  btn-block"><i class="glyphicon glyphicon-edit"></i></a>
									<a href="index.php?halaman=detail_produk&id= <?php echo $pecah['id_produk']; ?>" class="btn btn-info ml-2 mr-2  btn-block"><i class="glyphicon glyphicon-edit"></i></a>
								</td>
							</tr>
						<?php $nomor++; ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>

</body>
</html>
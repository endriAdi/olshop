<?php 
$semuadata=array();
$ambil=$koneksi->query("SELECT * FROM kategori");
while($tiap=$ambil->fetch_assoc())
{
	$semuadata[]=$tiap;
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>kategori</title>
</head>
<body>
	<section class="kategoori">
		<div class="container">
			<h2>Data Kategori</h2>
			<div class="col-md-10">
					<a href="index.php?halaman=tambah_kategori" class="btn btn-primary" style="margin-bottom: 10px">Tambah Kategori</a>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Kategori</th>
							<th>Id Kategori</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($semuadata as $key => $value): ?>
							
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['nama_kategori'] ?></td>
							<td><?php echo $value['id_kategori'] ?></td>
							<td>
								<a href="index.php?halaman=editkategori&id=<?php echo $value['id_kategori']; ?>"
									class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
								<a href="index.php?halaman=hapuskategori&id= <?php echo $value['id_kategori']; ?>" 
									class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
					
			</div>
		</div>
	</section>	
</body>
</html>
<?php
	$semuadata=array(); 
	//jika tombol Cari ditekan
	if (isset($_POST["cari"])) 
	{
		$tgl_mulai=$_POST["tglm"];
		$tgl_selesai=$_POST["tgls"];

		$ambil=$koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
		while($pecah=$ambil->fetch_assoc())
		{
			$semuadata[]=$pecah;
		}
	}
	 ?>

<!DOCTYPE html>
<html>
<head>
	<title>laporan</title>
</head>
<body>
	<section class="laporan">
		<div class="container">
			<h2>Laporan Pembelian Pelanggan</h2><hr>
			
			<form method="post">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Tanggal Mulai</label>
							<input type="date" name="tglm" class="form-control" value="<?php echo $tgl_mulai ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Tanggal Selesai</label>
							<input type="date" name="tgls" class="form-control" value="<?php echo $tgl_selesai ?>">
						</div>
					</div>
					<div class="col-md-2">
						<label>&nbsp;</label><br>
						<button class="btn btn-primary" name="cari">Cari</button>
					</div>
				</div>
			</form>

			<div class="row">
				<div class="col-md-10">
					<table class="table table-bordered" id="datatabless">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Pelanggan</th>
								<th>Tanggal</th>
								<th>Jumlah</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $total=0; ?>
							<?php foreach ($semuadata as $key => $value): ?>
							<?php $total+=$value['total'] ?>
								
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $value["nama_pelanggan"] ?></td>
								<td><?php echo $value["tanggal_pembelian"] ?></td>
								<td><?php echo $value["total"] ?></td>
								<td><?php echo $value["status_pembelian"] ?></td>
							</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
								<th colspan="3">TOTAL</th>
								<th>Rp. <?php echo number_format($total) ?></th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</section>



</body>
</html>
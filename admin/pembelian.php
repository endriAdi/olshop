<h2>HALAMAN PEMBELIAN</h2>
<a href="cetak.php" class="btn btn-danger" style="margin-bottom: 10px" target="_blank">Cetak</a>
<table class="table table-bordered" id="datatabless">
	<thead>
		<tr>
			<th>No Pembelian</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal Pembelian</th>
			<th>Status</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN Pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama_pelanggan']; ?></td>
				<td><?php echo date('d F Y',strtotime($pecah['tanggal_pembelian'])); ?></td>
				<td><?php echo $pecah['status_pembelian']; ?></td>
				<td>Rp. <?php echo number_format($pecah['total']); ?></td>
				<td>
					<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>

					<?php if ($pecah['status_pembelian']!=="pending"): ?>
						<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i></a>
						
					<?php endif ?>
				</td>
			</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>	
</table>


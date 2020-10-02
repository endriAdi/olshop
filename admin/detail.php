<div class="container ">
	<div class="row justify-content-center">
		<h2 >DETAIL DATA PEMBELIAN</h2><hr>
	</div>
</div>

<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pembelian WHERE pembelian.id_pembelian ='$_GET[id]'");
$detail=$ambil->fetch_assoc();
 ?>
 <!-- <pre><?php print_r($detail); ?></pre> -->

<!--  <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
 <p>
 	TELP : <?php echo $detail['telepon_pelanggan']; ?> <br>
 	EMAIL : <?php echo $detail['email_pelanggan']; ?>
 </p>
 <p>
 	TANGGAL : <?php echo $detail['tanggal_pembelian']; ?> <br>
 	TOTAL : <?php echo $detail['total']; ?>
 </p> -->

	 <div class="row">
	    		 	<div class="col-md-4">
	    		 		<h5><strong>DATA PEMBELI</strong></h5>
	    		 		 <p>Nama  : <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
	    				 	Telp  : <?php echo $detail['telepon_pelanggan']; ?> <br>
	    				 	Email : <?php echo $detail['email_pelanggan']; ?>
	    				 </p>
	    		 	</div>
	    		 	<div class="col-md-4">
	    		 		<h5><strong>PENGIRIMAN</strong></h5>
	    		 		<p>Alamat :<strong><?php echo $detail['tipe'] ?> <?php echo $detail['distrik'] ?> <?php echo $detail['provinsi'] ?> </strong><br>
	    		 		Ongkos kirim : Rp. <?php echo number_format($detail['ongkir']); ?> <br>
	    		 		Ekspedisi : <?php echo $detail['ekspedisi'] ?> - <?php echo $detail['paket'] ?> - <?php echo $detail['estimasi'] ?>
	    		 		</p>
	    		 	</div>
	    		 	<div class="col-md-4">
	    		 		<h5><strong>TANGGAL CHECKOUT</strong></h5>
	    		 		<p>
	    				 	Tanggal : <?php echo date('d F Y',strtotime($detail['tanggal_pembelian'])); ?><br>
	    				 	Total : <strong>Rp. <?php echo number_format($detail['total']); ?>	<br></strong>
	    				 	Total Berat : <?php echo ($detail['total_berat']) ?><br>
	    		 			Status : <strong><?php echo $detail['status_pembelian']; ?></strong>
	    				</p>
	    		 	</div>
	    		 </div>

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>SubTotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
 		<?php while($pecah=$ambil->fetch_assoc()){ ?>
	 		<tr>
	 			<td><?php echo $nomor; ?></td>
	 			<td><?php echo $pecah['nama_produk'] ?></td>
	 			<td>Rp. <?php echo number_format($pecah['harga_produk']) ?></td>
	 			<td><?php echo number_format($pecah['jumlah']) ?></td>
	 			<td>Rp. <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']) ?></td>
	 		</tr>
 		<?php $nomor++; ?>
 		<?php } ?>
 	</tbody>
 </table>
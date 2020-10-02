<?php session_start(); include 'koneksi.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>notapembelian</title>
	<?php include 'css.php'; ?>
</head>
<body>

    <!-- Navbar -->
        <?php include 'menu.php'; ?>
    <!-- Akhir Navbar -->
    

    <section class="nota" >
    	<div class="container">

    		  <h3 style="margin-top: 100px" class="d-flex justify-content-center">NOTA PEMBELIAN</h3>
            <hr>

    		<?php 
    		$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pembelian WHERE pembelian.id_pembelian ='$_GET[id]'");
    		$detail=$ambil->fetch_assoc();
    		 ?>


    		 <div class="row">
    		 	<div class="col-md-4">
    		 		<h5><strong>DATA PEMBELI</strong></h5>
    		 		 <p>Nama  : <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
    				 	Telp  : <?php echo $detail['telepon_pelanggan']; ?> <br>
    				 	Email : <?php echo $detail['email_pelanggan']; ?><br>
                        Alamat Lengkap : <?php echo $detail['alamat_pengiriman']; ?>
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
    		 			No Pembelian : <?php echo $detail['id_pembelian']; ?><br>
    				 	Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
    				 	Total : <?php echo $detail['total']; ?>	<br>
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
                        <th>Ongkir</th>
    		 			<th>Total</th>
    		 		</tr>
    		 	</thead>
    		 	<tbody>
    		 		<?php $nomor=1; ?>
    		 		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
    		 		<?php while($pecah=$ambil->fetch_assoc()){ ?>
    			 		<tr>
    			 			<td><?php echo $nomor; ?></td>
    			 			<td><?php echo $pecah['nama'] ?></td>
    			 			<td>Rp. <?php echo number_format($pecah['harga']) ?></td>
    			 			<td><?php echo $pecah['jumlah'] ?></td>
                            <td><?php echo number_format($detail['ongkir']); ?></td>
    			 			<td>Rp. <?php echo number_format($detail['total']) ?></td>
    			 		</tr>
    		 		<?php $nomor++; ?>
    		 		<?php } ?>
    		 	</tbody>
    		 </table>

    		 <div class="row">
    		 	<div class="col d-flex justify-content-center mt-4 ">
    		 		<div class="alert alert-info">
    		 			<h5>
    		 				Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total']); ?> Ke 
    		 				<strong>BANK BRI 123-23219231</strong>
    		 			</h5>
    		 		</div>
    		 	</div>
    		 </div>

    	</div>
    </section>

  <!-- Footer -->
      <?php include 'footer.php'; ?>
  <!-- Akhir Footer -->

  <!-- javascript -->
</body>
</html>
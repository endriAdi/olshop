<?php 
session_start(); 
include 'koneksi.php'; 
//jika tidak  ada session pelanggan(belum login)
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
  echo "<script>alert('Silahkan Login Terlebih dahulu');</script>";
  echo "<script>location='login.php';</script>";  
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>riwayat belanja</title>
	<?php include 'css.php'; ?>
</head>
<body>
	<!-- Navbar -->
	    <?php include 'menu.php'; ?>
  	<!-- Akhir Navbar -->

  		<section class="riwayat">
  			<div class="container">
  				<h3 style="margin-top: 100px" class="d-flex justify-content-center">Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>
    		<hr>
  				<table class="table table-bordered">
  					<thead>
  						<tr>
  							<th>No</th>
  							<th>Tanggal</th>
  							<th>Status</th>
  							<th>Total</th>
  							<th>Opsi</th>
  						</tr>
  					</thead>

  					<tbody>
  						<?php
  						$nomor=1; 
  						//mendapatkan id pelanggan yang login
  							$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];

  							$ambil=$koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
  							while($pecah=$ambil->fetch_assoc()){
  						 ?>
  						<tr>
  							<td><?php echo $nomor; ?></td>
  							<td><?php echo $pecah["tanggal_pembelian"] ?></td>
  							<td><?php echo $pecah["status_pembelian"] ?>
                  <br>
                  <?php if (!empty($pecah['resi_pengiriman'])): ?>
                           Resi : <?php echo $pecah['resi_pengiriman'] ?>
                         <?php endif ?>       
                </td>
  							<td>Rp. <?php echo number_format($pecah["total"]) ?></td>
  							<td class="ml-2">
  								<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Nota</a>

                  <?php if ($pecah['status_pembelian']=="pending"): ?>
    								<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-warning">
                    Input Pembayaran
                    </a>
                    <?php else: ?>
                      <a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-success">Lihat Pembayaran</a>
                  <?php endif ?>
  							</td>
  						</tr>
  						<?php $nomor++; ?>
  						<?php } ?>
  					</tbody>
  				</table>
  			</div>
  		</section>


	<!-- Footer -->
      	<?php include 'footer.php'; ?>
  <!-- Akhir Footer -->

  <!-- javascript -->
    <?php include 'js.php'; ?>
    
</body>
</html>
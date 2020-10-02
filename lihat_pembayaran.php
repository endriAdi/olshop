<?php 
session_start(); 
include 'koneksi.php';

$id_pembelian=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM pembayaran 
	LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian
	WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay=$ambil->fetch_assoc();

//jika belum ada data pembbayaran
if (empty($detbay)) 
{
	echo "<script>alert('Anda belum Melakukan Pembayaran');</script>";	
	echo "<script>location='riwayat.php';</script>";
	exit();
}

//jika data pelanggan tidak sesuai dengan data yg login
if ($_SESSION["pelanggan"]["id_pelanggan"]!==$detbay["id_pelanggan"]) 
{
	echo "<script>alert('Anda tidak berhak melihat data orang lain');</script>";	
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>lihat pembayaran</title>
	<?php include 'css.php'; ?>
</head>
<body>
	<!-- Navbar -->
	<?php include 'menu.php'; ?>
	<!-- Akhir Navbar -->

	<section class="lihat-pembayaran">
		<div class="container">
			<h3 class="d-flex justify-content-center" style="margin-top: 100px">Lihat Pembayaran</h3><hr>
			<div class="row">
				<div class="col-md-6">
					<table class="table table-bordered">
						<tr>
							<th>Nama</th>
							<td><?php echo $detbay["nama"] ?></td>
						</tr>
						<tr>
							<th>Bank</th>
							<td><?php echo $detbay["bank"] ?></td>
						</tr>
						<tr>
							<th>Tanggal</th>
							<td><?php echo $detbay["tanggal"] ?></td>
						</tr>
						<tr>
							<th>Jumlah</th>
							<td>Rp. <?php echo number_format($detbay["jumlah"]) ?></td>
						</tr>
					</table>
				</div>
				<div class="col-md-6">
					<img src="bukti_transfer/<?php echo $detbay["bukti"] ?>" class="img-thumbnail">
				</div>
			</div>
		</div>
	</section>



	<!-- Footer -->
	<?php include 'footer.php'; ?>
	<!-- Akhir Footer -->

	<!-- Javascript -->
	<?php include 'js.php'; ?>
</body>
</html>
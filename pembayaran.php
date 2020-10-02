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

//mendapatkan id pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem= $ambil->fetch_assoc();

//mendapatkan id pelanggan yang beli
$id_pelanggan_beli=$detpem["id_pelanggan"];
//mendapatkan id pelanggan yang login
$id_pelanggan_login=$_SESSION["pelanggan"]["id_pelanggan"];
if ($id_pelanggan_login  !== $id_pelanggan_beli) 
{
	echo "<script>alert('Jangan Nakall');</script>";
  	echo "<script>location='riwayat.php';</script>";  
  	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>pembayaran</title>
	<?php include 'css.php'; ?>
</head>
<body>
	<!-- Navbar -->
		<?php include 'menu.php'; ?>
	<!-- Akhir Navbar -->


	<!-- Form Konfirmasi Pembayaran -->
		<section class="pembayaran">
			<div class="container">
				<h3 class="d-flex justify-content-center" style="margin-top: 100px">Konfirmasi Pembayaran</h3>
				<p class="d-flex justify-content-center">Kirim bukti pembayaran anda kesini</p> <hr>

				<div class="alert alert-info d-flex justify-content-center">  <h4>Total Tagihan Anda Adalah <strong> Rp. <?php echo number_format($detpem["total"]) ?></strong></h4></div>
				<div class="col-6">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama Penyetor</label>
							<input type="text" required name="nama" class="form-control" placeholder="Masukan nama penyetor">
						</div>
						<div class="form-group">
							<label>Bank</label>
							<input type="text" required name="bank" class="form-control" placeholder="Masukan Nomor Bank">
						</div>
						<div class="form-group">
							<label>Jumlah</label>
							<input type="number" required name="jumlah" class="form-control" placeholder="Masukan jumlah pembayaran">
						</div>
						<div class="form-group">
							<label>Foto Bukti</label>
							<input type="file" required name="bukti" class="form-control">
							<!-- <br> --><p>foto bukti max upload 3mb</p>
						</div>
						<button class="btn btn-primary" name="kirim">Kirim</button>
					</form>
				</div>
			</div>

			<?php 
			//jika tombol kirim ditekan
			if (isset($_POST["kirim"])) 
			{
				//upload foto bukti
				$namabukti=$_FILES["bukti"]["name"];	
				$lokasibukti=$_FILES["bukti"]["tmp_name"];
				$namafiks=date("YmdHis").$namabukti;
				move_uploaded_file($lokasibukti, "bukti_transfer/$namafiks");

				$nama=$_POST["nama"];
				$bank=$_POST["bank"];
				$jumlah=$_POST["jumlah"];
				$tanggal=date("Y-m-d");

				// simpan ke database
				$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) 
					VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");
				//update database
				$koneksi->query("UPDATE pembelian SET status_pembelian='terbayar' WHERE id_pembelian='$idpem'");

				echo "<script>alert('TERIMA KASIH, Produk Akan segera kami Proses');</script>";
				echo "<script>location='riwayat.php';</script>";
			}
			 ?>

		</section>
	<!-- Akhir Form Konfirmasi Pembayaran -->




	<!-- Footer -->
      	<?php include 'footer.php'; ?>
    <!-- Akhir Footer -->

    <!-- javascript -->
    <?php include 'js.php'; ?>
    
</body>
</html>
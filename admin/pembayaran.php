<div class="container">
	<h2>INFORMASI DATA PEMBAYARAN</h2>
</div>

<?php 
//mendapatkan id pembelian dari url
$id_pembelian=$_GET["id"];

//mengambil data pembayaran berdasarkan id_pembelian
$ambil=$koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail=$ambil->fetch_assoc();

 ?>
<div class="container">
 <div class="row">
 	<div class="col-md-6">
		<!-- <img src="../bukti_transfer/<?php echo $detail['bukti'] ?>" class="img-responsive"> -->
 		<table class="table table-bordered">
 			<tr>
 				<th>Nama</th>
 				<td><?php echo $detail['nama'] ?></td>
 			</tr>
 			<tr>
 				<th>Bank</th>
 				<td><?php echo $detail['bank'] ?></td>
 			</tr>
 			<tr>
 				<th>Jumlah</th>
 				<td>Rp. <?php echo number_format( $detail['jumlah']) ?></td>
 			</tr>
 			<tr>
 				<th>Tanggal</th>
 				<td><?php echo $detail['tanggal'] ?></td>
 			</tr>
 		</table>
 		<form method="post">
 	<div class="from-group">
 		<label>No Resi Pengiriman</label>
 		<input type="text" name="resi" class="form-control">
 	</div>
 	<div class="form-group">
 		<label>Status</label>
 		<select class="form-control" name="status">
 		<option value="">Pilih Status</option>
 		<option value="lunas">Barang Sampai</option>
 		<option value="dikirim">Barang DiKirim</option>
 		<option value="batal">Batal</option>
 		</select>
 	</div>
 	<button class="btn btn-success" name="proses">Proses</button>
 </form>
 	</div>
 	<div class="col-md-4">
 		<img src="../bukti_transfer/<?php echo $detail['bukti'] ?>" class="img-responsive img-thumbnail">
 	</div>
 </div>
 </div>

 

 <?php 
//jika tombol proses ditekan
 if (isset($_POST["proses"])) 
 {
 	$resi=$_POST["resi"];
 	$status=$_POST["status"];
 	$koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");
 	echo "<script>alert('Data Pembelian TerUpdate');</script>";
 	echo "<script>location='index.php?halaman=pembelian';</script>";
 }
  ?>

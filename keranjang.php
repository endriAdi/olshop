<?php
session_start();
//KONEKSI DATABADE

include 'koneksi.php';

// jika keranjang dihapus semua(kosong)
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Keranjang Anda Kosong !! Silahkan isi keranjang belanjaan anda kembali');</script>";
	echo "<script>location='index.php';</script>";
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>keranjang belanja</title>
 	<?php include 'css.php'; ?>
 </head>
 <body>



 	<!-- Navbar -->
    <?php include 'menu.php'; ?>
    <!-- Akhir Navbar -->

    <!-- Konten -->
    <section class="keranjang">
    	<div class="container">
    		<h3 style="margin-top: 100px" class="d-flex justify-content-center">KERANJANG BELANJA</h3>
    		<hr>

        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent pl-0 mt-0">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">My Cart</li>
            </ol>
          </nav>
        </div>

    		<table class="table table-bordered">
    			<thead>
    				<tr>
    					<th>No</th>
    					<th>Nama Produk</th>
    					<th>Harga</th>
    					<th>Jumlah</th>
    					<th>SubHarga</th>
    					<th>Aksi</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php $nomor=1; ?>
    				<?php foreach($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
    				
    				<!-- Menapilkan produk yg sedang diperulangkan berdasarkan id produk -->
    				
    				<?php 
    					$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    					$pecah=$ambil->fetch_assoc();
    					$subharga=$pecah["harga_produk"]*$jumlah;
    				 ?>
    				<tr>
    					<td><?php echo $nomor; ?></td>
    					<td><?php echo $pecah["nama_produk"]; ?></td>
    					<td><?php echo $pecah ["harga_produk"]; ?></td>
    					<td><?php echo $jumlah; ?></td>
    					<td><?php echo number_format($subharga); ?></td>
    					<td>
    						<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-sm">Hapus</a>
    					</td>
    				</tr>
    				<?php $nomor++; ?>
    				<?php endforeach ?>
    			</tbody>
    		</table>
    		<div class="row justify-content-end mr-0 mb-5">
    		<a href="index.php" class="btn btn-primary">Lanjutkan Belanja</a>
    		<a href="checkout.php" class="btn btn-success ml-2">CheckOut</a>
    		</div>
    	</div>
    </section>
    <!-- Akhir Konten -->
 

  <!-- Footer -->
    <?php include 'footer.php'; ?>
  <!-- Akhir Footer -->

  <!-- javascript -->
    <?php include 'js.php'; ?>
    
 </body>
 </html>
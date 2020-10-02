<?php session_start(); include 'koneksi.php'; ?>
<?php  
	if (isset($_GET['halaman'])) 
	{
	  $halaman=$_GET['halaman'];
	}else
	{
	  $halaman=1;
	}

	$limit=20;
	$mulai=($halaman-1)*$limit;
	$ambil=$koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori LIMIT $mulai, $limit");

	$total_laman="SELECT COUNT(nama_produk) FROM produk";
	$result=mysqli_query($koneksi,$total_laman);
	$total_rows=mysqli_fetch_array($result)[0];
	$total_pages=ceil($total_rows/$limit);
?>

<!DOCTYPE html>
<html>
<head>
	<title>produk</title>
	<?php include 'css.php'; ?>
</head>
<body>
	<!-- Navbar -->
	<?php include 'menu.php'; ?>
	<!-- Akhir Navbar -->

	<!-- Produk -->
	<section class="produk">
		<div class="container">
			<h3 style="margin-top: 100px" class="d-flex justify-content-center">ALL PRODUCT</h3>
    		<hr>
    		<div class="row justify-content-center mb-4">
				<div class="col-6">
					<form action="pencarian.php" method="get" class="navbar-form">
			          	<input type="text" name="keyword" class="form-control" placeholder="Cari Barang yang anda inginkan">
		          	</form>  
	          	</div>
	          	<!-- <div class="col-2">
		            <button class="btn btn-primary" name="cari">Search</button>
	          	</div> -->
	        </div>
			<div class="row">
				<?php $ambil=$koneksi->query("SELECT * FROM produk LIMIT $mulai, $limit"); ?>
		        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
		        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mt-4 mb-4">
		            <figure class="figure">
		              <div class="figure-img d-flex justify-content-center">
		                <img src="images/<?php echo $perproduk['foto']; ?>" class="figure-img img-fluid rounded ">
		                <a href="detailproduk.php?id=<?php echo $perproduk['id_produk']; ?>" class="d-flex justify-content-center "> 
		                </a>
		                <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="d-flex justify-content-end ">       
		                </a>
		              </div>
		              <figcaption class="figure-caption text-center">  
		                <h5><?php echo $perproduk['nama_produk']; ?></h5>
		                <p><strong>IDR </strong>  <?php echo number_format($perproduk['harga_produk']); ?></p>
		                  
		                 <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">
		                   <button href="" class="btn btn-primary btn-sm mt-1">ADD TO CART</button>
		                 </a>
		                 <a href="detailproduk.php?id=<?php echo $perproduk['id_produk']; ?>">
		                   <button href="" class="btn btn-primary btn-sm mt-1">DETAIL</button>
		                 </a>
		              </figcaption>
		            </figure>
		        </div>
		        <?php } ?>
			</div>
		</div>
	</section>
	<!-- Akhir Produk -->
	<!-- Pagination -->
        <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" href="?halaman=1">Previous</a>
            </li>
              <?php for ($i=1; $i<=$total_pages; $i++): ?>
                <li>
                  <a class="page-link" href="produk.php?halaman=<?= $i; ?>"><?= $i; ?></a>
                </li>
              <?php endfor; ?>
            <li class="page-item">
              <a class="page-link" href="?halaman=<?php echo $total_pages; ?>">Next</a>
            </li>
          </ul>
        </nav>
        <!-- Akhir Pagination -->


	<!-- Footer -->
	<?php include 'footer.php'; ?>
	<!-- Akhir Footer -->

	<!-- JavaScript -->
	<?php include 'js.php'; ?>
	<!-- Akhir JavaScript -->
</body>
</html>
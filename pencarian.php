<?php include 'koneksi.php'; ?>
<?php 
$keyword=$_GET["keyword"];

$semuadata=array();
$ambil=$koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%'");
while($pecah=$ambil->fetch_assoc())
{
	$semuadata[]=$pecah;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>pencarian</title>
	<?php include 'css.php'; ?>
</head>
<body>
	<!-- Navbar -->
		<?php include 'menu.php'; ?>

		<section class="pencarian">
			<div class="container">
				<h3 style="margin-top: 100px" class="mb-3">Hasil Pencarian : </h3>
				<div class="row">
					<?php foreach ($semuadata as $key => $value): ?>
					<div class="col-6 col-sm-6 col-md-4 col-lg-3 mt-4 mb-4">
			            <figure class="figure">
			              <div class="figure-img d-flex justify-content-center">
			                <img src="images/<?php echo $value['foto']; ?>" class="figure-img img-fluid rounded ">
			                <a href="detail.php?id=<?php echo $value['id_produk']; ?>" class="d-flex justify-content-center "> 
			                </a>
			                <a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" class="d-flex justify-content-end ">       
			                </a>
			              </div>
			              <figcaption class="figure-caption text-center">  
			                <h5><?php echo $value['nama_produk']; ?></h5>
			                <p><strong>IDR </strong>  <?php echo number_format($value['harga_produk']); ?></p>
			                  
			                 <a href="beli.php?id=<?php echo $value['id_produk']; ?>">
			                   <button href="" class="btn btn-primary btn-sm mt-1">ADD TO CART</button>
			                 </a>
			                 <a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>">
			                   <button href="" class="btn btn-primary btn-sm mt-1">DETAIL</button>
			                 </a>
			              </figcaption>
			            </figure>
			        </div>
					<?php endforeach ?>
				</div>
			</div>
		</section>




	<!-- Footer -->
		<?php include 'footer.php'; ?>
	<!-- Javascript -->
		<?php include 'js.php'; ?>
</body>
</html>
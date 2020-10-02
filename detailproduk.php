<?php 
session_start();
include 'koneksi.php';?>
<?php 
//mendapatkan id produk dari url
$id_produk=$_GET["id"];

//ambil data
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail=$ambil->fetch_assoc();


 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>detail produk</title>
		<?php include 'css.php'; ?>
	</head>
	<body>
	<!-- Navbar -->
	    <?php include 'menu.php'; ?>
    <!-- Akhir Navbar -->

	    <section class="detail">
	    	<div class="container">
	    	<h3 style="margin-top: 100px" class="d-flex justify-content-center">DETAIL PRODUK</h3>
    		<hr>

	<!-- Breadcrumbs -->
			<div class="container">
			    <nav>
			      <ol class="breadcrumb bg-transparent pl-0 mt-0">
			        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
			        <li class="breadcrumb-item active" aria-current="page">Detail</li>
			      </ol>
			    </nav>
			</div>
	<!-- Akhir Breadcrumbs -->

	<!-- Produk -->
	    		<div class="row ">
	    			<div class="col-md-6 mr-4" >
	    				​
	    				<figure class="figure">
	    					<img id="image-container" src="images/<?php echo $detail["foto"]; ?>" class="figure-img img-fluid rounded">
	    					<figcaption class="figure-caption product-thumbnail-container d-flex justify-content-between">
	    						<?php $ambil=$koneksi->query("SELECT * FROM foto_produk WHERE id_produk='$id_produk'"); ?>
          						<?php while($perfoto=$ambil->fetch_assoc()){ ?>
	    						
	    							<img class="img-thumbnail img-fluid" src="images/<?php echo $perfoto["nama_foto_produk"]; ?>" onclick="change_img(this)">
	    						
	    						<?php } ?>
	    					</figcaption>
	    				</figure>


	    				<!-- <img  src="images/<?php echo $detail["foto"]; ?>" class="img-fluid mb-3"> -->
	    			</div>
	    			<div class="col-md-3">
	    				<h2 class="mb-3 text-uppercase"><?php echo $detail["nama_produk"]; ?> </h2>
	    				<h5 class="mb-3">Rp. <?php echo number_format($detail["harga_produk"]); ?></h5>
	    			<div class="row">
	    				<div class="col-2">
	    					
	    				</div>
	    			</div>
	    				<select class="form-control mb-3" name="id_ongkir">
							<option value="">Pilih Size</option>
							<?php $ambil=$koneksi->query("SELECT * FROM ukuran_produk");
							while($size=$ambil->fetch_assoc()){
							 ?>

							 <option value="<?php echo $size["id_ukuran"] ?>">
							 	<?php echo $size['ukuran'] ?>
							 </option>
							<?php } ?>
						</select>
	    				<h5 class="mb-3">Stok : <?php echo $detail["stok_produk"] ?></h5>
	    				<form method="post">
	    					<div class="form-group">
	    						<input type="number" required name="tambah" min="1" max="<?php echo $detail["stok_produk"]; ?>" class="form-control" placeholder="jumlah pembelian">
	    						<!-- <div class="row justify-content-end mr-0"> -->
	    						<div class="input-group-btn ">
	    							<button class="btn btn-primary btn-block mt-3 " name="beli">BELI</button>
	    						</div>
	    						<!-- </div> -->
	    					</div>
	    				</form>
	    			
	    				<?php 
	    				//jika ada tombol  beli
	    				if (isset($_POST["beli"])) 
	    				{
	    					//mendapatkan jumlah yang diinputkan
	    					$tambah=$_POST["tambah"];
	    					
	    					//masukan di keranjang belanja
	    					$_SESSION["keranjang"][$id_produk]=$tambah;

	    					echo "<script>alert('Produk telah ditambah ke keranjang');</script>";
	    					echo "<script>location='keranjang.php';</script>";
	    				}
	    				 ?>
	    			</div>	
	    		</div>
	    	</div>
	    </section>
	<!-- Akhir Produk -->


	 <!-- Product Description & Review -->
	  <section class="product-description p-5">
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-9">
	          <ul class="nav nav-tabs" id="myTab" role="tablist">
	            <li class="nav-item">
	              <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab"
	                aria-controls="description" aria-selected="true">Product Description</a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
	                aria-selected="false">Reviews (20)</a>
	            </li>
	          </ul>
	          
	          <div class="tab-content p-3" id="myTabContent">
	            <div class="tab-pane fade show active product-review" id="description" role="tabpanel"
	              aria-labelledby="description-tab">
	              <p><?php echo $detail["deskripsi"]; ?></p>
	            </div>
	            
	            <div class="tab-pane fade product-review" id="review" role="tabpanel" aria-labelledby="review-tab">
	            	<?php $jipuk=$koneksi->query("SELECT * FROM penilaian_produk LEFT JOIN pelanggan ON penilaian_produk.id_pelanggan=pelanggan.id_pelanggan")?> 
	            	<?php while($pecah=$jipuk->fetch_assoc()){ ?>
	              <div class="row">
	                <div class="col-1 d-none d-md-block">
	                  <img src="foto_pelanggan/<?php echo $pecah["foto_pelanggan"]; ?>">
	                </div>
	                <div class="col">
	                  <h5><?php echo $pecah["nama_pelanggan"]; ?></h5>
	                  <p><?php echo $pecah["keterangan"]; ?></p>
	                </div>
	              </div>
	          <?php } ?>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <!-- Akhir Product Description & Review -->


	<!-- Deskripsi -->
	    <!-- <section class="produk-description">
	    	<div class="container">
	    		<div class="row">
	    			<div class="col p-3">
	    				<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Deskripsi</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Review</a>
						  </li>
						</ul>

						<div class="tab-content p-3" id="myTabContent">
						  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
						  	<?php echo $detail["deskripsi"]; ?>
						  </div>
						  <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
						  	<?php echo $detail["harga_produk"]; ?>
						  </div>
						</div>
	    			</div>
	    		</div>
	    	</div>			
	    </section> -->
	<!-- Akhir Deskripsi -->



	<!-- Footer -->
      	<?php include 'footer.php'; ?>
    <!-- Akhir Footer -->
	
	<!-- javascript -->
    <?php include 'js.php'; ?>

    <script type="text/javascript">
    	var container=document.getElementById("image-container");
    	function change_img(image){
    		container.src=image.src;
    	}
    </script>

	</body>
</html>
    


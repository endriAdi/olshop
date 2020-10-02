<?php session_start(); include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'css.php'; ?>
	<link rel="stylesheet" href="admin/assets/css/kategori.css">
	<title>kategori produk</title>
</head>
<body>
	
	<!-- Navbar -->
	  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
	      <div class="container">
	      <a class="navbar-brand" href="#">
	          <img src="img/logo_small.png" alt="skwan">
	      </a>
	      <!-- <h5 class="mx-auto text-white">EMPEROR</h5> -->
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="navbarNav">
	        <ul class="navbar-nav text-uppercase mx-auto">
	          <li class="nav-item ">
	            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
	          </li>
	          <li class="nav-item active">
	            <a class="nav-link" href="kategori.php">Category</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="checkout.php">CheckOut</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="about.php">About</a>
	          </li>
	          </ul>

	          <div class="btn-group">
	            <a href="keranjang.php" class="btn text-white" type="button">My Cart</a>
	            <a href="" class="btn text-white dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></a>
	            <div class="dropdown-menu">
	              <!-- <a class="dropdown-item" href="checkout.php">ChekOut</a> -->
	                <a class="dropdown-item" href="riwayat.php">History</a>
	                <div class="dropdown-divider"></div>
	              <!-- jika  sudah login -->
	                <?php if (isset($_SESSION["pelanggan"])): ?>
	                <?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
	                <?php $pecah=$ambil->fetch_assoc(); ?>
	                  <a class="dropdown-item" href="profil.php?id=<?php echo $pecah['id_pelanggan']; ?>">My Profile</a>
	                  <div class="dropdown-divider"></div>
	                  <a class="dropdown-item" href="logout.php">LogOut</a>
	                <!-- Selain itu (Belum Login) -->
	                <?php else: ?>
	                  <a class="dropdown-item" href="login.php">Login</a>
	                  <div class="dropdown-divider"></div>
	                  <a class="dropdown-item" href="login.php">Register</a>
	                <?php endif ?>
	              
	            </div>
	          </div>
	        <!-- <a href="keranjang.php" class="nav-link text-white">My Cart <i class="fas fa-shopping-cart"></i></a> -->
	      </div>
	    </div>
	  </nav>
    <!-- Akhir Navbar -->

	<!-- Tampilan Kategori -->
		<section class="kategori" style="margin-top: 100px">
			<div class="container">
				<h3 class="d-flex justify-content-center">Kategori Produk</h3><hr>
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
					<div class="col-6 col-md-4 col-lg-2">
						<p>
							<a type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><img src="images/kategori/tshirt.jpg"></a>
								<h5 class="d-flex justify-content-center">T-SHIRT</h5>
						</p>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<p>
							<a type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2"><img src="images/kategori/long.jpg"></a>
								<h5 class="d-flex justify-content-center">LONG SHIRT</h5>
						</p>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<p>
							<a type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3"><img src="images/kategori/3.jpg"></a>
								<h5 class="d-flex justify-content-center">HOODIE</h5>
						</p>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<p>
							<a type="button" data-toggle="collapse" data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4"><img src="images/kategori/4.jpg"></a>
								<h5 class="d-flex justify-content-center">KOLOR</h5>
						</p>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<p>
							<a type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><img src="images/kategori/5.jpg"></a>
								<h5 class="d-flex justify-content-center">KAOS POLOS</h5>
						</p>
					</div>
						<div class="col-6 col-md-4 col-lg-2">
						<p>
							<a type="button" data-toggle="collapse" data-target="#collapseExample6" aria-expanded="false" aria-controls="collapseExample6"><img src="images/kategori/custom.jpg"></a>
								<h5 class="d-flex justify-content-center">CUSTOM</h5>
						</p>
					</div>
					</div>
				<!-- <div class="container"> -->
				<div class="collapse" id="collapseExample">
		            <div class="row" style="text-align: center;">
		            <?php $ambil=$koneksi->query("SELECT * FROM produk WHERE id_kategori='1'"); ?>
		            <?php while($perproduk=$ambil->fetch_assoc()){ ?>
		                <div class="col-4">
		                  <div class="card card-body d-inline-block">
		                    <img src="images/<?php echo $perproduk["foto"] ?>">
		                    <h5><?php echo $perproduk['nama_produk']; ?></h5>
		                    <p><?php echo $perproduk['harga_produk']; ?></p>
		                    <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">
		                      <button href="" class="btn btn-primary btn-sm mt-1">ADD TO CART</button>
		                    </a>
		                     <a href="detailproduk.php?id=<?php echo $perproduk['id_produk']; ?>">
		                      <button href="" class="btn btn-primary btn-sm mt-1">DETAIL</button>
		                    </a>
		                  </div>
		                </div>
		            <?php } ?>
		            </div>
	           </div>
	           <div class="collapse" id="collapseExample2">
		            <div class="row" style="text-align: center;">
		            <?php $ambil=$koneksi->query("SELECT * FROM produk WHERE id_kategori='2'"); ?>
		            <?php while($perproduk=$ambil->fetch_assoc()){ ?>
		                <div class="col-4">
		                  <div class="card card-body d-inline-block">
		                    <img src="images/<?php echo $perproduk["foto"] ?>">
		                    <h5><?php echo $perproduk['nama_produk']; ?></h5>
		                    <p><?php echo $perproduk['harga_produk']; ?></p>
		                    <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">
		                      <button href="" class="btn btn-primary btn-sm mt-1">ADD TO CART</button>
		                    </a>
		                     <a href="detailproduk.php?id=<?php echo $perproduk['id_produk']; ?>">
		                      <button href="" class="btn btn-primary btn-sm mt-1">DETAIL</button>
		                    </a>
		                  </div>
		                </div>
		            <?php } ?>
		            </div>
	           </div><div class="collapse" id="collapseExample3">
		            <div class="row" style="text-align: center;">
		            <?php $ambil=$koneksi->query("SELECT * FROM produk WHERE id_kategori='3'"); ?>
		            <?php while($perproduk=$ambil->fetch_assoc()){ ?>
		                <div class="col-4">
		                  <div class="card card-body d-inline-block">
		                    <img src="images/<?php echo $perproduk["foto"] ?>">
		                    <h5><?php echo $perproduk['nama_produk']; ?></h5>
		                    <p><?php echo $perproduk['harga_produk']; ?></p>
		                    <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">
		                      <button href="" class="btn btn-primary btn-sm mt-1">ADD TO CART</button>
		                    </a>
		                     <a href="detailproduk.php?id=<?php echo $perproduk['id_produk']; ?>">
		                      <button href="" class="btn btn-primary btn-sm mt-1">DETAIL</button>
		                    </a>
		                  </div>
		                </div>
		            <?php } ?>
		            </div>
	           </div>
	           <div class="collapse" id="collapseExample4">
		            <div class="row" style="text-align: center;">
		            <?php $ambil=$koneksi->query("SELECT * FROM produk WHERE id_kategori='4'"); ?>
		            <?php while($perproduk=$ambil->fetch_assoc()){ ?>
		                <div class="col-4">
		                  <div class="card card-body d-inline-block">
		                    <img src="images/<?php echo $perproduk["foto"] ?>">
		                    <h5><?php echo $perproduk['nama_produk']; ?></h5>
		                    <p><?php echo $perproduk['harga_produk']; ?></p>
		                    <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">
		                      <button href="" class="btn btn-primary btn-sm mt-1">ADD TO CART</button>
		                    </a>
		                     <a href="detailproduk.php?id=<?php echo $perproduk['id_produk']; ?>">
		                      <button href="" class="btn btn-primary btn-sm mt-1">DETAIL</button>
		                    </a>
		                  </div>
		                </div>
		            <?php } ?>
		            </div>
	           </div>
	           <div class="collapse" id="collapseExample5">
		            <div class="row" style="text-align: center;">
		            <?php $ambil=$koneksi->query("SELECT * FROM produk WHERE id_kategori='5'"); ?>
		            <?php while($perproduk=$ambil->fetch_assoc()){ ?>
		                <div class="col-4">
		                  <div class="card card-body d-inline-block">
		                    <img src="images/<?php echo $perproduk["foto"] ?>">
		                    <h5><?php echo $perproduk['nama_produk']; ?></h5>
		                    <p><?php echo $perproduk['harga_produk']; ?></p>
		                    <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">
		                      <button href="" class="btn btn-primary btn-sm mt-1">ADD TO CART</button>
		                    </a>
		                     <a href="detailproduk.php?id=<?php echo $perproduk['id_produk']; ?>">
		                      <button href="" class="btn btn-primary btn-sm mt-1">DETAIL</button>
		                    </a>
		                  </div>
		                </div>
		            <?php } ?>
		            </div>
	           </div>
	           
	           <div class="collapse" id="collapseExample6">
		            <div class="row mt-5">
		                <div class="col-lg-6 mb-4 d-flex justify-content-center">
		                  <form method="post">
		                  	<div class="form-group">
								<label>Nama Pelanggan</label>
								<input type="text" required name="nama" class="form-control" placeholder="Masukan nama Anda">
							</div>
							<div class="form-group">
								<label>Nama Pelanggan</label>
								<input type="text" required name="nama" class="form-control" placeholder="Masukan nama Anda">
							</div>
							<div class="form-group">
								<label>Nama Pelanggan</label>
								<input type="text" required name="nama" class="form-control" placeholder="Masukan nama Anda">
							</div>
							<div class="form-group">
								<label>Nama Pelanggan</label>
								<input type="text" required name="nama" class="form-control" placeholder="Masukan nama Anda">
							</div>
		                  </form>
		                </div>
		            </div>
	           </div>
			 </div>
			</div>
		</section>
	<!-- Akhir Tampilan Kategori -->

	<!-- Coba coba -->

	<!-- Akhir coba coba -->

	<!-- footer -->
		<?php include 'footer.php'; ?>
	<!-- Akhir Footer -->



	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
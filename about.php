<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>about</title>
	<?php include 'css.php'; ?>
</head>
<body>

	<!-- Nabvar -->
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
	          <li class="nav-item">
	            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
	          </li>
	          <li class="nav-item ">
	            <a class="nav-link" href="kategori.php">Category</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="checkout.php">CheckOut</a>
	          </li>
	          <li class="nav-item active">
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
	<!-- Akhir Nabvar -->


	<!-- Konten -->
	<section class="about">
		<div class="container">
			<h3 style="margin-top: 100px" class="d-flex justify-content-center">ABOUT</h3>
    		<hr>
			<div class="row mb-4 text-center">
				<div class="col-4">
					<span><i class="fas fa-phone-alt"></i> 0851-5655-4053</span>
				</div>
				<div class="col-4">
					<span><i class="fas fa-envelope"></i> EmperorCatalogue@gmail.com</span>
				</div>
				<div class="col-4">
					<span><i class="fas fa-map-marker-alt"></i> Jln.Haryo Panular, Surakarta</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.021252106761!2d110.8132191147767!3d-7.572661494539013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x75265e75122d9eb0!2sPasar%20Kadipolo!5e0!3m2!1sid!2sid!4v1591096418967!5m2!1sid!2sid" width="800" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

	                	
				</div>
			</div>
		</div>
	</section>
	<!-- Akhir Konten -->


	<!-- footer -->
	<?php include 'footer.php'; ?>
	<!-- Akhir footer -->

	<!-- JavaScript -->
	<?php include 'js.php'; ?>
</body>
</html>
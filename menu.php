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
          <li class="nav-item ">
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
                  <?php include 'koneksi.php'; ?>
                  <?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
                  <?php $pecah=$ambil->fetch_assoc(); ?>
                  <!-- <a class="dropdown-item" href="profil.php?id=<?php echo $pecah['id_pelanggan']; ?>">My Profile</a> -->
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
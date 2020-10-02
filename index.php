<?php 
session_start(); 
//KONEKSI DATABADE
include 'koneksi.php';

if (isset($_GET['halaman'])) 
{
  $halaman=$_GET['halaman'];
}else
{
  $halaman=1;
}

$limit=8;
$mulai=($halaman-1)*$limit;
$ambil=$koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori LIMIT $mulai, $limit");

$total_laman="SELECT COUNT(nama_produk) FROM produk";
$result=mysqli_query($koneksi,$total_laman);
$total_rows=mysqli_fetch_array($result)[0];
$total_pages=ceil($total_rows/$limit);


 ?>
<html lang="en">
  <head>
    <title>emperor</title>
    <?php include 'css.php'; ?>
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
          <li class="nav-item active">
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
                  <!-- <a class="dropdown-item" href="profil.php">My Profile</a> -->
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

    <!-- Carousel -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner mt-5">
            <div class="container">
          <div class="carousel-item active">
              <div class="row pt-5 justify-content-center" >
                  <div class="col-9 col-sm-4 col-md-6 col-lg-4 ">
                      <h1 class="mb-4">Spesial Promo</h1>
                      <p class="mb-4">pastikan kamu tidak ketinggalan spesial promo dari kami</p>
                      <a href="produk.php" class="btn btn-warning text-white">Get it Now</a>
                  </div>
                  <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
                      <img src="img/1.png" alt="">
                  </div>
              </div>
          </div>
          <div class="carousel-item">
              <div class="row pt-5 justify-content-center" >
                  <div class="col-9 col-sm-4 col-md-6 col-lg-4 ">
                      <h1 class="mb-4">Spesial Promo</h1>
                      <p class="mb-4">pastikan kamu tidak ketinggalan spesial promo dari kami</p>
                      <a href="produk.php" class="btn btn-warning text-white">Get it Now</a>
                  </div>
                  <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
                      <img src="img/1.png" alt="">
                  </div>
              </div>
          </div>
          <div class="carousel-item">
            <div class="row pt-5 justify-content-center" >
                <div class="col-9 col-sm-4 col-md-6 col-lg-4 ">
                    <h1 class="mb-4">Spesial Promo</h1>
                    <p class="mb-4">pastikan kamu tidak ketinggalan spesial promo dari kami</p>
                    <a href="" class="btn btn-warning text-white">Get it Now</a>
                </div>
                <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
                    <img src="img/1.png" alt="">
                </div>
            </div>
        </div>
        </div>
    </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <!-- Akhir Carousel -->

    <!-- Brand -->
    <section>
      <div class="container">
        <div class="row p-5 text-center">
          <div class="col-md">
            <a href="">
            <img src="img/brand/nike.png" class="img-fluid" >
          </a>
          </div>
          <div class="col-md">
            <a href="">
            <img src="img/brand/cc.png" class="img-fluid">
          </a>
          </div>
          <div class="col-md">
            <a href="">
            <img src="img/brand/pnb.png" class="img-fluid">
          </a>
          </div>
          <div class="col-md">
            <a href="">
            <img src="img/brand/uniqlo.png" class="img-fluid">
          </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Brand -->

    <!-- Feature -->
    <section class="features p-5">
      <div class="container">
        <div class="row mb-3">
          <div class="col">
            <h3>Produk Terbaru</h3>
            <p>Jangan sampai kelewatan produk terbaru dari kami yaaa</p>
          </div>
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
                <a href="detailproduk.php?id=<?php echo $perproduk['id_produk']; ?>" class="d-flex justify-content-end ">       
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
        <div class="row mt-4">
          <div class="col d-flex justify-content-center">
            <a href="produk.php">
              <p>See All Product</p>
            </a>
          </div>
        </div>
      </div>

      <!-- Pagination -->
        <!-- <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" href="?halaman=1">Previous</a>
            </li>
              <?php for ($i=1; $i<=$total_pages; $i++): ?>
                <li>
                  <a class="page-link" href="index.php?halaman=<?= $i; ?>"><?= $i; ?></a>
                </li>
              <?php endfor; ?>
            <li class="page-item">
              <a class="page-link" href="?halaman=<?php echo $total_pages; ?>">Next</a>
            </li>
          </ul>
        </nav> -->
        <!-- Akhir Pagination -->

    </section>
    <!-- Akhir Feature -->

    <!-- Produk Terlaris -->
    <!-- Akhir Produk Terlaris -->

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- Akhir Footer -->
    
    <!-- Javascript -->
    <!-- // -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
session_start();
include 'koneksi.php';
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
    echo "<script>alert('Keranjang Anda Kosong !! Silahkan isi keranjang belanjaan anda kembali');</script>";
    echo "<script>location='index.php';</script>";
}
//jika belum login maka akan di  redirect ke login
if (!isset($_SESSION["pelanggan"])) 
{
	echo "<script>alert('Anda Harus Login Terlebih dahulu');</script>";
	echo "<script>location='login.php';</script>";
}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>checkout</title>
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
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="kategori.php">Category</a>
          </li>
          <li class="nav-item active">
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
                  <a class="dropdown-item" href="profil.php">My Profile</a>
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

  <!-- Konten -->
  <section class="checkout">
      <div class="container">
        <h3 style="margin-top: 100px" class="d-flex justify-content-center">CHECKOUT</h3>
        <hr>

        <div class="container pl-0 pr-0">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="keranjang.php">My Cart</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
              
            </tr>
          </thead>
          <tbody>
            <?php $nomor=1; ?>
            <?php $totalberat=0; ?>
            <?php $totalbelanja=0; ?>
            <?php foreach($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
            
            <!-- Menapilkan produk yg sedang diperulangkan berdasarkan id produk -->
            
            <?php 
              $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
              $pecah=$ambil->fetch_assoc();
              $subharga=$pecah["harga_produk"]*$jumlah;
              $subberat=$pecah["berat_produk"]*$jumlah;
              $totalberat+=$subberat;
             ?>
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $pecah["nama_produk"]; ?></td>
              <td><?php echo $pecah ["harga_produk"]; ?></td>
              <td><?php echo $jumlah; ?></td>
              <td><?php echo number_format($subharga); ?></td>
              
            </tr>
            <?php $nomor++; ?>
            <?php $totalbelanja+=$subharga; ?>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="4">TOTAL BELANJA</th>
              <th>Rp. <?php echo number_format($totalbelanja) ?></th>
            </tr>
          </tfoot>
        </table>
      

          <form method="post" class="mt-5">
            <h4>Input Pengiriman</h4>
              <div class="row mt-3">
                <div class="col-md-3">
                  <label>Nama Pelanggan</label>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" readonly class="form-control" value="<?php echo $_SESSION['pelanggan'] ['nama_pelanggan'] ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Nomor Pelanggan</label>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="number" readonly class="form-control" value="<?php echo $_SESSION['pelanggan'] ['telepon_pelanggan'] ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Berat Barang (gr)</label>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="number" readonly class="form-control" value="<?php echo $totalberat; ?>" name="total_berat">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Provinsi</label>
                </div>
                <div class="col-md-4 mb-3">
                  <select class="form-control" required name="nama_provinsi" id="provinsi">
                    
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Kota/Kabupaten</label>
                </div>
                <div class="col-md-4 mb-3">
                  <select class="form-control" required name="nama_distrik">
                    
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Jasa Pengiriman</label>
                </div>
                <div class="col-md-4 mb-3">
                  <select class="form-control" required name="nama_ekspedisi">
                    
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Paket</label>
                </div>
                <div class="col-md-4 mb-3">
                  <select class="form-control" required name="nama_paket">
                    
                  </select>
                </div>
              </div>

              
              <div class="row mt-3">
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Alamat Lengkap Pengiriman</label>
                </div>
              </div>
                <div class="col-md-4">
                      <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan Alamat lengkap Pengiriman"></textarea>
                    </div>
                  </div>

              <div class="row ">
                <div class="col mb-5  d-flex justify-content-center">
                  <button class="btn btn-warning btn-sm mt-3 text-white" name="bayar" >Bayar Sekarang</button>
                </div>
              </div>

              <div class="terpilih" style="overflow: hidden;">
                <input type="hidden" name="provinsi">
                <input type="hidden" name="distrik">
                <input type="hidden" name="tipe">
                <input type="hidden" name="kodepos">
                <input type="hidden" name="ekspedisi">
                <input type="hidden" name="paket">
                <input type="hidden" name="ongkir">
                <input type="hidden" name="estimasi">
              </div>

          </form>
        </div>

          <?php 
          if (isset($_POST["bayar"])) 
          {
            $id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
            $tanggal_pembelian = date("Y-m-d");
            $alamat_pengiriman=$_POST['alamat_pengiriman'];

            $total_berat=$_POST["total_berat"];
            $provinsi=$_POST["provinsi"];
            $distrik=$_POST["distrik"];
            $tipe=$_POST["tipe"];
            $kodepos=$_POST["kodepos"];
            $ekspedisi=$_POST["ekspedisi"];
            $paket=$_POST["paket"];
            $ongkir=$_POST["ongkir"];
            $estimasi=$_POST["estimasi"];

            $total = $totalbelanja + $ongkir;

            //menyimpan data ke tabel pembelian
            $koneksi->query("INSERT INTO pembelian
              (id_pelanggan,tanggal_pembelian,total,alamat_pengiriman,total_berat,provinsi,distrik,tipe,kodepos,ekspedisi,paket,ongkir,estimasi) 
              VALUES ('$id_pelanggan','$tanggal_pembelian','$total','$alamat_pengiriman','$total_berat','$provinsi','$distrik','$tipe','$kodepos','$ekspedisi','$paket','$ongkir','$estimasi')");

            //mendapatkan id_pembelian terjadi
            $id_pembelian_barusan =$koneksi->insert_id;

            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
            {

              //mendapatkan data produk berdasarkan id_produk
              $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
              $perproduk=$ambil->fetch_assoc();
              $nama=$perproduk['nama_produk'];
              $harga=$perproduk['harga_produk'];
              $subharga=$perproduk['harga_produk']*$jumlah;

              $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,subharga,jumlah) 
                VALUES('$id_pembelian_barusan','$id_produk','$nama','$harga','$subharga','$jumlah')");
            
              //update stok
              $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah WHERE id_produk='$id_produk'");
            }

            //mengosongkan keranjang belanja
            unset($_SESSION["keranjang"]);

            //mengalihkan ke halaman nota
            echo "<script>alert('Pembelian Suksess');</script>";
            echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";

            
          }
           ?>
        </div>
      </div>
  </section>
  <!-- Akhir Konten -->
    

  <!-- Footer -->
    <?php include 'footer.php'; ?>
  <!-- Akhir Footer -->

  <!-- javascript -->
  <?php include 'js.php'; ?>

    <script>
      $(document).ready(function(){
        $.ajax({
          type:'post',
          url:'dataprovinsi.php',
          success:function(hasil_provinsi)
          {
            $("select[name=nama_provinsi]").html(hasil_provinsi);
          }
        });

        $("select[name=nama_provinsi]").on("change",function(){
          //ambil id_provinsi yang akan dipilih

          var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
          $.ajax({
            type:'post',
            url:'datadistrik.php',
            data:'id_provinsi='+id_provinsi_terpilih,
            success:function(hasil_distrik)
            {
              $("select[name=nama_distrik]").html(hasil_distrik);
            }
          });
        });

        $.ajax({
          type:'post',
          url:'dataekspedisi.php',
          success:function(hasil_ekspedisi)
          {
            $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
          }
        });

        $("select[name=nama_ekspedisi]").on("change",function(){
          //mendapatkan data ongkir
          //mendapatkan ekspedisi yang dipilih
          var ekspedisi_terpilih=$("select[name=nama_ekspedisi]").val();

          //mendapatkan id_distrik yang dipilih pelanggan
          var distrik_terpilih=$("option:selected","select[name=nama_distrik]").attr("id_distrik");

          //mendapatkan total berat
          var total_berat=$("input[name=total_berat]").val();
          $.ajax({
            type:'post',
            url:'datapaket.php',
            data:'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+total_berat,
            success:function(hasil_paket)
            {
              $("select[name=nama_paket]").html(hasil_paket);

              //letakkan nama ekspedisi terpilih di input ekspedisi
              $("input[name=ekspedisi]").val(ekspedisi_terpilih);
            }
          });
        });

        $("select[name=nama_distrik]").on("change", function(){
          var prov=$("option:selected",this).attr("nama_provinsi");
          var dist=$("option:selected",this).attr("nama_distrik");
          var tipe=$("option:selected",this).attr("tipe_distrik");
          var kodepos=$("option:selected",this).attr("kodepos");
          
          $("input[name=provinsi]").val(prov);
          $("input[name=distrik]").val(dist);
          $("input[name=tipe]").val(tipe);
          $("input[name=kodepos]").val(kodepos);
        });

        $("select[name=nama_paket]").on("change", function(){
          var paket=$("option:selected",this).attr("paket");
          var ongkir=$("option:selected",this).attr("ongkir");
          var etd=$("option:selected",this).attr("etd");

          $("input[name=paket]").val(paket);
          $("input[name=ongkir]").val(ongkir);
          $("input[name=estimasi]").val(etd);
        })

      });
    </script>

 </body>
 </html>
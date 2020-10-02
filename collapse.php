<?php session_start(); include 'koneksi.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

      <div class="container">
        <div class="row">
          <div class="col-3">
            <button class="btn  btn-primary" data-toggle="collapse" data-target="#id1">Pilih</button>          
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="collapse" id="id1">
              <div class="row">
              <?php $ambil=$koneksi->query("SELECT * FROM produk WHERE id_kategori='1'"); ?>
              <?php while($perproduk=$ambil->fetch_assoc()){ ?>
              <div class="col-3 d-flex justify-content-center">
              <div class="card d-inline-block mr-2 mb-5">
                <img src="images/<?php echo $perproduk["foto"]; ?>" class="figure-img img-fluid rounded">
                  <h5><?php echo $perproduk['nama_produk']; ?></h5>
                  <p><?php echo $perproduk['harga_produk']; ?></p>
                  <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">
                      <button href="" class="btn btn-primary btn-block mt-1">BELI</button>
                  </a>
                </div>
          </div>
            <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>

        <div class="row">
          <div class="col-3">
              <div class="card-body" align="center">
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
﻿<?php
session_start(); 
//KONEKSI DATABADE
$koneksi= new mysqli("localhost","root","","olshop");

if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('anda belum login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>emperor admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
     <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
    <!-- DATA TABLES -->
    <link href="assets/dataTables/datatables.min.css" rel="stylesheet" />
     <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-cls-top navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" style="font-size: 24px">EMPEROR ADMIN</a> 
            </div>
            <div style="color: white;
                padding: 15px 50px 5px 50px;
                float: right;
                font-size: 14px;"> Last access : Tomorrow &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> 
            </div>
        </nav>  

        <!-- /. NAV TOP  -->
                <nav class="navbar-inverse navbar-side fixed-top" role="navigation" style="margin-top: 10px">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <?php
                    $ambil=$koneksi->query("SELECT * FROM admin"); 
                    $pecah=$ambil->fetch_assoc();
                    ?>
				<li class="text-center">
                    <img src="assets/img/<?php echo $pecah["foto"]; ?>" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard"></i> Home</a>
                    </li> 
                    <li>
                        <a  href="index.php?halaman=produk"><i class="fa fa-shopping-cart"></i> Produk</a>
                    </li>
                    <li>
                        <a  href="index.php?halaman=kategori"><i class="fa fa-tags"></i> Kategori</a>
                    </li>
                     <li>
                        <a  href="index.php?halaman=pembelian"><i class="fa fa-clipboard"></i> Pembelian</a>
                    </li>
                    <li>
                        <a  href="index.php?halaman=laporan_pembelian"><i class="fa fa-book"></i> Laporan </a>
                    </li>
                     <li>
                        <a  href="index.php?halaman=pelanggan"><i class="fa fa-user"></i> Pelanggan</a>
                    </li>
                     <li>
                        <a  href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> LogOut</a>
                    </li>
                  
                </ul>
               
            </div>
            
        </nav> 
         
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="margin-top: 50px">
            <div id="page-inner">
                <?php 
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="produk") 
                    {
                        include 'produk.php';
                    }
                    elseif ($_GET['halaman']=="pembelian") 
                    {
                        include 'pembelian.php';
                    }
                    elseif ($_GET['halaman']=="pelanggan") 
                    {
                        include 'pelanggan.php';
                    }
                    elseif ($_GET['halaman']=="detail") 
                    {
                        include 'detail.php';    
                    }
                    elseif ($_GET['halaman']=="tambahproduk") 
                    {
                        include 'tambahproduk.php';
                    }
                    elseif ($_GET['halaman']=="hapusproduk") 
                    {
                        include 'hapusproduk.php';
                    }
                    elseif ($_GET['halaman']=="editproduk") 
                    {
                        include 'editproduk.php';
                    }
                    elseif ($_GET['halaman']=="logout") 
                    {
                        include 'logout.php';
                    }
                    elseif ($_GET['halaman']=="pembayaran") 
                    {
                        include 'pembayaran.php';
                    }
                    elseif ($_GET['halaman']=="laporan_pembelian") 
                    {
                        include 'laporan_pembelian.php';
                    }
                    elseif ($_GET['halaman']=="kategori") 
                    {
                        include 'kategori.php';    
                    }
                    elseif ($_GET['halaman']=="tambah_kategori") 
                    {
                        include 'tambah_kategori.php';    
                    }
                    elseif ($_GET['halaman']=="hapuskategori") 
                    {
                        include 'hapuskategori.php';    
                    }
                    elseif ($_GET['halaman']=="editkategori") 
                    {
                        include 'editkategori.php';    
                    }
                    elseif ($_GET['halaman']=="hapuspelanggan") 
                    {
                        include 'hapuspelanggan.php';    
                    }
                    elseif ($_GET['halaman']=="detail_produk") 
                    {
                        include 'detail_produk.php';    
                    }
                    elseif ($_GET['halaman']=="hapusfotoproduk") 
                    {
                        include 'hapusfotoproduk.php';    
                    }
                }
                else 
                {
                    include 'home.php';
                }
                ?>
                
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    
     <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <!-- <script src="assets/js/jquery.metisMenu.js"></script> -->
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
     <!-- CUSTOM SCRIPTS -->
    <!-- <script src="assets/js/custom.js"></script> -->
     <!-- DATA TABLES -->
    <script src="assets/dataTables/datatables.min.js"></script>
    <script src="assets/dataTables/datatables.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#datatables').DataTable();
            $('#datatabless').DataTable({
                // scrollY : '400px',
                dom : 'Bfrtip',
                buttons : [
                {
                    extend : 'pdf',
                    oriented : 'potrait',
                    pageSize : 'Legal',
                    title : 'Data Pembelian',
                    download : 'open'
                },
                'csv','excel','print','copy'
                ]
            });
        } );
    </script>
    
   
</body>
</html>

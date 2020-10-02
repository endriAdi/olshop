<?php 
session_start();
//menghancurkan $_SESSION[Pelanggan]
session_destroy();
echo "<script>alert('Anda telah Log-out');</script>";
echo "<script>location='index.php';</script>";
 ?>
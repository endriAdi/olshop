<?php
session_start();


//mendapatkam id_produk dari url

$id_produk=$_GET['id'];




//jika sudah ada produk itu dikeranjang maka jumlahnya di +1
if (isset($_SESSION['keranjang'][$id_produk]))
{
    $_SESSION['keranjang'][$id_produk]+=1;
}
//selain itu (belum ada dikeranjang ) maka produk dianggap beli 1
else
{
    $_SESSION['keranjang'][$id_produk]=1;
}

//pindah ke halaman keranjang
echo "<script>alert('Produk telah ditambahkan');</script>";
echo "<script>location='keranjang.php';</script>";
 ?>
<?php  
$id_foto=$_GET["idfoto"];
$id_produk=$_GET["idproduk"];

//ambil data
$ambilfoto=$koneksi->query("SELECT * FROM foto_produk WHERE id_foto_produk='$id_foto'");
$detailfoto=$ambilfoto->fetch_assoc();

$namafilefoto=$detailfoto["nama_foto_produk"];
//hapus file foto dari folder
unlink("../images".$namafilefoto);

//menghapus data
$koneksi->query("DELETE FROM foto_produk WHERE id_foto_produk='$id_foto'");
echo "<script>alert ('Produk Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
?>
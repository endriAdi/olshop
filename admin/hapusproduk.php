<?php 
	$ambil =$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
	$pecah =$ambil->fetch_assoc();
	$foto =$pecah['foto'];
	if (file_exists("../images/$foto")) 
	{
		unlink("../images/$foto");
	}
	$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
	echo "<script>alert ('Produk Berhasil Dihapus');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
  ?>
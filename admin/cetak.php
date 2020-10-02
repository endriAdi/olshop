<?php

require_once __DIR__ . '/vendor/autoload.php';

// require 'functions.php';
//$koneksi->query("SELECT * FROM pembelian");

 $ambil=$koneksi->query("SELECT * FROM pembelian JOIN Pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan")
 while($pecah = $ambil->fetch_assoc()) {
 	

$mpdf = new \Mpdf\Mpdf();


$html='!<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Pembelian</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
	<h2 style="text-align: center;">Daftar Pembelian</h2>
	<table class="table table-bordered" id="datatables">
		<thead>
			<tr>
				<th>No Pembelian</th>
				<th>Nama Pelanggan</th>
				<th>Tanggal Pembelian</th>
				<th>Status</th>
				<th>Total</th>
			</tr>
		</thead>';

		$i=1;
		foreach ($koneksi as $key => $value) 
		{
			$html .= '<tr>
				<td>'.$i++.'</td>
				<td>'.$pecah["nama_pelanggan"].'</td>
				<td>'.$pecah["tanggal_pembelian"].'</td>
				<td>'.$pecah["status_pembelian"].'</td>
				<td>'.$pecah["total"].'</td>
			</tr>';	
		}
		
$html .='</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();



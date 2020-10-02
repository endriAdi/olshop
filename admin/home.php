<!DOCTYPE html>
<html>
<head>
	<title>grafik penjualan</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="assets/css/grafikbarang.css">

</head>
<body>
	<h2 style="text-align: center;">SELAMAT DATANG ADMINISTRATOR</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<figure class="highcharts-figure">
				    <div id="data_barang"></div>
				    <p class="highcharts-description">
				        A basic column chart compares rainfall values between four cities.
				        Tokyo has the overall highest amount of rainfall, followed by New York.
				        The chart is making use of the axis crosshair feature, to highlight
				        months as they are hovered over.
				    </p>
				</figure>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12">                     
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bar Chart Example
                    </div>
                    <div class="panel-body">
                        <div id="morris-bar-chart"></div>
                    </div>
                </div>            
            </div>
		</div>
	</div>

	<?php  
		$nama_kategori=array();
		$jumlah=array();
		$ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN kategori WHERE pembelian_produk.id_kategori=kategori.id_kategori");
		while($pecah=$ambil->fetch_object())
		{
			$nama_kategori[]=$pecah->nama_kategori;
			$jumlah[]=intval($pecah->jumlah);
		}
		// print_r(json_encode($nama));
	?>

	<script src="assets/highchart/highcharts.js"></script>
	<script src="assets/highchart/exporting.js"></script>
	<script src="assets/highchart/export-data.js"></script>
	<script src="assets/highchart/accessibility.js"></script>
	<script type="text/javascript">
		Highcharts.chart('data_barang', {
		    chart: {
		        type: 'column'
		    },
		    title: {
		        text: 'Data Penjualan Produk'
		    },
		    subtitle: {
		        text: 'Source: emperorr.com'
		    },
		    xAxis: {
		        categories: 
		        [
		            'Jan',
		            'Feb',
		            'Mar',
		            'Apr',
		            'May',
		            'Jun',
		            'Jul',
		            'Aug',
		            'Sep',
		            'Oct',
		            'Nov',
		            'Dec'
		        ],
		        crosshair: true
		    },
		    yAxis: {
		        min: 0,
		        title: {
		            text: 'Jumlah Produk'
		        }

		    },
		    tooltip: {
		        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
		        footerFormat: '</table>',
		        shared: true,
		        useHTML: true
		    },
		    plotOptions: {
		        column: {
		            pointPadding: 0.2,
		            borderWidth: 0
		        }
		    },
		    series: [{

		    	//name:'Nama kategori',
		    	name:<?= json_encode($nama_kategori); ?> ,
		    	data: [10, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
		    	//name:'Jumlah Stok',
		    	//data:<?= json_encode($jumlah); ?>

	      //    name: 't-shirt',
	      //    data: [10, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

		     // }, {
		     //    name: 'New York',
		     //     data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

		     // }, {
		     //     name: 'London',
		     //     data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

		     // }, {
		     //     name: 'Berlin',
		     //     data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

		    }]
		});	
	</script>

	<!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
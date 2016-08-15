<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aplikasi Layanan Sipajar</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/global.css');?>" />
	
</head>
<body>
	<header>
    	<div id="logo">
        	<img class="logos" src="asset/images/Sipajar-logo.png">
        </div>
        <div id="judul-header">
        	<center>
        	<h2 class="judul-header">
            	Aplikasi Layanan Sistem Pengawasan Jarak Jauh<br>
                Tenaga Surya berbasis Internet</br>
            </h2>
            </center>
        </div>
        <div id="logo-ugm">
        	<img class="logos-ugm" src="asset/images/logo-ugm.png">
        </div>
    </header>
    
    <nav>
    	<?php $this->load->view('tampilan-nav') ?>
    </nav>
    
    <div id="profil">
    <div class="row">
    	<div class="profil-singkat col-xs-5" style="margin-top:-8px;">
<table class="table" style="background-color:none;">    
    <tbody>
      <tr>
        <td>Operator</td>
        <td>: <?php echo $username; ?></td>        
      </tr>
      <tr>
        <td>Lokasi</td>
        <td>: <?php echo $lokasi; ?></td>
      </tr>
      <tr>
        <td>String</td>
        <td id="stringke">: 1</td>        
      </tr>
    </tbody>
  </table>
        </div>
        <div class="waktu col-xs-5">
        	<h3 style="margin-left:72px;">
            	15:32
            </h3>
        </div>
        <div class="logo-rumah col-xs-2">
        	<img src="asset/images/logo-rumah.png">
        </div>
    </div>
    </div>
    
    <div id="headline-content">
    <center>
    	<h3 id="judul-content" style="margin-top:0px; color:#fff;">
        	RINGKASAN
        </h3>
    </center>
    </div>
    
    <div id="main-content" style="margin-top:5px;">
    	<?php
			$this->load->view('tampilan-ringkasan');
		?>
    </div>
    
    <footer>
    	<h5>        	
        	Copyright 2015. Nurul Huda. Teknik Fisika Universitas Gadjah Mada Yogyakarta.
        </h5>
    </footer>
        
    <script src="<?php echo base_url('asset/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>
    
    <script>
		var state;
		var string;
		var tanggalAwal;
		var tanggalAkhir;
		var d = new Date();
		var jam = d.getHours();
		var menit = d.getMinutes();
		var detik = d.getSeconds();
		var tahun = d.getYear()-100;
		var bulan = d.getMonth()+1;
		var tanggal = d.getDate();
		
		function setState(x){
			state = x;
		}
		function setString(x){
			string = x;
		}
		function setTanggalAwal(x){
			tanggalAwal = x;
		}
		function setTanggalAkhir(x){
			tanggalAkhir = x;
		}
		setTanggalAkhir("2015-05-28");
		setTanggalAwal("2015-05-28");
		setState(<?php echo $this->session->userdata('state'); ?>);
		setString(<?php echo $this->session->userdata('string'); ?>);
	</script>    
    
</body>
</html>
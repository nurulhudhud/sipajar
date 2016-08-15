<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aplikasi Layanan Sipajar</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/sticky-footer-navbar.css');?>" />
	
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
          	<img src="asset/images/si-huda.png" alt="Sipajar" width="65" height="65">
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Overview</a></li>
            <li><a href="#statistik">Statistik</a></li>
            <li><a href="#pengaturan">Pengaturan</a></li>
            </ul>
          <div class="navbar-right">
          	<ul class="nav navbar-navs">
            <li><a href="#string">Pilih String</a></li                     
          ></ul>
          </div>                    
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
<div id="main-header" class="container">    	
        <div class="profil" style="margin-bottom:10px;">
        	<div class="logo">
            	<img src="asset/images/panel.png" width="161" height="51">            	
            </div>        	
<h5>
            	Sukatman<br>
                Lokasi : Banyumeneng I, Panggang, GK
                </br>
          </h5>
</div>
        <div class="constructor" style="margin-bottom:10px;">
        	<h5>
            	Sejak Tahun: <br>
                2015
              </br> 
            </h5>            
        </div>
    </div>
    
<div id="main-info" class="container">
	<h3 class="judul">
    	Overview
    </h3>
</div>
    	
<div class="container-fluid">
    	<?php
			//$this->load->view('tampilan_overview');
		?>
</div>
    
<footer class="footer">
      <div class="container">
        <p class="text-muted" style="color:#000;">Copyright Nurul Huda 2015 </p>
      </div>
    </footer>    	
	<script src="<?php echo base_url('asset/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>
    <script>
		function request(url, func){
				if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  					xmlhttp=new XMLHttpRequest();
					}
				else {// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=func;				
				xmlhttp.open("GET",url,true);
				xmlhttp.send();
			}
			
			// Fungsi mendapatkan status dan nilai pengukuran
			function getMainContent(){
				request("status.php", function(){
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
						document.getElementById("main").innerHTML=xmlhttp.responseText;
					}
				});
			}
	</script>
</body>
</html>
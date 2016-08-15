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

	<!-- Fixed navbar -->
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">Tentang Sipajar</a></li>
            <li><a href="#contact">Daftar</a></li>            
          </ul>
          <div class="navbar-right">
          <?php
		  	$atribut = array('class'=>'form-inline navbar-form navbar-right', 'role'=>'form', 'name'=>'login_form', 'id'=>'login_form');
			echo form_open('login', $atribut);
		  ?>          	
    <div class="form-group">
    	<!-- pesan -->
    	<?php
			if(!empty($pesan)): ?>
			<label style="font-weight:bold; font-size:14px;">
            	<?php echo $pesan; ?>
            </label>
            <?php endif ?>
      <label class="sr-only" for="email">Email:</label>
      <input type="text" name="username" class="form-control input-sm" id="email" placeholder="Masukkan username">
    </div>
    <div class="form-group">
      <label class="sr-only" for="pwd">Password:</label>
      <input type="password" name="password" class="form-control input-sm" id="pwd" placeholder="Masukkan password">
    </div>    
    <button type="submit" class="btn btn-warning btn-sm">Login</button>
  </form>
          </div>          
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">      
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted" style="color:#000;">Copyright Nurul Huda 2015 </p>
      </div>
    </footer>

	<script src="<?php echo base_url('asset/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>

</body>
</html>
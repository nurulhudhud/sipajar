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
        <td>: 1</td>        
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
        
<script src="<?php echo base_url('asset/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>    
</body>
</html>
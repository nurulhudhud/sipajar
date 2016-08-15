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
	<header class="header navbar-default">
    	<button style="margin-top:120px;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bar" aria-expanded="false" >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
    </header>	
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-sm-3 sidebar collapse" id="bar">
            	<ul class="nav nav-sidebar">
            		<li style="background-color:rgba(255, 164, 0, 0.93)" onClick="getMainContent()"><a href="#">Status</a></li>
            		<li><a href="#">Riwayat</a></li>
            		<li style="background-color:rgba(255, 164, 0, 0.93)"><a href="#">Pengaturan</a></li>
                    <li><a href="logout">Logout</a></li>
          		</ul>                
            </div>
            <div class="col-sm-9 main" id="main">			
            </div>
        </div>
    </div>
    <footer class="footers">
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

<!-->
DELIMITER $$
CREATE PROCEDURE procedureTests()
BEGIN
declare x INT default(0);
while x<=144 do  
INSERT INTO pengukuran_sukatman(waktu, arus, tegangan, temperature, irradiasi, daya) VALUES(
    FROM_UNIXTIME(
        UNIX_TIMESTAMP('2015-05-28 06:00:00') + FLOOR(x*5*60)
    ), (SELECT floor(rand() * 5) AS randNum), (SELECT floor(rand() * 30) AS randNum), (SELECT floor(rand() * 100) AS randNum), (SELECT floor(rand() * 1000) AS randNum), (SELECT floor(rand() * 50) AS randNum)
);
set x = x+1;
end while;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE test()
BEGIN
declare x INT default(0);
while x<=144 do  
INSERT INTO pengukuran_sukatman(waktu, arus, tegangan, temperature, irradiasi, dayain, dayahasil, efisiensi) VALUES(
    FROM_UNIXTIME(
        UNIX_TIMESTAMP('2015-05-28 06:00:00') + FLOOR(x*5*60)
    ), (SELECT floor(rand() * 5) AS randNum), (SELECT floor(rand() * 30) AS randNum), (SELECT floor(rand() * 100) AS randNum), (SELECT floor(rand() * 1000) AS randNum), (SELECT floor(rand() * 150) AS randNum), (SELECT floor(rand() * 150) AS randNum), (SELECT floor(rand() * 100) AS randNum)
);
set x = x+1;
end while;
END$$
DELIMITER ;
<!-->
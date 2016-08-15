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
        	<div class="status col-sm-3">
            	<div class="panel panel-default">
    				<div class="panel-heading">Status <?php echo $waktu; ?></div>
    				<div class="panel-body"><a data-toggle="modal" href="#modal-status" style="text-transform:uppercase;"><?php echo $status ?></a></div>
    				<div class="panel-footer">Effisiensi : <?php echo str_replace(".",",",number_format($efisiensi,2)); ?>% </div>
  				</div>
            </div>
            <div class="hari-ini col-sm-3">
            	<div class="panel panel-default">
    				<div class="panel-heading">Energi Hari Ini</div>
    				<div class="panel-body"><a data-toggle="modal" href="#modal-hari"><?php 
					if($jumlahEnergi > 1000){
						$jumlahEnergi = $jumlahEnergi / 1000.0;
						echo str_replace(".",",",number_format($jumlahEnergi,2)). " kWh";						
					}
					else
						echo str_replace(".",",",number_format($jumlahEnergi,2)). " Wh" ?></a></div>
    				<div id="grafik-hari-ini" style="height:90px;" class="panel-footer"></div>
  				</div>
            </div>
            <div class="bulan col-sm-3">
            	<div class="panel panel-default">
    				<div class="panel-heading">Energi Bulan Ini</div>
    				<div class="panel-body"><a data-toggle="modal" href="#modal-bulan"><?php  
					if($jumlahEnergiBulan == null){
					echo "N/A";
					}
					else{
						if($jumlahEnergiBulan > 1000){
							$jumlahEnergiBulan = $jumlahEnergiBulan / 1000.0;
							echo str_replace(".",",",number_format($jumlahEnergiBulan,2)). " kWh";
						}
						else
							echo str_replace(".",",",number_format($jumlahEnergiBulan,2))." Wh";
					}
					?></a></div>
    				<div id="grafik-bulan-ini" style="height:90px;" class="panel-footer"></div>
  				</div>
            </div>
            <div class="lifetime col-sm-3">
            	<div class="panel panel-default">
    				<div class="panel-heading">Energi Lifetime</div>
    				<div class="panel-body"><a data-toggle="modal" href="#modal-lifetime"><?php  
					if($jumlahEnergiLifeTime == null){
					echo "N/A";
					}
					else{
						if($jumlahEnergiLifeTime > 1000){
							$jumlahEnergiLifeTime = $jumlahEnergiLifeTime / 1000.0;
							echo str_replace(".",",",number_format($jumlahEnergiLifeTime,2)). " kWh";
						}
						else if($jumlahEnergiLifeTime > 1000000){
							$jumlahEnergiLifeTime = $jumlahEnergiLifeTime / 1000000.0;
							echo str_replace(".",",",number_format($jumlahEnergiLifeTime,2)). " MWh";
						}
						else
							echo str_replace(".",",",number_format($jumlahEnergiLifeTime,2))." Wh";
					}
					?></a></div>
    				<div id="grafik-realtime" style="height:90px;" class="panel-footer"></div>
  				</div>
            </div>
        </div>
    
    <!-- Modal Status -->
  <div class="modal fade" id="modal-status" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Status Hari Ini</h4>
        </div>
        <div class="modal-body">
          <div class = "row">
          		<div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline; padding-bottom:0px;">Status</h4>
                    <p style="text-transform:uppercase; font-weight:bold;"><?php echo $status ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Arus</h4>
                    <p> <?php echo "Arus = ".$arus." A"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline">Tegangan</h4>
                    <p> <?php echo "Tegangan = ".$tegangan." V"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Temperatur</h4>
                    <p> <?php echo "Temperatur = ".$temperatur." "; ?><sup>0</sup>C</p>
                </div>
          </div>
          <div class = "row">
          		<div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline; padding-bottom:0px;">Iradiasi</h4>
                    <p> <?php echo "Iradiasi = ".$iradiasi." W/m2"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Daya Masuk</h4>
                    <p> <?php echo "Daya = ".$dayaIn." W"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline">Daya Hasil</h4>
                    <p> <?php echo "Daya = ".$dayaHasil." W"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Efisiensi</h4>
                    <p> <?php echo "Efisiensi = ".($efisiensi)." %"; ?></p>
                </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Modal Hari -->
  <div class="modal fade" id="modal-hari" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Rekapitulasi Hari Ini</h4>
        </div>
        <div class="modal-body">
          <div class = "row">
          		<div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline; padding-bottom:0px;">Energi</h4><br>
                    <p><?php if($jumlahEnergi > 1000){
						$jumlahEnergi = $jumlahEnergi / 1000.0;
						echo str_replace(".",",",number_format($jumlahEnergi,2)). " kWh";						
					}
					else
						echo str_replace(".",",",number_format($jumlahEnergi,2)). " Wh" ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Arus</h4>
                    <p> <?php echo "Max = ".$arusMax." A"; ?></p>
                    <p> <?php echo "Min = ".$arusMin." A"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($arusRerata,2))." A"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline">Tegangan</h4>
                    <p> <?php echo "Max = ".$teganganMax." V"; ?></p>
                    <p> <?php echo "Min = ".$teganganMin." V"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($teganganRerata,2))." V"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Temperatur</h4>
                    <p> <?php echo "Max = ".$temperaturMax." "; ?><sup>0</sup>C</p>
                    <p> <?php echo "Min = ".$temperaturMin." "; ?><sup>0</sup>C</p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($temperaturRerata,2))." "; ?><sup>0</sup>C</p>
                </div>
          </div>
          <div class = "row">
          		<div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline; padding-bottom:0px;">Iradiasi</h4>
                    <p> <?php echo "Max = ".$iradiasiMax." W/m2"; ?></p>
                    <p> <?php echo "Min = ".$iradiasiMin." W/m2"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($iradiasiRerata,2))." W/m2"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Daya Masuk</h4>
                    <p> <?php echo "Max = ".$dayainMax." W"; ?></p>
                    <p> <?php echo "Min = ".$dayainMin." W"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($dayainRerata,2))." W"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline">Daya Hasil</h4>
                    <p> <?php echo "Max = ".$dayahasilMax." W"; ?></p>
                    <p> <?php echo "Min = ".$dayahasilMin." W"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($dayahasilRerata,2))." W"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Efisiensi</h4>
                    <p> <?php echo "Max = ".($efisiensiMax)." %"; ?></p>
                    <p> <?php echo "Min = ".($efisiensiMin)." %"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($efisiensiRerata,2))." %"; ?></p>
                </div>
          </div>        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="modal-bulan" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Rekapitulasi Bulan Ini</h4>
        </div>
        <div class="modal-body">
          <div class = "row">
          		<div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline; padding-bottom:0px;">Energi</h4><br>
                    <p><?php 
					if($jumlahEnergiBulan == null){
					echo "N/A";
					}
					else{
						if($jumlahEnergiBulan > 1000){
							$jumlahEnergiBulan = $jumlahEnergiBulan / 1000.0;
							echo str_replace(".",",",number_format($jumlahEnergiBulan,2)). " kWh";
						}
						else
							echo str_replace(".",",",number_format($jumlahEnergiBulan,2))." Wh";
					}
					?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Arus</h4>
                    <p> <?php echo "Max = ".$arusBulanMax." A"; ?></p>
                    <p> <?php echo "Min = ".$arusBulanMin." A"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($arusBulanRerata,2))." A"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline">Tegangan</h4>
                    <p> <?php echo "Max = ".$teganganBulanMax." V"; ?></p>
                    <p> <?php echo "Min = ".$teganganBulanMin." V"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($teganganBulanRerata,2))." V"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Temperatur</h4>
                    <p> <?php echo "Max = ".$temperaturBulanMax." "; ?><sup>0</sup>C</p>
                    <p> <?php echo "Min = ".$temperaturBulanMin." "; ?><sup>0</sup>C</p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($temperaturBulanRerata,2))." "; ?><sup>0</sup>C</p>
                </div>
          </div>
          <div class = "row">
          		<div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline; padding-bottom:0px;">Iradiasi</h4>
                    <p> <?php echo "Max = ".$iradiasiBulanMax." W/m2"; ?></p>
                    <p> <?php echo "Min = ".$iradiasiBulanMin." W/m2"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($iradiasiBulanRerata,2))." W/m2"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Daya Masuk</h4>
                    <p> <?php echo "Max = ".$dayainBulanMax." W"; ?></p>
                    <p> <?php echo "Min = ".$dayainBulanMin." W"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($dayainBulanRerata,2))." W"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline">Daya Hasil</h4>
                    <p> <?php echo "Max = ".$dayahasilBulanMax." W"; ?></p>
                    <p> <?php echo "Min = ".$dayahasilBulanMin." W"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($dayahasilBulanRerata,2))." W"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Efisiensi</h4>
                    <p> <?php echo "Max = ".($efisiensiBulanMax)." %"; ?></p>
                    <p> <?php echo "Min = ".($efisiensiBulanMin)." %"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($efisiensiBulanRerata,2))." %"; ?></p>
                </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="modal-lifetime" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Rekapitulasi</h4>
        </div>
        <div class="modal-body">
          <div class = "row">
          		<div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline; padding-bottom:0px;">Energi</h4><br>
                    <p><?php  
					if($jumlahEnergiLifeTime == null){
					echo "N/A";
					}
					else{
						if($jumlahEnergiLifeTime > 1000){
							$jumlahEnergiLifeTime = $jumlahEnergiLifeTime / 1000.0;
							echo str_replace(".",",",number_format($jumlahEnergiLifeTime,2)). " kWh";
						}
						else if($jumlahEnergiLifeTime > 1000000){
							$jumlahEnergiLifeTime = $jumlahEnergiLifeTime / 1000000.0;
							echo str_replace(".",",",number_format($jumlahEnergiLifeTime,2)). " MWh";
						}
						else
							echo str_replace(".",",",number_format($jumlahEnergiLifeTime,2))." Wh";
					}
					?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Arus</h4>
                    <p> <?php echo "Max = ".$arusLifeTimeMax." A"; ?></p>
                    <p> <?php echo "Min = ".$arusLifeTimeMin." A"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($arusLifeTimeRerata,2))." A"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline">Tegangan</h4>
                    <p> <?php echo "Max = ".$teganganLifeTimeMax." V"; ?></p>
                    <p> <?php echo "Min = ".$teganganLifeTimeMin." V"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($teganganLifeTimeRerata,2))." V"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Temperatur</h4>
                    <p> <?php echo "Max = ".$temperaturLifeTimeMax." "; ?><sup>0</sup>C</p>
                    <p> <?php echo "Min = ".$temperaturLifeTimeMin." "; ?><sup>0</sup>C</p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($temperaturLifeTimeRerata,2))." "; ?><sup>0</sup>C</p>
                </div>
          </div>
          <div class = "row">
          		<div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline; padding-bottom:0px;">Iradiasi</h4>
                    <p> <?php echo "Max = ".$iradiasiLifeTimeMax." W/m2"; ?></p>
                    <p> <?php echo "Min = ".$iradiasiLifeTimeMin." W/m2"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($iradiasiLifeTimeRerata,2))." W/m2"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Daya Masuk</h4>
                    <p> <?php echo "Max = ".$dayainLifeTimeMax." W"; ?></p>
                    <p> <?php echo "Min = ".$dayainLifeTimeMin." W"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($dayainLifeTimeRerata,2))." W"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavender">
                	<h4 style="text-decoration:underline">Daya Hasil</h4>
                    <p> <?php echo "Max = ".$dayahasilLifeTimeMax." W"; ?></p>
                    <p> <?php echo "Min = ".$dayahasilLifeTimeMin." W"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($dayahasilLifeTimeRerata,2))." W"; ?></p>
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Efisiensi</h4>
                    <p> <?php echo "Max = ".($efisiensiLifeTimeMax)." %"; ?></p>
                    <p> <?php echo "Min = ".($efisiensiLifeTimeMin)." %"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($efisiensiLifeTimeRerata,2))." %"; ?></p>
                </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        
    <script src="<?php echo base_url('asset/amcharts/amcharts.js');?>"></script>
    <script src="<?php echo base_url('asset/amcharts/serial.js');?>"></script>
    <script src="<?php echo base_url('asset/amcharts/themes/dark.js');?>"></script>
    
    <script>
			AmCharts.loadJSON = function(url){
				if(window.XMLHttpRequest){
					var xmlhttp = new XMLHttpRequest();
				}
				else{
					var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}								
				xmlhttp.open('GET',url,false);
				xmlhttp.send();
				return eval(xmlhttp.responseText);
			};
		</script>
        
        <!-- Grafik Hari Ini -->
        <script>
			var chart1;			
			AmCharts.ready(function(){
				// Muat data								
				var chartData = AmCharts.loadJSON('dashboardHariIni');
								
				// Serial chart
				chart1 = new AmCharts.AmSerialChart();
				chart1.pathToImages = "amcharts/images/";
                chart1.dataProvider = chartData;
                chart1.categoryField = "waktu";
				chart1.autoMargins = false;
				chart1.marginLeft = 0;
				chart1.marginRight = 0;
				chart1.marginTop = 0;
				chart1.marginBottom = 15;								
				
				// Category Axis
				var categoryAxis = chart1.categoryAxis;					 
                categoryAxis.gridAlpha = 0;
				categoryAxis.axisAlpha = 0;
                
				
				// Value
				var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
				valueAxis.axisAlpha = 0;                
                chart1.addValueAxis(valueAxis);							

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.type = "line"; // try to change it to "column"                
                graph.valueField = "dayahasil";
                graph.lineAlpha = 1;
                graph.lineColor = "rgb(1,86,150)";
                graph.fillAlphas = 0.3;				
                chart1.addGraph(graph);				

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorPosition = "mouse";
                chartCursor.categoryBalloonDateFormat = "JJ:NN:SS, DD MMMM YYYY";
                chart1.addChartCursor(chartCursor);                

                // WRITE
                chart1.write("grafik-hari-ini");				
								
			});
		</script>
        
        <!-- Grafik Hari Ini -->
        <script>
			var chart2;			
			AmCharts.ready(function(){
				// Muat data								
				var chartData = AmCharts.loadJSON('dashboardBulanIni');
								
				// Serial chart
				chart2 = new AmCharts.AmSerialChart();
				chart2.pathToImages = "amcharts/images/";
                chart2.dataProvider = chartData;
                chart2.categoryField = "waktu";
				chart2.autoMargins = false;
				chart2.marginLeft = 0;
				chart2.marginRight = 0;
				chart2.marginTop = 0;
				chart2.marginBottom = 15;								
				
				// Category Axis
				var categoryAxis = chart2.categoryAxis;					 
                categoryAxis.gridAlpha = 0;
				categoryAxis.axisAlpha = 0;
                
				
				// Value
				var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
				valueAxis.axisAlpha = 0;                
                chart2.addValueAxis(valueAxis);							

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.type = "line"; // try to change it to "column"                
                graph.valueField = "dayahasil";
                graph.lineAlpha = 1;
                graph.lineColor = "rgb(1,86,150)";
                graph.fillAlphas = 0.3;				
                chart2.addGraph(graph);				

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorPosition = "mouse";
                chartCursor.categoryBalloonDateFormat = "JJ:NN:SS, DD MMMM YYYY";
                chart2.addChartCursor(chartCursor);                

                // WRITE
                chart2.write("grafik-bulan-ini");				
								
			});
		</script>
        
        <!-- Grafik Hari Ini -->
        <script>
			var chart3;			
			AmCharts.ready(function(){
				// Muat data								
				var chartData = AmCharts.loadJSON('dashboardLifetime');
								
				// Serial chart
				chart3 = new AmCharts.AmSerialChart();
				chart3.pathToImages = "amcharts/images/";
                chart3.dataProvider = chartData;
                chart3.categoryField = "waktu";
				chart3.autoMargins = false;
				chart3.marginLeft = 0;
				chart3.marginRight = 0;
				chart3.marginTop = 0;
				chart3.marginBottom = 15;								
				
				// Category Axis
				var categoryAxis = chart3.categoryAxis;					 
                categoryAxis.gridAlpha = 0;
				categoryAxis.axisAlpha = 0;
                
				
				// Value
				var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
				valueAxis.axisAlpha = 0;                
                chart3.addValueAxis(valueAxis);							

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.type = "column"; // try to change it to "column"                
                graph.valueField = "energi";
                graph.lineAlpha = 1;
                graph.lineColor = "rgb(1,86,150)";
                graph.fillAlphas = 0.3;				
                chart3.addGraph(graph);				

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorPosition = "mouse";
                chartCursor.categoryBalloonDateFormat = "JJ:NN:SS, DD MMMM YYYY";
                chart3.addChartCursor(chartCursor);                

                // WRITE
                chart3.write("grafik-realtime");				
								
			});
		</script>        
</body>
</html>
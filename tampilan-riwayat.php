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
	<div id="panel" class="row">    	
        <div class="col-xs-12 form-inline">
        	<label class="checkbox-inline"><input id="panel-arus" onChange="tampilkanArus()" type="checkbox" value="">Arus</label>
            <label class="checkbox-inline"><input id="panel-tegangan" onChange="tampilkanTegangan()"  type="checkbox" value="">Tegangan</label>
            <label class="checkbox-inline"><input id="panel-temperatur" onChange="tampilkanTemperature()" type="checkbox" value="">Temperatur</label>
            <label class="checkbox-inline"><input id="panel-iradiasi" onChange="tampilkanIradiasi()" type="checkbox" value="">Iradiasi</label>
            <label class="checkbox-inline"><input id="panel-dayain" onChange="tampilkanDayaIn()" type="checkbox" value="">Dayain</label>
            <label class="checkbox-inline"><input id="panel-dayahasil" onChange="tampilkanDayaHasil()" type="checkbox" value="">Daya Hasil</label>
            <label class="checkbox-inline"><input id="panel-efisiensi" onChange="tampilkanEfisiensi()" type="checkbox"  value="">Efisiensi</label>            
        	<label class="checkbox-inline"><input id="panel-energi" type="checkbox" disabled="true" value="">Energi</label>
            <label class="checkbox-inline"><input id="panel-dayarerata" type="checkbox" disabled="true" value="">Daya Rerata</label>
            <input type="text" name="tanggal-awal" class="form-control input-sm" id="tanggal-awal" placeholder="Tanggal Awal YYYY-M-D">
                <input type="text" name="tanggal-akhir" class="form-control input-sm" id="tanggal-awal" placeholder="Tanggal Akhir YYYY-M-D">
            	<select onchange="aktifkan(this.value)" name="jenis" style="width:120px; margin-top:10px;">					
					<option value="energi">Energi</option>
					<option value="performa">Performa</option>
				</select>
                <button onClick="tampilkanArus()" type="submit" class="btn btn-default btn-sm">Enter</button>
        </div>
        
    </div>
    <div id="stats" class="row">
    	<div id = "grafik" style="height:250px;" class = "col-sm-8">
        </div>
        <div id="statistik" class = "col-sm-4">
        	<div class = "row">          		
                <div class="col-sm-4" style="background-color:lavenderblush">
                	<h4 style="text-decoration:underline">Arus</h4>
                    <p> <?php echo "Max = ".$arusMax." A"; ?></p>
                    <p> <?php echo "Min = ".$arusMin." A"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($arusRerata,2))." A"; ?></p>
                </div>
                <div class="col-sm-4" style="background-color:lavender">
                	<h4 style="text-decoration:underline">Tegangan</h4>
                    <p> <?php echo "Max = ".$teganganMax." V"; ?></p>
                    <p> <?php echo "Min = ".$teganganMin." V"; ?></p>
                    <p> <?php echo "Rerata = ".str_replace(".",",",number_format($teganganRerata,2))." V"; ?></p>
                </div>
                <div class="col-sm-4" style="background-color:lavenderblush">
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
        
        <script>
			var chart;

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

			AmCharts.ready(function(){
				// Muat data								
				var chartData = AmCharts.loadJSON('ambildatariwayatperforma');
								
				// Serial chart
				chart = new AmCharts.AmSerialChart();
				chart.pathToImages = "amcharts/images/";
                chart.dataProvider = chartData;
                chart.categoryField = "waktu";
				chart.autoMargins = true;
												
				
				// Category Axis
				var categoryAxis = chart.categoryAxis;					 
                categoryAxis.parseDates = false;
                categoryAxis.minPeriod = "ss";	 
                categoryAxis.gridAlpha = 0.07;
                categoryAxis.axisColor = "#000";
				categoryAxis.title = "Waktu Pengukuran";
				categoryAxis.titleColor = "#000";
				categoryAxis.color = "#000";
				categoryAxis.labelRotation = 30;
				categoryAxis.fontSize = 8;
                
				
				// Value
				var valueAxis = new AmCharts.ValueAxis();
				valueAxis.title = "Nilai Arus";
                valueAxis.gridAlpha = 0.07;                
				valueAxis.titleColor = "#000";
				valueAxis.axisColor = "#000";
				valueAxis.color = "#000";                
                chart.addValueAxis(valueAxis);							

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.type = "line"; // try to change it to "column"                
                graph.valueField = "arus";
                graph.lineAlpha = 1;
                graph.lineColor = "rgb(1,86,150)";
                graph.fillAlphas = 0.3;				
                chart.addGraph(graph);				

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorPosition = "mouse";
                chartCursor.categoryBalloonDateFormat = "JJ:NN:SS, DD MMMM YYYY";
                chart.addChartCursor(chartCursor);                

                // WRITE
                chart.write("grafik");				
								
			});
			
			
		</script>       
           
</body>
</html>
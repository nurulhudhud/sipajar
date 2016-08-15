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
    <script src="<?php echo base_url('asset/amcharts/amcharts.js');?>"></script>
    <script src="<?php echo base_url('asset/amcharts/serial.js');?>"></script>
    <script src="<?php echo base_url('asset/amcharts/themes/dark.js');?>"></script>
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
			
			function muatData(){
				var url;
				switch (state){
					case 0:
						url = "dashboard/ambildatahariini/"+string;
						break;
					case 1:
						url = "riwayat/";
						break;
					case 2:
						url = "pengaturan";
						break;
				};				
				request(url, function(){
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
						document.getElementById("main-content").innerHTML=xmlhttp.responseText;
						document.getElementById("stringke").innerHTML=": "+string;
						}
						if(url == "dashboard/ambildatahariini/"+string){
							chartData = AmCharts.loadJSON('dashboardhariini/muat/'+string);
							chart1.dataProvider = chartData;				
							chart1.validateData();
							chart1.write("grafik-hari-ini");
							chartData = AmCharts.loadJSON('dashboardbulanini/muat/'+string);
							chart2.dataProvider = chartData;				
							chart2.validateData();
							chart2.write("grafik-bulan-ini");
							chartData = AmCharts.loadJSON('dashboardlifetime/muat/'+string);
							chart3.dataProvider = chartData;				
							chart3.validateData();
							chart3.write("grafik-realtime");
						}
						if(url == "riwayat/"){
							chartData = AmCharts.loadJSON('ambildatariwayatperforma');
							chart.dataProvider = chartData;				
							chart.validateData();
							chart.write("grafik");
						}
				});
			}
			
			function tampilkanArus(){				                	
					
				if(document.getElementById("panel-arus").checked == true){
					// GRAPH
					// GRAPH
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "line"; // try to change it to "column"                
                graph1.valueField = "arus";
                graph1.lineAlpha = 1;
                graph1.lineColor = "rgb(1,86,150)";
                graph1.fillAlphas = 0.3;				
                chart.addGraph(graph1);                					
                	
					//chart.addGraph(graph1);
				}
				else if(document.getElementById("panel-arus").checked == false){
					var graph2 = chart.graphs.pop();
					chart.removeGraph(graph2);
				}
			}
			
			function tampilkanTegangan(){				                	
					
				if(document.getElementById("panel-tegangan").checked == true){
					// GRAPH
					// GRAPH
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "line"; // try to change it to "column"                
                graph1.valueField = "tegangan";
                graph1.lineAlpha = 1;
                graph1.lineColor = "rgb(1,86,150)";
                graph1.fillAlphas = 0.3;				
                chart.addGraph(graph1);                					
                	
					//chart.addGraph(graph1);
				}
				else if(document.getElementById("panel-tegangan").checked == false){
					var graph3 = chart.graphs.pop();
					chart.removeGraph(graph3);
				}
			}
			
			function tampilkanTemperature(){				                	
					
				if(document.getElementById("panel-temperatur").checked == true){
					// GRAPH
					// GRAPH
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "line"; // try to change it to "column"                
                graph1.valueField = "temperature";
                graph1.lineAlpha = 1;
                graph1.lineColor = "rgb(1,86,150)";
                graph1.fillAlphas = 0.3;				
                chart.addGraph(graph1);                					
                	
					//chart.addGraph(graph1);
				}
				else if(document.getElementById("panel-temperatur").checked == false){
					var graph3 = chart.graphs.pop();
					chart.removeGraph(graph3);
				}
			}
			
			function tampilkanIradiasi(){				                	
					
				if(document.getElementById("panel-iradiasi").checked == true){
					// GRAPH
					// GRAPH
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "line"; // try to change it to "column"                
                graph1.valueField = "irradiasi";
                graph1.lineAlpha = 1;
                graph1.lineColor = "rgb(1,86,150)";
                graph1.fillAlphas = 0.3;				
                chart.addGraph(graph1);                					
                	
					//chart.addGraph(graph1);
				}
				else if(document.getElementById("panel-iradiasi").checked == false){
					var graph3 = chart.graphs.pop();
					chart.removeGraph(graph3);
				}
			}
			
			function tampilkanDayaIn(){				                	
					
				if(document.getElementById("panel-dayain").checked == true){
					// GRAPH
					// GRAPH
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "line"; // try to change it to "column"                
                graph1.valueField = "dayain";
                graph1.lineAlpha = 1;
                graph1.lineColor = "rgb(1,86,150)";
                graph1.fillAlphas = 0.3;				
                chart.addGraph(graph1);                					
                	
					//chart.addGraph(graph1);
				}
				else if(document.getElementById("panel-dayain").checked == false){
					var graph3 = chart.graphs.pop();
					chart.removeGraph(graph3);
				}
			}
			
			function tampilkanDayaHasil(){				                	
					
				if(document.getElementById("panel-dayahasil").checked == true){
					// GRAPH
					// GRAPH
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "line"; // try to change it to "column"                
                graph1.valueField = "dayahasil";
                graph1.lineAlpha = 1;
                graph1.lineColor = "rgb(1,86,150)";
                graph1.fillAlphas = 0.3;				
                chart.addGraph(graph1);                					
                	
					//chart.addGraph(graph1);
				}
				else if(document.getElementById("panel-dayahasil").checked == false){
					var graph3 = chart.graphs.pop();
					chart.removeGraph(graph3);
				}
			}
			
			function tampilkanEfisiensi(){				                	
					
				if(document.getElementById("panel-efisiensi").checked == true){
					// GRAPH
					// GRAPH
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "line"; // try to change it to "column"                
                graph1.valueField = "efisiensi";
                graph1.lineAlpha = 1;
                graph1.lineColor = "rgb(1,86,150)";
                graph1.fillAlphas = 0.3;				
                chart.addGraph(graph1);                					
                	
					//chart.addGraph(graph1);
				}
				else if(document.getElementById("panel-efisiensi").checked == false){
					var graph3 = chart.graphs.pop();
					chart.removeGraph(graph3);
				}
			}
			
			function tampilkanEnergi(){				                	
					
				if(document.getElementById("panel-energi").checked == true){
					// GRAPH
					// GRAPH
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "line"; // try to change it to "column"                
                graph1.valueField = "energi";
                graph1.lineAlpha = 1;
                graph1.lineColor = "rgb(1,86,150)";
                graph1.fillAlphas = 0.3;				
                chart.addGraph(graph1);                					
                	
					//chart.addGraph(graph1);
				}
				else if(document.getElementById("panel-energi").checked == false){
					var graph3 = chart.graphs.pop();
					chart.removeGraph(graph3);
				}
			}
			
			var chart;			
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

                											

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorPosition = "mouse";
                chartCursor.categoryBalloonDateFormat = "JJ:NN:SS, DD MMMM YYYY";
                chart.addChartCursor(chartCursor);								
			});
			
			function aktifkan(jenis){
			if(jenis == "energi"){
				document.getElementById("panel-arus").disabled= true;
				document.getElementById("panel-tegangan").disabled= true;
				document.getElementById("panel-temperatur").disabled= true;
				document.getElementById("panel-iradiasi").disabled= true;
				document.getElementById("panel-dayain").disabled= true;
				document.getElementById("panel-dayahasil").disabled= true;
				document.getElementById("panel-efisiensi").disabled= true;
				document.getElementById("panel-energi").disabled= false;
				document.getElementById("panel-dayarerata").disabled= false;				
			}
			else if(jenis == "performa"){
				document.getElementById("panel-arus").disabled= false;
				document.getElementById("panel-tegangan").disabled= false;
				document.getElementById("panel-temperatur").disabled= false;
				document.getElementById("panel-iradiasi").disabled= false;
				document.getElementById("panel-dayain").disabled= false;
				document.getElementById("panel-dayahasil").disabled= false;
				document.getElementById("panel-efisiensi").disabled= false;
				document.getElementById("panel-energi").disabled= true;
				document.getElementById("panel-dayarerata").disabled= true;
			}			
		}
			
			// Fungsi mendapatkan data pengukuran string-n
			function muatString(nilai){
				setString(nilai);
				/*var url;
				switch(state){
					case 0:
						url = "dashboard";
						break;
					case 1:
						url = "riwayat";
						break;
					case 2:
						url = "pengaturan";
						break;
				};													
				request(url+"/ambilDataHariIni/"+nilai, function(){
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
						document.getElementById("main-content").innerHTML=xmlhttp.responseText;
						document.getElementById("stringke").innerHTML=": "+nilai;
						document.getElementById("judul-content").innerHTML="RINGKASAN STRING "+nilai;
						if(url == "dashboard"){
							chartData = AmCharts.loadJSON('dashboardhariini/muat/'+nilai);
							chart1.dataProvider = chartData;				
							chart1.validateData();
							chart1.write("grafik-hari-ini");
							chartData = AmCharts.loadJSON('dashboardbulanini/muat/'+nilai);
							chart2.dataProvider = chartData;				
							chart2.validateData();
							chart2.write("grafik-bulan-ini");
							chartData = AmCharts.loadJSON('dashboardlifetime/muat/'+nilai);
							chart3.dataProvider = chartData;				
							chart3.validateData();
							chart3.write("grafik-realtime");
						}
					}
				});*/
								
			}
			
			function muatRingkasan(){
				setState(0);
				muatData();
			}
			
			function muatRiwayat(){
				setState(1);
				muatData();
			}
			
			
	</script>    		
        <ul>
        	<li onClick="muatRingkasan()"><a href="#">Ringkasan</a></li>
            <li onClick="muatRiwayat()"><a href="#">Riwayat</a></li>
            <li><a href="#">Pengaturan</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pilih String <span class="caret"></span></a>
            	<ul class="dropdown-menu">                	
                	<?php
						$state = $this->session->userdata('state');
						for($i=1; $i<=$jumlahstring; $i++){
							echo '<li onClick="muatString('.$i.')"><a href="#"> String '.$i.'</a></li>';
						}
					?>  				
  				</ul>            	
            </li>
        </ul>
        
   
</body>
</html>
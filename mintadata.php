<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	class MintaData extends CI_Controller{
		public function __construct(){
			parent::__construct();
			//$this->load->library('Csvimport');												
		}
		
		public function index(){
			$tanggal;
			$query = $this->db->query('select * from stats_sukatman_string1 order by waktu desc limit 1');
			foreach($query->result_array() as $row){
				$tanggal = $row['waktu'];
			}
			$tanggals = array();
			$tanggals = explode("-", $tanggal);
			//$tanggal = $tanggals[2].$tanggals[1].$tanggals[0];
			$tanggal = '24062015';
			$tanggalTime = $tanggals[0].'-'.$tanggals[1].'-'.$tanggals[2];
			$date = date_create($tanggalTime);									
			$tanggalTime2 = date_add($date,date_interval_create_from_date_string("1 day"));
			$tanggalTime3 = $tanggalTime2->format("dmY");			
			
			$string = file_get_contents('http://192.168.0.103/?tanggal='.$tanggal);
						
			$i=0;			
			$lines = explode(PHP_EOL, $string);
			$array = array();
			$data = array();
			foreach ($lines as $line) {
    			$array[] = str_getcsv($line);
				$i++;				
			}
			for($j=1; $j<$i; $j++){
				echo $data[0];
				echo "<br>";
				echo $data[1];
				echo "<br>";
				echo $data[2];
				echo "<br>";
				echo $data[3];
				echo "<br>";
				echo $data[4];
				echo "<br>";
				echo $data[5];
				echo "<br>";
				$data = explode(";" , $array[$j][0]);
				$dTc = 1.289*1.38066*pow(10,-23)*$data[4]/1.60218*pow(10,-19);
				$Vmp = 16.5 + 0.004416*36*$dTc*log(($data[3]/1000),2.7183)-75.891*36*pow($dTc*log(($data[3]/1000),2.7183),2);
				$Imp = 3.34*(1.02*($data[3]/1000) - 0.02*pow($data[3]/1000,2))*(1-0.00014*($data[4]-25));
				$dayain = $Imp*$Vmp;
				$daya = $data[1]*$data[2];
				$efisiensi = $daya/$dayain;
				if($efisiensi < 70){
					$status = "tidak normal";
				}
				else
					$status = "normal";
				$dataMentah = array(
					'waktu' => $data[0],
					'arus' => $data[1],
					'tegangan' => $data[2],
					'irradiasi' => $data[3],
					'temperature' => $data[4],
					'dayahasil' => $data[5],
					'dayain' => $dayain,
					'efisiensi' => $efisiensi,
					'status' => $status
				);				
				$query = $this->db->query('select * from pengukuran_sukatman_string1 where waktu = "'.$data[0].'"');
				if($query->num_rows()==0){
					$this->db->insert('pengukuran_sukatman_string1', $dataMentah);
				};
			}
			/*
			$hariIni = date('Y-m-d');
			$data1 = explode("-",$hariIni);
            $tanggal_1 = $data1[2];         
            $bulan_1 = $data1[1];          
            $tahun_1 = $data1[0];         
            
			$tanggalTerakhir = $tanggalTime2->format("Y-m-d");           
            $data2 = explode("-",$tanggalTerakhir);
            $tanggal_2 = $data2[2];        
            $bulan_2 = $data2[1];           
            $tahun_2 = $data2[0];          
                       
            $dari = GregorianToJD ($bulan_1,$tanggal_1,$tahun_1);
            $hingga = GregorianToJD ($bulan_2,$tanggal_2,$tahun_2);
			
			$selisih = $dari - $hingga;
			
			if($selisih <= 0){
				
			}*/
		}
				
	}

?>
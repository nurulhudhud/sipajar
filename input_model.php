<?php
	class Input_model extends CI_Model{
		public function inputData($username, $string, $tanggal, $jam, $arus, $tegangan, $temperatur, $iradiasi, $dayaRerata){
			$waktu = $tanggal." ".$jam;			
			$dTc = 1.289*1.38066*pow(10,-23)*$temperatur/1.60218*pow(10,-19);
				$Vmp = 16.5 + 0.004416*36*$dTc*log(($iradiasi/1000),2.7183)-75.891*36*pow($dTc*log(($iradiasi/1000),2.7183),2)-0.076*($temperatur-25);
				$Imp = 3.34*(1.02*($iradiasi/1000) - 0.02*pow($iradiasi/1000,2))*(1-0.00014*($temperatur-25));
				$dayain = $Imp*$Vmp;
				$daya = $arus*$tegangan;
				$efisiensi = $daya/$dayain;
				if($efisiensi < 70){
					$status = "tidak normal";
				}
				else
					$status = "normal";
				$dataMentah = array(
					'waktu' => $waktu,
					'arus' => $arus,
					'tegangan' => $tegangan,
					'irradiasi' => $iradiasi,
					'temperature' => $temperatur,
					'dayahasil' => $dayaRerata,
					'dayain' => $dayain,
					'efisiensi' => $efisiensi,
					'status' => $status
				);
			
			$this->db->insert('pengukuran_'.$username.'_string'.$string, $dataMentah);
		}
		
		public function rekapHarian($username, $string){
			$hariIni = date('Y-m-d');
			$hariTerakhir;
			// cek apakah tabel masih kosong ? jika masih kosong, langsung cari data hari ini
			$query = $this->db->query('select * from stats_'.$username.'_string'.$string.'" order by waktu desc limit 1');
			if($query->num_rows() == 0)
				rekap($username, $string);
			else if($query->num_rows()>0){
				// cek data terakhir tanggal berapa ?
				foreach ($query->result_array() as $row){
					$hariTerakhir = $row['waktu'];											
				}
				// dapatkan selisih harinya
				$data1 = explode("-",$hariIni);
            	$tanggal_1 = $data1[2];         
            	$bulan_1 = $data1[1];          
            	$tahun_1 = $data1[0];         
                       
            	$data2 = explode("-",$hariTerakhir);
            	$tanggal_2 = $data2[2];        
            	$bulan_2 = $data2[1];           
            	$tahun_2 = $data2[0];          
                       
            	$dari = GregorianToJD ($bulan_1,$tanggal_1,$tahun_1);
            	$hingga = GregorianToJD ($bulan_2,$tanggal_2,$tahun_2);
			
				$selisih = $dari - $hingga;
				
				// cari data pengukuran pada tabel pengukuran pada tanggal itu, kemudian lakukan rekapitulasi
				for($i=0; $i <= $selisih; $i++){
					$batas = date('Y-m-d', strtotime('+'.$i.'days', strtotime($hariTerakhir)));
					$query = $this->db->query('select * from pengukuran_'.$username.'_string'.$string.'" where waktu date(waktu) = "'.$batas.'"');
					// rekapitulasi dilakukan jika ada data
					if($query->num_rows()>0)
						rekap($username, $string, $batas);
				}
			}											
		}
			
		function rekap($username, $string, $waktu){
				$dataHariIni = array(
				'waktu' => $waktu,
				'arusMax' => '',
				'arusMin' => '',
				'arusRerata' => '',
				'teganganMax' => '',
				'teganganMin' => '',
				'teganganRerata' => '',
				'temperaturMax' => '',
				'temperaturMin' => '',
				'temperaturRerata' => '',
				'iradiasiMax' => '',
				'iradiasiMin' => '',
				'iradiasiRerata' => '',
				'dayainMax' => '',
				'dayainMin' => '',
				'dayainRerata' => '',
				'dayahasilMax' => '',
				'dayahasilMin' => '',
				'dayahasilRerata' => '',
				'efisiensiMax' => '',
				'efisiensiMin' => '',
				'efisiensiRerata' => '',
				'jumlahEnergi' => '',
			);
			$waktuAwal = date($waktu." 06:00:00"); // ("y-m-d 06:00:00")
			$waktuAkhir = date($waktu." 18:00:00"); // ("y-m-d 18:00:00")			
			$query = $this->db->query('select max(arus), min(arus), avg(arus),
												max(tegangan), min(tegangan), avg(tegangan),
												max(temperature), min(temperature), avg(temperature),
												max(irradiasi), min(irradiasi), avg(irradiasi),
												max(dayain), min(dayain), avg(dayain),
												max(dayahasil), min(dayahasil), avg(dayahasil),
												max(efisiensi), min(efisiensi), avg(efisiensi)
												 from pengukuran_'.$username.'_string'.$string.' where waktu between "'.$waktuAwal.'" and "'.$waktuAkhir.'"');
			foreach ($query->result_array() as $row){
				$dataHariIni['arusMax'] = $row['max(arus)'];
				$dataHariIni['arusMin'] = $row['min(arus)'];
				$dataHariIni['arusRerata'] = $row['avg(arus)'];
				$dataHariIni['teganganMax'] = $row['max(tegangan)'];
				$dataHariIni['teganganMin'] = $row['min(tegangan)'];
				$dataHariIni['teganganRerata'] = $row['avg(tegangan)'];
				$dataHariIni['temperaturMax'] = $row['max(temperature)'];
				$dataHariIni['temperaturMin'] = $row['min(temperature)'];
				$dataHariIni['temperaturRerata'] = $row['avg(temperature)'];
				$dataHariIni['iradiasiMax'] = $row['max(irradiasi)'];
				$dataHariIni['iradiasiMin'] = $row['min(irradiasi)'];
				$dataHariIni['iradiasiRerata'] = $row['avg(irradiasi)'];
				$dataHariIni['dayainMax'] = $row['max(dayain)'];
				$dataHariIni['dayainMin'] = $row['min(dayain)'];
				$dataHariIni['dayainRerata'] = $row['avg(dayain)'];
				$dataHariIni['dayahasilMax'] = $row['max(dayahasil)'];
				$dataHariIni['dayahasilMin'] = $row['min(dayahasil)'];
				$dataHariIni['dayahasilRerata'] = $row['avg(dayahasil)'];
				$dataHariIni['efisiensiMax'] = $row['max(efisiensi)'];
				$dataHariIni['efisiensiMin'] = $row['min(efisiensi)'];
				$dataHariIni['efisiensiRerata'] = $row['avg(efisiensi)'];						
			}
			$query = $this->db->query('select * from pengukuran_'.$username.'_string'.$string.' where waktu between "'.$waktuAwal.'" and "'.$waktuAkhir.'" order by waktu desc limit 1');
			foreach($query->result_array() as $row){
				$waktuTerakhir = $row['waktu'];
			}			
			$to_time = strtotime($waktuTerakhir);
			$from_time = strtotime($waktuAwal);
			$interval = round(abs($to_time - $from_time) / 3600);
			$dataHariIni['jumlahEnergi'] = $dataHariIni['dayahasilRerata']*$interval;
			
			$this->db->insert('stats_'.$username.'_string'.$string, $dataHariIni);
		}
	}
?>
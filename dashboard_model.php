<?php
	class Dashboard_model extends CI_Model{
		
		public function ambilDataProfil($username){
			$dataProfil = array(
					'lokasi' => '',
					'jumlahstring' => '',
					'username' => $username,
				);
			$query = $this->db->query('select * from user where username="'.$username.'"');
			foreach ($query->result_array() as $row){
				$dataProfil['lokasi'] = $row['lokasi'];
				$dataProfil['jumlahstring'] = $row['jumlahstring'];
			}
			return $dataProfil;
		}
		
		public function ambilDataStatus($username, $string){
			$dataStatus = array(
				'arus' => '',
				'tegangan' => '',
				'temperatur' => '',
				'iradiasi' => '',
				'dayaIn' => '',
				'dayaHasil' => '',
				'efisiensi' => '',
				'status'=>'',
				'waktu' =>'',
			);
			date_default_timezone_set("Asia/Jakarta");
			$waktuAwal = date("2015-05-28 06:00:00");
			$waktuAkhir = date("2015-05-28 18:00:00");
			$query = $this->db->query('select * from pengukuran_'.$username.'_string'.$string.' where waktu between "'.$waktuAwal.'" and "'.$waktuAkhir.'" order by waktu desc limit 1');
			foreach ($query->result_array() as $row){
				$dataStatus['arus'] = $row['arus'];
				$dataStatus['tegangan'] = $row['tegangan'];
				$dataStatus['temperatur'] = $row['temperature'];
				$dataStatus['iradiasi'] = $row['irradiasi'];
				$dataStatus['dayaIn'] = $row['dayain'];
				$dataStatus['dayaHasil'] = $row['dayahasil'];
				$dataStatus['efisiensi'] = $row['efisiensi'];
				$dataStatus['status'] = $row['status'];	
				$dataStatus['waktu'] = $row['waktu'];							
			}
			return $dataStatus;
		}
		
		public function ambilDataHariIni($username, $string){
			$dataHariIni = array(
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
			$waktuAwal = date("2015-05-28 06:00:00");
			$waktuAkhir = date("2015-05-28 18:00:00");			
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
			return $dataHariIni;	
		}
		
		public function ambilDataBulanIni($username, $string){
			$dataBulanIni = array(
				'arusBulanMax' => '',
				'arusBulanMin' => '',
				'arusBulanRerata' => '',
				'teganganBulanMax' => '',
				'teganganBulanMin' => '',
				'teganganBulanRerata' => '',
				'temperaturBulanMax' => '',
				'temperaturBulanMin' => '',
				'temperaturBulanRerata' => '',
				'iradiasiBulanMax' => '',
				'iradiasiBulanMin' => '',
				'iradiasiBulanRerata' => '',
				'dayainBulanMax' => '',
				'dayainBulanMin' => '',
				'dayainBulanRerata' => '',
				'dayahasilBulanMax' => '',
				'dayahasilBulanMin' => '',
				'dayahasilBulanRerata' => '',
				'efisiensiBulanMax' => '',
				'efisiensiBulanMin' => '',
				'efisiensiBulanRerata' => '',
				'jumlahEnergiBulan' => '',
			);
			$bulan = date("m");
			$query = $this->db->query('select max(arusMax), min(arusMin), avg(arusRerata),
												max(teganganMax), min(teganganMin), avg(teganganRerata),
												max(temperatureMax), min(temperatureMin), avg(temperatureRerata),
												max(irradiasiMax), min(irradiasiMin), avg(irradiasiRerata),
												max(dayaInMax), min(dayaInMin), avg(dayaInRerata),
												max(dayaHasilMax), min(dayaHasilMin), avg(dayaHasilRerata),
												max(efisiensiMax), min(efisiensiMin), avg(efisiensiRerata),
												sum(energi)
												 from stats_'.$username.'_string'.$string.' where month(waktu) ="'.$bulan.'"');
			foreach ($query->result_array() as $row){
				$dataBulanIni['arusBulanMax'] = $row['max(arusMax)'];
				$dataBulanIni['arusBulanMin'] = $row['min(arusMin)'];
				$dataBulanIni['arusBulanRerata'] = $row['avg(arusRerata)'];
				$dataBulanIni['teganganBulanMax'] = $row['max(teganganMax)'];
				$dataBulanIni['teganganBulanMin'] = $row['min(teganganMin)'];
				$dataBulanIni['teganganBulanRerata'] = $row['avg(teganganRerata)'];
				$dataBulanIni['temperaturBulanMax'] = $row['max(temperatureMax)'];
				$dataBulanIni['temperaturBulanMin'] = $row['min(temperatureMin)'];
				$dataBulanIni['temperaturBulanRerata'] = $row['avg(temperatureRerata)'];
				$dataBulanIni['iradiasiBulanMax'] = $row['max(irradiasiMax)'];
				$dataBulanIni['iradiasiBulanMin'] = $row['min(irradiasiMin)'];
				$dataBulanIni['iradiasiBulanRerata'] = $row['avg(irradiasiRerata)'];
				$dataBulanIni['dayainBulanMax'] = $row['max(dayaInMax)'];
				$dataBulanIni['dayainBulanMin'] = $row['min(dayaInMin)'];
				$dataBulanIni['dayainBulanRerata'] = $row['avg(dayaInRerata)'];
				$dataBulanIni['dayahasilBulanMax'] = $row['max(dayaHasilMax)'];
				$dataBulanIni['dayahasilBulanMin'] = $row['min(dayaHasilMin)'];
				$dataBulanIni['dayahasilBulanRerata'] = $row['avg(dayaHasilRerata)'];
				$dataBulanIni['efisiensiBulanMax'] = $row['max(efisiensiMax)'];
				$dataBulanIni['efisiensiBulanMin'] = $row['min(efisiensiMin)'];
				$dataBulanIni['efisiensiBulanRerata'] = $row['avg(efisiensiRerata)'];
				$dataBulanIni['jumlahEnergiBulan'] = $row['sum(energi)'];						
			}
			
			return $dataBulanIni;
		}
		
		public function ambilDataLifeTime($username, $string){
			$dataLifeTime = array(
				'arusLifeTimeMax' => '',
				'arusLifeTimeMin' => '',
				'arusLifeTimeRerata' => '',
				'teganganLifeTimeMax' => '',
				'teganganLifeTimeMin' => '',
				'teganganLifeTimeRerata' => '',
				'temperaturLifeTimeMax' => '',
				'temperaturLifeTimeMin' => '',
				'temperaturLifeTimeRerata' => '',
				'iradiasiLifeTimeMax' => '',
				'iradiasiLifeTimeMin' => '',
				'iradiasiLifeTimeRerata' => '',
				'dayainLifeTimeMax' => '',
				'dayainLifeTimeMin' => '',
				'dayainLifeTimeRerata' => '',
				'dayahasilLifeTimeMax' => '',
				'dayahasilLifeTimeMin' => '',
				'dayahasilLifeTimeRerata' => '',
				'efisiensiLifeTimeMax' => '',
				'efisiensiLifeTimeMin' => '',
				'efisiensiLifeTimeRerata' => '',
				'jumlahEnergiLifeTime' => '',
			);
			
			$query = $this->db->query('select max(arusMax), min(arusMin), avg(arusRerata),
												max(teganganMax), min(teganganMin), avg(teganganRerata),
												max(temperatureMax), min(temperatureMin), avg(temperatureRerata),
												max(irradiasiMax), min(irradiasiMin), avg(irradiasiRerata),
												max(dayaInMax), min(dayaInMin), avg(dayaInRerata),
												max(dayaHasilMax), min(dayaHasilMin), avg(dayaHasilRerata),
												max(efisiensiMax), min(efisiensiMin), avg(efisiensiRerata),
												sum(energi)
												from stats_'.$username.'_string'.$string);
			foreach ($query->result_array() as $row){
				$dataLifeTime['arusLifeTimeMax'] = $row['max(arusMax)'];
				$dataLifeTime['arusLifeTimeMin'] = $row['min(arusMin)'];
				$dataLifeTime['arusLifeTimeRerata'] = $row['avg(arusRerata)'];
				$dataLifeTime['teganganLifeTimeMax'] = $row['max(teganganMax)'];
				$dataLifeTime['teganganLifeTimeMin'] = $row['min(teganganMin)'];
				$dataLifeTime['teganganLifeTimeRerata'] = $row['avg(teganganRerata)'];
				$dataLifeTime['temperaturLifeTimeMax'] = $row['max(temperatureMax)'];
				$dataLifeTime['temperaturLifeTimeMin'] = $row['min(temperatureMin)'];
				$dataLifeTime['temperaturLifeTimeRerata'] = $row['avg(temperatureRerata)'];
				$dataLifeTime['iradiasiLifeTimeMax'] = $row['max(irradiasiMax)'];
				$dataLifeTime['iradiasiLifeTimeMin'] = $row['min(irradiasiMin)'];
				$dataLifeTime['iradiasiLifeTimeRerata'] = $row['avg(irradiasiRerata)'];
				$dataLifeTime['dayainLifeTimeMax'] = $row['max(dayaInMax)'];
				$dataLifeTime['dayainLifeTimeMin'] = $row['min(dayaInMin)'];
				$dataLifeTime['dayainLifeTimeRerata'] = $row['avg(dayaInRerata)'];
				$dataLifeTime['dayahasilLifeTimeMax'] = $row['max(dayaHasilMax)'];
				$dataLifeTime['dayahasilLifeTimeMin'] = $row['min(dayaHasilMin)'];
				$dataLifeTime['dayahasilLifeTimeRerata'] = $row['avg(dayaHasilRerata)'];
				$dataLifeTime['efisiensiLifeTimeMax'] = $row['max(efisiensiMax)'];
				$dataBulanIni['efisiensiLifeTimeMin'] = $row['min(efisiensiMin)'];
				$dataLifeTime['efisiensiLifeTimeRerata'] = $row['avg(efisiensiRerata)'];
				$dataLifeTime['jumlahEnergiLifeTime'] = $row['sum(energi)'];						
			}			
			
			return $dataLifeTime;
		}
	}
?>
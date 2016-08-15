<?php
	class DashboardHariIni_model extends CI_Model{
		public $dataBulanIni = array(
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
		
		public function ambilDataHariIni($username, $string){			
			$waktuAwal = date("2015-05-28 06:00:00");
			$waktuAkhir = date("2015-05-28 18:00:00");			
			$query = $this->db->query('select * from pengukuran_'.$username.'_string'.$string.' where waktu between "'.$waktuAwal.'" and "'.$waktuAkhir.'"');
			return $query->result_array();				
		}
		
		public function ambilDataBulanIni($username, $string){			
			$bulan = date("m");
			$bulan = "5";			
			$query = $this->db->query('select * from pengukuran_'.$username.'_string'.$string.' where month(waktu) = "'.$bulan.'"');
			return $query->result_array();				
		}
		
		public function ambilDataLifeTime($username, $string){								
			$query = $this->db->query('select * from stats_'.$username.'_string'.$string);
			return $query->result_array();				
		}
		
		public function ambilDataRiwayatEnergi($username, $string, $tanggalAwal, $tanggalAkhir){
			$query = $this->db->query('select * from stats_'.$username.'_string'.$string.' where waktu between "'.$tanggalAwal.'" and "'.$tanggalAkhir.'"');
			return $query->result_array();
		}
		
		public function ambilStatsRiwayatEnergi($username, $string, $tanggalAwal, $tanggalAkhir){
			$query = $this->db->query('select max(arusMax), min(arusMin), avg(arusRerata),
												max(teganganMax), min(teganganMin), avg(teganganRerata),
												max(temperatureMax), min(temperatureMin), avg(temperatureRerata),
												max(irradiasiMax), min(irradiasiMin), avg(irradiasiRerata),
												max(dayaInMax), min(dayaInMin), avg(dayaInRerata),
												max(dayaHasilMax), min(dayaHasilMin), avg(dayaHasilRerata),
												max(efisiensiMax), min(efisiensiMin), avg(efisiensiRerata),
												sum(energi)
												from stats_'.$username.'_string'.$string.' where waktu between "'.$tanggalAwal.'" and "'.$tanggalAkhir.'"');
			foreach ($query->result_array() as $row){
				$dataBulanIni['arusMax'] = $row['max(arusMax)'];
				$dataBulanIni['arusMin'] = $row['min(arusMin)'];
				$dataBulanIni['arusRerata'] = $row['avg(arusRerata)'];
				$dataBulanIni['teganganMax'] = $row['max(teganganMax)'];
				$dataBulanIni['teganganMin'] = $row['min(teganganMin)'];
				$dataBulanIni['teganganRerata'] = $row['avg(teganganRerata)'];
				$dataBulanIni['temperaturMax'] = $row['max(temperatureMax)'];
				$dataBulanIni['temperaturMin'] = $row['min(temperatureMin)'];
				$dataBulanIni['temperaturRerata'] = $row['avg(temperatureRerata)'];
				$dataBulanIni['iradiasiMax'] = $row['max(irradiasiMax)'];
				$dataBulanIni['iradiasiMin'] = $row['min(irradiasiMin)'];
				$dataBulanIni['iradiasiRerata'] = $row['avg(irradiasiRerata)'];
				$dataBulanIni['dayainMax'] = $row['max(dayaInMax)'];
				$dataBulanIni['dayainMin'] = $row['min(dayaInMin)'];
				$dataBulanIni['dayainRerata'] = $row['avg(dayaInRerata)'];
				$dataBulanIni['dayahasilMax'] = $row['max(dayaHasilMax)'];
				$dataBulanIni['dayahasilMin'] = $row['min(dayaHasilMin)'];
				$dataBulanIni['dayahasilRerata'] = $row['avg(dayaHasilRerata)'];
				$dataBulanIni['efisiensiMax'] = $row['max(efisiensiMax)'];
				$dataBulanIni['efisiensiMin'] = $row['min(efisiensiMin)'];
				$dataBulanIni['efisiensiRerata'] = $row['avg(efisiensiRerata)'];
				$dataBulanIni['jumlahEnergi'] = $row['sum(energi)'];						
			}
			return $dataBulanIni;
		}
		
		public function ambilDataRiwayatPerforma($username, $string, $tanggalAwal, $tanggalAkhir){			
			$query = $this->db->query('select * from pengukuran_'.$username.'_string'.$string.' where waktu between "'.$tanggalAwal.' 06:00:00" and "'.$tanggalAkhir.' 18:00:00"');
			return $query->result_array();
		}
		
		public function ambilStatsRiwayatPerforma($username, $string, $tanggalAwal, $tanggalAkhir){
			$query = $this->db->query('select max(arus), min(arus), avg(arus),
												max(tegangan), min(tegangan), avg(tegangan),
												max(temperature), min(temperature), avg(temperature),
												max(irradiasi), min(irradiasi), avg(irradiasi),
												max(dayain), min(dayain), avg(dayain),
												max(dayahasil), min(dayahasil), avg(dayahasil),
												max(efisiensi), min(efisiensi), avg(efisiensi)
												from pengukuran_'.$username.'_string'.$string.' where waktu between "'.$tanggalAwal.'" and "'.$tanggalAkhir.'"');
			foreach ($query->result_array() as $row){
				$dataBulanIni['arusMax'] = $row['max(arus)'];
				$dataBulanIni['arusMin'] = $row['min(arus)'];
				$dataBulanIni['arusRerata'] = $row['avg(arus)'];
				$dataBulanIni['teganganMax'] = $row['max(tegangan)'];
				$dataBulanIni['teganganMin'] = $row['min(tegangan)'];
				$dataBulanIni['teganganRerata'] = $row['avg(tegangan)'];
				$dataBulanIni['temperaturMax'] = $row['max(temperature)'];
				$dataBulanIni['temperaturMin'] = $row['min(temperature)'];
				$dataBulanIni['temperaturRerata'] = $row['avg(temperature)'];
				$dataBulanIni['iradiasiMax'] = $row['max(irradiasi)'];
				$dataBulanIni['iradiasiMin'] = $row['min(irradiasi)'];
				$dataBulanIni['iradiasiRerata'] = $row['avg(irradiasi)'];
				$dataBulanIni['dayainMax'] = $row['max(dayain)'];
				$dataBulanIni['dayainMin'] = $row['min(dayain)'];
				$dataBulanIni['dayainRerata'] = $row['avg(dayain)'];
				$dataBulanIni['dayahasilMax'] = $row['max(dayahasil)'];
				$dataBulanIni['dayahasilMin'] = $row['min(dayahasil)'];
				$dataBulanIni['dayahasilRerata'] = $row['avg(dayahasil)'];
				$dataBulanIni['efisiensiMax'] = $row['max(efisiensi)'];
				$dataBulanIni['efisiensiMin'] = $row['min(efisiensi)'];
				$dataBulanIni['efisiensiRerata'] = $row['avg(efisiensi)'];						
			}
			return $dataBulanIni;
		}
	}
?>
<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	class Riwayat extends CI_Controller{
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
		
		public function __construct(){
			parent::__construct();
			$this->load->model('DashboardHariIni_model', 'dashboard', TRUE);												
		}
		
		public function index(){
			if(!$this->session->userdata('login')){
				return;
			}
			$tanggalAwal = "2015-05-28 06:00:00";
			$tanggalAkhir = "2015-05-28 18:00:00";
			$this->dataBulanIni = $this->dashboard->ambilStatsRiwayatPerforma($this->session->userdata('username'), 1, $tanggalAwal, $tanggalAkhir);			
			$this->load->view('tampilan-riwayat', $this->dataBulanIni);
		}
		
		public function ambilStatsRiwayatPerforma($string, $tanggalAwal, $tanggalAkhir){
			//$tanggalAwal = $tanggalAwal+" 06:00:00";
			//$tanggalAkhir = $tanggalAkhir+" 18:00:00";
			$this->dataBulanIni = $this->dashboard->ambilStatsRiwayatPerforma($this->session->userdata('username'), $string, $tanggalAwal, $tanggalAkhir);
			$this->load->view('tampilan-riwayat', $this->dataBulanIni);
		}
				
	}

?>
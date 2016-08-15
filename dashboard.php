<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller{
		public $dataProfil = array(
					'lokasi' => '',
					'jumlahstring' => '',
				);
		
		public $dataStatus = array(
				'arus' => '',
				'tegangan' => '',
				'temperatur' => '',
				'iradiasi' => '',
				'dayaIn' => '',
				'dayaHasil' => '',
				'efisiensi' => '',
			);
			
		public $dataHariIni = array(
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
			
		public $dataBulanIni = array(
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
			
		public $dataLifeTime = array(
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
				
		public function __construct(){
			parent::__construct();
			$this->load->model('Dashboard_model', 'dashboard', TRUE);	
		}
		
		public function index($string = 1){
			if(!$this->session->userdata('login')){
				return;
			}
			$this->session->set_userdata('state','0');
			$this->session->set_userdata('string','1');
			$this->dataProfil = $this->dashboard->ambilDataProfil($this->session->userdata('username'));
			$this->dataStatus = $this->dashboard->ambilDataStatus($this->session->userdata('username'), $string);
			$this->dataHariIni = $this->dashboard->ambilDataHariIni($this->session->userdata('username'), $string);
			$this->dataBulanIni = $this->dashboard->ambilDataBulanIni($this->session->userdata('username'), $string);
			$this->dataLifeTime = $this->dashboard->ambilDataLifeTime($this->session->userdata('username'), $string);								
			$this->load->view('tampilan-dashboard', ($this->dataProfil + $this->dataStatus + $this->dataHariIni + $this->dataBulanIni + $this->dataLifeTime));									
		}
		
		public function ambilDataHariIni($string){
			if(!$this->session->userdata('login')){
				return;
			}
			$this->dataProfil = $this->dashboard->ambilDataProfil($this->session->userdata('username'));
			$this->dataStatus = $this->dashboard->ambilDataStatus($this->session->userdata('username'), $string);
			$this->dataHariIni = $this->dashboard->ambilDataHariIni($this->session->userdata('username'), $string);
			$this->dataBulanIni = $this->dashboard->ambilDataBulanIni($this->session->userdata('username'), $string);
			$this->dataLifeTime = $this->dashboard->ambilDataLifeTime($this->session->userdata('username'), $string);						
			$this->load->view('tampilan-ringkasan', ($this->dataProfil + $this->dataStatus + $this->dataHariIni + $this->dataBulanIni + $this->dataLifeTime));
		}
	}
?>
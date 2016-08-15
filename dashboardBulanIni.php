<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	class DashboardBulanIni extends CI_Controller{
		public function __construct(){
			parent::__construct();				
			$this->load->model('DashboardHariIni_model', 'dashboardHariIni', TRUE);					
		}
		
		public function index(){
			$data['json'] = $this->dashboardHariIni->ambilDataBulanIni($this->session->userdata('username'),1);
			$this->load->view('dashboardBulanIni', $data);
		}
		
		public function muat($string){
			$data['json'] = $this->dashboardHariIni->ambilDataBulanIni($this->session->userdata('username'),$string);
			$this->load->view('dashboardBulanIni', $data);
		}
	}

?>
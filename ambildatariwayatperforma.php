<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	class Ambildatariwayatperforma extends CI_Controller{
		public function __construct(){
			parent::__construct();				
			$this->load->model('DashboardHariIni_model', 'dashboardHariIni', TRUE);					
		}
		
		public function index(){			
			$data['json'] = $this->dashboardHariIni->ambilDataRiwayatPerforma($this->session->userdata('username'),1,"2015-05-28", "2015-05-28");
			$this->load->view('datastatsriwayat', $data);
		}
		
		public function muat($string){
			$data['json'] = $this->dashboardHariIni->ambilDataRiwayatPerforma($this->session->userdata('username'),$string);
			$this->load->view('datastatsriwayat', $data);
		}
	}

?>
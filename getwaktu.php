<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	class MintaData extends CI_Controller{
		public function __construct(){
			parent::__construct();
			//$this->load->library('Csvimport');												
		}
		
		public function index(){			
			echo file_get_contents("http://localhost/aplikasi-sipajar");
		}
				
	}

?>
<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
		
	class Input extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Input_model', 'inputModel', TRUE);					
		}
		
		public function index(){
			
		}
		
		public function inputData($username, $string, $tanggal, $jam, $arus, $tegangan, $temperatur, $iradiasi, $dayaRerata){
			$this->inputModel->inputData($username, $string, $tanggal, $jam, $arus, $tegangan, $temperatur, $iradiasi, $dayaRerata);
		}
	}
?>
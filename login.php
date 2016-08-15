<?php
	if(!defined('BASEPATH')){
		exit('No direct script access allowed');
	}
	
	class Login extends CI_Controller{
		public $data = array('pesan'=>'');
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('Model_login', 'login', TRUE);
		}
			public function index(){
				//cek apakah status user login = benar, jika iya pindah ke halaman dashboard
				if($this->session->userdata('login') == TRUE){
					redirect('dashboard');
				}
				//jika belum login, cek apakah dia akan login, validasi. jika sukses maka pindah ke halaman dashboard. jika gagal, tampilkan halaman login
				else{
					//validasi sukses
					if($this->login->validasi()){
						if($this->login->cek_user()){
							redirect('dashboard');
						}
						else{
							$this->data['pesan'] = 'Username / password salah';
							$this->load->view('tampilan_login', $this->data);
						}
					}
					else{
						$this->load->view('tampilan_login', $this->data);
					}
				}
			}
			
			public function logout(){
				$this->login->logout();
				redirect('login');
			}
	}
?>
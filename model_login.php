<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	class Model_login extends CI_Model{
		public $db_tabel = 'user';
		
		public function load_form_rules(){
			$form_rules = array(
							array(
								'field' => 'username',
								'label' => 'Username',
								'rules' => 'required'),
							array(
								'field' => 'password',
								'label' => 'Password',
								'rules' => 'required'),
								);
			return $form_rules;
		}
		
		public function validasi(){
			$form = $this->load_form_rules();
			$this->form_validation->set_rules($form);
			
			if($this->form_validation->run()){
				return true;
			}
			else
				return false;
		}
		
		public function cek_user(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$query = $this->db->where('username', $username)
								-> where('password', $password)
								-> limit(1)
								-> get($this->db_tabel);
			
			if($query->num_rows() == 1){				
				$data = array('username'=>$username, 'login'=>true);
				$this->session->set_userdata($data);
				return true;
			}
			else{
				return false;
			}
		}
		
		public function logout(){
			$this->session->unset_userdata(array('username'=>'', 'login'=>false));
			$this->session->sess_destroy();
		}
	}
?>
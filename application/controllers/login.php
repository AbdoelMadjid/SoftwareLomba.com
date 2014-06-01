<?php
	class Login extends CI_Controller{
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
		}
		
		public function index(){
			$data['message'] = "";
			$this->load->helper(array('form'));
			$this->load->view('adm/login', $data);
			
		}
		
		public function verify(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//query the database
			$result = $this->user_model->login($username, $password);
			
			if($result){
				$sess_array = array();
				$sess_array = array(
					'id' => $result->id_user,
					'username' => $result->user
				);
				$this->session->set_userdata('logged_in', $sess_array);
				redirect('');
			}
			else{
				$data['message'] = "<font color='red'>Login gagal</font>";
				$this->load->view('adm/login',$data);
			}
		}
		
		public function logout(){
			$this->session->sess_destroy();
			redirect('');
		}
		
	}
?>
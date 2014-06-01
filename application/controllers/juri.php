<?php
	class Juri extends CI_Controller{
	
		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('juri_model');
		}

		public function tambah($id_event){
			$user = $this->session->userdata('logged_in');
			if($user['username'] != "admin"){
				echo "bukan admin";
			} else {
				$data['username'] = $user['username'];
				$data['pengawas'] = $this->juri_model->tampil_jurinya($id_event, 1);
				$data['inspektur'] = $this->juri_model->tampil_jurinya($id_event, 2);
				$data['korlap'] = $this->juri_model->tampil_jurinya($id_event, 3);
				$data['juri'] = $this->juri_model->tampil_jurinya($id_event, 4);
				$this->load->view('templates/header');
				$this->load->view('adm/juri_add_view',$data);
			}

		}
		
		public function add(){
		$user = $this->session->userdata('logged_in');
			if($user['username'] == "admin")
				//tambahkan juri ke database
				$this->juri_model->add();
			redirect(base_url()."juri/tambah/".$this->input->post('id_event'));
		}
		
		public function edit(){
		$user = $this->session->userdata('logged_in');
			if($user['username'] == "admin" || $user['username'] == "operator"){
				$id = $this->input->post('pk');
				$value = $this->input->post('value');
				$this->juri_model->update($id, $value);
			}else{
					 header('HTTP 400 Bad Request', true, 400);
					 echo "This field is required!";
			}
		}
		
		
		
	}
?>
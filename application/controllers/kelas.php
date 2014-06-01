<?php
	class Kelas extends CI_Controller{
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('event_model');
			$this->load->model('kelas_model');
		}
		
		public function edit($id_event = false, $id_kelas = false){
			if($this->session->userdata('logged_in') != false){
				
				$data['kelas'] = $this->kelas_model->get_kelas($id_kelas);
					$data['id_event'] = $id_event;
					
					if($this->input->post('nama_kelas') != false){
						$this->kelas_model->update();
						redirect(base_url()."event/detail/".$id_event);
					}
					
					
					if($data['kelas'] != false){
						//form tambah kelas
						$this->load->view('templates/header');
						$this->load->view('adm/kelas_edit', $data);
						$this->load->view('templates/footer');
					}
					
								
			}else{
				show_404();
			}
		}

		public function hapus($id_event = false, $id_kelas = false){
			if($this->session->userdata('logged_in') != false){
				$user = $this->session->userdata('logged_in');
			if($user['username'] == "admin"){
					$this->kelas_model->hapus($id_kelas);
				}else{
				show_404();
				}
			}else{
			show_404();
			}
		}
		
		public function add($id = false){
			$user = $this->session->userdata('logged_in');
			if($user['username'] != "admin"){
				show_404();
			}
			//ambil data event
			$data['event'] = $this->event_model->get_event($id);
			//liat apakah lagi penambahan event
			$id_event = $this->input->post('id_event');
			
			if($data['event'] != false){
				//form tambah kelas
				$this->load->view('templates/header');
				$this->load->view('adm/kelas', $data);
				$this->load->view('templates/footer');
			}else if($id_event != false){ //jika lagi menambahkan event baru
				$this->kelas_model->add_kelas();
				redirect(base_url()."event/detail/".$id_event);
			}else{
				//kalau id tidak ditemukan
				redirect(base_url()."event");
			}
		}
		
	}
?>
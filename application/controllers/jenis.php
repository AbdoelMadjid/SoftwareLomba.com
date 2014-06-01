<?php
	class Jenis extends CI_Controller{
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('jenis_model');
			$this->load->model('kelas_model');
			$this->load->model('event_model');
		}
		
		
		public function bukakoncer(){
		$user = $this->session->userdata('logged_in');
			if($user['username'] == "admin"){
				$id = $this->input->post('id_jenis');
				$idevent = $this->input->post('id_event');
				$jml = $this->input->post('select');

				$this->jenis_model->buka_koncer($id, $jml);
				redirect(base_url()."nilai/view/".$idevent."/".$id);
			}
		}
		
		public function edit($id_event = false, $id_jenis = false){
		$user = $this->session->userdata('logged_in');
			if($user['username'] != false){
				
				$data['jenis'] = $this->jenis_model->get_jenis($id_jenis);
					$data['id_event'] = $id_event;
					
					if($this->input->post('jenis') != false){
						$this->jenis_model->update();
						redirect(base_url()."event/detail/".$id_event);
					}
					
					
					if($data['jenis'] != false){
						//form tambah kelas
						$this->load->view('templates/header');
						$this->load->view('adm/jenis_edit', $data);
						$this->load->view('templates/footer');
					}
					
								
			}else{
				show_404();
			}
		}
		
		public function hapus($id_event = false, $id_jenis = false){
			if($this->session->userdata('logged_in') != false){
				$this->jenis_model->hapus($id_jenis);
			}
			redirect(base_url().'event/detail/'.$id_event);
		}
		
		public function add($id_event = false, $id_kelas = false){
		$user = $this->session->userdata('logged_in');
			if($user['username'] != "admin"){
				redirect(base_url()."event/detail/".$id_event);
			}
			//ambil data event
			$data['kelas'] = $this->kelas_model->get_kelas($id_kelas);
			$data['event'] = $this->event_model->get_event($id_event);
			//liat apakah lagi penambahan event
			$id_kelas = $this->input->post('id_kelas');
			$id_event = $this->input->post('id_event');
			
			if($data['kelas'] != false){
				//form tambah kelas
				$data['id_event'] = $id_event;
				$data['id_kelas'] = $id_kelas;
				$this->load->view('templates/header');
				$this->load->view('adm/jenis', $data);
				$this->load->view('templates/footer');
			}else if($id_kelas != false){ //jika lagi menambahkan event baru
				$this->jenis_model->add_jenis();
				redirect(base_url()."event/detail/".$id_event);
			}else{
				//kalau id tidak ditemukan
				redirect(base_url()."event");
			}
		}

		
	}
?>
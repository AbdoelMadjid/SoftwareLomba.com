<?php
	class Nilai extends CI_Controller{
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('urlhelper_model');
			$this->load->model('jenis_model');
			$this->load->model('juri_model');
			$this->load->model('nilai_model');
		}
		
		public function view($id_event,$id_jenis){
			$data['urlhelper'] = $this->urlhelper_model->getfromjenis($id_jenis);
			$user = $this->session->userdata('logged_in');
			$data['username'] = $user['username'];
			$data['nominasi'] = $this->nilai_model->get_nomination($id_jenis);
			$data['koncer'] = $this->nilai_model->get_koncer($id_jenis);
			$data['jenis'] = $this->jenis_model->get_jenis($id_jenis);
			if($data['urlhelper'] != false){
				$data['pengawas'] = $this->juri_model->tampil_juri($id_jenis,$id_event, 1);
				$data['inspektur'] = $this->juri_model->tampil_juri($id_jenis,$id_event, 2);
				$data['korlap'] = $this->juri_model->tampil_juri($id_jenis,$id_event, 3);
				$data['juri'] = $this->juri_model->tampil_juri($id_jenis,$id_event, 4);
				$this->load->view('templates/header');
				$user = $this->session->userdata('logged_in');
				if($user['username'] == "admin" || $user['username'] == "nominasi"){
					$this->load->view('adm/nilai_view_adm', $data);
				}else{
					$this->load->view('pages/nilai_view', $data);
				}
			}else{
				redirect(base_url()."event");
			}
		}

		public function tambah() {
			$nilai = preg_split('/\s+/', $this->input->post('frmnilai'));

			$id_juri = $this->input->post('id_juri');
			$id_event = $this->input->post('id_event');
			$id_jenis = $this->input->post('id_jenis');
			$jumlah_baris = $this->nilai_model->hitungJumlahNilai($id_juri,$id_jenis);

			if($jumlah_baris <= 15){
				if(sizeof($nilai) <= 15 - $jumlah_baris){
					foreach($nilai as $val){
						$this->nilai_model->insert_nilai_pertama($id_juri,$id_jenis,$val);
					}
					redirect(base_url()."nilai/view/".$id_event."/".$id_jenis."#home");
				} else {
					echo "<script>alert('Nomor tidak boleh lebih dari 15')</script>";
					redirect(base_url()."nilai/view/".$id_event."/".$id_jenis."#home");
				}
			} else {
				echo "<script>alert('Nomor tidak boleh lebih dari 15')</script>";
				redirect(base_url()."nilai/view/".$id_event."/".$id_jenis."#home");
			}
		}
		
		public function edit(){
		$user = $this->session->userdata('logged_in');
			if($user['username'] == "admin" ||$user['username'] =="operator"){
				$id = $this->input->post('pk');
				$value = $this->input->post('value');
				
				if(is_numeric($value)){					
					//if($this->nilai_model->cek_duplikat($id, $value) == false){
					if($this->nilai_model->update($id, $value) == false){
						header('HTTP 400 Bad Request', true, 400);
						 echo "Nomor sudah masuk!";
					}//kalau berhasil ngga mbalikin apa-apa
				}else{
					 header('HTTP 400 Bad Request', true, 400);
					 echo "Data Error!";
				}
			}else{
					 header('HTTP 400 Bad Request', true, 400);
					 echo "This field is required!";
			}
		}
		
		public function editkoncer($nomorkoncer){
		$username = $this->session->userdata('logged_in');
				$user = $username['username'];
			if($user == "admin" || $user == "operator"){
				$id = $this->input->post('pk');
				$value = $this->input->post('value');
				
				if(is_numeric($value)){
					
					//if($this->nilai_model->cek_duplikat($id, $value) == false){
					if($this->nilai_model->updatekoncer($id, $value, $nomorkoncer) == false){
						header('HTTP 400 Bad Request', true, 400);
						 echo "Duplikasi Data!";
					}//kalau berhasil ngga mbalikin apa-apa
				
				}else{
					 header('HTTP 400 Bad Request', true, 400);
					 echo "Data Error!";
				}
			}else{
					 header('HTTP 400 Bad Request', true, 400);
					 echo "This field is required!";
			}
		}
		
		public function list_koncer($id_jenis, $limit){
			echo json_encode($this->nilai_model->get_nomination_final($id_jenis, $limit));
		}
		
		public function export_nominasi($id_jenis){
			$data['urlhelper'] = $this->urlhelper_model->getfromjenis($id_jenis);
			$user = $this->session->userdata('logged_in');
			$data['username'] = $user['username'];
			$data['koncer'] = $this->nilai_model->get_nomination_print($id_jenis);
			if($data['urlhelper'] != false){
				if($user['username'] == "admin"){
					$this->load->view('adm/exportnomination', $data);	
				}
			}else{
				redirect(base_url()."event");
			}
		}

		public function export_nominasitext($id_jenis){
			$data['urlhelper'] = $this->urlhelper_model->getfromjenis($id_jenis);
			$user = $this->session->userdata('logged_in');
			$data['username'] = $user['username'];
			$data['koncer'] = $this->nilai_model->get_nomination_print($id_jenis);
			if($data['urlhelper'] != false){
				if($user['username'] == "admin"){
					$this->load->view('adm/exportnominationtext', $data);	
				}
			}else{
				redirect(base_url()."event");
			}
		}
		
		public function export_hasil($id_jenis){
			$data['urlhelper'] = $this->urlhelper_model->getfromjenis($id_jenis);
			$username = $this->session->userdata('logged_in');
				$data['username'] = $username['username'];
			$data['koncer'] = $this->nilai_model->get_koncer($id_jenis);
			if($data['urlhelper'] != false){
			$user = $this->session->userdata('logged_in');
				
				if($user['username'] == "admin"){
					$this->load->view('adm/exporthasil', $data);	
				}
			}else{
				redirect(base_url()."event");
			}
		}

		public function isi_nilai(){}
		
	}
?>
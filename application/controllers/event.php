<?php
	class Event extends CI_Controller{
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('event_model');
			$this->load->model('kelas_model');
		}
		
		public function index(){
			//$data['news'] = $this->news_model->get_news();
			//$data['title'] = "index";
			$data['event'] = $this->event_model->list_event();
			$user = $this->session->userdata('logged_in');
			$data['username'] = $user['username'];
			$this->load->view('templates/header');
			$this->load->view('pages/event_view', $data);
			$this->load->view('templates/footer');
		}
		
		public function add(){
		$user = $this->session->userdata('logged_in');
			if($user['username'] != "admin"){
				redirect(base_url());
				return false;
			}
			
			if($this->input->post('event_name') != null){
				$this->event_model->add_event();
				redirect(base_url()."event");
			}else{			
				$this->load->view('templates/header');
				$this->load->view('adm/event');
				$this->load->view('templates/footer');
			}
		}
			
		public function detail($id){
			//$data['news'] = $this->news_model->get_news();
			//$data['title'] = "index";
			$data['event'] = $this->event_model->get_event($id);
			$data['kelas'] = $this->kelas_model->list_kelas($id);
			$user = $this->session->userdata('logged_in');
			$data['username'] = $user['username'];
			if($data['event'] != false){
				$this->load->view('templates/header');
				$this->load->view('pages/eventdetail', $data);
				$this->load->view('templates/footer');
			}else{
				redirect(base_url()."event");
			}
		}
		
		public function edit($index){
			
		}
		
		public function delete($id){
			if ($id != '') {
            $id = $this->security->xss_clean($this->uri->segment(3));
            $delete = $this->event_model->delete_event($id);
            redirect('event');
            }
		}
	}
?>
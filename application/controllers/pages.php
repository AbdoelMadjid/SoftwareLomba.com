<?php
	class Pages extends CI_Controller{
	
		public function __construct()
		{
			parent::__construct();
		}
		
		public function index(){
			//$data['news'] = $this->news_model->get_news();
			//$data['title'] = "index";
			$this->ckeditor->basePath = base_url() . 'ckeditor/';
	        $this->ckeditor->config['toolbar'] = array(
	        array('Source', '-', 'NewPage', 'Preview', '-', 'Templates'),
	        array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', 'Bold', 'Italic'));
	        $this->ckeditor->config['language'] = 'id';
	        $this->ckeditor->config['width'] = '100%';
	        $this->ckeditor->config['height'] = '300px';

	        //Add Ckfinder to Ckeditor
			$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/'); 
			$data['list_news'] = $this->blog_model->list_blog_home();
			$data['list_anggota'] = $this->team_model->list_anggota_home();

			$this->load->view('templates/header');
			$this->load->view('pages/home', $data);
			$this->load->view('templates/footer');
		}

		public function contact(){
			$this->email->from($this->input->post('pengirim'), $this->input->post('nama_pengirim'));
			$this->email->to('ssnkm2013@gmail.com');  

			$this->email->subject($this->input->post('subject'));
			$this->email->message($this->input->post('isinya'));	

			$this->email->send();
		}
		
		public function maintenance(){
			$this->load->view('pages/maintenance');
		}
		
		public function view($page = 'home'){
			if ( ! file_exists('application/views/pages/'.$page.'.php'))
			{
				// Whoops, we don't have a page for that!
				show_404();
			}
			
			$data['title'] = ucfirst($page); // Capitalize the first letter
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer', $data);
		}
	}
?>
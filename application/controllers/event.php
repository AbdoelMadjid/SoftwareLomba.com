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

			$path = './upload';
            if (!is_dir($path))
                mkdir($path, 0755);
 
            $pathMain = './upload/source';
           	if (!is_dir($pathMain))
                mkdir($pathMain, 0755);

				$result = $this->do_upload("image_event", $pathMain);

					if (!$result['status']){
	                    $data['error_msg'] ="Can not upload Image for " . $result['error'] . " ";
	                    $this->event_model->add_event("");
	                	redirect(base_url()."event");
	                }
	                else
	                {
	                    $pathThumb = './upload/event';
			            if (!is_dir($pathThumb))
			                mkdir($pathThumb, 0755);

			            //in other folder
	                    if($this->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $pathThumb . '/'.md5($result['upload_data']['raw_name']).$result['upload_data']['file_ext'],'400','200')){
	                        if($this->input->post('event_name') != null){
							$this->event_model->add_event(md5($result['upload_data']['raw_name']).$result['upload_data']['file_ext']);
							redirect(base_url()."event");
							}
						}
	                    else
	                        redirect(base_url()."event");
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

		function do_upload($htmlFieldName, $path){
	        $config['file_name'] = time();
	        $config['upload_path'] = $path;
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size'] = '2000';
	        $config['max_width'] = '2000';
	        $config['max_height'] = '2000';
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
	        unset($config);
	        if (!$this->upload->do_upload($htmlFieldName))
	        {
	            return array('error' => $this->upload->display_errors(), 'status' => 0);
	        } else
	        {
	            return array('status' => 1, 'upload_data' => $this->upload->data());
	        }
    	}

    	function resize_image($sourcePath, $desPath, $width = '500', $height = '500'){
	        $this->image_lib->clear();
	        $config['image_library'] = 'gd2';
	        $config['source_image'] = $sourcePath;
	        $config['new_image'] = $desPath;
	        $config['quality'] = '100%';
	        $config['create_thumb'] = TRUE;
	        $config['maintain_ratio'] = false;
	        $config['thumb_marker'] = '';
	        $config['width'] = $width;
	        $config['height'] = $height;
	        $this->image_lib->initialize($config);
	 
	        if ($this->image_lib->resize())
	            return true;
	        return false;
    	}
	}
?>
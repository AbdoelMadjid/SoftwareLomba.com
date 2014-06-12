<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team extends CI_Controller {

	function index($id = null){
		$jml = $this->db->get('news');
		$user = $this->session->userdata('logged_in');
		$data['username'] = $user['username'];

		//pengaturan pagination
	    $config['base_url'] = base_url() . 'blog/index';
	    $config['total_rows'] = $jml->num_rows();
	    $config['per_page'] = '3';
	    $config['first_page'] = 'Awal';
	    $config['last_page'] = 'Akhir';
	    $config['next_page'] = '&laquo;';
	    $config['prev_page'] = '&raquo;';

	    //inisialisasi config
	    $this->pagination->initialize($config);

	    //buat pagination
	    $data['halaman'] = $this->pagination->create_links();
	    $data['blog'] = $this->blog_model->list_blog("news","id","ASC",$config['per_page'], $id);
		$this->load->view('templates/header');
		$this->load->view('pages/blog',$data);
		$this->load->view('templates/footer');
	}

	function detail($id = NULL){
		$user = $this->session->userdata('logged_in');
		$data['username'] = $user['username'];

		$data['detail'] = $this->blog_model->get_blog($id);
		$this->load->view('templates/header');
		$this->load->view('pages/detail_blog',$data);
		$this->load->view('templates/footer');
	}

	function delete($id = NULL){
		if($this->team_model->delete_anggota($id)){
			redirect(base_url());
		} else {
			redirect(base_url());
		}
	}
	
	function add(){
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

			$result = $this->do_upload("image_team", $pathMain);

				if (!$result['status']){
                    $data['error_msg'] ="Can not upload Image for " . $result['error'] . " ";
                	redirect(base_url());
                }
                else
                {
                    $pathThumb = './upload/team';
		            if (!is_dir($pathThumb))
		                mkdir($pathThumb, 0755);

		            //in other folder
                    if($this->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $pathThumb . '/'. md5($result['upload_data']['raw_name']).$result['upload_data']['file_ext'],'250','250')){
	                        if($this->input->post('nama') != null){
								$this->team_model->add_anggota(md5($result['upload_data']['raw_name']).$result['upload_data']['file_ext']);
								redirect(base_url());
							}
					}
                    else
                        redirect(base_url());
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
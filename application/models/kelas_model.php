<?php
class kelas_model extends CI_Model{

	public function __construct(){
		$this->load->database();
		$this->load->model('jenis_model');
	}
	public function get_kelas($id = FALSE)
	{
		if ($id === FALSE)
			return false;
		
		$query = $this->db->get_where('kelas', array('id_kelas' => $id), 1 );			
		  if($query->num_rows() > 0)
			 return $query->row(); //Return user credentials
			 
		return false;
	}
	
	public function list_kelas($id_event){
		$query = $this->db->get_where('kelas', array('id_event' => $id_event));
		$result = $query->result();
		foreach($result as $row){
			$row->jenis = $this->jenis_model->list_jenis($row->id_kelas);
		}
		return $result; //kembalikan daftar event
	}
	
	public function hapus($id_kelas){
		$this->db->delete('kelas', array('id_kelas' => $id_kelas)); 
	}
	
	public function update(){
	$data = array(
               'nama_kelas' => $this->input->post('nama_kelas')
            );

		$this->db->where('id_kelas', $this->input->post('id_kelas'));
		$this->db->update('kelas', $data); 

	}
	
	public function add_kelas(){
		
		$data = array(
			'nama_kelas' => $this->input->post('class_name'),
			'id_event' => $this->input->post('id_event')
		);
		
		$this->db->insert('kelas', $data);
		$id = $this->db->insert_id();
		
		return $id;
	}

}
?>
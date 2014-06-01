<?php
class jenis_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	public function get_jenis($id = FALSE)
	{
		if ($id === FALSE)
			return false;
		
		$query = $this->db->get_where('jenis', array('id_jenis' => $id), 1 );			
		  if($query->num_rows() > 0)
			 return $query->row(); //Return user credentials
			 
		return false;
	}
	
	public function get_jenis_limit($id = FALSE)
	{
		if ($id === FALSE)
			return false;
		
		$query = $this->db->get_where('jenis', array('id_jenis' => $id), 1 );			
		  if($query->num_rows() > 0)
			 return $query->row()->jumlah_koncer; 
			 
		return false;
	}
	
	public function list_jenis($id_kelas){
		$query = $this->db->get_where('jenis', array('id_kelas' => $id_kelas));			
			 return $query->result(); //kembalikan daftar event
	}
	
	public function buka_koncer($id_jenis, $jml){
		$data = array(
				'koncer_dibuka' => 1,
               'jumlah_koncer' => $jml
            );

		$this->db->where('id_jenis', $id_jenis);
		$this->db->update('jenis', $data); 
	}
	
	public function add_jenis(){
		
		$data = array(
			'jenis' => $this->input->post('jenis'),
			'id_kelas' => $this->input->post('id_kelas'),
			'id_event' => $this->input->post('id_event')
		);
		
		$this->db->insert('jenis', $data);
		$id = $this->db->insert_id();
		
		return $id;
	}
	
	public function update(){
	$data = array(
               'jenis' => $this->input->post('jenis')
            );

		$this->db->where('id_jenis', $this->input->post('id_jenis'));
		$this->db->update('jenis', $data); 

	}
	
	public function hapus($id_jenis){
		$this->db->delete('jenis', array('id_jenis' => $id_jenis)); 
	}

}
?>
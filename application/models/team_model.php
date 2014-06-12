<?php
class team_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_anggota($id = FALSE)
	{
		if ($id === FALSE)
			return false;
		
		
		$query = $this->db->get_where('team', array('id' => $id), 1 );			
		  if($query->num_rows() > 0)
			 return $query->row(); //Return user credentials
			 
		return false;
	}
	
	function list_anggota($table,$id,$selecting,$num, $offset)
    {
        $this->db->order_by($id,$selecting);
        $sql = $this->db->get($table,$num,$offset);
        if($sql->num_rows() > 0){
            return $sql->result();
        } else {
            return null;
        }
    }

	public function list_anggota_home(){
		  $query = $this->db->get('team',4);			
			 return $query->result(); //kembalikan daftar event
	}
	
	public function add_anggota($image){
		
		$data = array(
			'nama' => $this->input->post('nama'),
			'jobdesk' => $this->input->post('jobdesk'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
			'gambar' => $image
		);
		
		$this->db->insert('team', $data);
		$id = $this->db->insert_id();
		
		return $id;
	}

	public function delete_anggota($id)
    {
        $this->db->where("id",$id);
        $this->db->delete("team");
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

}
?>
<?php
class event_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	public function get_event($id = FALSE)
	{
		if ($id === FALSE)
			return false;
		
		
		$query = $this->db->get_where('event', array('id_event' => $id), 1 );			
		  if($query->num_rows() > 0)
			 return $query->row(); //Return user credentials
			 
		return false;
	}
	
	public function list_event(){
		  $query = $this->db->get('event');			
			 return $query->result(); //kembalikan daftar event
	}
	
	public function add_event(){
		
		$data = array(
			'event' => $this->input->post('event_name'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		
		$this->db->insert('event', $data);
		$id = $this->db->insert_id();
		
		return $id;
	}

	public function delete_event($id)
    {
        $this->db->where("id_event",$id);
        $this->db->delete("event");
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

}
?>
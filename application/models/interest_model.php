<?php
class Interest_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function get_contact($id_school){
		
		if($id_school == FALSE) return FALSE; //We need both credentials
		$query = $this->db->get_where('school_', array('id_school' => $id_school));
			 return $query->result_array(); //Return user credentials
	} 
	
	public function get_interest($id_school = false)
	{
		$this->db->order_by('name', 'asc'); 		
		
		if($id_school === false){
			$this->db->order_by('name', 'asc'); 		
			$query = $this->db->get('interest');
			return  $query->result_array();
		}
		
		$this->db->select('interest.name, 
                   school_interest.id, 
				   school_interest.id_interest,
				   school_interest.id_school');
		$this->db->from('interest');
		$this->db->join('school_interest', 'school_interest.id_interest=interest.id');
		$this->db->where('school_interest.id_school', $id_school);
		$q = $this->db->get();
		return $q->result_array();
	}
	
	
	public function set_interest($schoolid = FALSE)
	{
	}
}
?>
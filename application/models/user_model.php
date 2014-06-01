<?php
class user_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	
	function login($username, $password){
	if($username == FALSE || $password == FALSE) return FALSE; //We need both credentials
		$username = $this->security->xss_clean($username);
        $password = $this->security->xss_clean($password);
		$query = $this->db->get_where('user', array('user' => $username, 'password' => md5($password)), 1 );
		  if($query->num_rows() > 0)
			 return $query->row(); //Return user credentials

		return FALSE; //Sorry user wasn't found
	} 
	
}
?>
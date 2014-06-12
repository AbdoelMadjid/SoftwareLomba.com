<?php
class blog_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_blog($id = FALSE)
	{
		if ($id === FALSE)
			return false;
		
		
		$query = $this->db->get_where('news', array('id' => $id), 1 );			
		  if($query->num_rows() > 0)
			 return $query->row(); //Return user credentials
			 
		return false;
	}
	
	function list_blog($table,$id,$selecting,$num, $offset)
    {
        $this->db->order_by($id,$selecting);
        $sql = $this->db->get($table,$num,$offset);
        if($sql->num_rows() > 0){
            return $sql->result();
        } else {
            return null;
        }
    }

	public function list_blog_home(){
		  $query = $this->db->get('news',3);			
			 return $query->result(); //kembalikan daftar event
	}
	
	public function add_news($image,$author,$now){
		
		$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('content'),
			'tanggal' => $now,
			'author' => $author,
			'gambar' => $image
		);
		
		$this->db->insert('news', $data);
		$id = $this->db->insert_id();
		
		return $id;
	}

	public function delete_news($id)
    {
        $this->db->where("id",$id);
        $this->db->delete("news");
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

}
?>
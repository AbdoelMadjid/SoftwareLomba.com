<?php
class urlhelper_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	public function getfromjenis($id_jenis = FALSE)
	{
		if ($id_jenis === FALSE)
			return false;
		
		$this->db->select('jenis.id_jenis, jenis.jenis, kelas.id_kelas, kelas.nama_kelas, kelas.id_event, event.event');
		$this->db->from('jenis');
		$this->db->join('kelas', 'jenis.id_kelas = kelas.id_kelas');
		$this->db->join('event', 'kelas.id_event = event.id_event');
		$this->db->where('jenis.id_jenis', $id_jenis);
		$query = $this->db->get();
		  if($query->num_rows() > 0)
			 return $query->row(); //Return user credentials
			 
		return false;
	}
}
?>
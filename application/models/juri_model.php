<?php
class juri_model extends CI_Model{

	public function __construct(){
		$this->load->database();
		$this->load->model('nilai_model');
	}
	
	
	
	/**public function add(){
		
		$data = array(
			'nama' => $this->input->post('nama'),
			'id_jenis' => $this->input->post('id_jenis'),
			'tipe_juri' => $this->input->post('tipe_juri')
		);
		
		$this->db->insert('juri', $data);
		$id = $this->db->insert_id();
		$id_jenis = $data['id_jenis'];
		$nilai = array();
		for($i = 0; $i < 15; $i ++){
			$nilai[$i] = array(
					'id_juri' => $id, 'id_jenis' => $id_jenis,
					'gantangan' => 0
			);
		}
		
		$this->db->insert_batch('nilai', $nilai);
		
		return $id;
	} **/

	public function add(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'id_event' => $this->input->post('id_event'),
			'tipe_juri' => $this->input->post('tipe_juri')
		);

		$this->db->insert('juri', $data);
		$id = $this->db->insert_id();
		
		return $id;
	}
	
	public function hapus($id_juri){
		$this->db->delete('juri', array('juri' => $id_juri)); 
	}
	
	/**
	tipe juri
	1 Pengawas
	2 Inspektur Pelaksana
	3 Korlap
	4 Juri
	*/
	public function list_juri($id_jenis, $tipe_juri){
	
		$query = $this->db->get_where('juri', array('id_jenis' => $id_jenis, 'tipe_juri' => $tipe_juri));
		$result = $query->result();
		/** buat nilai */
		foreach($result as $row){
			$row->nilai = $this->nilai_model->list_nilai($row->id_juri);
			$row->koncer = $this->nilai_model->list_koncer($row->id_juri, $id_jenis);
		}
		
		return $result; //kembalikan daftar event
	
	}
	
	public function tampil_juri($id_jenis,$id_event, $tipe_juri){
	
		$query = $this->db->get_where('juri', array('id_event' => $id_event, 'tipe_juri' => $tipe_juri));
		$result = $query->result();

		foreach($result as $row){
			$row->nilai = $this->nilai_model->list_nilai($row->id_juri,$id_jenis);
			$row->koncer = $this->nilai_model->list_koncer($row->id_juri, $id_jenis);
		}
		
		return $result; //kembalikan daftar event
	
	}

	public function tampil_jurinya($id_event, $tipe_juri){
	
		$query = $this->db->get_where('juri', array('id_event' => $id_event, 'tipe_juri' => $tipe_juri));
		$result = $query->result();
		
		return $result; //kembalikan daftar event
	
	}

	public function update($id_juri, $value){
		
				$data = array(
					   'nama' => $value
					);

				$this->db->where('id_juri', $id_juri);
				return $this->db->update('juri', $data); 
	}
	

}
?>
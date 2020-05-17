<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class matakuliah_model extends CI_Model {

	public function getMatakuliah($id_matakuliah=null){
		if ($id_matakuliah === null) {
			return $this->db->get('matakuliah')->result_array();
		} else {
			return $this->db->get_where('matakuliah', ['id_matakuliah' => $id_matakuliah])->result_array();
		}
	}
	
	public function deleteMatakuliah($id_matakuliah){
		$this->db->delete('matakuliah', ['id_matakuliah' => $id_matakuliah]);
		return $this->db->affected_rows();
		
	}

	public function createMatakuliah($data){
		$this->db->insert('matakuliah', $data);
		return $this->db->affected_rows();
		
	}
	
	public function updateMatakuliah($data, $id_matakuliah){
		$this->db->update('matakuliah', $data, ['id_matakuliah' => $id_matakuliah]);
		return $this->db->affected_rows();
		
	}
}
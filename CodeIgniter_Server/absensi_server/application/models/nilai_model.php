<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class nilai_model extends CI_Model {

	public function getNilai($id_nilai=null){
		if ($id_nilai === null) {
			return $this->db->get('nilai')->result_array();
		} else {
			return $this->db->get_where('nilai', ['id_nilai' => $id_nilai])->result_array();
		}
	}

	public function deleteNilai($id_nilai){
		$this->db->delete('nilai', ['id_nilai' => $id_nilai]);
		return $this->db->affected_rows();
		
	}

	public function createNilai($data){
		$this->db->insert('nilai', $data);
		return $this->db->affected_rows();
		
	}
	
	public function updateNilai($data, $id_nilai){
		$this->db->update('nilai', $data, ['id_nilai' => $id_nilai]);
		return $this->db->affected_rows();
		
	}
}
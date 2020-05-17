<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

	public function getMahasiswa($id_mahasiswa=null){
		if ($id_mahasiswa === null) {
			return $this->db->get('mahasiswa')->result_array();
		} else {
			return $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id_mahasiswa])->result_array();
		}
	}
	
	public function deleteMahasiswa($id_mahasiswa){
		$this->db->delete('mahasiswa', ['id_mahasiswa' => $id_mahasiswa]);
		return $this->db->affected_rows();
		
	}

	public function createMahasiswa($data){
		$this->db->insert('mahasiswa', $data);
		return $this->db->affected_rows();
		
	}
	
	public function updateMahasiswa($data, $id_mahasiswa){
		$this->db->update('mahasiswa', $data, ['id_mahasiswa' => $id_mahasiswa]);
		return $this->db->affected_rows();
		
	}
}

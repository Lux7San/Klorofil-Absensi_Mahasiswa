<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class dosen_model extends CI_Model {
    
    public function getDosen($id_dosen=null){
		if ($id_dosen === null) {
			return $this->db->get('dosen')->result_array();
		} else {
			return $this->db->get_where('dosen', ['nip' => $id_dosen])->result_array();
		}
	}

	public function deleteDosen($nip){
		$this->db->delete('dosen', ['nip' => $nip]);
		return $this->db->affected_rows();
	}

	public function createDosen($data){
		$this->db->insert('dosen', $data);
		return $this->db->affected_rows();
		
	}
	
	public function updateDosen($data, $nip){
		$this->db->update('dosen', $data, ['nip' => $nip]);
		return $this->db->affected_rows();
		
	}
}

/* End of file Dosen_model.php */
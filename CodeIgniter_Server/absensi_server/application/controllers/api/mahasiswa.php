<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';
use Restserver\Libraries\REST_Controller;

class Mahasiswa extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('Mahasiswa_model', 'mahasiswa');
    }

    function index_get() {
		$id_mahasiswa = $this->get('id_mahasiswa');
        if ($id_mahasiswa === null) {
            $mahasiswa = $this->mahasiswa->getMahasiswa();
        } else {
            $this->db->where('id_mahasiswa', $id_mahasiswa);
            $mahasiswa = $this->mahasiswa->getMahasiswa($id_mahasiswa);
		}
		
        if ($mahasiswa) {
			$this->response([
				'status' => true,
				'data' => $mahasiswa
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => true,
				'data' => 'id not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
    }


    function index_delete() {
		$id_mahasiswa = $this->delete('id_mahasiswa');
		
        if ($id_mahasiswa === null) {
			$this->response([
				'status' => false,
				'message' => 'provide an id'
			], REST_Controller::HTTP_BAD_REQUEST);

        } else {
            if ($this->mahasiswa->deleteMahasiswa($id_mahasiswa) > 0) {
				$this->response([
					'status' => true,
					'$id_mahasiswa' => $id_mahasiswa,
					'message' => 'deleted'
				], REST_Controller::HTTP_OK);

			} else {
				$this->response([
					'status' => false,
					'message' => 'id not found!'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
    }
    
    public function index_post(){
		$data =[
			
			"id_mahasiswa"=>$this->post('id_mahasiswa'),
            
            "nama"=>$this->post('nama'),
            
            "jeniskelamin"=>$this->post('jeniskelamin'),
            
            "jurusan"=>$this->post('jurusan')
            
        ];

		if ($this->mahasiswa->createMahasiswa($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new mahasiswa has been created'
			], REST_Controller::HTTP_CREATED);	
		} else {
			$this->response([
				'status' => false,
				'message' => 'failed to create new data'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
    }
    
    public function index_put(){
		$id_mahasiswa = $this->put('id_mahasiswa');
		$data = [
			"nama"=>$this->post('nama'),
            
            "jeniskelamin"=>$this->post('jeniskelamin'),
            
            "jurusan"=>$this->post('jurusan')
		];
		if ($this->mahasiswa->updateMahasiswa($data, $id_mahasiswa) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new data mahasiswa has been updated'
			], REST_Controller::HTTP_OK);	
		} else {
			$this->response([
				'status' => false,
				'message' => 'failed to update data'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

}

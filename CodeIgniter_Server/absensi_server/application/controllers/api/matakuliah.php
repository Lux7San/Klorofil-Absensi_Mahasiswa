<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';
use Restserver\Libraries\REST_Controller;

class Matakuliah extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('matakuliah_model', 'matkul');
    }

    function index_get() {
        $id_matakuliah = $this->get('id_matakuliah');
        if ($id_matakuliah === null) {
            $Matakuliah = $this->matkul->getMatakuliah();
        } else {
            $this->db->where('id_matakuliah', $id_matakuliah);
            $Matakuliah = $this->matkul->getMatakuliah($id_matakuliah);
		}
		
        if ($Matakuliah) {
			$this->response([
				'status' => true,
				'data' => $Matakuliah
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => true,
				'data' => 'id not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
    }

    function index_delete() {
		$id_matakuliah = $this->delete('id_matakuliah');
		
        if ($id_matakuliah === null) {
			$this->response([
				'status' => false,
				'message' => 'provide an id'
			], REST_Controller::HTTP_BAD_REQUEST);

        } else {
            if ($this->matkul->deleteMatakuliah($id_matakuliah) > 0) {
				$this->response([
					'status' => true,
					'id_matakuliah' => $id_matakuliah,
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
            

            "matakuliah"=>$this->post('matakuliah'),
            
            "sks"=>$this->post('sks')
            
        ];

		if ($this->matkul->createMatakuliah($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new matakuliah has been created'
			], REST_Controller::HTTP_CREATED);	
		} else {
			$this->response([
				'status' => false,
				'message' => 'failed to create new data'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
    }
    
    public function index_put(){
		$id_matakuliah = $this->put('id_matakuliah');
		$data = [
            
            "matakuliah"=>$this->put('matakuliah'),
            
            "sks"=>$this->put('sks')
		];
		if ($this->matkul->updateMatakuliah($data, $id_matakuliah) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new data matakuliah has been updated'
			], REST_Controller::HTTP_OK);	
		} else {
			$this->response([
				'status' => false,
				'message' => 'failed to update data'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';
use Restserver\Libraries\REST_Controller;

class dosen extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('dosen_model','dosen');
    }

    function index_get() {
        $id_dosen = $this->get('nip');
        if ($id_dosen === null) {
            $dosen = $this->dosen->getDosen();
        } else {
            $this->db->where('nip', $id_dosen);
            $dosen = $this->dosen->getDosen($id_dosen);
		}
		
        if ($dosen) {
			$this->response([
				'status' => true,
				'data' => $dosen
			], REST_Controller::HTTP_OK);
        } 
        else {
			$this->response([
				'status' => true,
				'data' => 'id not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
    }

    function index_delete() {
		$nip = $this->delete('nip');
		
        if ($nip === null) {
			$this->response([
				'status' => false,
				'message' => 'provide an id'
			], REST_Controller::HTTP_BAD_REQUEST);

        } else {
            if ($this->dosen->deleteDosen($nip) > 0) {
				$this->response([
					'status' => true,
					'nip' => $nip,
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
            "nip"=>$this->post('nip'),

            "nama_dosen"=>$this->post('nama_dosen')
            
        ];

		if ($this->dosen->createDosen($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new dosen has been created'
			], REST_Controller::HTTP_CREATED);	
		} else {
			$this->response([
				'status' => false,
				'message' => 'failed to create new data'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
    }
    
    public function index_put(){
		$nip = $this->put('nip');
		$data = [
			"nip"=>$this->put('nip'),
            "nama_dosen"=>$this->put('nama_dosen')
		];
		if ($this->dosen->updateDosen($data, $nip) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new data dosen has been updated'
			], REST_Controller::HTTP_OK);	
		} else {
			$this->response([
				'status' => false,
				'message' => 'failed to update data'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

}
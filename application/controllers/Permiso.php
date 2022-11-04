<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permiso extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Permiso_model");
	}

	public function index()
	{
		$perfil = $this->db->from("perfil")->where("estado", 'A')->get()->result();

		$this->addJs("permiso.js");
		$this->setTempleate("Permisos", "permiso/index", array("perfil"=>$perfil), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Permiso_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_per");
			$response = $this->Permiso_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Modulo_model");
	}

	public function index()
	{
		$modulo_padre = $this->db->from("modulo")->where("id_padre", 0)->where("estado", "A")->get()->result();

		$this->addJs("modulo.js");
		$this->addJs("modulo.form.js");
		$this->setTempleate("Modulos", "modulo/index", array("modulo_padre"=>$modulo_padre), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Modulo_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_mod");
			$response = $this->Modulo_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_mod");
			$response = $this->Modulo_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('modulo', array('name_mod', 'id_padre', 'url', 'orden', 'icon', 'id_mod'), 'id_mod', '', '', array("estado", 'A'));
		echo $result;
	}
}

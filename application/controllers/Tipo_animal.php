<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_animal extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Tipo_animal_model");
	}

	public function index()
	{
		$this->addJs("tipo_animal.js");
		$this->addJs("tipo_animal.form.js");
		$this->setTempleate("Tipo Animal", "tipo_animal/index", array("tipo_animal/form"), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Tipo_animal_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_tani");
			$response = $this->Tipo_animal_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_tani");
			$response = $this->Tipo_animal_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('tipo_animal', array('desc_tani', 'id_tani'), 'id_tani', '', '', array("estado", 'A'));
		echo $result;
	}
}

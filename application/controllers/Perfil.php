<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Perfil_model");
	}

	public function index()
	{
		$this->addJs("perfil.js");
		$this->addJs("perfil.form.js");
		$this->setTempleate("Perfiles", "perfil/index", array(), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Perfil_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_per");
			$response = $this->Perfil_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_per");
			$response = $this->Perfil_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('perfil', array('name_per', 'id_per'), 'id_per', '', '', array("estado", 'A'));
		echo $result;
	}
}

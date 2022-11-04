<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Persona_model");
	}

	public function index()
	{

		$this->addJs("persona.js");
		$this->addJs("persona.form.js");

		$perfil = $this->db->from("perfil")->where("estado", "A")->get()->result();
		$this->setTempleate("Personas", "persona/index", array("perfil"=>$perfil), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Persona_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_pers");
			$response = $this->Persona_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_pers");
			$response = $this->Persona_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('persona', array('nombre_pers', 'apaterno_pers', 'amaterno_pers', 'sexo_pers', 'direccion_pers', 'telefono_pers', 'dni_pers', 'name_per', 'name_usu', 'id_pers'), 'id_pers', array("perfil", "persona.id_per = perfil.id_per", "inner"), '', array("persona.estado", 'A'));
		echo $result;
	}

	public function cargo(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_pers");
			$response = $this->Persona_model->cargo($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function addCargo(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Persona_model->addCargo($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function activarCargo(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Persona_model->activarCargo($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Cliente_model");
	}

	public function index()
	{
		$this->addJs("cliente.js");
		$this->addJs("cliente.form.js");

		$distrito = $this->db->from("distrito")->where("estado", "A")->get()->result();

		$this->setTempleate("Clientes", "cliente/index", array("distrito"=>$distrito), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Cliente_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_cli");
			$response = $this->Cliente_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_cli");
			$response = $this->Cliente_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('cliente', array('nom_cli', 'ape_cli', 'tel_cli', 'dni_cli', 'desc_dis', 'id_cli'), 'id_cli', array("distrito", "distrito.id_dis = cliente.id_dis"), '', array("cliente.estado", 'A'));
		echo $result;
	}
}

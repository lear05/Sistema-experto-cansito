<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mascota extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Mascota_model");
	}

	public function index()
	{
		$this->addJs("mascota.js");
		$this->addJs("mascota.form.js");

		$cliente = $this->db->from("cliente")->where("estado", "A")->get()->result();
		$tipo_animal = $this->db->from("tipo_animal")->where("estado", "A")->get()->result();

		$this->setTempleate("Mascotas", "mascota/index", array("cliente"=>$cliente, "tipo_animal"=>$tipo_animal), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Mascota_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_ani");
			$response = $this->Mascota_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_ani");
			$response = $this->Mascota_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('animal', array('nom_ani', 'desc_tani', 'peso_ani', 'edad_ani', 'CONCAT(cliente.dni_cli," - ",cliente.nom_cli, " ",cliente.ape_cli) AS cliente' ,'id_ani', 'tipo_animal.id_tani AS id_tani'), 'id_ani', array(
			array("tipo_animal", "animal.id_tani = tipo_animal.id_tani"),
			array("cliente", "animal.id_cli = cliente.id_cli")
		), '', array("animal.estado", 'A'));
		echo $result;
	}
}

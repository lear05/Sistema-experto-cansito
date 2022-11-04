<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hechos extends CI_ControllerBase {
   function __construct(){
      parent::__construct();
      $this->load->model("Hechos_model");
   }

   public function index()
   {
      $this->addJs("hechos.js");
      $this->addJs("hechos.form.js");

      $tipo_animal = $this->db->from("tipo_animal")->where("estado", "A")->get()->result();

      $this->setTempleate("Sintomas", "hechos/index", array("tipo_animal"=>$tipo_animal), 3);
   }

   public function process(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $data = $this->input->post();
         $response = $this->Hechos_model->process($data);
         echo json_encode($response);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }

   public function delete(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $key = (int)$this->input->post("id_hec");
         $response = $this->Hechos_model->delete($key);
         echo json_encode($response);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }

   public function get(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $key = (int)$this->input->post("id_hec");
         $response = $this->Hechos_model->get($key);
         echo json_encode($response);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }

   public function grilla(){
      $result = $this->datatables->getData('hechos', array('nombre_hec', 'desc_tani', 'id_hec'), 'id_hec', array("tipo_animal", "hechos.id_tani = tipo_animal.id_tani"), '', array("hechos.estado", 'A'));
      echo $result;
   }
}

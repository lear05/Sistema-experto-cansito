<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conocimientos extends CI_ControllerBase {
   function __construct(){
      parent::__construct();
      $this->load->model("Conocimientos_model");
   }

   public function index()
   {
      $this->addJs("conocimientos.js");
      $this->addJs("conocimientos.form.js");

      $hechos = $this->db->from("hechos")
      ->join("tipo_animal", "hechos.id_tani = tipo_animal.id_tani")
      ->where("hechos.estado", "A")
      ->order_by("nombre_hec", "ASC")
      ->get()->result();

      $this->setTempleate("Enfermedades", "conocimientos/index", array("hechos"=>$hechos), 3);
   }

   public function process(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $data = $this->input->post();
         $response = $this->Conocimientos_model->process($data);
         echo json_encode($response);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }

   public function delete(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $key = (int)$this->input->post("id_con");
         $response = $this->Conocimientos_model->delete($key);
         echo json_encode($response);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }

   public function get(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $key = (int)$this->input->post("id_con");
         $response = $this->Conocimientos_model->get($key);
         echo json_encode($response);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }

   public function grilla(){
      $result = $this->datatables->getData('conocimientos', array('nombre_con', 'id_con'), 'id_con', '', '', array("estado", 'A'));
      echo $result;
   }

   public function getHechos(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $key = (int)$this->input->post("id_con");
         $response = $this->Conocimientos_model->getHechos($key);
         echo json_encode($response);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }
   public function setPeso(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $data = $this->input->post();
         $response = $this->Conocimientos_model->setPeso($data);
         echo json_encode($response);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }

}

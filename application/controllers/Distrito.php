<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distrito extends CI_ControllerBase {
   function __construct(){
      parent::__construct();
      $this->load->model("Distrito_model");
   }

   public function index()
   {
      $this->addJs("distrito.js");
      $this->addJs("distrito.form.js");
      $this->setTempleate("Distritos", "distrito/index", array(), 3);
   }

   public function process(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $data = $this->input->post();
         $response = $this->Distrito_model->process($data);
         echo json_encode($response);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }

   public function delete(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $key = (int)$this->input->post("id_dis");
         $response = $this->Distrito_model->delete($key);
         echo json_encode($response);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }

   public function get(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $key = (int)$this->input->post("id_dis");
         $response = $this->Distrito_model->get($key);
         echo json_encode($response);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }

   public function grilla(){
      $result = $this->datatables->getData('distrito', array('desc_dis', 'id_dis'), 'id_dis', '', '', array("estado", 'A'));
      echo $result;
   }
}

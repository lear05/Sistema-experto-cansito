<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_ControllerBase {
   function __construct(){
      parent::__construct();
   }

   public function enfermedad_tipo()
   {
      $data = $this->db->select("tipo_animal.id_tani, tipo_animal.desc_tani, conocimientos.id_con, conocimientos.nombre_con, ")
      ->from("diagnostico")
      ->join("animal", "diagnostico.id_ani = animal.id_ani")
      ->join("tipo_animal", "animal.id_tani = tipo_animal.id_tani")
      ->join("resultado", "diagnostico.id_dia = resultado.id_dia")
      ->join("conocimientos", "resultado.id_con = conocimientos.id_con")
      ->order_by("tipo_animal.id_tani", "ASC")
      ->order_by("conocimientos.id_con", "ASC")
      ->get()->result();

      $tipo_animal = array();
      $enfermedad = array();
      $ban = -1;
      $id_con = "";
      foreach ($data as $key=>$obj) {
         if(!in_array($obj->desc_tani, $tipo_animal)){
            $tipo_animal[] = $obj->desc_tani;
            $ban++;
         }

         $key_enf = array_search($obj->nombre_con, array_column($enfermedad, "enfermedad"));
         $key_enf = (string)$key_enf;
         if($key_enf==""){
            $enfermedad[] = array("enfermedad"=>(string)$obj->nombre_con, "total"=>1, "key"=>$ban);
         }else{
            $enfermedad[$key_enf]["total"]+=1;
         }
      }

      $lista_enfermedad = $enfermedad;
      $enfermedad = array();
      for($i=0; $i<count($lista_enfermedad); $i++){
         $enfermedad[$i] = array("enfermedad"=>$lista_enfermedad[$i]["enfermedad"], "datos"=>array());
         for($j=0; $j<=$ban; $j++){
            if($j==$lista_enfermedad[$i]["key"]){
               $enfermedad[$i]["datos"][$j] = $lista_enfermedad[$i]["total"];
            }else{
               $enfermedad[$i]["datos"][$j] = '';
            }
         }
      }

      $this->addJs("reporte.enfermedad_tipo.js");
      $this->setTempleate("Reporte", "reporte/enfermedad_tipo", array("var_js"=>json_encode(array($tipo_animal, $enfermedad))), 3);
   }

   public function cliente(){
      $data = $this->db->select("cliente.id_cli, CONCAT(cliente.dni_cli,' - ',cliente.nom_cli,' ',cliente.ape_cli) AS cliente, COUNT(cliente.id_cli) AS total")
      ->from("diagnostico")
      ->join("animal", "diagnostico.id_ani = animal.id_ani")
      ->join("cliente", "animal.id_cli = cliente.id_cli")
      ->group_by("cliente.id_cli")
      ->order_by("total", "DESC")
      ->limit(3, 0)
      ->get()->result();

      $this->addJs("reporte.cliente.js");
      $this->setTempleate("Reporte", "reporte/cliente", array("var_js"=>json_encode($data)), 3);
   }

   public function enfermedad_distrito(){
      $data = $this->db->select("distrito.id_dis, distrito.desc_dis, conocimientos.id_con, conocimientos.nombre_con")
      ->from("resultado")
      ->join("conocimientos", "resultado.id_con = conocimientos.id_con")
      ->join("diagnostico", "resultado.id_dia= diagnostico.id_dia")
      ->join("animal", "diagnostico.id_ani = animal.id_ani")
      ->join("cliente", "animal.id_cli = cliente.id_cli")
      ->join("distrito", "cliente.id_dis = distrito.id_dis")
      //->group_by("conocimientos.nombre_con")
      ->order_by("distrito.id_dis", "ASC")
      ->order_by("conocimientos.id_con", "ASC")
      ->get()->result();

      $distrito = array();
      $enfermedad = array();
      $id_dis = "";
      $id_con = "";
      $ban = -1;
      $ban_enf = -1;


      foreach($data as $obj){
         if($id_dis!=$obj->id_dis){
            $id_dis=$obj->id_dis;
            $distrito[] = $obj->desc_dis;
            $ban++;
         }

         if($id_con!=$obj->id_con){
            $id_con = $obj->id_con;
            $ban_enf++;
            $enfermedad[$ban_enf] = array(
               "enfermedad"=>$obj->nombre_con,
               "total"=>1,
               "key"=>$ban
            );
         }else{
            $enfermedad[$ban_enf]["total"]+=1;
         }
      }

      $lista_enfermedad = $enfermedad;
      $enfermedad = array();
      for($i=0; $i<count($lista_enfermedad); $i++){
         $key_enf = array_search($lista_enfermedad[$i]["enfermedad"], array_column($enfermedad, "enfermedad"));
         $key_enf = (string)$key_enf;
         if($key_enf==""){
            $enfermedad[$i] = array("enfermedad"=>$lista_enfermedad[$i]["enfermedad"], "datos"=>array());
            for($j=0; $j<=$ban; $j++){
               if($j==$lista_enfermedad[$i]["key"]){
                  $enfermedad[$i]["datos"][$j] = $lista_enfermedad[$i]["total"];
               }else{
                  $enfermedad[$i]["datos"][$j] = '';
               }
            }
         }else{
            for($j=0; $j<=$ban; $j++){
               if($j==$lista_enfermedad[$i]["key"]){
                  $enfermedad[$key_enf]["datos"][$j] = $lista_enfermedad[$i]["total"];
               }
            }
         }

      }
      $this->addJs("reporte.enfermedad_distrito.js");
      $this->setTempleate("Reporte", "reporte/enfermedad_distrito", array("var_js"=>json_encode(array($distrito, $enfermedad))), 3);
   }
}

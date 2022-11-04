<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		//$this->load->model("Consulta_model");
	}

	public function index()
	{
		$this->addJs("consulta.js");
        $this->addJs("mascota.js");
        $this->addJs("mascota.form.js");

		$hecho = $this->db->from("hechos")->where("estado", "A")->get()->result();
        $tipo_animal = $this->db->from("tipo_animal")->where("estado", "A")->get()->result();
        $cliente = $this->db->from("cliente")->where("estado", "A")->get()->result();

		$this->setTempleate("Consulta", "consulta/index", array("hecho"=>$hecho, "tipo_animal"=>$tipo_animal, "cliente"=>$cliente), 3);
	}

	function porcentaje(){
        $hechos = $this->input->post("hechos");
        $id_tani = $this->input->post("id_tani");
        $data = $this->db->from("conocimientos")
        ->where("estado", "A")->get()->result();//Obtener todos los conocimientos
        $result = [];
        foreach ($data as $k) {
            $data2 = $this->hechoyconocimiento($k->id_con, $id_tani);//Obtener todos los hehcos que tiene 1 conocimiento
            $suma = 0;
            $umbral = 0;
            foreach ($data2 as $j) {
                if(in_array($j->id_hec, $hechos)){
                    $suma =  $suma + $j->peso;
                    //$umbral = $umbral + $j->peso;
                }
            }

            //$porcentaje = ($umbral!=0)?round($suma/$umbral*100, 2):0;
            $result[] = array(
                "id_con"=>$k->id_con,
                "nombre"=>$k->nombre_con,
                "total"=>$suma,
                "porcentaje"=>0
            );
        }

        $result = $this->orderMultiDimensionalArray($result, "total", true);

        $newresult = array();
        for($i=0; $i<=2; $i++){
            if(isset($result[$i])){
                $newresult[] = $result[$i];
            }
        }

        $umbral = array_sum(array_column($newresult,'total'));

        for($i=0; $i<count($newresult); $i++){
            if($umbral>0){
                $porcentaje = round($newresult[$i]["total"]/$umbral*100, 2);
                if($porcentaje>0){
                    $newresult[$i]["porcentaje"] = $porcentaje;
                }else{
                    unset($newresult[$i]);
                }
            }else{
                unset($newresult[$i]);
            }
        }

        echo json_encode($newresult);
   }

   function hechoyconocimiento($id, $id_tani){
        $r = $this->db->from("conocimiento_hecho")
        ->join("hechos", "conocimiento_hecho.id_hec = hechos.id_hec")
        ->join("conocimientos", "conocimiento_hecho.id_con = conocimientos.id_con")
        ->where("conocimiento_hecho.id_con", $id)
        ->where("hechos.id_tani", $id_tani)
        ->where("hechos.estado", "A")
        ->where("conocimientos.estado", "A")
        ->get()->result();
        return $r;
   }



   function orderMultiDimensionalArray ($array, $campo, $invertir) {
            $posicion = array();
            $newRow = array();
            foreach ($array as $key => $row) {
                    $posicion[$key]  = $row[$campo];
                    $newRow[$key] = $row;
            }
            if ($invertir) {
                arsort($posicion);
            }
            else {
                asort($posicion);
            }
            $arrayRetorno = array();
            foreach ($posicion as $key => $pos) {
                $arrayRetorno[] = $newRow[$key];
            }
            return $arrayRetorno;
   }

   function getDiagnostico(){
        if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
            $id_ani = $this->input->post("id_ani");
            $diagnostico = $this->db->from("diagnostico")->where("id_ani", $id_ani)->get()->result();
            echo json_encode($diagnostico);
        }else{
            redirect($this->base_url."admin", "refresh");
        }
   }

   function process(){
        if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
            $data = $this->input->post();
            $obj = $this->db->from("diagnostico")->where("id_ani", $data["id_ani"])->where("fecha", $data["fecha"])->get()->result();
            if(count($obj)>0){
                echo json_encode(array("result"=>false, "msg"=>"Ya hay una consulta realizada el mismo día")); return;
            }

            $this->db->insert("diagnostico", array(
                "fecha" => $data["fecha"],
                "id_ani" => $data["id_ani"],
                "estado" => "A"
            ));

            echo json_encode(array("result"=>true, "msg"=>"Proceso realizado"));
        }else{
            redirect($this->base_url."admin", "refresh");
        }
   }

   function getResultado(){
        if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
            $id_dia = $this->input->post("id_dia");
            $resultado = $this->db->from("resultado")
            ->join("conocimientos", "resultado.id_con = conocimientos.id_con")
            ->where("id_dia", $id_dia)->get()->result();
            echo json_encode($resultado);
        }else{
            redirect($this->base_url."admin", "refresh");
        }
   }

   function setResultado(){
        if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
            $id_dia = $this->input->post("id_dia");
            $resultado = $this->input->post("resultado");
            for($i=0; $i<count($resultado); $i++){
                $this->db->insert("resultado", array(
                    "id_dia"=>$id_dia,
                    "id_con"=>$resultado[$i]["id_con"],
                    "por_res"=>$resultado[$i]["por_res"]
                ));
            }
            echo json_encode(array("result"=>true, "msg"=>"Proceso realizado"));
        }else{
            redirect($this->base_url."admin", "refresh");
        }
   }

}

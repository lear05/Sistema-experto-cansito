<?php
class Permiso_model extends CI_Model {
	private $table = "acceso";

    public function __construct()
    {
        parent::__construct();
    }

    public function process($data){
    	$id_per = (int)$data["id_per"];
    	$id_mod = (int)$data["id_mod"];

    	$this->db->trans_begin();

    	$obj = $this->db->from($this->table)->where("id_per", $id_per)->where("id_mod", $id_mod)->get()->result();

    	if(count($obj)>0){
    		$estado = ($obj[0]->estado=="A") ? "I" : "A";
    		$this->db->where("id_per", $id_per);
    		$this->db->where("id_mod", $id_mod);
    		$this->db->update($this->table, array("estado"=>$estado));
    	}else{
    		$this->db->insert($this->table, array("id_per"=>$id_per, "id_mod"=>$id_mod, "estado"=>"A"));
    	}

	    if ($this->db->trans_status() === TRUE)
		{
		    $this->db->trans_commit();
		    $response = ["result" => true, "msg" => "", "data" => ""];
		}else{
		    $this->db->trans_rollback();
		    $response = ["result" => false, "msg" =>  $this->db->_error_message(), "data" => ""];
		}

		return $response;
    }

    public function get($key){
    	$permitidos = $this->db->from("acceso")->where("id_per", $key)->where("estado", "A")->get()->result_array();
    	$modulos = $this->db->from("modulo")->where("estado", "A")->order_by("id_padre", "ASC")->get()->result();

    	$permitidos = array_column($permitidos, 'id_mod');
    	$lista = [];

    	foreach ($modulos as $mod) {
    		$padre = ($mod->id_padre==0)?true:$mod->id_padre;
    		$checked = (in_array($mod->id_mod, $permitidos))? "checked" : "";

    		$lista[] = [
    			"id" => $mod->id_mod,
    			"modulo" => $mod->name_mod,
    			"padre" => $padre,
    			"checked" => $checked
    		];
    	}

    	return $lista;
    }
}
?>
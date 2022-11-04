<?php
class Persona_model extends CI_Model {
	private $table = "persona";
	private $key_table = "id_pers";

    public function __construct()
    {
        parent::__construct();
    }

    public function process($data){
    	$data[$this->key_table] = (int)$data[$this->key_table];

    	$this->db->trans_begin();

        if($data[$this->key_table]==0){
        	$obj = $this->db->from($this->table)->where("dni_pers", $data["dni_pers"])->get()->result();
        }else{
            $obj = array();
        }

    	if(count($obj)==0){
	    	if($data[$this->key_table]==0){
		    	unset($data[$this->key_table]);
		    	$data["pass_usu"] = md5(md5(md5($data["pass_usu"])));
		    	$data["estado"] = "A";
		    	$this->db->insert($this->table, $data);
		    	$row = $this->rowData($this->table, $this->key_table, $this->db->insert_id());
		    }else{
		    	if($data["pass_usu"]!=""){
		    		$data["pass_usu"] = md5(md5(md5($data["pass_usu"])));
		    	}else{
		    		unset($data["pass_usu"]);
		    	}
		    	$this->db->where($this->key_table, $data[$this->key_table]);
		    	$this->db->update($this->table, $data);
		    	$row = $this->rowData($this->table, $this->key_table, $data[$this->key_table]);
		    }

		    if ($this->db->trans_status() === TRUE)
			{
			    $this->db->trans_commit();
			    $response = ["result" => true, "msg" => "", "data" => $row];
			}else{
			    $this->db->trans_rollback();
			    $response = ["result" => false, "msg" =>  $this->db->_error_message(), "data" => ""];
			}
    	}else{
    		$response = ["result" => false, "msg" => "Ya existe una persona con el DNI ".$data["dni_pers"], "data" => ""];
    	}


		return $response;
    }

    public function delete($key){
    	$this->db->trans_begin();

    	$this->db->where($this->key_table, $key);
    	$this->db->update($this->table, array("estado"=>"I"));
    	$row = $this->rowData($this->table, $this->key_table, $key);

    	if ($this->db->trans_status() === TRUE)
		{
		    $this->db->trans_commit();
		    $response = ["result" => true, "msg" => "", "data" => $row];
		}else{
		    $this->db->trans_rollback();
		    $response = ["result" => false, "msg" =>  $this->db->_error_message(), "data" => ""];
		}

		return $response;
    }

    public function get($key){
    	$row = $this->rowData($this->table, $this->key_table, $key);
    	return $row;
    }

    public function cargo($key){
    	$cargo = $this->db->from("cargo_persona")
    	->join("cargo", "cargo_persona.id_car = cargo.id_car")
    	->join("area", "cargo_persona.id_area = area.id_area")
    	->join("persona", "cargo_persona.id_pers = persona.id_pers", "left")
    	->where("cargo_persona.id_pers", $key)
    	//->where("cargo.estado", "A")
    	//->where("area.estado", "A")
    	->get()->result();
    	$persona = $this->db->from("persona")->where("id_pers", $key)->get()->result();
    	return array("Persona"=>$persona[0], "Cargo"=>$cargo);
    }

    public function addCargo($data){
    	$obj = $this->db->from("cargo_persona")
    	->where("id_pers", $data["id_pers"])
    	->where("id_car", $data["id_car"])
    	->where("id_area", $data["id_area"])
    	->get()->result();

    	if(count($obj)==0){
    		$this->db->trans_begin();
    		$data["estado"] = "I";
    		$this->db->insert("cargo_persona", $data);
    		if ($this->db->trans_status() === TRUE)
			{
			    $this->db->trans_commit();
			    $response = ["result" => true, "msg" => "", "data" => ""];
			}else{
			    $this->db->trans_rollback();
			    $response = ["result" => false, "msg" =>  $this->db->_error_message(), "data" => ""];
			}
    	}else{
    		$response = ["result" => false, "msg" =>  "Ya existe el cargo y el aréa asignada a la misma persona", "data" => ""];
    	}

    	return $response;
    }

    public function activarCargo($data){
    	$this->db->update("cargo_persona", array("estado"=>"I"));

    	$this->db->where("id_pers", $data["id_pers"]);
    	$this->db->where("id_car", $data["id_car"]);
    	$this->db->where("id_area", $data["id_area"]);
    	if($this->db->update("cargo_persona", array("estado"=>"A"))){
    		$response = ["result" => true, "msg" =>  "OK!!", "data" => ""];
    	}else{
    		$response = ["result" => false, "msg" => $this->db->_error_message(), "data" => ""];
    	}

    	return $response;
    }
}
?>

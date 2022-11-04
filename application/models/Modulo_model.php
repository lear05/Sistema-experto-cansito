<?php
class Modulo_model extends CI_Model {
	private $table = "modulo";
	private $key_table = "id_mod";

    public function __construct()
    {
        parent::__construct();
    }

    public function process($data){
    	$data["id_mod"] = (int)$data["id_mod"];
    	$data["id_padre"] = (isset($data["id_padre"]))?(int)$data["id_padre"] : 0;
    	$data["alone"] = (isset($data["alone"]))? 1 : 0;

    	$this->db->trans_begin();

    	if($data["id_mod"]==0){
	    	unset($data["id_mod"]);
	    	$data["estado"] = "A";
	    	$this->db->insert($this->table, $data);
	    	$row = $this->rowData($this->table, $this->key_table, $this->db->insert_id());
	    }else{
	    	$this->db->where("id_mod", $data["id_mod"]);
	    	$this->db->update($this->table, $data);
	    	$row = $this->rowData($this->table, $this->key_table, $data["id_mod"]);
	    }

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
}
?>
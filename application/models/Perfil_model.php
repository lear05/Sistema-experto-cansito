<?php
class Perfil_model extends CI_Model {
	private $table = "perfil";
	private $key_table = "id_per";

    public function __construct()
    {
        parent::__construct();
    }

    public function process($data){
    	$data[$this->key_table] = (int)$data[$this->key_table];

    	$this->db->trans_begin();

    	if($data[$this->key_table]==0){
	    	unset($data[$this->key_table]);
	    	$data["estado"] = "A";
	    	$this->db->insert($this->table, $data);
	    	$row = $this->rowData($this->table, $this->key_table, $this->db->insert_id());
	    }else{
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
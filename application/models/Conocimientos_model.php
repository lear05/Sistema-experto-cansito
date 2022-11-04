<?php
class Conocimientos_model extends CI_Model {
   private $table = "conocimientos";
   private $key_table = "id_con";

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

    public function getHechos($key){
      $Hechos = $this->db->from("conocimiento_hecho")
      ->join("hechos", "conocimiento_hecho.id_hec = hechos.id_hec")
      ->join("tipo_animal", "hechos.id_tani = tipo_animal.id_tani")
      ->where("conocimiento_hecho.id_con", $key)
      ->get()->result();

      return array("Hechos"=>$Hechos);
    }

    public function setPeso($data){
      $this->db->trans_begin();
      $hecho = $data["hecho"];
      $peso = $data["peso"];
      $id_con = $data["id_con"];

      $this->db->where("id_con", $id_con);
      $this->db->delete("conocimiento_hecho");

      for($i=0; $i<count($hecho); $i++){
        $this->db->insert("conocimiento_hecho", array(
          "id_con" => $id_con,
          "id_hec" => $hecho[$i],
          "peso" => $peso[$i]
        ));
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
}
?>
<?php
  class nhacungcapM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function nhacungcap_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function nhacungcap_list($table){
      $sql = "SELECT * FROM $table ORDER BY ma_ncc desc";
      return $this->db->select($sql);
    }
    public function nhacungcap_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function nhacungcap_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function nhacungcap_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function nhacungcap_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function nhacungcap_timkiem($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
  }
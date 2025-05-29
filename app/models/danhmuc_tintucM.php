<?php
  class danhmuc_tintucM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function danhmuc_tintuc_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function danhmuc_tintuc_list($table){
      $sql = "SELECT * FROM $table ORDER BY ma_dmtt desc";
      return $this->db->select($sql);
    }
    public function danhmuc_tintuc_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function danhmuc_tintuc_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function danhmuc_tintuc_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function danhmuc_tintuc_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function danhmuc_tintuc_timkiem($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
  }
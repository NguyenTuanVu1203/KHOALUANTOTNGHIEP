<?php
  class thuonghieuM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function thuonghieu_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function thuonghieu_list($table){
      $sql = "SELECT * FROM $table ORDER BY ten_th ASC";
      return $this->db->select($sql);
    }
    public function thuonghieu_limit($table){
      $sql = "SELECT * FROM $table  LIMIT 4";
      return $this->db->select($sql);
    }
    public function thuonghieu_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function thuonghieu_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function thuonghieu_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function thuonghieu_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function thuonghieu_timkiem($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    
  }
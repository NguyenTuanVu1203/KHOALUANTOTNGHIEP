<?php
  class mauM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function mau_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function mau_list($table){
      $sql = "SELECT * FROM $table ORDER BY ten_m ASC";
      return $this->db->select($sql);
    }
    public function mau($table){
      $sql = "SELECT * FROM $table ORDER BY ma_m desc";
      return $this->db->select($sql);
    }
    public function mau_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function mau_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function mau_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function mau_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function mau_timkiem($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
  }
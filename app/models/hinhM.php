<?php
  class hinhM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function hinh_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function hinh_list($table_h, $table_sp){
      $sql = "SELECT * FROM $table_h join $table_sp on $table_h.ma_sp = $table_sp.ma_sp ORDER BY ma_h desc";
      return $this->db->select($sql);
    }
    public function hinh_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function hinh_update($table, $data, $dieukien){
      return $this->db->update($table, $data, $dieukien);
    }
    public function hinh_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function hinh_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function hinh_timkiem($table_sp, $table_h, $dieukien){
      $sql = "SELECT * FROM $table_h join $table_sp on $table_h.ma_sp = $table_sp.ma_sp where $dieukien";
      return $this->db->select($sql);
    }
    public function hinh_limit1($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien LIMIT 1";
      return $this->db->select($sql);
    }
  }
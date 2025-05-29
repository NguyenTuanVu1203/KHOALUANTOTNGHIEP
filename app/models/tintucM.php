<?php
  class tintucM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function tintuc_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function tintuc_list($table_tt, $table_nv, $table_th, $table_dmtt){
      $sql = "SELECT * FROM $table_tt join $table_nv on $table_tt.ma_nv = $table_nv.ma_nv join $table_th on $table_tt.ma_th = $table_th.ma_th join $table_dmtt on $table_tt.ma_dmtt = $table_dmtt.ma_dmtt ORDER BY ma_tt desc";
      return $this->db->select($sql);
    }
    public function tintuc($table){
      $sql = "SELECT * FROM $table";
      return $this->db->select($sql);
    }
    public function tintuc_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function tintuc_update($table, $data, $dieukien){
      return $this->db->update($table, $data, $dieukien);
    }
    public function tintuc_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function tintuc_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function tintuc_timkiem($table_tt, $table_nv, $table_th, $table_dmtt, $dieukien){
      $sql = "SELECT * FROM $table_tt join $table_nv on $table_tt.ma_nv = $table_nv.ma_nv join $table_th on $table_tt.ma_th = $table_th.ma_th join $table_dmtt on $table_tt.ma_dmtt = $table_dmtt.ma_dmtt WHERE $dieukien ORDER BY ma_tt desc";
      return $this->db->select($sql);
    }
    public function tintuc_limit($table_tt, $table_th, $table_dmtt, $limit){
      $sql = "SELECT * FROM $table_tt join $table_th on $table_tt.ma_th = $table_th.ma_th join $table_dmtt on $table_tt.ma_dmtt = $table_dmtt.ma_dmtt LIMIT $limit";
      return $this->db->select($sql);
    }
    public function tintuc_limit_dmtt($table_tt, $table_th, $table_dmtt, $limit, $dieukien){
      $sql = "SELECT * FROM $table_tt join $table_th on $table_tt.ma_th = $table_th.ma_th join $table_dmtt on $table_tt.ma_dmtt = $table_dmtt.ma_dmtt WHERE $dieukien LIMIT $limit";
      return $this->db->select($sql);
    }
  }
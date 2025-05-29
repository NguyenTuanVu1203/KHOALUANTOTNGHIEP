<?php
  class chitiet_sanphamM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function sp_chitiet_insert($table_ctsp, $data){
      return $this->db->insert($table_ctsp, $data);
    }
    public function sp_chitiet_list($table_sp, $table_ctsp, $dieukien){
      $sql = "SELECT * FROM $table_sp join $table_ctsp on $table_sp.ma_sp = $table_ctsp.ma_sp WHERE $dieukien ORDER BY $table_ctsp.ma_ctsp desc";
      return $this->db->select($sql);
    }
    public function sp_chitiet_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function sp_chitiet_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function sp_chitiet_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function sp_chitiet_deleteAll($table_sp, $table_ctsp, $dieukien, $on){
      return $this->db->delete($table_sp, $table_ctsp, $dieukien, $on);
    }
    public function sp_chitiet_timkiem($table_sp, $table_ctsp, $dieukien){
      $sql = "SELECT * FROM $table_ctsp join $table_sp on $table_ctsp.ma_sp = $table_sp.ma_sp where $dieukien";
      return $this->db->select($sql);
    }
    
  }
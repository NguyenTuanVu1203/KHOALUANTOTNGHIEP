<?php
  class loai_sanphamM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function loai_sanpham_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function loai_sanpham_list($table_lsp, $table_dm){
      $sql = "SELECT * FROM $table_lsp, $table_dm WHERE $table_lsp.ma_dm = $table_dm.ma_dm ORDER BY ma_lsp desc";
      return $this->db->select($sql);
    }
    public function loai_sanpham_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function loai_sanpham_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function loai_sanpham_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function loai_sanpham_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function loai_sanpham_timkiem($table_lsp, $table_dm, $dieukien){
      $sql = "SELECT * FROM $table_lsp join $table_dm on $table_lsp.ma_dm = $table_dm.ma_dm where $dieukien";
      return $this->db->select($sql);
    }
  }
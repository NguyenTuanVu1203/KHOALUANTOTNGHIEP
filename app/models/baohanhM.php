<?php
  class baohanhM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function baohanh_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function baohanh_list($table_bh, $table_dh, $table_sp, $table_ctdh, $dieukien, $order){
      $sql = "SELECT * FROM $table_bh join $table_dh on $table_bh.ma_dh = $table_dh.ma_dh join $table_sp on $table_bh.ma_sp = $table_sp.ma_sp join $table_ctdh on $table_dh.ma_dh = $table_ctdh.ma_dh WHERE $dieukien ORDER BY $order";
      return $this->db->select($sql);
    }
    public function baohanh_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function baohanh_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function baohanh_deleteAll($table){
      return $this->db->deleteAll($table);
    }
  }
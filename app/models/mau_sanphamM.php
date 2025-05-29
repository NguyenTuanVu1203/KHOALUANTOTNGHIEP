<?php
  class mau_sanphamM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function mau_sanpham_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function mau_sanpham_list($table_sp, $table_m, $table_msp){
      $sql = "SELECT * FROM $table_msp join $table_sp on $table_msp.ma_sp = $table_sp.ma_sp join $table_m on $table_msp.ma_m = $table_m.ma_m order by $table_sp.ma_sp DESC ";
      return $this->db->select($sql);
    }
    public function mau_sanpham_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function mau_sanpham_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function mau_sanpham_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function mau_sanpham_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function mau_sanpham_timkiem($table_sp, $table_msp, $table_m, $dieukien){
      $sql = "SELECT * FROM $table_msp join $table_sp on $table_msp.ma_sp = $table_sp.ma_sp join $table_m on $table_msp.ma_m = $table_m.ma_m where $dieukien";
      return $this->db->select($sql);
    }
    //usre
    public function Umau_sanpham_ma ($table_msp, $table_m, $dieukien2){
      $sql = "SELECT * FROM $table_msp join $table_m on $table_msp.ma_m = $table_m.ma_m where $dieukien2";
      return $this->db->select($sql);
    }
  }
<?php
  class danhgiaM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function danhgia_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function danhgia_list($table_dg, $table_sp, $table_dm, $table_th){
      $sql = "SELECT * FROM $table_dg join $table_sp on $table_dg.ma_sp = $table_sp.ma_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm join $table_th on $table_sp.ma_th = $table_th.ma_th ORDER BY ma_dg desc";
      return $this->db->select($sql);
    }
    public function count_sao($table_sp,$table_dg){
      $sql = "SELECT *,SUM(sosao_dg) AS 'tongsao',COUNT(sosao_dg) AS 'so_dg' FROM $table_sp JOIN $table_dg on $table_sp.ma_sp = $table_dg.ma_sp GROUP BY $table_sp.ma_sp order by so_dg DESC";
      return $this->db->select($sql);
    }
    public function danhgia_thongke_timkiem($table_dg, $table_sp, $dieukien_tk){
      $sql = "SELECT *,SUM(sosao_dg) AS 'tongsao',COUNT(sosao_dg) AS 'so_dg' FROM $table_sp JOIN $table_dg on $table_sp.ma_sp = $table_dg.ma_sp where $dieukien_tk GROUP BY $table_sp.ma_sp";
      return $this->db->select($sql);
    }
    public function count_sao_chitiet($table_sp,$table_dg){
      $sql = "SELECT *,SUM(sosao_dg) AS 'tongsao',COUNT(sosao_dg) AS 'so_dg' FROM $table_sp JOIN $table_dg on $table_sp.ma_sp = $table_dg.ma_sp GROUP BY $table_sp.ma_sp, sosao_dg";
      return $this->db->select($sql);
    }
    public function danhgia_ma_sp($table_dg, $dieukien_dg){
      $sql = "SELECT * FROM $table_dg where $dieukien_dg";
      return $this->db->select($sql);
    }
    public function danhgia_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function danhgia_timkiem($table_dg, $table_sp, $table_dm, $table_th, $dieukien_dg){
      $sql = "SELECT * FROM $table_dg join $table_sp on $table_dg.ma_sp = $table_sp.ma_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm join $table_th on $table_sp.ma_th = $table_th.ma_th WHERE $dieukien_dg";
      return $this->db->select($sql);
    }
  }
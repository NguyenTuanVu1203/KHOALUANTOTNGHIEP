<?php
  class danhmuc_thuonghieuM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function danhmuc_thuonghieu_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function danhmuc_thuonghieu_list($table_dm, $table_th, $table_dmth){
      $sql = "SELECT * FROM $table_dmth join $table_dm on $table_dmth.ma_dm = $table_dm.ma_dm join $table_th on $table_dmth.ma_th = $table_th.ma_th ";
      return $this->db->select($sql);
    }
    public function danhmuc_thuonghieu_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function danhmuc_thuonghieu_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function danhmuc_thuonghieu_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function danhmuc_thuonghieu_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function danhmuc_thuonghieu_timkiem($table_dm, $table_dmth, $table_th, $dieukien){
      $sql = "SELECT * FROM $table_dmth join $table_dm on $table_dmth.ma_dm = $table_dm.ma_dm join $table_th on $table_dmth.ma_th = $table_th.ma_th where $dieukien";
      return $this->db->select($sql);
    }
    public function thuonghieu_ma_dm($table_th, $table_dm, $table_dmth, $dieukien){
      $sql = "SELECT * FROM $table_dmth join $table_dm on $table_dmth.ma_dm = $table_dm.ma_dm join $table_th on $table_dmth.ma_th = $table_th.ma_th WHERE $dieukien";
      return $this->db->select($sql);
    }
    public function danhmuc_ma_thuonghieu($table_dmth, $table_dm, $table_th, $dieukien){
      $sql="SELECT * FROM $table_dmth join $table_dm on $table_dmth.ma_dm = $table_dm.ma_dm join $table_th on $table_dmth.ma_th = $table_th.ma_th WHERE $dieukien";
      return $this->db->select($sql);
    }
  }
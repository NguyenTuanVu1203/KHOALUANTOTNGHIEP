<?php
  class nhanvienM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function nhanvien_dangnhap($table, $user_nv, $pass_nv){
      $sql = "SELECT * FROM $table WHERE user_nv = ? AND pass_nv = ? AND tinhtrang_nv = 0";
      return $this->db->affectedRows($sql, $user_nv, $pass_nv);
    }
    public function get_dangnhap($table, $user_nv, $pass_nv){
      $sql = "SELECT * FROM $table WHERE user_nv = ? AND pass_nv = ?";
      return $this->db->selectNV($sql, $user_nv, $pass_nv);
    }
    public function nhanvien_list($table){
      $sql = "SELECT * FROM $table ORDER BY ma_nv desc";
      return $this->db->select($sql);
    }
    public function nhanvien_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function nhanvien_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function nhanvien_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function nhanvien_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function nhanvien_timkiem($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
  }

?>
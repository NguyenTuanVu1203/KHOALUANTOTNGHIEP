<?php
  class danhmuc_sanphamM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function danhmuc_sanpham_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function danhmuc_sanpham_list($table){
      $sql = "SELECT * FROM $table ORDER BY ma_dm desc";
      return $this->db->select($sql);
    }
    public function danhmuc_sanpham_limit($table){
      $sql = "SELECT * FROM $table ORDER BY ma_dm ASC LIMIT 6";
      return $this->db->select($sql);
    }
    public function danhmuc_sanpham_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function danhmuc_sanpham_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function danhmuc_sanpham_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function danhmuc_sanpham_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function danhmuc_sanpham_timkiem($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function convert_name($str) {
      $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $str);
      $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'e', $str);
      $str = preg_replace("/(ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $str);
      $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $str);
      $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'u', $str);
      $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $str);
      $str = preg_replace("/(đ|Đ)/", 'd', $str);
      $str = preg_replace("/( )/", '', $str);
      return $str;
    }
  }
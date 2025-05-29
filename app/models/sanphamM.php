<?php
  class sanphamM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function sanpham_insert($table_sp, $data){
      return $this->db->insert($table_sp, $data);
    }
    public function sanpham_list($table_sp, $table_dm, $table_nv, $table_ncc, $table_lsp, $table_th){
      $sql = "SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm join $table_nv on $table_sp.ma_nv = $table_nv.ma_nv join $table_ncc on $table_sp.ma_ncc = $table_ncc.ma_ncc join $table_lsp on $table_sp.ma_lsp = $table_lsp.ma_lsp join $table_th on $table_sp.ma_th = $table_th.ma_th ORDER BY ma_sp desc";
      return $this->db->select($sql);
    }
    public function sanpham_sort($table_sp, $table_dm, $table_nv, $table_ncc, $table_lsp, $table_th, $orderby){
      $sql = "SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm join $table_nv on $table_sp.ma_nv = $table_nv.ma_nv join $table_ncc on $table_sp.ma_ncc = $table_ncc.ma_ncc join $table_lsp on $table_sp.ma_lsp = $table_lsp.ma_lsp join $table_th on $table_sp.ma_th = $table_th.ma_th ORDER BY gia_sp $orderby";
      return $this->db->select($sql);
    }
    public function sanpham($table_sp){
      $sql = "SELECT * FROM $table_sp ORDER BY ma_sp desc";
      return $this->db->select($sql);
    }
    public function sanpham_limit1($table_sp,$table_dm){
      $sql = "SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm LIMIT 1";
      return $this->db->select($sql);
    }
    public function sanpham_limit($table_sp, $table_dm){
      $sql = "SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm LIMIT 1,8";
      return $this->db->select($sql);
    }
    public function sanpham_dt_limit($table_sp){
      $sql = "SELECT * FROM $table_sp WHERE ma_dm = 8 ORDER BY ma_sp desc LIMIT 6";
      return $this->db->select($sql);
    }
    public function sanpham_ma_dm($table, $dieukien){
      $sql = "SELECT * FROM $table  WHERE $dieukien ORDER BY ma_sp desc ";
      return $this->db->select($sql);
    }
    public function sanpham_ma_dm_orderby($table_sp, $dieukien, $orderby){
      $sql = "SELECT * FROM $table_sp  WHERE $dieukien ORDER BY gia_sp $orderby ";
      return $this->db->select($sql);
    }
    public function sanpham_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function sanpham_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function sanpham_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function sanpham_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function sanpham_timkiem($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function sanpham_soluong($table_sp, $table_dm, $table_nv, $table_ncc, $table_lsp, $table_th, $dieukien){
      $sql = "SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm join $table_nv on $table_sp.ma_nv = $table_nv.ma_nv join $table_ncc on $table_sp.ma_ncc = $table_ncc.ma_ncc join $table_lsp on $table_sp.ma_lsp = $table_lsp.ma_lsp join $table_th on $table_sp.ma_th = $table_th.ma_th WHERE $dieukien ORDER BY ma_sp desc";
      return $this->db->select($sql);
    }
    //user
    public function Usanpham_ma($table_sp, $table_dm, $table_ctsp, $table_msp, $table_th, $table_lsp, $table_hsp, $dieukien){
      $sql = "SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm join $table_ctsp on $table_ctsp.ma_sp = $table_sp.ma_sp join $table_msp on $table_msp.ma_sp = $table_sp.ma_sp join $table_th on $table_sp.ma_th = $table_th.ma_th join $table_lsp on $table_sp.ma_lsp = $table_lsp.ma_lsp join $table_hsp on $table_sp.ma_sp = $table_hsp.ma_sp where $dieukien LIMIT 1";
      return $this->db->select($sql);
    }
    public function Usanpham_timkiem($table_sp, $table_dm, $dieukien){
      $sql ="SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm WHERE $dieukien ";
      return $this->db->select($sql);
    }
    public function Usanpham_tuongtu($table_sp, $dieukien){
      $sql = "SELECT * FROM $table_sp  where $dieukien ";
      return $this->db->select($sql);
    }
    public function sanpham_ma_dm_GB($table_sp, $table_ctsp, $dieukien){
      $sql = "SELECT * FROM $table_sp join $table_ctsp on $table_sp.ma_sp = $table_ctsp.ma_sp WHERE $dieukien  ";
      return $this->db->select($sql);
    }
    public function sanpham_deal1($table_sp, $table_dm, $dieukien){
      $sql = "SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm where $dieukien order by $table_sp.ma_sp desc limit 1";
      return $this->db->select($sql);
    }
    public function sanpham_deal($table_sp, $table_dm, $dieukien){
      $sql = "SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm where $dieukien";
      return $this->db->select($sql);
    }
    public function Usanpham_limit($table_sp,$table_dm, $limit){
      $sql = "SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm LIMIT $limit";
      return $this->db->select($sql);
    }
    public function sp_limit($table_sp, $dieukien, $limit1){
      $sql = "SELECT * FROM $table_sp WHERE $dieukien ORDER BY ma_sp desc LIMIT $limit1";
      return $this->db->select($sql);
    }
    public function sanpham_ma_dm_limit($table_sp, $table_dm, $dieukien, $limit){
      $sql = "SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm WHERE $dieukien LIMIT $limit";
      return $this->db->select($sql);
    }
    public function sanpham_doituong_limit($table_sp,$table_dm, $table_ctsp, $dieukien, $limit){
      $sql = "SELECT * FROM $table_sp join $table_dm on $table_sp.ma_dm = $table_dm.ma_dm join $table_ctsp on $table_ctsp.ma_sp = $table_sp.ma_sp WHERE $dieukien LIMIT $limit";
      return $this->db->select($sql);
    }
    public function sanpham_dm_ctsp($table_sp, $table_ctsp, $dieukien){
      $sql = "SELECT * FROM $table_sp join $table_ctsp on $table_sp.ma_sp = $table_ctsp.ma_sp WHERE $dieukien";
      return $this->db->select($sql);
    }
  }
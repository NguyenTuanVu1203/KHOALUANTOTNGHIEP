<?php
  class luotxem extends controller{
    public function __construct()
    {
      $data = array();
      $thongbao = array();
      parent::__construct();
    }
    public function luotxem($orderby){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $this->load->view_admin("header");
        //đơn hàng
        $table_dh = "donhang";
        $donhangM = $this->load->model('donhangM');
        $dieukien = 'donhang.tinhtrang_dh = 0';
        $data['donhang_moi'] = $donhangM->donhang_moi($table_dh, $dieukien);
        $dieukien_vc = 'donhang.tinhtrang_dh = 1';
        $data['donhang_dangvanchuyen'] = $donhangM->donhang_moi($table_dh, $dieukien_vc);
        $dieukien_dg = 'donhang.tinhtrang_dh = 2';
        $data['donhang_dagiao'] = $donhangM->donhang_moi($table_dh, $dieukien_dg);
        $this->load->view_admin("leftmenu", $data);
        $luotxemM = $this->load->model('luotxemM');
        $table_lx = 'luotxem';
        $table_sp = 'sanpham';
        $orderby = $orderby;
        $data ['luotxem'] = $luotxemM->luotxem_list_sort($table_lx, $table_sp, $orderby);
        $this->load->view_admin("luotxem/luotxem", $data);
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function luotxem_timkiem(){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $this->load->view_admin("header");
        //đơn hàng
        $table_dh = "donhang";
        $donhangM = $this->load->model('donhangM');
        $dieukien = 'donhang.tinhtrang_dh = 0';
        $data['donhang_moi'] = $donhangM->donhang_moi($table_dh, $dieukien);
        $dieukien_vc = 'donhang.tinhtrang_dh = 1';
        $data['donhang_dangvanchuyen'] = $donhangM->donhang_moi($table_dh, $dieukien_vc);
        $dieukien_dg = 'donhang.tinhtrang_dh = 2';
        $data['donhang_dagiao'] = $donhangM->donhang_moi($table_dh, $dieukien_dg);
        $this->load->view_admin("leftmenu", $data);
        $luotxemM = $this->load->model('luotxemM');
        $table_lx = 'luotxem';
        $table_sp ='sanpham';
        $tukhoa = $_POST['tukhoa'];
        $dieukien_lx = "sanpham.ten_sp LIKE '%$tukhoa%'" ;
        $data ['luotxem_timkiem'] = $luotxemM->luotxem_dieukien($table_lx, $table_sp, $dieukien_lx);
        $this->load->view_admin("luotxem/luotxem_timkiem", $data);
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
  }
?>
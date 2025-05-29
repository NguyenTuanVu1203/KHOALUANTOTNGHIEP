<?php
  class mau extends controller{
    public function __construct()
    {
      $data = array();
      $thongbao = array();
      parent::__construct();
    }
    public function mau(){
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
        $mauM = $this->load->model('mauM');
        $table = 'mau';
        $data ['mau'] = $mauM->mau($table);
        $this->load->view_admin("mau/mau", $data); 
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function mau_tuychinh($ma_m, $tinhtrang_m){
      session::init();
      $mauM = $this->load->model('mauM');
      $table = 'mau';
      $dieukien = "mau.ma_m='$ma_m'" ;
      $data = array(
        'tinhtrang_m' => $tinhtrang_m
      );
      $result = $mauM->mau_update($table, $data, $dieukien);
      header("Location:".BASE_URL."mau/mau");
    }
    public function mau_insert(){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $mauM = $this->load->model('mauM');
        $table = 'mau';
        $ten_m = $_POST['ten_m'];
        $mau = $_POST['mau'];
        $data = array(
          'ten_m' => $ten_m,
          'mau' => $mau
        );
        $result = $mauM->mau_insert($table, $data);
        header("Location:".BASE_URL."mau/mau");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function mau_edit($ma_m){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $mauM = $this->load->model('mauM');
        $table = 'mau';
        $dieukien = "mau.ma_m='$ma_m'" ;
        $data['mau_ma'] = $mauM->mau_ma($table, $dieukien);
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
        $this->load->view_admin("mau/mau_edit", $data);
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function mau_update($ma_m){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $mauM = $this->load->model('mauM');
        $table = 'mau';
        $dieukien = "mau.ma_m='$ma_m'" ;
        $ten_m = $_POST['ten_m'];
        $mau = $_POST['mau'];
        $data = array(
          'ten_m' => $ten_m,
          'mau' => $mau
        );
        $result = $mauM->mau_update($table, $data, $dieukien);
        header("Location:".BASE_URL."mau/mau");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function mau_delete($ma_m){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $mauM = $this->load->model('mauM');
        $table = 'mau';
        $dieukien = "mau.ma_m='$ma_m'" ;
        $result = $mauM->mau_delete($table, $dieukien);
        header("Location:".BASE_URL."mau/mau");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function mau_deleteAll()
    {
      session::init();
      $level=session::get('level');
      if($level == 1){
        $mauM = $this->load->model('mauM');
        $table = 'mau';
        $result = $mauM->mau_deleteAll($table);
        header("Location:" . BASE_URL . "mau/mau");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function mau_timkiem(){
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
        $mauM = $this->load->model('mauM');
        $table = 'mau';
        $tukhoa = $_POST['tukhoa'];
        $dieukien = "mau.ten_m LIKE '%$tukhoa%'" ;
        $data ['mau_timkiem'] = $mauM->mau_timkiem($table, $dieukien);
        $this->load->view_admin("mau/mau_timkiem", $data);
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
  }
?>
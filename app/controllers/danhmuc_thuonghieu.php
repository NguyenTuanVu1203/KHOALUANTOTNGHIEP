<?php
class danhmuc_thuonghieu extends controller
{
  public function __construct()
  {
    $data = array();
    $thongbao = array();
    parent::__construct();
  }
  public function danhmuc_thuonghieu()
  {
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
      $danhmuc_sanphamM = $this->load->model("danhmuc_sanphamM");
      $table_dm = 'danhmuc_sanpham';
      $dieukien_dm = "tinhtrang_dm = 0";
      $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_ma($table_dm,$dieukien_dm);
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table_th = 'thuonghieu';
      $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table_th);
      $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
      $table_dmth = 'danhmuc_thuonghieu';
      $data['danhmuc_thuongieu'] = $danhmuc_thuonghieuM->danhmuc_thuonghieu_list($table_dm, $table_th, $table_dmth);
      $this->load->view_admin("danhmuc_thuonghieu/danhmuc_thuonghieu", $data);
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_thuonghieu_insert()
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
      $table = 'danhmuc_thuonghieu';
      $ma_dm = $_POST['ma_dm'];
      $ma_th = $_POST['ma_th'];
      $data = array(
        'ma_dm' => $ma_dm,
        'ma_th' => $ma_th
      );
      $result = $danhmuc_thuonghieuM->danhmuc_thuonghieu_insert($table, $data);
      header("Location:" . BASE_URL . "danhmuc_thuonghieu/danhmuc_thuonghieu");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_thuonghieu_edit($ma_dm, $ma_th)
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
      $table = 'danhmuc_thuonghieu';
      $dieukien = "danhmuc_thuonghieu.ma_dm='$ma_dm' AND danhmuc_thuonghieu.ma_th ='$ma_th'";
      $danhmuc_sanphamM = $this->load->model("danhmuc_sanphamM");
      $table_dm = 'danhmuc_sanpham';
      $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table_th = 'thuonghieu';
      $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table_th);
      $data['danhmuc_thuonghieu_ma'] = $danhmuc_thuonghieuM->danhmuc_thuonghieu_ma($table, $dieukien);
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
      $this->load->view_admin("danhmuc_thuonghieu/danhmuc_thuonghieu_edit", $data);
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_thuonghieu_update($ma_dm, $ma_th)
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
      $table = 'danhmuc_thuonghieu';
      $dieukien = "danhmuc_thuonghieu.ma_dm='$ma_dm' AND danhmuc_thuonghieu.ma_th ='$ma_th'";
      $ma_dm = $_POST['ma_dm'];
      $ma_th = $_POST['ma_th'];
      $data = array(
        'ma_dm' => $ma_dm,
        'ma_th' => $ma_th
      );
      $result = $danhmuc_thuonghieuM->danhmuc_thuonghieu_update($table, $data, $dieukien);
      header("Location:" . BASE_URL . "danhmuc_thuonghieu/danhmuc_thuonghieu");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_thuonghieu_delete($ma_dm, $ma_th)
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
      $table = 'danhmuc_thuonghieu';
      $dieukien = "danhmuc_thuonghieu.ma_dm='$ma_dm' AND danhmuc_thuonghieu.ma_th ='$ma_th'";
      $result = $danhmuc_thuonghieuM->danhmuc_thuonghieu_delete($table, $dieukien);
      header("Location:" . BASE_URL . "danhmuc_thuonghieu/danhmuc_thuonghieu");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_thuonghieu_deleteAll()
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
      $table = 'danhmuc_thuonghieu';
      $result = $danhmuc_thuonghieuM->danhmuc_thuonghieu_deleteAll($table);
      header("Location:" . BASE_URL . "danhmuc_thuonghieu/danhmuc_thuonghieu");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_thuonghieu_timkiem()
  {
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
      $level=session::get('level');
      $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
      $table_dmth = 'danhmuc_thuonghieu';
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $table_dm = 'danhmuc_sanpham';
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "danhmuc_sanpham.ten_dm LIKE '%$tukhoa%'";
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table_th = 'thuonghieu';
      $data['danhmuc_thuonghieu_timkiem'] = $danhmuc_thuonghieuM->danhmuc_thuonghieu_timkiem($table_dm, $table_dmth, $table_th, $dieukien);
      $this->load->view_admin("danhmuc_thuonghieu/danhmuc_thuonghieu_timkiem", $data);
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
}
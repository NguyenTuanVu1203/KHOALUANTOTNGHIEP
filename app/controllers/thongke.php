<?php
class thongke extends controller
{
  public function __construct()
  {
    $data = array();
    $thongbao = array();
    parent::__construct();
  }
  public function index()
  {
    $this->trangchu();
  }
  public function trangchu()
  {
    session::checksession();
    $level = session::get('level');
    if ($level == 1) {
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
      $ngay = date("d/m/Y");
      $dieukien1 = "donhang.ngaylap_dh = '$ngay'";
      //tổng đơn hàng hôm nay
      $data['donhang'] = $donhangM->donhang_nv($table_dh, $dieukien1);
      //doanh thu hôm nay
      $data['doanhthu_homnay'] = $donhangM->doanhthu_homnay($table_dh, $ngay);
      //số nhân viên làm việc hôm nay
      $table_nv = 'nhanvien';
      $data['dem_nhanvien_homnay'] = $donhangM->dem_nhanvien_homnay($table_dh, $ngay);
      $data['nhanvien_homnay'] = $donhangM->nhanvien_homnay($table_dh,$table_nv, $ngay);
      //doanh thu của từng nhân viên theo ngày
      $data['doanhthu_ngay_tung_nv'] = $donhangM->doanhthu_ngay_tung_nv ($table_dh,$table_nv);
      //doanh thu của từng nhân viên theo tháng
      $data['doanhthu_thang_tung_nv'] = $donhangM->doanhthu_thang_tung_nv ($table_dh,$table_nv);
      //doanh thu của từng nhân viên theo năm
      $data['doanhthu_nam_tung_nv'] = $donhangM->doanhthu_nam_tung_nv ($table_dh,$table_nv);
      $this->load->view_admin("thongke/thongke", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function thongtin_nhanvien($ma_nv)
  {
    session::checksession();
    $level = session::get('level');
    if ($level == 1) {
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
      $nhanvienM = $this->load->model('nhanvienM');
      $table_nv = 'nhanvien';
      $dieukien2 = "nhanvien.ma_nv = '$ma_nv'";
      $data['nhanvien_ma'] = $nhanvienM->nhanvien_ma($table_nv,$dieukien2);
      $this->load->view_admin("thongke/thongtin_nhanvien", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function timkiem_doanhthu_nhanvien_ngay(){
    session::checksession();
    $level = session::get('level');
    if ($level == 1) {
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
      $table_nv = 'nhanvien';
      $tukhoa = $_POST['tukhoa'];
      $dieukien1 = "ngaylap_dh LIKE '%$tukhoa%' ";
      $data['doanhthu_ngay_tung_nv_timkiem'] = $donhangM->doanhthu_ngay_tung_nv_timkiem ($table_dh,$table_nv, $dieukien1);
      $this->load->view_admin("thongke/doanhthu_nhanvien_ngay_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function timkiem_doanhthu_nhanvien_thang(){
    session::checksession();
    $level = session::get('level');
    if ($level == 1) {
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
      $table_nv = 'nhanvien';
      $tukhoa = $_POST['tukhoa'];
      $dieukien1 = "thanglap_dh LIKE '%$tukhoa%' ";
      $data['doanhthu_thang_tung_nv_timkiem'] = $donhangM->doanhthu_thang_tung_nv_timkiem ($table_dh,$table_nv, $dieukien1);
      $this->load->view_admin("thongke/doanhthu_nhanvien_thang_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function timkiem_doanhthu_nhanvien_nam(){
    session::checksession();
    $level = session::get('level');
    if ($level == 1) {
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
      $table_nv = 'nhanvien';
      $tukhoa = $_POST['tukhoa'];
      $dieukien1 = "namlap_dh LIKE '%$tukhoa%' ";
      $data['doanhthu_nam_tung_nv_timkiem'] = $donhangM->doanhthu_nam_tung_nv_timkiem ($table_dh,$table_nv, $dieukien1);
      $this->load->view_admin("thongke/doanhthu_nhanvien_nam_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
}
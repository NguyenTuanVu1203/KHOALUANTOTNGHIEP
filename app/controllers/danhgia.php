<?php
class danhgia extends controller
{
  public function __construct()
  {
    $data = array();
    parent::__construct();
  }
  public function danhgia()
  {
    session::init();
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
    $level = session::get('level');
    if ($level == 1) {
      $this->load->view_admin("leftmenu", $data);
    } else if ($level == 2) {
      $this->load->view_admin("leftmenu_nhanvien", $data);
    }
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $table_sp = "sanpham";
    $table_dm = "danhmuc_sanpham";
    $table_th = "thuonghieu";
    $data['danhgia'] = $danhgiaM->danhgia_list($table_dg, $table_sp, $table_dm, $table_th);
    $this->load->view_admin("danhgia/danhgia", $data);
  }
  public function thongke()
  {
    session::init();
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
      $danhgiaM = $this->load->model('danhgiaM');
      $table_dg = 'danhgia';
      $table_sp = "sanpham";
      $data['count_sao'] = $danhgiaM->count_sao($table_sp, $table_dg);
      $data['count_sao_chitiet'] = $danhgiaM->count_sao_chitiet($table_sp, $table_dg);
      $this->load->view_admin("danhgia/danhgia_thongke", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function danhgia_insert()
  {
    session::init();
    $danhgiaM = $this->load->model('danhgiaM');
    $table = 'danhgia';
    $ten_k = $_POST['ten_k'];
    $noidung_dg = $_POST['noidung_dg'];
    $sosao_dg = $_POST['sosao_dg'];
    $ma_sp = $_POST['ma_sp'];
    $ma_dh = $_POST['ma_dh'];
    $data = array(
      'ten_k' => $ten_k,
      'noidung_dg' => $noidung_dg,
      'sosao_dg' => $sosao_dg,
      'ma_sp' => $ma_sp
    );
    $data_update = array(
      'tinhtrang_ctdh' => 1
    );
    $result = $danhgiaM->danhgia_insert($table, $data);
    $chitiet_donhangM = $this->load->model('chitiet_donhangM');
    $table_ctdh = 'chitiet_donhang';
    $dieukien = "ma_dh = '$ma_dh' and ma_sp = '$ma_sp'";
    $result = $chitiet_donhangM -> chitiet_donhang_update($table_ctdh, $data_update, $dieukien);
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    $dieukien = "sanpham.ma_sp = '$ma_sp'";
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['sanpham_ma'] = $sanphamM->sanpham_ma($table_sp, $dieukien);
    if ($data['sanpham_ma']) {
      foreach ($data['sanpham_ma'] as $sp_m) {
        $ma_dm = $sp_m['ma_dm'];
        $dieukien1 = "danhmuc_sanpham.ma_dm = '$ma_dm'";
        $data['danhmuc_ma'] = $danhmuc_sanphamM->danhmuc_sanpham_ma($table_dm, $dieukien1);
        if ($data['danhmuc_ma']) {
          foreach ($data['danhmuc_ma'] as $dm_m) {
            header("Location:" . BASE_URL . '/' . $dm_m['ghichu_dm'] . '/chitiet_sanpham' . '/' . $sp_m['ma_sp'] . '/' . $sp_m['ma_th'] . '/' . $ma_dm);
          }
        }
      }
    }
  }
  public function danhgia_deleteAll()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $danhgiaM = $this->load->model('danhgiaM');
      $table = 'danhgia';
      $result = $danhgiaM->danhgia_deleteAll($table);
      header("Location:" . BASE_URL . "danhgia/danhgia");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function danhgia_timkiem()
  {
    session::init();
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
    $level = session::get('level');
    if($level == 1){
      $this->load->view_admin("leftmenu", $data);
    }else if($level == 2){
      $this->load->view_admin("leftmenu_nhanvien", $data);
    }
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $table_sp = "sanpham";
    $table_dm = "danhmuc_sanpham";
    $table_th = "thuonghieu";
    $tukhoa = $_POST['tukhoa'];
    $dieukien_dg = "sanpham.ten_sp LIKE '%$tukhoa%'";
    $data['danhgia'] = $danhgiaM->danhgia_timkiem($table_dg, $table_sp, $table_dm, $table_th, $dieukien_dg);
    $this->load->view_admin("danhgia/danhgia_timkiem", $data);
  }
  public function thongke_timkiem()
  {
    session::init();
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
      $danhgiaM = $this->load->model('danhgiaM');
      $table_dg = 'danhgia';
      $table_sp = "sanpham";
      $tukhoa = $_POST['tukhoa'];
      $dieukien_tk = "sanpham.ten_sp LIKE '%$tukhoa%'";
      $data['danhgia_thongke_timkiem'] = $danhgiaM->danhgia_thongke_timkiem($table_dg, $table_sp, $dieukien_tk);
      $data['count_sao_chitiet'] = $danhgiaM->count_sao_chitiet($table_sp, $table_dg);
      $this->load->view_admin("danhgia/danhgia_thongke_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
}
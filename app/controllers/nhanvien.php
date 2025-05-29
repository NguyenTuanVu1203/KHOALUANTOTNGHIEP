<?php
class nhanvien extends controller
{
  public function __construct()
  {
    $data = array();
    $thongbao = array();
    parent::__construct();
  }
  //giao diện của nhân viên có level 2 khi đăng nhập vào
  public function index()
  {
    $this->trangchu();
  }
  public function trangchu()
  {
    session::checksession();
    $this->load->view_admin("header");
    //đơn hàng
    $table_dh = "donhang";
    $donhangM = $this->load->model('donhangM');
    $dieukien_m = 'donhang.tinhtrang_dh = 0';
    $data['donhang_moi'] = $donhangM->donhang_moi($table_dh, $dieukien_m);
    $dieukien_vc = 'donhang.tinhtrang_dh = 1';
    $data['donhang_dangvanchuyen'] = $donhangM->donhang_moi($table_dh, $dieukien_vc);
    $dieukien_dg = 'donhang.tinhtrang_dh = 2';
    $data['donhang_dagiao'] = $donhangM->donhang_moi($table_dh, $dieukien_dg);
    $this->load->view_admin("leftmenu_nhanvien", $data);
    //tổng số đơn hàng của nhân viên
    $ma_nv = session::get('ma_nv');
    $dieukien = "donhang.ma_nv = '$ma_nv' ";
    $data['donhang'] = $donhangM->donhang_nv($table_dh, $dieukien);
    //doanh thu hôm nay của nhân viên
    $ngay = date("d/m/Y");
    $data['doanhthu_homnay'] = $donhangM->doanhthu_homnay_nv($table_dh, $ngay, $dieukien);
    //doanh thu của nhân viên
    $data['doanhthu_nv'] = $donhangM->doanhthu_nv($table_dh, $dieukien);
    //sản phẩm
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    $data['sanpham'] = $sanphamM->sanpham($table_sp);
    //thống kê ngày
    //đơn hàng
    $table_dh = "donhang";
    $donhangM = $this->load->model('donhangM');
    //chi tiết đơn hàng
    $table_ctdh = 'chitiet_donhang';
    $data['soluong_ngay'] = $donhangM->soluong_ngay_nv($table_dh, $table_sp, $table_ctdh, $dieukien);
    $data['tongtien_ngay'] = $donhangM->tongtien_ngay_nv($table_dh, $dieukien);
    $data['count_sp_ngay'] = $donhangM->count_sp_ngay_nv($table_dh, $table_ctdh, $table_sp, $dieukien);
    //thống kê tháng
    $data['soluong_thang'] = $donhangM->soluong_thang_nv($table_dh, $table_sp, $table_ctdh, $dieukien);
    $data['tongtien_thang'] = $donhangM->tongtien_thang_nv($table_dh, $dieukien);
    $data['count_sp_thang'] = $donhangM->count_sp_thang_nv($table_dh, $table_ctdh, $table_sp, $dieukien);
    //thống kê nam
    $data['soluong_nam'] = $donhangM->soluong_nam_nv($table_dh, $table_sp, $table_ctdh, $dieukien);
    $data['tongtien_nam'] = $donhangM->tongtien_nam_nv($table_dh, $dieukien);
    $data['count_sp_nam'] = $donhangM->count_sp_nam_nv($table_dh, $table_ctdh, $table_sp, $dieukien);
    //lấy thông tin nhân viên
    $table_nv = 'nhanvien';
    $nhanvienM = $this->load->model('nhanvienM');
    $dieukien_nv = "nhanvien.ma_nv = '$ma_nv'";
    $data['nhanvien_ma'] = $nhanvienM->nhanvien_ma($table_nv, $dieukien_nv);
    $this->load->view_admin("trangchu_nhanvien", $data);
  }
  // 
  public function nhanvien()
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
      $nhanvienM = $this->load->model('nhanvienM');
      $table = 'nhanvien';
      $data['nhanvien'] = $nhanvienM->nhanvien_list($table);
      $this->load->view_admin("nhanvien/nhanvien", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function nhanvien_an($ma_nv){
    session::init();
    $nhanvienM = $this->load->model('nhanvienM');
    $table_nv = 'nhanvien';
    $dieukien = "nhanvien.ma_nv='$ma_nv'" ;
    $data = array(
      'tinhtrang_nv' => 1
    );
    $result = $nhanvienM->nhanvien_update($table_nv, $data, $dieukien);
    header("Location:".BASE_URL."nhanvien/nhanvien");
  }
  public function nhanvien_hien($ma_nv){
    session::init();
    $nhanvienM = $this->load->model('nhanvienM');
    $table_nv = 'nhanvien';
    $dieukien = "nhanvien.ma_nv='$ma_nv'" ;
    $data = array(
      'tinhtrang_nv' => 0
    );
    $result = $nhanvienM->nhanvien_update($table_nv, $data, $dieukien);
    header("Location:".BASE_URL."nhanvien/nhanvien");
  }
  public function nhanvien_insert()
  {
    session::init();
    $nhanvienM = $this->load->model('nhanvienM');
    $table_nv = 'nhanvien';
    $ten_nv = $_POST['ten_nv'];
    $user_nv = $_POST['user_nv'];
    $pass_nv = md5($_POST['pass_nv']);
    $sdt_nv = $_POST['sdt_nv'];
    $diachi_nv = $_POST['diachi_nv'];
    $data = array(
      'ten_nv' => $ten_nv,
      'user_nv' => $user_nv,
      'pass_nv' => $pass_nv,
      'sdt_nv' => $sdt_nv,
      'diachi_nv' => $diachi_nv
    );
    $result = $nhanvienM->nhanvien_insert($table_nv, $data);
    header("Location:" . BASE_URL . "nhanvien/nhanvien");
  }
  public function nhanvien_edit($ma_nv)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $nhanvienM = $this->load->model('nhanvienM');
      $table_nv = 'nhanvien';
      $dieukien = "nhanvien.ma_nv='$ma_nv'";
      $data['nhanvien_ma'] = $nhanvienM->nhanvien_ma($table_nv, $dieukien);
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
      $this->load->view_admin("nhanvien/nhanvien_edit", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function nhanvien_capnhat($ma_nv)
  {
    session::init();
    $nhanvienM = $this->load->model('nhanvienM');
    $table_nv = 'nhanvien';
    $dieukien = "nhanvien.ma_nv='$ma_nv'";
    $data['nhanvien_ma'] = $nhanvienM->nhanvien_ma($table_nv, $dieukien);
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
    }else if($level == 2){
      $this->load->view_admin("leftmenu_nhanvien", $data);
    }
    $this->load->view_admin("nhanvien/nhanvien_edit", $data);
  }
  public function nhanvien_matkhau($ma_nv)
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
    $nhanvienM = $this->load->model('nhanvienM');
    $table_nv = 'nhanvien';
    $dieukien = "nhanvien.ma_nv='$ma_nv'";
    $data['nhanvien_ma'] = $nhanvienM->nhanvien_ma($table_nv, $dieukien);
    $level = session::get('level');
    if ($level == 1) {
      $this->load->view_admin("leftmenu", $data);
    }else if($level == 2){
      $this->load->view_admin("leftmenu_nhanvien", $data);
    }
    $this->load->view_admin("nhanvien/nhanvien_matkhau", $data);
  }
  public function nhanvien_update_matkhau($ma_nv)
  {
    session::init();
    $nhanvienM = $this->load->model('nhanvienM');
    $table_nv = 'nhanvien';
    $pass_cu = md5($_POST['pass_cu']);
    $pass_moi = md5($_POST['pass_moi']);
    $dieukien = "nhanvien.ma_nv='$ma_nv'";
    $data['nhanvien_ma'] = $nhanvienM->nhanvien_ma($table_nv, $dieukien);
    if($data['nhanvien_ma']){
      foreach($data['nhanvien_ma'] as $key => $nv){
        $i = strcmp($pass_cu, $nv['pass_nv']);
        if($i == 0){
          $data = array(
            'pass_nv' => $pass_moi
          );
          $result = $nhanvienM->nhanvien_update($table_nv, $data, $dieukien);
          if($nv['level'] == 1){
            header("Location:" . BASE_URL . "admin/index");
          }else if($nv['level'] == 2){
            header("Location:" . BASE_URL . "nhanvien/nhanvien");
          }
        }else{
          header("Location:" . BASE_URL . "nhanvien/nhanvien_matkhau/".$nv['ma_nv']);
        }
      }
    }
  }
  public function nhanvien_update($ma_nv)
  {
    session::init();
    $nhanvienM = $this->load->model('nhanvienM');
    $table_nv = 'nhanvien';
    $dieukien = "nhanvien.ma_nv='$ma_nv'";
    $ten_nv = $_POST['ten_nv'];
    $sdt_nv = $_POST['sdt_nv'];
    $diachi_nv = $_POST['diachi_nv'];
    $data = array(
      'ten_nv' => $ten_nv,
      'sdt_nv' => $sdt_nv,
      'diachi_nv' => $diachi_nv
    );
    $result = $nhanvienM->nhanvien_update($table_nv, $data, $dieukien);
    header("Location:" . BASE_URL . "nhanvien/nhanvien");
  }
  public function nhanvien_delete($ma_nv)
  {
    session::init();
    $nhanvienM = $this->load->model('nhanvienM');
    $table_nv = 'nhanvien';
    $dieukien = "nhanvien.ma_nv='$ma_nv'";
    $result = $nhanvienM->nhanvien_delete($table_nv, $dieukien);
    header("Location:" . BASE_URL . "nhanvien/nhanvien");
  }
  public function nhanvien_timkiem()
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
      $nhanvienM = $this->load->model('nhanvienM');
      $table_nv = 'nhanvien';
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "nhanvien.ten_nv LIKE '%$tukhoa%'";
      $data['nhanvien_timkiem'] = $nhanvienM->nhanvien_timkiem($table_nv, $dieukien);
      $this->load->view_admin("nhanvien/nhanvien_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
}
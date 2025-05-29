<?php
use Carbon\Carbon;
  class donhang extends controller{
    public function __construct()
    {
      $data = array();
      $thongbao = array();
      parent::__construct();
    }
    //admin
    public function donhang(){
      session::init();
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
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
      $level=session::get('level');
      if($level == 1){
        $this->load->view_admin("leftmenu", $data);
      }else if($level == 2){
        $this->load->view_admin("leftmenu_nhanvien", $data);
      }
      $table_km = "khuyenmai";
      $data['donhang_all'] = $donhangM->donhang_list($table_dh, $table_km);
      $this->load->view_admin("donhang/donhang_all", $data);
    }
    public function chitiet_donhang($ma_dh){
      session::init();
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      //chi tiết đơn hàng
      $table_ctdh = 'chitiet_donhang';
      $chitiet_donhangM = $this->load->model('chitiet_donhangM');
      //sản phẩm
      $table_sp = 'sanpham';
      //màu
      $table_m = 'mau';
      $dieukien = "chitiet_donhang.ma_dh = '$ma_dh' ";
      $this->load->view_admin("header");
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      $this->load->view_admin("header");
      $dieukien_m = 'donhang.tinhtrang_dh = 0';
      $data['donhang_moi'] = $donhangM->donhang_moi($table_dh, $dieukien_m);
      $dieukien_vc = 'donhang.tinhtrang_dh = 1';
      $data['donhang_dangvanchuyen'] = $donhangM->donhang_moi($table_dh, $dieukien_vc);
      $dieukien_dg = 'donhang.tinhtrang_dh = 2';
      $data['donhang_dagiao'] = $donhangM->donhang_moi($table_dh, $dieukien_dg);
      $table_dm='danhmuc_sanpham';
      $level=session::get('level');
      if($level == 1){
        $this->load->view_admin("leftmenu", $data);
      }else if($level == 2){
        $this->load->view_admin("leftmenu_nhanvien", $data);
      }
      $table_km ="khuyenmai";
      $data['chitiet_donhang_madh'] = $chitiet_donhangM->chitiet_donhang_madh($table_dh, $table_ctdh, $table_sp, $table_m, $table_dm,$table_km, $dieukien);
      $this->load->view_admin("donhang/chitiet_donhang", $data);
    }
    public function xuly($ma_dh){
      session::init();
      //đơn hàng
      $ma_nv = session::get('ma_nv');
      $table_dh = "donhang";
      $date = Carbon::now('Asia/Ho_Chi_Minh');
      $donhangM = $this->load->model('donhangM');
      $dieukien = "donhang.ma_dh = '$ma_dh'";
      $data = array(
        'tinhtrang_dh' => '1',
        'ma_nv' => $ma_nv,
        'ngay_xuly' => $date
      );
      $result = $donhangM->donhang_update($table_dh, $data, $dieukien);
      header("Location:".BASE_URL."donhang/donhang");
    }
    public function xuly_m($ma_dh){
      session::init();
      //đơn hàng
      $table_dh = "donhang";
      $date = Carbon::now('Asia/Ho_Chi_Minh');
      $donhangM = $this->load->model('donhangM');
      $dieukien = "donhang.ma_dh = '$ma_dh'";
      $ma_nv = session::get('ma_nv');
      $data = array(
        'tinhtrang_dh' => '1',
        'ma_nv' => $ma_nv,
        'ngay_xuly' => $date
      );
      $result = $donhangM->donhang_update($table_dh, $data, $dieukien);
      header("Location:".BASE_URL."donhang/donhang_moi");
    }
    public function huy ($ma_dh){
      session::init();
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      $dieukien = "donhang.ma_dh = '$ma_dh'";
      $result = $donhangM->donhang_delete($table_dh, $dieukien);
      header("Location:".BASE_URL."donhang/donhang");
    }
    public function huy_m ($ma_dh){
      session::init();
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      $dieukien = "donhang.ma_dh = '$ma_dh'";
      $result = $donhangM->donhang_delete($table_dh, $dieukien);
      header("Location:".BASE_URL."donhang/donhang_moi");
    }
    public function donhang_moi(){
      session::init();
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      $this->load->view_admin("header");
      $dieukien = 'donhang.tinhtrang_dh = 0';
      $data['donhang_moi'] = $donhangM->donhang_moi($table_dh, $dieukien);
      $dieukien_vc = 'donhang.tinhtrang_dh = 1';
      $data['donhang_dangvanchuyen'] = $donhangM->donhang_moi($table_dh, $dieukien_vc);
      $dieukien_dg = 'donhang.tinhtrang_dh = 2';
      $data['donhang_dagiao'] = $donhangM->donhang_moi($table_dh, $dieukien_dg);
      $level=session::get('level');
      if($level == 1){
        $this->load->view_admin("leftmenu", $data);
      }else if($level == 2){
        $this->load->view_admin("leftmenu_nhanvien", $data);
      }
      $this->load->view_admin("donhang/donhang_moi", $data);
    }
    public function donhang_dangvanchuyen(){
      session::init();
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      $this->load->view_admin("header");
      $dieukien = 'donhang.tinhtrang_dh = 0';
      $data['donhang_moi'] = $donhangM->donhang_moi($table_dh, $dieukien);
      $dieukien_vc = 'donhang.tinhtrang_dh = 1';
      $data['donhang_dangvanchuyen'] = $donhangM->donhang_moi($table_dh, $dieukien_vc);
      $dieukien_dg = 'donhang.tinhtrang_dh = 2';
      $data['donhang_dagiao'] = $donhangM->donhang_moi($table_dh, $dieukien_dg);
      $level=session::get('level');
      if($level == 1){
        $this->load->view_admin("leftmenu", $data);
      }else if($level == 2){
        $this->load->view_admin("leftmenu_nhanvien", $data);
      }
      $this->load->view_admin("donhang/donhang_dangvanchuyen", $data);
    }
    public function donhang_dagiao(){
      session::init();
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      $this->load->view_admin("header");
      $dieukien = 'donhang.tinhtrang_dh = 0';
      $data['donhang_moi'] = $donhangM->donhang_moi($table_dh, $dieukien);
      $dieukien_vc = 'donhang.tinhtrang_dh = 1';
      $data['donhang_dangvanchuyen'] = $donhangM->donhang_moi($table_dh, $dieukien_vc);
      $dieukien_dg = 'donhang.tinhtrang_dh = 2';
      $data['donhang_dagiao'] = $donhangM->donhang_moi($table_dh, $dieukien_dg);
      $level=session::get('level');
      if($level == 1){
        $this->load->view_admin("leftmenu", $data);
      }else if($level == 2){
        $this->load->view_admin("leftmenu_nhanvien", $data);
      }
      $this->load->view_admin("donhang/donhang_dagiao", $data);
    }
    //user
    public function dathang(){
      session::init();
      //sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      //chi tiết đơn hàng
      $table_ctdh = 'chitiet_donhang';
      $chitiet_donhangM = $this->load->model('chitiet_donhangM');
      $ten_k = $_POST['ten_k'];
      $sdt_k = $_POST['sdt_k'];
      $gioitinh_k = $_POST['gioitinh_k'];
      $diachi_k = $_POST['diachi_k'];
      $ma_km = $_POST['ma_km'];
      $ma_dh = rand(0,999999);
      $tonggia_dh = $_POST['tonggia_dh'];
      $matkhau_k = md5($_POST['matkhau_k']);
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $ngaylap_dh = date("d/m/Y");
      $giolap_dh = date("h:i:sa");
      $thoigian_bh = Carbon::now('Asia/Ho_Chi_Minh');
      $thoigian_bh = $thoigian_bh->addYears(1);
      $date = Carbon::now('Asia/Ho_Chi_Minh');
      $thanglap_dh = $date->month.'/'.$date->year;
      $namlap_dh = $date->year;
      $data_dh = array(
        'ma_dh' => $ma_dh,
        'ten_k' => $ten_k,
        'sdt_k' => $sdt_k,
        'ma_km' => $ma_km,
        'gioitinh_k' => $gioitinh_k,
        'diachi_k' => $diachi_k,
        'tonggia_dh' => $tonggia_dh,
        'ngaylap_dh' => $ngaylap_dh,
        'thanglap_dh' => $thanglap_dh,
        'namlap_dh' => $namlap_dh,
        'giolap_dh' => $giolap_dh,
        'matkhau_k' => $matkhau_k
      );
      $result_dh = $donhangM->donhang_insert($table_dh, $data_dh);
      //cập nhật lại số lượng khuyến mãi
      $khuyenmaiM = $this->load->model('khuyenmaiM');
      $table_km = 'khuyenmai';
      $dieukien_km = "khuyenmai.ma_km = '$ma_km'";
      $data['khuyenmai_ma'] = $khuyenmaiM->khuyenmai_ma($table_km, $dieukien_km);
      if($data['khuyenmai_ma']){
        foreach($data['khuyenmai_ma'] as $key => $km){
          $soluong = $km['soluong_km'];
          $soluong_km = $soluong -1;
          $data_km = array(
            'soluong_km' => $soluong_km
          );
        }
        $result = $khuyenmaiM->khuyenmai_update($table_km, $data_km, $dieukien_km);
      }
      
      if(session::get("giohang") == true){
        foreach (session::get("giohang") as $key => $gh){
          $data_ctdh = array(
            'ma_dh' => $ma_dh,
            'ma_sp' => $gh['ma_sp'],
            'soluong_dat' => $gh['soluong_dat'],
            'thoigian_bh' => $thoigian_bh,
            'ma_m' => $gh['ma_m']
          );
          $result_ctdh = $chitiet_donhangM->chitiet_donhang_insert($table_ctdh, $data_ctdh);
          //update số lượng trong bảng sản phẩm
          $ma_sp = $gh['ma_sp'];
          $dieukien_update = "sanpham.ma_sp = '$ma_sp'";
          $data['sanpham_ma'] = $sanphamM->sanpham_ma($table_sp, $dieukien_update);
          foreach ($data['sanpham_ma'] as $key => $sp){
            $soluong_sp = $sp['soluong_sp'] - $gh['soluong_dat'];
            $data_update = array(
              'soluong_sp' => $soluong_sp
            );
            $update_soluong_sp = $sanphamM-> sanpham_update($table_sp, $data_update, $dieukien_update);
          }
          
        }
        unset($_SESSION['giohang']);
      }
      header("Location:".BASE_URL."giohang/giohang");
    }
    public function donhang_timkiem(){
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
      $level=session::get('level');
      if($level == 1){
        $this->load->view_admin("leftmenu", $data);
      }else if($level == 2){
        $this->load->view_admin("leftmenu_nhanvien", $data);
      }
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "donhang.ma_dh = '$tukhoa'" ;
      $data ['donhang_timkiem'] = $donhangM->donhang_timkiem($table_dh, $dieukien);
      $this->load->view_admin("donhang/donhang_timkiem", $data);
    }
    public function donhang_deleteAll()
    {
      session::init();
      $level=session::get('level');
      if($level == 1){
        $donhangM = $this->load->model('donhangM');
        $table_dh = 'donhang';
        $result = $donhangM->donhang_deleteAll($table_dh);
        header("Location:" . BASE_URL . "donhang/donhang");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
  }
?>
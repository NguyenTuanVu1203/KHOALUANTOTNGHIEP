<?php
  use Carbon\Carbon;
  class baohanh extends controller{
    public function __construct()
    {
      $data = array();
      parent::__construct();
    }
    public function baohanh($ma_dh){
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
      $table_km = "khuyenmai";
      $data['donhang'] = $donhangM->donhang_list($table_dh, $table_km);
      $dieukien1 = "donhang.ma_dh = '$ma_dh'";
      $data['donhang_ma'] = $donhangM->donhang_ma($table_dh, $dieukien1);
      //chi tiết đơn hàng
      $table_ctdh = 'chitiet_donhang';
      $chitiet_donhangM = $this->load->model('chitiet_donhangM');
      $table_sp = 'sanpham';
      $table_m = 'mau';
      $table_dm = "danhmuc_sanpham";
      $data['sanpham_donhang'] = $chitiet_donhangM->chitiet_donhang_madh($table_dh, $table_ctdh, $table_sp, $table_m, $table_dm, $table_km, $dieukien1);
      $this->load->view_admin("baohanh/baohanh", $data);
    }
    public function baohanh_insert(){
      session::init();
      //bảo hành
      $baohanhM = $this->load->model('baohanhM');
      $table_bh = "baohanh";
      $ma_dh = $_POST['ma_dh'];
      $ma_sp = $_POST['ma_sp'];
      $noidung_bh = $_POST['noidung_bh'];
      $ngay_bh = Carbon::now('Asia/Ho_Chi_Minh');
      $data_bh = array(
        'ma_dh' => $ma_dh,
        'ma_sp' => $ma_sp,
        'noidung_bh' => $noidung_bh,
        'ngay_bh' => $ngay_bh
      );
      $result_bh = $baohanhM->baohanh_insert($table_bh, $data_bh);
      header("Location:".BASE_URL."baohanh/baohanh_list");
    }
    public function baohanh_list(){
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
      //bảo hành
      $baohanhM = $this->load->model('baohanhM');
      $table_bh = "baohanh";
      // sản phẩm
      $table_sp = 'sanpham';
      //chi tiết đơn hàng
      $table_ctdh = 'chitiet_donhang';
      $chitiet_donhangM = $this->load->model('chitiet_donhangM');
      $order = "baohanh.ngay_bh desc ";
      $dieukien1 = "baohanh.ma_sp = chitiet_donhang.ma_sp";
      $data['baohanh_list'] = $baohanhM->baohanh_list($table_bh, $table_dh, $table_sp, $table_ctdh,$dieukien1, $order);
      $this->load->view_admin("baohanh/baohanh_list", $data);
    }
    public function baohanh_timkiem(){
      session::init();
      $this->load->view_admin("header");
      $ma_dh = $_POST['tukhoa'];
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
      //bảo hành
      $baohanhM = $this->load->model('baohanhM');
      $table_bh = "baohanh";
      // sản phẩm
      $table_sp = 'sanpham';
      //chi tiết đơn hàng
      $table_ctdh = 'chitiet_donhang';
      $order = "baohanh.ngay_bh desc ";
      $dieukien1 = "baohanh.ma_sp = chitiet_donhang.ma_sp AND baohanh.ma_dh = '$ma_dh'";
      $data['baohanh_timkiem'] = $baohanhM->baohanh_list($table_bh, $table_dh, $table_sp, $table_ctdh,$dieukien1, $order);
      $this->load->view_admin("baohanh/baohanh_timkiem", $data);
    }
    public function baohanh_edit($ma_bh, $ma_dh){
      session::init();
      $this->load->view_admin("header");
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      $data['donhang'] = $donhangM->donhang_list($table_dh);
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
      //bảo hành
      $baohanhM = $this->load->model('baohanhM');
      $table_bh = "baohanh";
      // sản phẩm
      $table_sp = 'sanpham';
      //màu
      $table_m = 'mau';
      //chi tiết đơn hàng
      $table_ctdh = 'chitiet_donhang';
      $chitiet_donhangM = $this->load->model('chitiet_donhangM');
      $dieukien2 = "donhang.ma_dh = '$ma_dh'";
      $data['sanpham_donhang'] = $chitiet_donhangM->chitiet_donhang_madh($table_dh, $table_ctdh, $table_sp, $table_m, $dieukien2);
      //chi tiết đơn hàng
      $table_ctdh = 'chitiet_donhang';
      $chitiet_donhangM = $this->load->model('chitiet_donhangM');
      $dieukien1 = "baohanh.ma_sp = chitiet_donhang.ma_sp AND baohanh.ma_bh = '$ma_bh'";
      $order = "baohanh.ngay_bh desc ";
      $data['baohanh_ma'] = $baohanhM->baohanh_list($table_bh, $table_dh, $table_sp, $table_ctdh,$dieukien1, $order);
      $this->load->view_admin("baohanh/baohanh_edit", $data);
    }
    public function baohanh_update($ma_bh){
      header("Location:".BASE_URL."baohanh/baohanh_list");
      session::init();
      $this->load->view_admin("header");
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      $data['donhang'] = $donhangM->donhang_list($table_dh);
      $dieukien = 'donhang.tinhtrang_dh = 0';
      $data['donhang_moi'] = $donhangM->donhang_moi($table_dh, $dieukien);
      $dieukien_vc = 'donhang.tinhtrang_dh = 1';
      $data['donhang_dangvanchuyen'] = $donhangM->donhang_moi($table_dh, $dieukien_vc);
      $dieukien_dg = 'donhang.tinhtrang_dh = 2';
      $data['donhang_dagiao'] = $donhangM->donhang_moi($table_dh, $dieukien_dg);
      $this->load->view_admin("leftmenu", $data);
      //bảo hành
      $baohanhM = $this->load->model('baohanhM');
      $table_bh = "baohanh";
      $ma_dh = $_POST['ma_dh'];
      $ma_sp = $_POST['ma_sp'];
      $noidung_bh = $_POST['noidung_bh'];
      $ngay_bh = Carbon::now('Asia/Ho_Chi_Minh');
      $dieukien_bh = "baohanh.ma_bh = '$ma_bh'";
      $data_bh = array(
        'ma_dh' => $ma_dh,
        'ma_sp' => $ma_sp,
        'noidung_bh' => $noidung_bh,
        'ngay_bh' => $ngay_bh
      );
      $result_bh = $baohanhM->baohanh_update($table_bh, $data_bh, $dieukien_bh);
    }
    public function baohanh_delete($ma_bh){
      session::init();
      //bảo hành
      $baohanhM = $this->load->model('baohanhM');
      $table_bh = "baohanh";
      $dieukien = "baohanh.ma_bh = '$ma_bh'";
      $result = $baohanhM->baohanh_delete($table_bh, $dieukien);
      header("Location:".BASE_URL."baohanh/baohanh_list");
    }
    public function baohanh_deleteAll(){
      session::init();
      //bảo hành
      $baohanhM = $this->load->model('baohanhM');
      $table_bh = "baohanh";
      $result = $baohanhM->baohanh_deleteAll($table_bh);
      header("Location:".BASE_URL."baohanh/baohanh_list");
    }
  }
?>
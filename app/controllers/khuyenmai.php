<?php
  class khuyenmai extends controller{
    public function __construct()
    {
      $data = array();
      $thongbao = array();
      parent::__construct();
    }
    public function khuyenmai(){
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
      $khuyenmaiM = $this->load->model('khuyenmaiM');
      $table = 'khuyenmai';
      $data ['khuyenmai'] = $khuyenmaiM->khuyenmai_list($table);
      $this->load->view_admin("khuyenmai/khuyenmai", $data); 
    }
    public function khuyenmai_insert(){
      session::init();
      $ma_nv = session::get('ma_nv');
      $khuyenmaiM = $this->load->model('khuyenmaiM');
      $table = 'khuyenmai';
      $ten_km = $_POST['ten_km'];
      $phantram_km = $_POST['phantram_km'];
      $dieukien_km = $_POST['dieukien_km'];
      $batdau_km = $_POST['batdau_km'];
      $ketthuc_km = $_POST['ketthuc_km'];
      $soluong_km = $_POST['soluong_km'];
      $loai_km = $_POST['loai_km'];
      $data = array(
        'ten_km' => $ten_km,
        'phantram_km' => $phantram_km,
        'dieukien_km' => $dieukien_km,
        'batdau_km' => $batdau_km,
        'ketthuc_km' => $ketthuc_km,
        'soluong_km' => $soluong_km,
        'loai_km' => $loai_km,
        'ma_nv' => $ma_nv
      );
      $result = $khuyenmaiM->khuyenmai_insert($table, $data);
      header("Location:".BASE_URL."khuyenmai/khuyenmai");
    }
    public function khuyenmai_edit($ma_km){
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
      $khuyenmaiM = $this->load->model('khuyenmaiM');
      $table_km = 'khuyenmai';
      $dieukien_km = "khuyenmai.ma_km = '$ma_km'";
      $data['khuyenmai_ma'] = $khuyenmaiM->khuyenmai_ma($table_km, $dieukien_km);
      $this->load->view_admin("khuyenmai/khuyenmai_edit", $data);
    }
    public function khuyenmai_update($ma_km){
      session::init();
      $khuyenmaiM = $this->load->model('khuyenmaiM');
      $table_km = 'khuyenmai';
      $dieukien = "khuyenmai.ma_km='$ma_km'" ;
      $ten_km = $_POST['ten_km'];
      $phantram_km = $_POST['phantram_km'];
      $dieukien_km = $_POST['dieukien_km'];
      $batdau_km = $_POST['batdau_km'];
      $ketthuc_km = $_POST['ketthuc_km'];
      $soluong_km = $_POST['soluong_km'];
      $loai_km = $_POST['loai_km'];
      $ma_nv = session::get('ma_nv');
      $data = array(
        'ten_km' => $ten_km,
        'phantram_km' => $phantram_km,
        'dieukien_km' => $dieukien_km,
        'batdau_km' => $batdau_km,
        'ketthuc_km' => $ketthuc_km,
        'soluong_km' => $soluong_km,
        'loai_km' => $loai_km,
        'ma_nv' => $ma_nv
      );
      $result = $khuyenmaiM->khuyenmai_update($table_km, $data, $dieukien);
      header("Location:".BASE_URL."khuyenmai/khuyenmai");
    }
    public function khuyenmai_an($ma_km){
      session::init();
      $khuyenmaiM = $this->load->model('khuyenmaiM');
      $table_km = 'khuyenmai';
      $dieukien = "khuyenmai.ma_km='$ma_km'" ;
      $data = array(
        'tinhtrang_km' => 1
      );
      $result = $khuyenmaiM->khuyenmai_update($table_km, $data, $dieukien);
      header("Location:".BASE_URL."khuyenmai/khuyenmai");
    }
    public function khuyenmai_hien($ma_km){
      session::init();
      $khuyenmaiM = $this->load->model('khuyenmaiM');
      $table_km = 'khuyenmai';
      $dieukien = "khuyenmai.ma_km='$ma_km'" ;
      $data = array(
        'tinhtrang_km' => 0
      );
      $result = $khuyenmaiM->khuyenmai_update($table_km, $data, $dieukien);
      header("Location:".BASE_URL."khuyenmai/khuyenmai");
    }
    public function khuyenmai_delete($ma_km){
      session::init();
      $khuyenmaiM = $this->load->model('khuyenmaiM');
      $table_km = 'khuyenmai';
      $dieukien_km = "khuyenmai.ma_km = '$ma_km'";
      $result = $khuyenmaiM->khuyenmai_delete($table_km, $dieukien_km);
      header("Location:".BASE_URL."khuyenmai/khuyenmai");
    }
    public function khuyenmai_deleteAll()
    {
      session::init();
      $level=session::get('level');
      if($level == 1){
        $khuyenmaiM = $this->load->model('khuyenmaiM');
        $table_km = 'khuyenmai';
        $result = $khuyenmaiM->khuyenmai_deleteAll($table_km);
        header("Location:" . BASE_URL . "khuyenmai/khuyenmai");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function khuyenmai_timkiem(){
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
      $this->load->view_admin("leftmenu", $data);
      $khuyenmaiM = $this->load->model('khuyenmaiM');
      $table_km = 'khuyenmai';
      $tukhoa = $_POST['tukhoa'];
      $dieukien_km = "khuyenmai.ten_km LIKE '%$tukhoa%'" ;
      $data ['khuyenmai'] = $khuyenmaiM->khuyenmai_timkiem($table_km, $dieukien_km);
      $this->load->view_admin("khuyenmai/khuyenmai_timkiem", $data); 
    }
  }
?>
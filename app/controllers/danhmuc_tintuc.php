<?php
  class danhmuc_tintuc extends controller{
    public function __construct()
    {
      $data = array();
      $thongbao = array();
      parent::__construct();
    }
    public function danhmuc_tintuc(){
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
        $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
        $table = 'danhmuc_tintuc';
        $data ['danhmuc_tintuc'] = $danhmuc_tintucM->danhmuc_tintuc_list($table);
        $this->load->view_admin("danhmuc_tintuc/danhmuc_tintuc", $data); 
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function danhmuc_tintuc_tuychinh($ma_dmtt, $tinhtrang_dmtt){
      session::init();
      $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
      $table = 'danhmuc_tintuc';
      $dieukien = "ma_dmtt='$ma_dmtt'" ;
      $data = array(
        'tinhtrang_dmtt' => $tinhtrang_dmtt
      );
      $result = $danhmuc_tintucM->danhmuc_tintuc_update($table, $data, $dieukien);
      header("Location:".BASE_URL."danhmuc_tintuc/danhmuc_tintuc");
    }
    public function danhmuc_tintuc_insert(){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
        $table = 'danhmuc_tintuc';
        $ten_dmtt = $_POST['ten_dmtt'];
        $data = array(
          'ten_dmtt' => $ten_dmtt
        );
        $result = $danhmuc_tintucM->danhmuc_tintuc_insert($table, $data);
        header("Location:".BASE_URL."danhmuc_tintuc/danhmuc_tintuc");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function danhmuc_tintuc_edit($ma_dmtt){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
        $table = 'danhmuc_tintuc';
        $dieukien = "danhmuc_tintuc.ma_dmtt='$ma_dmtt'" ;
        $data['danhmuc_tintuc_ma'] = $danhmuc_tintucM->danhmuc_tintuc_ma($table, $dieukien);
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
        $this->load->view_admin("danhmuc_tintuc/danhmuc_tintuc_edit", $data);
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function danhmuc_tintuc_update($ma_dmtt){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
        $table = 'danhmuc_tintuc';
        $dieukien = "danhmuc_tintuc.ma_dmtt='$ma_dmtt'" ;
        $ten_dmtt = $_POST['ten_dmtt'];
        $data = array(
          'ten_dmtt' => $ten_dmtt
        );
        $result = $danhmuc_tintucM->danhmuc_tintuc_update($table, $data, $dieukien);
        header("Location:".BASE_URL."danhmuc_tintuc/danhmuc_tintuc");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function danhmuc_tintuc_delete($ma_dmtt){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
        $table = 'danhmuc_tintuc';
        $dieukien = "danhmuc_tintuc.ma_dmtt='$ma_dmtt'" ;
        $result = $danhmuc_tintucM->danhmuc_tintuc_delete($table, $dieukien);
        header("Location:".BASE_URL."danhmuc_tintuc/danhmuc_tintuc");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function danhmuc_tintuc_deleteAll()
    {
      session::init();
      $level=session::get('level');
      if($level == 1){
        $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
        $table = 'danhmuc_tintuc';
        $result = $danhmuc_tintucM->danhmuc_tintuc_deleteAll($table);
        header("Location:" . BASE_URL . "danhmuc_tintuc/danhmuc_tintuc");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function danhmuc_tintuc_timkiem(){
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
        $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
        $table = 'danhmuc_tintuc';
        $tukhoa = $_POST['tukhoa'];
        $dieukien = "danhmuc_tintuc.ten_dmtt LIKE '%$tukhoa%'" ;
        $data ['danhmuc_tintuc_timkiem'] = $danhmuc_tintucM->danhmuc_tintuc_timkiem($table, $dieukien);
        $this->load->view_admin("danhmuc_tintuc/danhmuc_tintuc_timkiem", $data);
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
  }
?>
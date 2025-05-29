<?php
class danhmuc_sanpham extends controller
{
  public function __construct()
  {
    $data = array();
    $thongbao = array();
    parent::__construct();
  }
  public function danhmuc_sanpham()
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
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $table = 'danhmuc_sanpham';
      $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table);
      $this->load->view_admin("danhmuc_sanpham/danhmuc_sanpham", $data);
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_sanpham_insert()
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $table = 'danhmuc_sanpham';
      $ten_dm = $_POST['ten_dm'];
      $ghichu = $danhmuc_sanphamM->convert_name($ten_dm);
      $ghichu_dm = strtolower($ghichu);
      $mamau_dm = $_POST['mamau_dm'];
      $hinh_dm = $_FILES['hinh_dm']['name'];
      $file_temp = $_FILES['hinh_dm']['tmp_name'];
      $div = explode(' . ', $hinh_dm);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . ' . ' . $file_ext;
      $uploaded_image = "public/uploads/danhmuc/" . $unique_image;
      move_uploaded_file($file_temp, $uploaded_image);
      $data = array(
        'ten_dm' => $ten_dm,
        'ghichu_dm' => $ghichu_dm,
        'mamau_dm' => $mamau_dm,
        'hinh_dm' => $unique_image
      );
      $result = $danhmuc_sanphamM->danhmuc_sanpham_insert($table, $data);
      header("Location:" . BASE_URL . "danhmuc_sanpham/danhmuc_sanpham");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_sanpham_tuychinh($ma_dm, $tinhtrang_dm){
    session::init();
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table = 'danhmuc_sanpham';
    $dieukien = "ma_dm='$ma_dm'" ;
    $data = array(
      'tinhtrang_dm' => $tinhtrang_dm
    );
    $result = $danhmuc_sanphamM->danhmuc_sanpham_update($table, $data, $dieukien);
    header("Location:".BASE_URL."danhmuc_sanpham/danhmuc_sanpham");
  }
  public function danhmuc_sanpham_edit($ma_dm)
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $table = 'danhmuc_sanpham';
      $dieukien = "danhmuc_sanpham.ma_dm='$ma_dm'";
      $data['danhmuc_sanpham_ma'] = $danhmuc_sanphamM->danhmuc_sanpham_ma($table, $dieukien);
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
      $this->load->view_admin("danhmuc_sanpham/danhmuc_sanpham_edit", $data);
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_sanpham_update($ma_dm)
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $table = 'danhmuc_sanpham';
      $dieukien = "danhmuc_sanpham.ma_dm='$ma_dm'";
      $ten_dm = $_POST['ten_dm'];
      $ghichu = $danhmuc_sanphamM->convert_name($ten_dm);
      $ghichu_dm = strtolower($ghichu);
      $mamau_dm = $_POST['mamau_dm'];
      $hinh_dm = $_FILES['hinh_dm']['name'];
      $file_temp = $_FILES['hinh_dm']['tmp_name'];
      $div = explode(' . ', $hinh_dm);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . ' . ' . $file_ext;
      $uploaded_image = "public/uploads/danhmuc/" . $unique_image;
      if ($hinh_dm) {
        $data['danhmuc_sanpham_ma'] = $danhmuc_sanphamM->danhmuc_sanpham_ma($table, $dieukien);
        foreach ($data['danhmuc_sanpham_ma'] as $key => $dm) {
          if ($dm['hinh_dm']) {
            unlink("public/uploads/danhmuc/" . $dm['hinh_dm']);
          }
        }
        $data = array(
          'ten_dm' => $ten_dm,
          'ghichu_dm' => $ghichu_dm,
          'mamau_dm' => $mamau_dm,
          'hinh_dm' => $unique_image
        );
        move_uploaded_file($file_temp, $uploaded_image);
      } else {
        $data = array(
          'ten_dm' => $ten_dm,
          'ghichu_dm' => $ghichu_dm,
          'mamau_dm' => $mamau_dm
        );
      }
      $result = $danhmuc_sanphamM->danhmuc_sanpham_update($table, $data, $dieukien);
      header("Location:" . BASE_URL . "danhmuc_sanpham/danhmuc_sanpham");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_sanpham_delete($ma_dm)
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $table = 'danhmuc_sanpham';
      $dieukien = "danhmuc_sanpham.ma_dm='$ma_dm'";
      if ($ma_dm) {
        $data['danhmuc_sanpham_ma'] = $danhmuc_sanphamM->danhmuc_sanpham_ma($table, $dieukien);
        foreach ($data['danhmuc_sanpham_ma'] as $key => $dm) {
          if ($dm['hinh_dm']) {
            unlink("public/uploads/danhmuc/" . $dm['hinh_dm']);
          }
        }
      }
      $result = $danhmuc_sanphamM->danhmuc_sanpham_delete($table, $dieukien);
      header("Location:" . BASE_URL . "danhmuc_sanpham/danhmuc_sanpham");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_sanpham_deleteAll()
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $table = 'danhmuc_sanpham';
      $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table);
      foreach ($data['danhmuc_sanpham'] as $key => $dm) {
        if ($dm['hinh_dm']) {
          unlink("public/uploads/danhmuc/" . $dm['hinh_dm']);
        }
      }
      $result = $danhmuc_sanphamM->danhmuc_sanpham_deleteAll($table);
      header("Location:" . BASE_URL . "danhmuc_sanpham/danhmuc_sanpham");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function danhmuc_sanpham_timkiem()
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
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $table = 'danhmuc_sanpham';
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "danhmuc_sanpham.ten_dm LIKE '%$tukhoa%'";
      $data['danhmuc_sanpham_timkiem'] = $danhmuc_sanphamM->danhmuc_sanpham_timkiem($table, $dieukien);
      $this->load->view_admin("danhmuc_sanpham/danhmuc_sanpham_timkiem", $data);
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
}
<?php
class thuonghieu extends controller
{
  public function __construct()
  {
    $data = array();
    $thongbao = array();
    parent::__construct();
  }
  public function thuonghieu()
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
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table = 'thuonghieu';
      $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table);
      $this->load->view_admin("thuonghieu/thuonghieu", $data);
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function thuonghieu_insert()
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      //thương hiệu
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table = 'thuonghieu';
      //danh mục sản phẩm
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $table_dm = 'danhmuc_sanpham';
      $ten_th = $_POST['ten_th'];
      $ghichu = $danhmuc_sanphamM->convert_name($ten_th);
      $ghichu_th = strtolower($ghichu);
      $logo_th = $_FILES['logo_th']['name'];
      $file_temp_logo = $_FILES['logo_th']['tmp_name'];
      $div_logo = explode(' . ', $logo_th);
      $file_ext_logo = strtolower(end($div_logo));
      $unique_image_logo = substr(md5(time()), 0, 10) . ' . ' . $file_ext_logo;
      $uploaded_image_logo = "public/uploads/thuonghieu/" . $unique_image_logo;
      move_uploaded_file($file_temp_logo, $uploaded_image_logo);
      $hinh_th = $_FILES['hinh_th']['name'];
      $file_temp = $_FILES['hinh_th']['tmp_name'];
      $div = explode(' . ', $hinh_th);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . ' . ' . $file_ext;
      $uploaded_image = "public/uploads/thuonghieu/" . $unique_image;
      move_uploaded_file($file_temp, $uploaded_image);
      $data = array(
        'ten_th' => $ten_th,
        'ghichu_th' => $ghichu_th,
        'logo_th' => $unique_image_logo,
        'hinh_th' => $unique_image
      );
      $result = $thuonghieuM->thuonghieu_insert($table, $data);
      header("Location:" . BASE_URL . "thuonghieu/thuonghieu");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function thuonghieu_edit($ma_th)
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table = 'thuonghieu';
      $dieukien = "thuonghieu.ma_th='$ma_th'";
      $this->load->view_admin("header");
      $data['thuonghieu_ma'] = $thuonghieuM->thuonghieu_ma($table, $dieukien);
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
      $this->load->view_admin("thuonghieu/thuonghieu_edit", $data);
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function thuonghieu_update($ma_th)
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      //thương hiệu
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table = 'thuonghieu';
      //danh mục sản phẩm
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $dieukien = "thuonghieu.ma_th='$ma_th'";
      $ten_th = $_POST['ten_th'];
      $ghichu = $danhmuc_sanphamM->convert_name($ten_th);
      $ghichu_th = strtolower($ghichu);
      $logo_th = $_FILES['logo_th']['name'];
      $file_temp_logo = $_FILES['logo_th']['tmp_name'];
      $div_logo = explode(' . ', $logo_th);
      $file_ext_logo = strtolower(end($div_logo));
      $unique_image_logo = substr(md5(time()), 0, 10) . ' . ' . $file_ext_logo;
      $uploaded_image_logo = "public/uploads/thuonghieu/" . $unique_image_logo;
      move_uploaded_file($file_temp_logo, $uploaded_image_logo);
      $hinh_th = $_FILES['hinh_th']['name'];
      $file_temp = $_FILES['hinh_th']['tmp_name'];
      $div = explode(' . ', $hinh_th);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . ' . ' . $file_ext;
      $uploaded_image = "public/uploads/thuonghieu/" . $unique_image;
      move_uploaded_file($file_temp, $uploaded_image);
      if ($hinh_th && $logo_th) {
        $data['thuonghieu_ma'] = $thuonghieuM->thuonghieu_ma($table, $dieukien);
        foreach ($data['thuonghieu_ma'] as $key => $th) {
          if ($th['hinh_th'] && $th['logo_th']) {
            unlink("public/uploads/thuonghieu/" . $th['hinh_th']);
            unlink("public/uploads/thuonghieu/" . $th['logo_th']);
          }
        }
        $data = array(
          'ten_th' => $ten_th,
          'ghichu_th' => $ghichu_th,
          'logo_th' => $unique_image_logo,
          'hinh_th' => $unique_image
        );
        move_uploaded_file($file_temp_logo, $uploaded_image_logo);
        move_uploaded_file($file_temp, $uploaded_image);
      } else if ($hinh_th) {
        $data['thuonghieu_ma'] = $thuonghieuM->thuonghieu_ma($table, $dieukien);
        foreach ($data['thuonghieu_ma'] as $key => $th) {
          if ($th['hinh_th']) {
            unlink("public/uploads/thuonghieu/" . $th['hinh_th']);
          }
        }
        $data = array(
          'ten_th' => $ten_th,
          'hinh_th' => $unique_image
        );
        move_uploaded_file($file_temp, $uploaded_image);
      } else if ($logo_th) {
        $data['thuonghieu_ma'] = $thuonghieuM->thuonghieu_ma($table, $dieukien);
        foreach ($data['thuonghieu_ma'] as $key => $th) {
          if ($th['logo_th']) {
            unlink("public/uploads/thuonghieu/" . $th['logo_th']);
          }
        }
        $data = array(
          'ten_th' => $ten_th,
          'logo_th' => $unique_image_logo
        );
        move_uploaded_file($file_temp_logo, $uploaded_image_logo);
      } else {
        $data = array(
          'ten_th' => $ten_th
        );
      }
      $result = $thuonghieuM->thuonghieu_update($table, $data, $dieukien);
      header("Location:" . BASE_URL . "thuonghieu/thuonghieu");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function thuonghieu_delete($ma_th)
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table = 'thuonghieu';
      $dieukien = "thuonghieu.ma_th='$ma_th'";
      if ($ma_th) {
        $data['thuonghieu_ma'] = $thuonghieuM->thuonghieu_ma($table, $dieukien);
        foreach ($data['thuonghieu_ma'] as $key => $th) {
          if ($th['logo_th'] && $th['hinh_th']) {
            unlink("public/uploads/thuonghieu/" . $th['logo_th']);
            unlink("public/uploads/thuonghieu/" . $th['hinh_th']);
          }else if($th['logo_th']){
            unlink("public/uploads/thuonghieu/" . $th['logo_th']);
          }else if($th['hinh_th']){
            unlink("public/uploads/thuonghieu/" . $th['hinh_th']);
          }
        }
      }
      $result = $thuonghieuM->thuonghieu_delete($table, $dieukien);
      header("Location:" . BASE_URL . "thuonghieu/thuonghieu");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function thuonghieu_deleteAll()
  {
    session::init();
    $level=session::get('level');
    if($level == 1){
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table = 'thuonghieu';
      $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table);
      foreach ($data['thuonghieu'] as $key => $th) {
        if ($th['logo_th'] && $th['hinh_th']) {
          unlink("public/uploads/thuonghieu/" . $th['logo_th']);
          unlink("public/uploads/thuonghieu/" . $th['hinh_th']);
        }else if($th['logo_th']){
          unlink("public/uploads/thuonghieu/" . $th['logo_th']);
        }else if($th['hinh_th']){
          unlink("public/uploads/thuonghieu/" . $th['hinh_th']);
        }
      }
      $result = $thuonghieuM->thuonghieu_deleteAll($table);
      header("Location:" . BASE_URL . "thuonghieu/thuonghieu");
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
  public function thuonghieu_timkiem()
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
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table = 'thuonghieu';
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "thuonghieu.ten_th LIKE '%$tukhoa%'";
      $data['thuonghieu_timkiem'] = $thuonghieuM->thuonghieu_timkiem($table, $dieukien);
      $this->load->view_admin("thuonghieu/thuonghieu_timkiem", $data);
    }else if($level == 2){
      header("Location:".BASE_URL."nhanvien/index");
    }
  }
}
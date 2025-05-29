<?php
class tintuc extends controller
{
  public function __construct()
  {
    $data = array();
    parent::__construct();
  }
  public function tintuc()
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
      // tin tức
      $tintucM = $this->load->model('tintucM');
      $table_tt = 'tintuc';
      //thương hiệu
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table_th = 'thuonghieu';
      $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table_th);
      //danh mục tin tức
      $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
      $table_dmtt = 'danhmuc_tintuc';
      $dieukien_dmtt = "tinhtrang_dmtt = 0";
      $table_nv = 'nhanvien';
      $data['danhmuc_tintuc'] = $danhmuc_tintucM->danhmuc_tintuc_ma($table_dmtt, $dieukien_dmtt);
      $data['tintuc'] = $tintucM->tintuc_list($table_tt, $table_nv, $table_th, $table_dmtt);
      $this->load->view_admin("tintuc/tintuc", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function tintuc_insert()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      // tin tức
      $tintucM = $this->load->model('tintucM');
      $table_tt = 'tintuc';
      $ten_tt = $_POST['ten_tt'];
      $ma_th = $_POST['ma_th'];
      $ma_dmtt = $_POST['ma_dmtt'];
      $noidung_tt = $_POST['noidung_tt'];
      $hinh_tt = $_FILES['hinh_tt']['name'];
      $file_temp = $_FILES['hinh_tt']['tmp_name'];
      $div = explode(' . ', $hinh_tt);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . ' . ' . $file_ext;
      $uploaded_image = "public/uploads/tintuc/" . $unique_image;
      move_uploaded_file($file_temp, $uploaded_image);
      if ($_SESSION['dangnhap'] == true) {
        $ma_nv = session::get('ma_nv');
      }
      $data = array(
        'ma_nv' => $ma_nv,
        'ma_th' => $ma_th,
        'ma_dmtt' => $ma_dmtt,
        'ten_tt' => $ten_tt,
        'hinh_tt' => $unique_image,
        'noidung_tt' => $noidung_tt
      );
      $result = $tintucM->tintuc_insert($table_tt, $data);
      header("Location:" . BASE_URL . "tintuc/tintuc");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function tintuc_delete($ma_tt)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $tintucM = $this->load->model('tintucM');
      $table_tt = 'tintuc';
      $dieukien = "tintuc.ma_tt='$ma_tt'";
      if ($ma_tt) {
        $data['tintuc_ma'] = $tintucM->tintuc_ma($table_tt, $dieukien);
        foreach ($data['tintuc_ma'] as $key => $tt) {
          if ($tt['hinh_tt']) {
            unlink("public/uploads/tintuc/" . $tt['hinh_tt']);
          }
        }
      }
      $result = $tintucM->tintuc_delete($table_tt, $dieukien);
      header("Location:" . BASE_URL . "tintuc/tintuc");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function tintuc_deleteAll()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $tintucM = $this->load->model('tintucM');
      $table_tt = 'tintuc';
      $data['tintuc'] = $tintucM->tintuc($table_tt);
      foreach ($data['tintuc'] as $key => $tt) {
        if ($tt['hinh_tt']) {
          unlink("public/uploads/tintuc/" . $tt['hinh_tt']);
        }
      }
      $result = $tintucM->tintuc_deleteAll($table_tt);
      header("Location:" . BASE_URL . "tintuc/tintuc");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function tintuc_edit($ma_tt)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $tintucM = $this->load->model('tintucM');
      $table_tt = 'tintuc';
      $dieukien = "tintuc.ma_tt='$ma_tt'";
      $this->load->view_admin("header");
      $data['tintuc_ma'] = $tintucM->tintuc_ma($table_tt, $dieukien);
      //thương hiệu
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table_th = 'thuonghieu';
      $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table_th);
      //danh mục tin tức
      $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
      $table_dmtt = 'danhmuc_tintuc';
      $data['danhmuc_tintuc'] = $danhmuc_tintucM->danhmuc_tintuc_list($table_dmtt);
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
      $this->load->view_admin("tintuc/tintuc_edit", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function tintuc_update($ma_tt)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      // tin tức
      $tintucM = $this->load->model('tintucM');
      $table_tt = 'tintuc';
      $ten_tt = $_POST['ten_tt'];
      $ma_th = $_POST['ma_th'];
      $ma_dmtt = $_POST['ma_dmtt'];
      $noidung_tt = $_POST['noidung_tt'];
      $hinh_tt = $_FILES['hinh_tt']['name'];
      $file_temp = $_FILES['hinh_tt']['tmp_name'];
      $div = explode(' . ', $hinh_tt);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . ' . ' . $file_ext;
      $uploaded_image = "public/uploads/tintuc/" . $unique_image;
      $dieukien = "tintuc.ma_tt='$ma_tt'";
      if ($_SESSION['dangnhap'] == true) {
        $ma_nv = session::get('ma_nv');
      }
      if ($hinh_tt) {
        $data['tintuc_ma'] = $tintucM->tintuc_ma($table_tt, $dieukien);
        foreach ($data['tintuc_ma'] as $key => $tt) {
          if ($tt['hinh_tt']) {
            unlink("public/uploads/tintuc/" . $tt['hinh_tt']);
          }
        }
        $data = array(
          'ma_nv' => $ma_nv,
          'ma_th' => $ma_th,
          'ma_dmtt' => $ma_dmtt,
          'ten_tt' => $ten_tt,
          'hinh_tt' => $unique_image,
          'noidung_tt' => $noidung_tt
        );
        move_uploaded_file($file_temp, $uploaded_image);
      } else {
        $data = array(
          'ma_nv' => $ma_nv,
          'ma_th' => $ma_th,
          'ma_dmtt' => $ma_dmtt,
          'ten_tt' => $ten_tt,
          'noidung_tt' => $noidung_tt
        );
      }
      $result = $tintucM->tintuc_update($table_tt, $data, $dieukien);
      header("Location:" . BASE_URL . "tintuc/tintuc");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function tintuc_timkiem()
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
      // tin tức
      $tintucM = $this->load->model('tintucM');
      $table_tt = 'tintuc';
      //thương hiệu
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table_th = 'thuonghieu';
      $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table_th);
      //danh mục tin tức
      $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
      $table_dmtt = 'danhmuc_tintuc';
      $table_nv = 'nhanvien';
      $data['danhmuc_tintuc'] = $danhmuc_tintucM->danhmuc_tintuc_list($table_dmtt);
      $tukhoa = $_POST['tukhoa'];
      $dieukien1 = "tintuc.ten_tt LIKE '%$tukhoa%'";
      $data['tintuc_timkiem'] = $tintucM->tintuc_timkiem($table_tt, $table_nv, $table_th, $table_dmtt, $dieukien1);
      $this->load->view_admin("tintuc/tintuc_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
}
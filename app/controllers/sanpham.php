<?php
class sanpham extends controller
{
  public function __construct()
  {
    $data = array();
    $thongbao = array();
    parent::__construct();
  }
  public function sanpham()
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
      // danh mục sản phẩm
      $dieukien_dm = "tinhtrang_dm = 0";
      $danhmuc_sanphamM = $this->load->model("danhmuc_sanphamM");
      $table_dm = 'danhmuc_sanpham';
      $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_ma($table_dm, $dieukien_dm);
      // thương hiệu sản phẩm
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table_th = 'thuonghieu';
      $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table_th);
      // loại sản phẩm
      $loai_sanphamM = $this->load->model('loai_sanphamM');
      $table_lsp = 'loai_sanpham';
      $data['loai_sanpham'] = $loai_sanphamM->loai_sanpham_list($table_lsp, $table_dm);
      // nhà cung cấp
      $nhacungcapM = $this->load->model('nhacungcapM');
      $table_ncc = 'nhacungcap';
      $dieukien_ncc = 'tinhtrang_ncc = 0';
      $data['nhacungcap'] = $nhacungcapM->nhacungcap_ma($table_ncc, $dieukien_ncc);
      // nhân viên
      $table_nv = 'nhanvien';
      // sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham_list($table_sp, $table_dm, $table_nv, $table_ncc, $table_lsp, $table_th);
      $this->load->view_admin("sanpham/sanpham", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sanpham_sort($orderby)
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
      // danh mục sản phẩm
      $danhmuc_sanphamM = $this->load->model("danhmuc_sanphamM");
      $table_dm = 'danhmuc_sanpham';
      $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
      // thương hiệu sản phẩm
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table_th = 'thuonghieu';
      $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table_th);
      // loại sản phẩm
      $loai_sanphamM = $this->load->model('loai_sanphamM');
      $table_lsp = 'loai_sanpham';
      $data['loai_sanpham'] = $loai_sanphamM->loai_sanpham_list($table_lsp, $table_dm);
      // nhà cung cấp
      $nhacungcapM = $this->load->model('nhacungcapM');
      $table_ncc = 'nhacungcap';
      $data['nhacungcap'] = $nhacungcapM->nhacungcap_list($table_ncc);
      // nhân viên
      $table_nv = 'nhanvien';
      // sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $orderby = $orderby;
      $data['sanpham'] = $sanphamM->sanpham_sort($table_sp, $table_dm, $table_nv, $table_ncc, $table_lsp, $table_th, $orderby);
      $this->load->view_admin("sanpham/sanpham_sort", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sanpham_insert()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $ten_sp = $_POST['ten_sp'];
      $gia_sp = $_POST['gia_sp'];
      $soluong_sp = $_POST['soluong_sp'];
      $thongtin_sp = $_POST['thongtin_sp'];
      $tinhtrang_sp = $_POST['tinhtrang_sp'];
      $ma_dm = $_POST['ma_dm'];
      $ma_ncc = $_POST['ma_ncc'];
      $ma_lsp = $_POST['ma_lsp'];
      $ma_th = $_POST['ma_th'];
      $hinh_sp = $_FILES['hinh_sp']['name'];
      $file_temp_hinh = $_FILES['hinh_sp']['tmp_name'];
      $div_hinh = explode(' . ', $hinh_sp);
      $file_ext_hinh = strtolower(end($div_hinh));
      $unique_image_hinh = substr(md5(time()), 0, 10) . ' . ' . $file_ext_hinh;
      $uploaded_image_hinh = "public/uploads/sanpham/" . $unique_image_hinh;
      move_uploaded_file($file_temp_hinh, $uploaded_image_hinh);
      $hinhchitiet_sp = $_FILES['hinhchitiet_sp']['name'];
      $file_temp = $_FILES['hinhchitiet_sp']['tmp_name'];
      $div = explode(' . ', $hinhchitiet_sp);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . ' . ' . $file_ext;
      $uploaded_image = "public/uploads/sanpham/" . $unique_image;
      move_uploaded_file($file_temp, $uploaded_image);
      if ($_SESSION['dangnhap'] == true) {
        $ma_nv = session::get('ma_nv');
      }
      $data = array(
        'ten_sp' => $ten_sp,
        'gia_sp' => $gia_sp,
        'soluong_sp' => $soluong_sp,
        'thongtin_sp' => $thongtin_sp,
        'tinhtrang_sp' => $tinhtrang_sp,
        'ma_dm' => $ma_dm,
        'ma_ncc' => $ma_ncc,
        'ma_lsp' => $ma_lsp,
        'ma_th' => $ma_th,
        'ma_nv' => $ma_nv,
        'hinh_sp' => $unique_image_hinh,
        'hinhchitiet_sp' => $unique_image
      );
      $result = $sanphamM->sanpham_insert($table_sp, $data);
      header("Location:" . BASE_URL . "sanpham/sanpham");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sanpham_edit($ma_sp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      // danh mục sản phẩm
      $danhmuc_sanphamM = $this->load->model("danhmuc_sanphamM");
      $table_dm = 'danhmuc_sanpham';
      $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
      // thương hiệu sản phẩm
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table_th = 'thuonghieu';
      $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table_th);
      $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
      // loại sản phẩm
      $loai_sanphamM = $this->load->model('loai_sanphamM');
      $table_lsp = 'loai_sanpham';
      $data['loai_sanpham'] = $loai_sanphamM->loai_sanpham_list($table_lsp, $table_dm);
      // nhà cung cấp
      $nhacungcapM = $this->load->model('nhacungcapM');
      $table_ncc = 'nhacungcap';
      $data['nhacungcap'] = $nhacungcapM->nhacungcap_list($table_ncc);
      //sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $dieukien = "sanpham.ma_sp='$ma_sp'";
      $data['sanpham_ma'] = $sanphamM->sanpham_ma($table_sp, $dieukien);
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
      $this->load->view_admin("sanpham/sanpham_edit", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sanpham_update($ma_sp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $dieukien = "sanpham.ma_sp='$ma_sp'";
      $ten_sp = $_POST['ten_sp'];
      $gia_sp = $_POST['gia_sp'];
      $soluong_sp = $_POST['soluong_sp'];
      $thongtin_sp = $_POST['thongtin_sp'];
      $tinhtrang_sp = $_POST['tinhtrang_sp'];
      $ma_dm = $_POST['ma_dm'];
      $ma_ncc = $_POST['ma_ncc'];
      $ma_lsp = $_POST['ma_lsp'];
      $ma_th = $_POST['ma_th'];
      // Hình sản phầm
      $hinh_sp = $_FILES['hinh_sp']['name'];
      $file_temp_hinh = $_FILES['hinh_sp']['tmp_name'];
      $div_hinh = explode(' . ', $hinh_sp);
      $file_ext_hinh = strtolower(end($div_hinh));
      $unique_image_hinh = substr(md5(time()), 0, 10) . ' . ' . $file_ext_hinh;
      $uploaded_image_hinh = "public/uploads/sanpham/" . $unique_image_hinh;
      move_uploaded_file($file_temp_hinh, $uploaded_image_hinh);
      // Hình chi tiết sản phẩm
      $hinhchitiet_sp = $_FILES['hinhchitiet_sp']['name'];
      $file_temp = $_FILES['hinhchitiet_sp']['tmp_name'];
      $div = explode(' . ', $hinhchitiet_sp);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . ' . ' . $file_ext;
      $uploaded_image = "public/uploads/sanpham/" . $unique_image;
      move_uploaded_file($file_temp, $uploaded_image);
      if ($_SESSION['dangnhap'] == true) {
        $ma_nv = session::get('ma_nv');
      }
      if ($hinh_sp && $hinhchitiet_sp) {
        $data['sanpham_ma'] = $sanphamM->sanpham_ma($table_sp, $dieukien);
        foreach ($data['sanpham_ma'] as $key => $sp) {
          if ($sp['hinh_sp'] && $sp['hinhchitiet_sp']) {
            unlink("public/uploads/sanpham/" . $sp['hinh_sp']);
            unlink("public/uploads/sanpham/" . $sp['hinhchitiet_sp']);
          }
        }
        $data = array(
          'ten_sp' => $ten_sp,
          'gia_sp' => $gia_sp,
          'soluong_sp' => $soluong_sp,
          'thongtin_sp' => $thongtin_sp,
          'tinhtrang_sp' => $tinhtrang_sp,
          'ma_dm' => $ma_dm,
          'ma_ncc' => $ma_ncc,
          'ma_lsp' => $ma_lsp,
          'ma_th' => $ma_th,
          'ma_nv' => $ma_nv,
          'hinh_sp' => $unique_image_hinh,
          'hinhchitiet_sp' => $unique_image
        );
        move_uploaded_file($file_temp_hinh, $uploaded_image_hinh);
        move_uploaded_file($file_temp, $uploaded_image);
      } else if ($hinh_sp) {
        $data['sanpham_ma'] = $sanphamM->sanpham_ma($table_sp, $dieukien);
        foreach ($data['sanpham_ma'] as $key => $sp) {
          if ($sp['hinh_sp']) {
            unlink("public/uploads/sanpham/" . $sp['hinh_sp']);
          }
        }
        $data = array(
          'ten_sp' => $ten_sp,
          'gia_sp' => $gia_sp,
          'soluong_sp' => $soluong_sp,
          'thongtin_sp' => $thongtin_sp,
          'tinhtrang_sp' => $tinhtrang_sp,
          'ma_dm' => $ma_dm,
          'ma_ncc' => $ma_ncc,
          'ma_lsp' => $ma_lsp,
          'ma_th' => $ma_th,
          'ma_nv' => $ma_nv,
          'hinh_sp' => $unique_image_hinh
        );
        move_uploaded_file($file_temp_hinh, $uploaded_image_hinh);
      } else if ($hinhchitiet_sp) {
        $data['sanpham_ma'] = $sanphamM->sanpham_ma($table_sp, $dieukien);
        foreach ($data['sanpham_ma'] as $key => $sp) {
          if ($sp['hinhchitiet_sp']) {
            unlink("public/uploads/sanpham/" . $sp['hinhchitiet_sp']);
          }
        }
        $data = array(
          'ten_sp' => $ten_sp,
          'gia_sp' => $gia_sp,
          'soluong_sp' => $soluong_sp,
          'thongtin_sp' => $thongtin_sp,
          'tinhtrang_sp' => $tinhtrang_sp,
          'ma_dm' => $ma_dm,
          'ma_ncc' => $ma_ncc,
          'ma_lsp' => $ma_lsp,
          'ma_th' => $ma_th,
          'ma_nv' => $ma_nv,
          'hinhchitiet_sp' => $unique_image
        );
        move_uploaded_file($file_temp, $uploaded_image);
      } else {
        $data = array(
          'ten_sp' => $ten_sp,
          'gia_sp' => $gia_sp,
          'soluong_sp' => $soluong_sp,
          'thongtin_sp' => $thongtin_sp,
          'tinhtrang_sp' => $tinhtrang_sp,
          'ma_dm' => $ma_dm,
          'ma_ncc' => $ma_ncc,
          'ma_lsp' => $ma_lsp,
          'ma_th' => $ma_th,
          'ma_nv' => $ma_nv
        );
      }
      $result = $sanphamM->sanpham_update($table_sp, $data, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sanpham");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sanpham_delete($ma_sp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $dieukien = "sanpham.ma_sp='$ma_sp'";
      if ($ma_sp) {
        $data['sanpham_ma'] = $sanphamM->sanpham_ma($table_sp, $dieukien);
        foreach ($data['sanpham_ma'] as $key => $sp) {
          if ($sp['hinh_sp'] && $sp['hinhchitiet_sp']) {
            unlink("public/uploads/sanpham/" . $sp['hinh_sp']);
            unlink("public/uploads/sanpham/" . $sp['hinhchitiet_sp']);
          } else if ($sp['hinh_sp']) {
            unlink("public/uploads/sanpham/" . $sp['hinh_sp']);
          } else if ($sp['hinhchitiet_sp']) {
            unlink("public/uploads/sanpham/" . $sp['hinhchitiet_sp']);
          }
        }
      }
      $result = $sanphamM->sanpham_delete($table_sp, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sanpham");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sanpham_deleteAll()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      foreach ($data['sanpham'] as $key => $sp) {
        if ($sp['hinh_sp'] && $sp['hinhchitiet_sp']) {
          unlink("public/uploads/sanpham/" . $sp['hinh_sp']);
          unlink("public/uploads/sanpham/" . $sp['hinhchitiet_sp']);
        } else if ($sp['hinh_sp']) {
          unlink("public/uploads/sanpham/" . $sp['hinh_sp']);
        } else if ($sp['hinhchitiet_sp']) {
          unlink("public/uploads/sanpham/" . $sp['hinhchitiet_sp']);
        }
      }
      $result = $sanphamM->sanpham_deleteAll($table_sp);
      header("Location:" . BASE_URL . "sanpham/sanpham");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sanpham_timkiem()
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
      // danh mục sản phẩm
      $danhmuc_sanphamM = $this->load->model("danhmuc_sanphamM");
      $table_dm = 'danhmuc_sanpham';
      $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
      // thương hiệu sản phẩm
      $thuonghieuM = $this->load->model('thuonghieuM');
      $table_th = 'thuonghieu';
      $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table_th);
      // loại sản phẩm
      $loai_sanphamM = $this->load->model('loai_sanphamM');
      $table_lsp = 'loai_sanpham';
      $data['loai_sanpham'] = $loai_sanphamM->loai_sanpham_list($table_lsp, $table_dm);
      // nhà cung cấp
      $nhacungcapM = $this->load->model('nhacungcapM');
      $table_ncc = 'nhacungcap';
      $data['nhacungcap'] = $nhacungcapM->nhacungcap_list($table_ncc);
      // nhân viên
      $nhanvienM = $this->load->model('nhanvienM');
      $table_nv = 'nhanvien';
      $data['nhanvien'] = $nhanvienM->nhanvien_list($table_nv);
      // sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "sanpham.ten_sp LIKE '%$tukhoa%'";
      $data['sanpham_timkiem'] = $sanphamM->sanpham_timkiem($table_sp, $dieukien);
      $this->load->view_admin("sanpham/sanpham_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }

  //chi tiết sản phẩm
  public function sp_chitiet()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
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
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $dieukien = 'sanpham.ma_dm = 8 OR sanpham.ma_dm = 10';
      $data['sanpham_ma_dm'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien);
      $data['sp_chitiet_list'] = $chitiet_sanphamM->sp_chitiet_list($table_sp, $table_ctsp, $dieukien);
      $this->load->view_admin("sanpham/sp_chitiet", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_insert()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $ma_sp = $_POST['ma_sp'];
      $manhinh = $_POST['manhinh'];
      $hedieuhanh = $_POST['hedieuhanh'];
      $camera_truoc = $_POST['camera_truoc'];
      $camera_sau = $_POST['camera_sau'];
      $bo_sanpham = $_POST['bo_sanpham'];
      $chip = $_POST['chip'];
      $ram = $_POST['ram'];
      $rom = $_POST['rom'];
      $sim = $_POST['sim'];
      $pin = $_POST['pin'];
      $data = array(
        'ma_sp' => $ma_sp,
        'manhinh' => $manhinh,
        'hedieuhanh' => $hedieuhanh,
        'camera_sau' => $camera_sau,
        'camera_truoc' => $camera_truoc,
        'bo_sanpham' => $bo_sanpham,
        'chip' => $chip,
        'ram' => $ram,
        'rom' => $rom,
        'sim' => $sim,
        'pin' => $pin
      );
      $result = $chitiet_sanphamM->sp_chitiet_insert($table_ctsp, $data);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_edit($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      //sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien1 = 'sanpham.ma_dm = 8 OR sanpham.ma_dm = 10';
      $data['sanpham_ma_dm'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien1);
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $data['sp_chitiet_ma'] = $chitiet_sanphamM->sp_chitiet_ma($table_ctsp, $dieukien);
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
      $this->load->view_admin("sanpham/sp_chitiet_edit", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_update($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $ma_sp = $_POST['ma_sp'];
      $manhinh = $_POST['manhinh'];
      $hedieuhanh = $_POST['hedieuhanh'];
      $camera_truoc = $_POST['camera_truoc'];
      $camera_sau = $_POST['camera_sau'];
      $bo_sanpham = $_POST['bo_sanpham'];
      $chip = $_POST['chip'];
      $ram = $_POST['ram'];
      $rom = $_POST['rom'];
      $sim = $_POST['sim'];
      $pin = $_POST['pin'];
      $data = array(
        'ma_sp' => $ma_sp,
        'manhinh' => $manhinh,
        'hedieuhanh' => $hedieuhanh,
        'camera_sau' => $camera_sau,
        'camera_truoc' => $camera_truoc,
        'bo_sanpham' => $bo_sanpham,
        'chip' => $chip,
        'ram' => $ram,
        'rom' => $rom,
        'sim' => $sim,
        'pin' => $pin
      );
      $result = $chitiet_sanphamM->sp_chitiet_update($table_ctsp, $data, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_timkiem()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
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
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      $tukhoa = $_POST['tukhoa'];
      $dieukien1 = "sanpham.ten_sp LIKE '%$tukhoa%' AND sanpham.ma_dm = 8 OR sanpham.ma_dm = 10";
      $data['sp_chitiet_timkiem'] = $chitiet_sanphamM->sp_chitiet_timkiem($table_sp, $table_ctsp, $dieukien1);
      $this->load->view_admin("sanpham/sp_chitiet_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_delete($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $result = $chitiet_sanphamM->sp_chitiet_delete($table_ctsp, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  //chi tiết sản phẩm laptop
  public function sp_chitiet_laptop()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
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
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $dieukien = 'sanpham.ma_dm = 9';
      $data['sanpham_ma_dm'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien);
      $data['sp_chitiet_laptop_list'] = $chitiet_sanphamM->sp_chitiet_list($table_sp, $table_ctsp, $dieukien);
      $this->load->view_admin("sanpham/sp_chitiet_laptop", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_laptop_insert()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $ma_sp = $_POST['ma_sp'];
      $cpu = $_POST['cpu'];
      $ram = $_POST['ram'];
      $rom = $_POST['rom'];
      $manhinh = $_POST['manhinh'];
      $card_manhinh = $_POST['card_manhinh'];
      $cong_ketnoi = $_POST['cong_ketnoi'];
      $hedieuhanh = $_POST['hedieuhanh'];
      $thietke = $_POST['thietke'];
      $kichthuoc = $_POST['kichthuoc'];
      $thoidiem_ramat = $_POST['thoidiem_ramat'];
      $bo_sanpham = $_POST['bo_sanpham'];
      $data = array(
        'ma_sp' => $ma_sp,
        'cpu' => $cpu,
        'ram' => $ram,
        'rom' => $rom,
        'hedieuhanh' => $hedieuhanh,
        'manhinh' => $manhinh,
        'card_manhinh' => $card_manhinh,
        'cong_ketnoi' => $cong_ketnoi,
        'thietke' => $thietke,
        'kichthuoc' => $kichthuoc,
        'bo_sanpham' => $bo_sanpham,
        'thoidiem_ramat' => $thoidiem_ramat
      );
      $result = $chitiet_sanphamM->sp_chitiet_insert($table_ctsp, $data);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_laptop");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_laptop_edit($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      //sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien1 = 'sanpham.ma_dm = 9';
      $data['sanpham_ma_dm'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien1);
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $data['sp_chitiet_ma'] = $chitiet_sanphamM->sp_chitiet_ma($table_ctsp, $dieukien);
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
      $this->load->view_admin("sanpham/sp_chitiet_laptop_edit", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_laptop_update($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $ma_sp = $_POST['ma_sp'];
      $cpu = $_POST['cpu'];
      $ram = $_POST['ram'];
      $rom = $_POST['rom'];
      $manhinh = $_POST['manhinh'];
      $card_manhinh = $_POST['card_manhinh'];
      $cong_ketnoi = $_POST['cong_ketnoi'];
      $hedieuhanh = $_POST['hedieuhanh'];
      $thietke = $_POST['thietke'];
      $kichthuoc = $_POST['kichthuoc'];
      $thoidiem_ramat = $_POST['thoidiem_ramat'];
      $bo_sanpham = $_POST['bo_sanpham'];
      $data = array(
        'ma_sp' => $ma_sp,
        'cpu' => $cpu,
        'ram' => $ram,
        'rom' => $rom,
        'hedieuhanh' => $hedieuhanh,
        'manhinh' => $manhinh,
        'card_manhinh' => $card_manhinh,
        'cong_ketnoi' => $cong_ketnoi,
        'thietke' => $thietke,
        'kichthuoc' => $kichthuoc,
        'bo_sanpham' => $bo_sanpham,
        'thoidiem_ramat' => $thoidiem_ramat
      );
      $result = $chitiet_sanphamM->sp_chitiet_update($table_ctsp, $data, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_laptop");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_laptop_timkiem()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
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
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "sanpham.ten_sp LIKE '%$tukhoa%' AND sanpham.ma_dm=9";
      $data['sp_chitiet_timkiem'] = $chitiet_sanphamM->sp_chitiet_timkiem($table_sp, $table_ctsp, $dieukien);
      $this->load->view_admin("sanpham/sp_chitiet_laptop_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_laptop_delete($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $result = $chitiet_sanphamM->sp_chitiet_delete($table_ctsp, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_laptop");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  //chi tiết sản phẩm smartwatch
  public function sp_chitiet_smartwatch()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
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
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $dieukien = 'sanpham.ma_dm = 11';
      $data['sanpham_ma_dm'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien);
      $data['sp_chitiet_smartwatch_list'] = $chitiet_sanphamM->sp_chitiet_list($table_sp, $table_ctsp, $dieukien);
      $this->load->view_admin("sanpham/sp_chitiet_smartwatch", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_smartwatch_insert()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $ma_sp = $_POST['ma_sp'];
      $manhinh = $_POST['manhinh'];
      $thoiluong_pin = $_POST['thoiluong_pin'];
      $hedieuhanh = $_POST['hedieuhanh'];
      $mat = $_POST['mat'];
      $tinhnang_suckhoe = $_POST['tinhnang_suckhoe'];
      $bo_sanpham = $_POST['bo_sanpham'];
      $data = array(
        'ma_sp' => $ma_sp,
        'manhinh' => $manhinh,
        'thoiluong_pin' => $thoiluong_pin,
        'hedieuhanh' => $hedieuhanh,
        'mat' => $mat,
        'bo_sanpham' => $bo_sanpham,
        'tinhnang_suckhoe' => $tinhnang_suckhoe
      );
      $result = $chitiet_sanphamM->sp_chitiet_insert($table_ctsp, $data);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_smartwatch");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_smartwatch_edit($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      //sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien1 = 'sanpham.ma_dm = 11';
      $data['sanpham_ma_dm'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien1);
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $data['sp_chitiet_ma'] = $chitiet_sanphamM->sp_chitiet_ma($table_ctsp, $dieukien);
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
      $this->load->view_admin("sanpham/sp_chitiet_smartwatch_edit", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_smartwatch_update($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $ma_sp = $_POST['ma_sp'];
      $manhinh = $_POST['manhinh'];
      $thoiluong_pin = $_POST['thoiluong_pin'];
      $hedieuhanh = $_POST['hedieuhanh'];
      $mat = $_POST['mat'];
      $tinhnang_suckhoe = $_POST['tinhnang_suckhoe'];
      $bo_sanpham = $_POST['bo_sanpham'];
      $data = array(
        'ma_sp' => $ma_sp,
        'manhinh' => $manhinh,
        'thoiluong_pin' => $thoiluong_pin,
        'hedieuhanh' => $hedieuhanh,
        'mat' => $mat,
        'bo_sanpham' => $bo_sanpham,
        'tinhnang_suckhoe' => $tinhnang_suckhoe
      );
      $result = $chitiet_sanphamM->sp_chitiet_update($table_ctsp, $data, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_smartwatch");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_smartwatch_timkiem()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
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
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "sanpham.ten_sp LIKE '%$tukhoa%' AND sanpham.ma_dm=11";
      $data['sp_chitiet_timkiem'] = $chitiet_sanphamM->sp_chitiet_timkiem($table_sp, $table_ctsp, $dieukien);
      $this->load->view_admin("sanpham/sp_chitiet_smartwatch_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_smartwatch_delete($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $result = $chitiet_sanphamM->sp_chitiet_delete($table_ctsp, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_smartwatch");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  //chi tiết sản phẩm đồng hồ
  public function sp_chitiet_dongho()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
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
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $dieukien = 'sanpham.ma_dm = 12';
      $data['sanpham_ma_dm'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien);
      $data['sp_chitiet_dongho_list'] = $chitiet_sanphamM->sp_chitiet_list($table_sp, $table_ctsp, $dieukien);
      $this->load->view_admin("sanpham/sp_chitiet_dongho", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_dongho_insert()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $ma_sp = $_POST['ma_sp'];
      $doituong_sudung = $_POST['doituong_sudung'];
      $duongkinh_mat = $_POST['duongkinh_mat'];
      $chatlieu_kinh = $_POST['chatlieu_kinh'];
      $chatlieu_day = $_POST['chatlieu_day'];
      $chongnuoc = $_POST['chongnuoc'];
      $data = array(
        'ma_sp' => $ma_sp,
        'doituong_sudung' => $doituong_sudung,
        'duongkinh_mat' => $duongkinh_mat,
        'chatlieu_kinh' => $chatlieu_kinh,
        'chatlieu_day' => $chatlieu_day,
        'chongnuoc' => $chongnuoc
      );
      $result = $chitiet_sanphamM->sp_chitiet_insert($table_ctsp, $data);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_dongho");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_dongho_edit($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      //sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien1 = 'sanpham.ma_dm = 12';
      $data['sanpham_ma_dm'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien1);
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $data['sp_chitiet_ma'] = $chitiet_sanphamM->sp_chitiet_ma($table_ctsp, $dieukien);
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
      $this->load->view_admin("sanpham/sp_chitiet_dongho_edit", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_dongho_update($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $ma_sp = $_POST['ma_sp'];
      $doituong_sudung = $_POST['doituong_sudung'];
      $duongkinh_mat = $_POST['duongkinh_mat'];
      $chatlieu_kinh = $_POST['chatlieu_kinh'];
      $chatlieu_day = $_POST['chatlieu_day'];
      $chongnuoc = $_POST['chongnuoc'];
      $data = array(
        'ma_sp' => $ma_sp,
        'doituong_sudung' => $doituong_sudung,
        'duongkinh_mat' => $duongkinh_mat,
        'chatlieu_kinh' => $chatlieu_kinh,
        'chatlieu_day' => $chatlieu_day,
        'chongnuoc' => $chongnuoc
      );
      $result = $chitiet_sanphamM->sp_chitiet_update($table_ctsp, $data, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_dongho");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_dongho_timkiem()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
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
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "sanpham.ten_sp LIKE '%$tukhoa%' AND sanpham.ma_dm=12";
      $data['sp_chitiet_timkiem'] = $chitiet_sanphamM->sp_chitiet_timkiem($table_sp, $table_ctsp, $dieukien);
      $this->load->view_admin("sanpham/sp_chitiet_dongho_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_dongho_delete($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $result = $chitiet_sanphamM->sp_chitiet_delete($table_ctsp, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_dongho");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }

  //chi tiết sản phẩm máy tính để bàn
  public function sp_chitiet_maytinh()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
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
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $dieukien = 'sanpham.ma_dm = 13';
      $data['sanpham_ma_dm'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien);
      $data['sp_chitiet_maytinh_list'] = $chitiet_sanphamM->sp_chitiet_list($table_sp, $table_ctsp, $dieukien);
      $this->load->view_admin("sanpham/sp_chitiet_maytinh", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_maytinh_insert()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $ma_sp = $_POST['ma_sp'];
      $congnghe_cpu = $_POST['congnghe_cpu'];
      $ram = $_POST['ram'];
      $rom = $_POST['rom'];
      $manhinh = $_POST['manhinh'];
      $card_manhinh = $_POST['card_manhinh'];
      $cong_ketnoi = $_POST['cong_ketnoi'];
      $hedieuhanh = $_POST['hedieuhanh'];
      $kichthuoc = $_POST['kichthuoc'];
      $bo_sanpham = $_POST['bo_sanpham'];
      $data = array(
        'ma_sp' => $ma_sp,
        'congnghe_cpu' => $congnghe_cpu,
        'ram' => $ram,
        'rom' => $rom,
        'manhinh' => $manhinh,
        'card_manhinh' => $card_manhinh,
        'cong_ketnoi' => $cong_ketnoi,
        'hedieuhanh' => $hedieuhanh,
        'bo_sanpham' => $bo_sanpham,
        'kichthuoc' => $kichthuoc
      );
      $result = $chitiet_sanphamM->sp_chitiet_insert($table_ctsp, $data);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_maytinh");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_maytinh_edit($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      //sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien1 = 'sanpham.ma_dm = 13';
      $data['sanpham_ma_dm'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien1);
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $data['sp_chitiet_ma'] = $chitiet_sanphamM->sp_chitiet_ma($table_ctsp, $dieukien);
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
      $this->load->view_admin("sanpham/sp_chitiet_maytinh_edit", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_maytinh_update($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $ma_sp = $_POST['ma_sp'];
      $congnghe_cpu = $_POST['congnghe_cpu'];
      $ram = $_POST['ram'];
      $rom = $_POST['rom'];
      $manhinh = $_POST['manhinh'];
      $card_manhinh = $_POST['card_manhinh'];
      $cong_ketnoi = $_POST['cong_ketnoi'];
      $hedieuhanh = $_POST['hedieuhanh'];
      $kichthuoc = $_POST['kichthuoc'];
      $bo_sanpham = $_POST['bo_sanpham'];
      $data = array(
        'ma_sp' => $ma_sp,
        'congnghe_cpu' => $congnghe_cpu,
        'ram' => $ram,
        'rom' => $rom,
        'manhinh' => $manhinh,
        'card_manhinh' => $card_manhinh,
        'cong_ketnoi' => $cong_ketnoi,
        'hedieuhanh' => $hedieuhanh,
        'bo_sanpham' => $bo_sanpham,
        'kichthuoc' => $kichthuoc
      );
      $result = $chitiet_sanphamM->sp_chitiet_update($table_ctsp, $data, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_maytinh");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_maytinh_timkiem()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
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
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "sanpham.ten_sp LIKE '%$tukhoa%' AND sanpham.ma_dm=13";
      $data['sp_chitiet_timkiem'] = $chitiet_sanphamM->sp_chitiet_timkiem($table_sp, $table_ctsp, $dieukien);
      $this->load->view_admin("sanpham/sp_chitiet_maytinh_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sp_chitiet_maytinh_delete($ma_ctsp)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $chitiet_sanphamM = $this->load->model('chitiet_sanphamM');
      $table_ctsp = 'chitiet_sanpham';
      $dieukien = "chitiet_sanpham.ma_ctsp='$ma_ctsp'";
      $result = $chitiet_sanphamM->sp_chitiet_delete($table_ctsp, $dieukien);
      header("Location:" . BASE_URL . "sanpham/sp_chitiet_maytinh");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  //hình sản phẩm
  public function hinh()
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
      // sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      //hình
      $hinhM = $this->load->model('hinhM');
      $table_h = 'hinh';
      $data['hinh'] = $hinhM->hinh_list($table_h, $table_sp);
      $this->load->view_admin("sanpham/hinh", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function hinh_insert()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $hinhM = $this->load->model('hinhM');
      $table_h = 'hinh';
      $ma_sp = $_POST['ma_sp'];
      $hinh = $_FILES['hinh']['name'];
      $file_temp = $_FILES['hinh']['tmp_name'];
      $div = explode(' . ', $hinh);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . ' . ' . $file_ext;
      $uploaded_image = "public/uploads/hinh_chitiet/" . $unique_image;
      move_uploaded_file($file_temp, $uploaded_image);
      $data = array(
        'ma_sp' => $ma_sp,
        'hinh' => $unique_image
      );
      $result = $hinhM->hinh_insert($table_h, $data);
      header("Location:" . BASE_URL . "sanpham/hinh");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function hinh_edit($ma_h)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      // sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      //hình
      $hinhM = $this->load->model('hinhM');
      $table_h = 'hinh';
      $dieukien = "hinh.ma_h='$ma_h'";
      $data['hinh_ma'] = $hinhM->hinh_ma($table_h, $dieukien);
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
      $this->load->view_admin("sanpham/hinh_edit", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function hinh_update($ma_h)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $hinhM = $this->load->model('hinhM');
      $table_h = 'hinh';
      $dieukien = "hinh.ma_h='$ma_h'";
      $ma_sp = $_POST['ma_sp'];
      $hinh = $_FILES['hinh']['name'];
      $file_temp = $_FILES['hinh']['tmp_name'];
      $div = explode(' . ', $hinh);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . ' . ' . $file_ext;
      $uploaded_image = "public/uploads/hinh_chitiet/" . $unique_image;
      if ($hinh) {
        $data['hinh_ma'] = $hinhM->hinh_ma($table_h, $dieukien);
        foreach ($data['hinh_ma'] as $key => $h) {
          if ($h['hinh']) {
            unlink("public/uploads/hinh_chitiet/" . $h['hinh']);
          }
        }
        $data = array(
          'ma_sp' => $ma_sp,
          'hinh' => $unique_image
        );
        move_uploaded_file($file_temp, $uploaded_image);
      } else {
        $data = array(
          'ma_sp' => $ma_sp
        );
      }
      $result = $hinhM->hinh_update($table_h, $data, $dieukien);
      header("Location:" . BASE_URL . "sanpham/hinh");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function hinh_delete($ma_h)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $hinhM = $this->load->model('hinhM');
      $table_h = 'hinh';
      $dieukien = "hinh.ma_h='$ma_h'";
      if ($ma_h) {
        $data['hinh_ma'] = $hinhM->hinh_ma($table_h, $dieukien);
        foreach ($data['hinh_ma'] as $key => $h) {
          if ($h['hinh']) {
            unlink("public/uploads/hinh_chitiet/" . $h['hinh']);
          }
        }
      }
      $result = $hinhM->hinh_delete($table_h, $dieukien);
      header("Location:" . BASE_URL . "sanpham/hinh");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function hinh_deleteAll()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $hinhM = $this->load->model('hinhM');
      $table_h = 'hinh';
      $table_sp = 'sanpham';
      $data['hinh'] = $hinhM->hinh_list($table_h, $table_sp);
      foreach ($data['hinh'] as $key => $h) {
        if ($h['hinh']) {
          unlink("public/uploads/hinh_chitiet/" . $h['hinh']);
        }
      }
      $result = $hinhM->hinh_deleteAll($table_h);
      header("Location:" . BASE_URL . "sanpham/hinh");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function hinh_timkiem()
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
      // sản phẩm
      $table_sp = 'sanpham';
      //hinh
      $hinhM = $this->load->model('hinhM');
      $table_h = 'hinh';
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "sanpham.ten_sp LIKE '%$tukhoa%'";
      $data['hinh_timkiem'] = $hinhM->hinh_timkiem($table_sp, $table_h, $dieukien);
      $this->load->view_admin("sanpham/hinh_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  //màu của sản phẩm
  public function mau_sanpham()
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
      //sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      //màu
      $mauM = $this->load->model('mauM');
      $table_m = 'mau';
      $dieukien_m = "tinhtrang_m = 0";
      $data['mau'] = $mauM->mau_ma($table_m,$dieukien_m);
      $mau_sanphamM = $this->load->model("mau_sanphamM");
      $table_msp = 'mau_sanpham';
      $data['mau_sanpham_list'] = $mau_sanphamM->mau_sanpham_list($table_sp, $table_m, $table_msp);
      $this->load->view_admin("sanpham/mau_sanpham", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function mau_sanpham_insert()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $mau_sanphamM = $this->load->model("mau_sanphamM");
      $table_msp = 'mau_sanpham';
      $ma_sp = $_POST['ma_sp'];
      $ma_m = $_POST['ma_m'];
      $data = array(
        'ma_sp' => $ma_sp,
        'ma_m' => $ma_m
      );
      $result = $mau_sanphamM->mau_sanpham_insert($table_msp, $data);
      header("Location:" . BASE_URL . "sanpham/mau_sanpham");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function mau_sanpham_edit($ma_sp, $ma_m)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $mau_sanphamM = $this->load->model("mau_sanphamM");
      $table_msp = 'mau_sanpham';
      $dieukien = "mau_sanpham.ma_sp='$ma_sp' AND mau_sanpham.ma_m ='$ma_m'";
      //sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      //màu
      $mauM = $this->load->model('mauM');
      $table_m = 'mau';
      $data['mau'] = $mauM->mau_list($table_m);
      $data['mau_sanpham_ma'] = $mau_sanphamM->mau_sanpham_ma($table_msp, $dieukien);
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
      $this->load->view_admin("sanpham/mau_sanpham_edit", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function mau_sanpham_update($ma_sp, $ma_m)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $mau_sanphamM = $this->load->model("mau_sanphamM");
      $table_msp = 'mau_sanpham';
      $dieukien = "mau_sanpham.ma_sp='$ma_sp' AND mau_sanpham.ma_m ='$ma_m'";
      $ma_sp = $_POST['ma_sp'];
      $ma_m = $_POST['ma_m'];
      $data = array(
        'ma_sp' => $ma_sp,
        'ma_m' => $ma_m
      );
      $result = $mau_sanphamM->mau_sanpham_update($table_msp, $data, $dieukien);
      header("Location:" . BASE_URL . "sanpham/mau_sanpham");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function mau_sanpham_delete($ma_sp, $ma_m)
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $mau_sanphamM = $this->load->model("mau_sanphamM");
      $table_msp = 'mau_sanpham';
      $dieukien = "mau_sanpham.ma_sp='$ma_sp' AND mau_sanpham.ma_m ='$ma_m'";
      $result = $mau_sanphamM->mau_sanpham_delete($table_msp, $dieukien);
      header("Location:" . BASE_URL . "sanpham/mau_sanpham");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function mau_sanpham_deleteAll()
  {
    session::init();
    $level = session::get('level');
    if ($level == 1) {
      $mau_sanphamM = $this->load->model("mau_sanphamM");
      $table_msp = 'mau_sanpham';
      $result = $mau_sanphamM->mau_sanpham_deleteAll($table_msp);
      header("Location:" . BASE_URL . "sanpham/mau_sanpham");
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function mau_sanpham_timkiem()
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
      $table_sp = 'sanpham';
      $table_m = 'mau';
      //màu sản phẩm
      $mau_sanphamM = $this->load->model("mau_sanphamM");
      $table_msp = 'mau_sanpham';
      $tukhoa = $_POST['tukhoa'];
      $dieukien = "sanpham.ten_sp LIKE '%$tukhoa%'";
      $data['mau_sanpham_timkiem'] = $mau_sanphamM->mau_sanpham_timkiem($table_sp, $table_msp, $table_m, $dieukien);
      $this->load->view_admin("sanpham/mau_sanpham_timkiem", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
}
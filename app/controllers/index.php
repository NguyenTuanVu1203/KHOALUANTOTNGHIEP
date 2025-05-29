<?php
use Carbon\Carbon;
class index extends controller
{
  public function __construct()
  {
    $data = array();
    parent::__construct();
  }
  public function index()
  {
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $dieukien_dm = "tinhtrang_dm = 0";
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_ma($table_dm, $dieukien_dm);
    $this->load->view_user("header", $data);
    $this->load->view_user("slider");
    //thương hiệu
    $thuonghieuM = $this->load->model('thuonghieuM');
    $table_th = 'thuonghieu';
    $data['thuonghieu'] = $thuonghieuM->thuonghieu_limit($table_th);
    //sản phẩm
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    $data['sanpham_limit1'] = $sanphamM->sanpham_limit1($table_sp, $table_dm);
    $data['sanpham_limit'] = $sanphamM->sanpham_limit($table_sp, $table_dm);
    $data['sanpham_dt_limit'] = $sanphamM->sanpham_dt_limit($table_sp);
    $dieukien = "sanpham.ma_dm = 9";
    $limit1 = 6;
    $data['sp_laptop_limit'] = $sanphamM->sp_limit($table_sp, $dieukien, $limit1);
    $dieukien1 = "sanpham.ma_dm = 11";
    $data['sp_smartwatch_limit'] = $sanphamM->sp_limit($table_sp, $dieukien1, $limit1);
    //tin tức
    $tintucM = $this->load->model('tintucM');
    $table_tt = 'tintuc';
    $limit = 6;
    //danh mục tin tức
    $table_dmtt = 'danhmuc_tintuc';
    $data['tintuc_limit'] = $tintucM->tintuc_limit($table_tt, $table_th, $table_dmtt, $limit);
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $data ['count_sao'] = $danhgiaM->count_sao($table_sp,$table_dg);
    $this->load->view_user("trangchu", $data);
    $this->load->view_user("footer");
  }
  public function timkiem_sp()
  {
    session::init();
    //sản phẩm
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    $tukhoa = $_POST['tukhoa'];
    $dieukien = "sanpham.ten_sp LIKE '%$tukhoa%'";
    $data['Usanpham_timkiem'] = $sanphamM->Usanpham_timkiem($table_sp, $table_dm, $dieukien);
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $data ['count_sao'] = $danhgiaM->count_sao($table_sp,$table_dg);
    $this->load->view_user("timkiem", $data);
    $this->load->view_user("footer");
  }
  public function tra_donhang()
  {
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    $this->load->view_user("tradonhang");
    $this->load->view_user("footer");
  }
  public function lichsu_donhang()
  {
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    $sdt_k = $_POST['sdt_k'];
    $matkhau_k1 = $_POST['matkhau_k'];
    session::set('nhapmatkhau',true);
    session::set('matkhau_k',$matkhau_k1);
    $matkhau_k = md5($_POST['matkhau_k']);
    // đơn hàng
    $table_dh = "donhang";
    $donhangM = $this->load->model('donhangM');
    $dieukien = "donhang.sdt_k = '$sdt_k' AND donhang.matkhau_k = '$matkhau_k' ";
    $data['donhang_sdt'] = $donhangM->donhang_sdt($table_dh, $dieukien);
    $this->load->view_user("lichsu_donhang/lichsudonhang", $data);
    $this->load->view_user("footer");
  }

  public function baohanh($ma_dh)
  {
    session::init();
    //sản phẩm
    $table_sp = 'sanpham';
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $dieukien1 = "donhang.ma_dh = '$ma_dh'";
    //chi tiết đơn hàng
    $table_ctdh = 'chitiet_donhang';
    $chitiet_donhangM = $this->load->model('chitiet_donhangM');
    //đơn hàng
    $table_dh = "donhang";
    //màu
    $table_m = 'mau';
    $table_km ="khuyenmai";
    $data['lichsudonhang_chitiet'] = $chitiet_donhangM->chitiet_donhang_madh($table_dh, $table_ctdh, $table_sp, $table_m, $table_dm,$table_km, $dieukien1);
    //chi tiết đơn hàng
    $table_ctdh = 'chitiet_donhang';
    $chitiet_donhangM = $this->load->model('chitiet_donhangM');
    //bảo hành
    $baohanhM = $this->load->model('baohanhM');
    $table_bh = "baohanh";
    $order = "baohanh.ngay_bh desc ";
    $dieukien2 = "baohanh.ma_sp = chitiet_donhang.ma_sp AND baohanh.ma_dh = '$ma_dh'";
    $data['baohanh_ma_dh'] = $baohanhM->baohanh_list($table_bh, $table_dh, $table_sp, $table_ctdh, $dieukien2, $order);
    $this->load->view_user("header", $data);
    $this->load->view_user("lichsu_donhang/baohanh", $data);
  }

  public function lichsudonhang_chitiet($ma_dh)
  {
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    //chi tiết đơn hàng
    $table_ctdh = 'chitiet_donhang';
    $chitiet_donhangM = $this->load->model('chitiet_donhangM');
    //đơn hàng
    $table_dh = "donhang";
    // sản phẩm
    $table_sp = 'sanpham';
    //màu
    $table_m = 'mau';
    $dieukien1 = "donhang.ma_dh = '$ma_dh'";
    $table_km ="khuyenmai";
    $data['lichsudonhang_chitiet'] = $chitiet_donhangM->chitiet_donhang_madh($table_dh, $table_ctdh, $table_sp, $table_m, $table_dm,$table_km, $dieukien1);
    $this->load->view_user("lichsu_donhang/lichsudonhang_chitiet", $data);
    $this->load->view_user("footer");
  }
  public function huy($ma_dh)
  {
    session::init();
    //đơn hàng
    $table_dh = "donhang";
    $donhangM = $this->load->model('donhangM');
    $dieukien = "donhang.ma_dh = '$ma_dh'";
    $result = $donhangM->donhang_delete($table_dh, $dieukien);
    header("Location:" . BASE_URL . "index/tra_donhang");
  }
  public function danhan($ma_dh)
  {
    session::init();
    //đơn hàng
    $table_dh = "donhang";
    $donhangM = $this->load->model('donhangM');
    $dieukien = "donhang.ma_dh = '$ma_dh'";
    $data = array(
      'tinhtrang_dh' => '2'
    );
    $result = $donhangM->donhang_update($table_dh, $data, $dieukien);
    header("Location:" . BASE_URL . "index/tra_donhang");
  }
  public function tintuc()
  {
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    //danh mục tin tức
    $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
    $table_dmtt = 'danhmuc_tintuc';
    $dieukien_dmtt = "tinhtrang_dmtt = 0";
    $data['danhmuc_tintuc'] = $danhmuc_tintucM->danhmuc_tintuc_ma($table_dmtt, $dieukien_dmtt);
    // tin tức
    $tintucM = $this->load->model('tintucM');
    $table_tt = 'tintuc';
    //thương hiệu
    $table_th = 'thuonghieu';
    //tin tức limit 
    $limit1 = 1;
    $data['tintuc_limit1'] = $tintucM->tintuc_limit($table_tt, $table_th, $table_dmtt, $limit1);
    $limit2 = '1,2';
    $data['tintuc_limit2'] = $tintucM->tintuc_limit($table_tt, $table_th, $table_dmtt, $limit2);
    $limit4 = '3,14';
    $data['tintuc_limit4'] = $tintucM->tintuc_limit($table_tt, $table_th, $table_dmtt, $limit4);
    //sản phẩm
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    // danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model("danhmuc_sanphamM");
    $table_dm = 'danhmuc_sanpham';
    $limit = 4;
    $data['sanpham'] = $sanphamM->Usanpham_limit($table_sp, $table_dm, $limit);
    $this->load->view_user("tintuc/tintuc", $data);
    $this->load->view_user("footer");
  }
  public function chitiet_tintuc($ma_tt)
  {
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    //danh mục tin tức
    $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
    $table_dmtt = 'danhmuc_tintuc';
    $data['danhmuc_tintuc'] = $danhmuc_tintucM->danhmuc_tintuc_list($table_dmtt);
    // tin tức
    $tintucM = $this->load->model('tintucM');
    $table_tt = 'tintuc';
    $dieukien1 = "tintuc.ma_tt = '$ma_tt'";
    $data['tintuc_ma'] = $tintucM->tintuc_ma($table_tt, $dieukien1);
    $this->load->view_user("tintuc/chitiet_tintuc", $data);
    $this->load->view_user("footer");
  }
  public function tintuc_danhmuc($ma_dmtt)
  {
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    //danh mục tin tức
    $danhmuc_tintucM = $this->load->model('danhmuc_tintucM');
    $table_dmtt = 'danhmuc_tintuc';
    $data['danhmuc_tintuc'] = $danhmuc_tintucM->danhmuc_tintuc_list($table_dmtt);
    // tin tức
    $tintucM = $this->load->model('tintucM');
    $table_tt = 'tintuc';
    //thương hiệu
    $table_th = 'thuonghieu';
    //tin tức limit 
    $dieukien = "tintuc.ma_dmtt = '$ma_dmtt'";
    $limit1 = 1;
    $data['tintuc_limit1'] = $tintucM->tintuc_limit_dmtt($table_tt, $table_th, $table_dmtt, $limit1, $dieukien);
    $limit2 = '1,2';
    $data['tintuc_limit2'] = $tintucM->tintuc_limit_dmtt($table_tt, $table_th, $table_dmtt, $limit2, $dieukien);
    $limit4 = '3,14';
    $data['tintuc_limit4'] = $tintucM->tintuc_limit_dmtt($table_tt, $table_th, $table_dmtt, $limit4, $dieukien);
    //sản phẩm
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    // danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model("danhmuc_sanphamM");
    $table_dm = 'danhmuc_sanpham';
    $limit = 4;
    $data['sanpham'] = $sanphamM->Usanpham_limit($table_sp, $table_dm, $limit);
    $this->load->view_user("tintuc/tintuc_danhmuc", $data);
    $this->load->view_user("footer");
  }
}
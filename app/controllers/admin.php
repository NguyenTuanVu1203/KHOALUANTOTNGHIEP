<?php
class admin extends controller
{
  public function __construct()
  {
    $data = array();
    parent::__construct();
  }
  public function index()
  {
    $this->trangchu();
  }
  public function trangchu()
  {
    session::checksession();
    $level = session::get('level');
    if ($level == 1) {
      $this->load->view_admin("header");
      //hiển thị số lượng đơn hàng bên left menu
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      $dieukien_m = 'donhang.tinhtrang_dh = 0';
      $data['donhang_moi'] = $donhangM->donhang_moi($table_dh, $dieukien_m);
      $dieukien_vc = 'donhang.tinhtrang_dh = 1';
      $data['donhang_dangvanchuyen'] = $donhangM->donhang_moi($table_dh, $dieukien_vc);
      $dieukien_dg = 'donhang.tinhtrang_dh = 2';
      $data['donhang_dagiao'] = $donhangM->donhang_moi($table_dh, $dieukien_dg);
      $this->load->view_admin("leftmenu", $data);
      //tổng số đơn hàng
      $table_km = "khuyenmai";
      $data['donhang'] = $donhangM->donhang_list($table_dh,$table_km);
      //doanh thu hôm nay
      $ngay = date("d/m/Y");
      $data['doanhthu_homnay'] = $donhangM->doanhthu_homnay($table_dh, $ngay);
      //tổng số sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      //thống kê ngày
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      //chi tiết đơn hàng
      $table_ctdh = 'chitiet_donhang';
      $data['soluong_ngay'] = $donhangM->soluong_ngay($table_dh, $table_sp, $table_ctdh);
      $data['tongtien_ngay'] = $donhangM->tongtien_ngay($table_dh);
      $data['count_sp_ngay'] = $donhangM->count_sp_ngay($table_dh, $table_ctdh, $table_sp);
      //thống kê tháng
      $data['soluong_thang'] = $donhangM->soluong_thang($table_dh, $table_sp, $table_ctdh);
      $data['tongtien_thang'] = $donhangM->tongtien_thang($table_dh);
      $data['count_sp_thang'] = $donhangM->count_sp_thang($table_dh, $table_ctdh, $table_sp);
      //thống kê nam
      $data['soluong_nam'] = $donhangM->soluong_nam($table_dh, $table_sp, $table_ctdh);
      $data['tongtien_nam'] = $donhangM->tongtien_nam($table_dh);
      $data['count_sp_nam'] = $donhangM->count_sp_nam($table_dh, $table_ctdh, $table_sp);
      $table_dm = 'danhmuc_sanpham';
      //nhân viên
      $nhanvienM = $this->load->model('nhanvienM');
      $table_nv = 'nhanvien';
      $table_ncc = 'nhacungcap';
      $table_lsp = 'loai_sanpham';
      $table_th = 'thuonghieu';
      //sản phẩm có số lượng còn lại ít
      $dieukien_soluong = "soluong_sp < 50";
      $data['sanpham_soluong_min'] = $sanphamM->sanpham_soluong($table_sp, $table_dm, $table_nv, $table_ncc, $table_lsp, $table_th, $dieukien_soluong);
      $ma_nv = session::get('ma_nv');
      //lấy thông tin nhân viên
      $table_nv = 'nhanvien';
      $nhanvienM = $this->load->model('nhanvienM');
      $dieukien_nv = "nhanvien.ma_nv = '$ma_nv'";
      $data['nhanvien_ma'] = $nhanvienM->nhanvien_ma($table_nv, $dieukien_nv);
      $this->load->view_admin("trangchu", $data);
    } else if ($level == 2) {
      header("Location:" . BASE_URL . "nhanvien/index");
    }
  }
  public function sanpham_banngay_timkiem()
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
    $this->load->view_admin("leftmenu", $data);
    $ngaylap_dh = $_POST['tukhoa'];
    //đơn hàng
    $table_dh = "donhang";
    $donhangM = $this->load->model('donhangM');
    //chi tiết đơn hàng
    $table_ctdh = 'chitiet_donhang';
    //sản phẩm
    $table_sp = 'sanpham';
    $dieukien_tkn = "donhang.ngaylap_dh = '$ngaylap_dh'";
    $order_tkn = "donhang.ngaylap_dh";
    $group_tkn = "chitiet_donhang.ma_sp, donhang.ngaylap_dh";
    $data['sanpham_banngay_timkiem'] = $donhangM->sanphamban_timkiem($table_dh, $table_ctdh, $table_sp, $dieukien_tkn, $order_tkn, $group_tkn);
    $this->load->view_admin("trangchu/sanpham_banngay_timkiem", $data);
  }
  public function sanpham_banngay_nv_timkiem()
  {
    session::checksession();
    $ma_nv = session::get('ma_nv');
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
    $ngaylap_dh = $_POST['tukhoa'];
    //đơn hàng
    $table_dh = "donhang";
    $donhangM = $this->load->model('donhangM');
    //chi tiết đơn hàng
    $table_ctdh = 'chitiet_donhang';
    //sản phẩm
    $table_sp = 'sanpham';
    $dieukien_tkn = "donhang.ngaylap_dh = '$ngaylap_dh' AND donhang.ma_nv = '$ma_nv'";
    $order_tkn = "donhang.ngaylap_dh";
    $group_tkn = "chitiet_donhang.ma_sp, donhang.ngaylap_dh";
    $data['sanpham_banngay_timkiem'] = $donhangM->sanphamban_timkiem($table_dh, $table_ctdh, $table_sp, $dieukien_tkn, $order_tkn, $group_tkn);
    $this->load->view_admin("trangchu/sanpham_banngay_timkiem", $data);
  }
  public function sanpham_banthang_timkiem()
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
    $this->load->view_admin("leftmenu", $data);
    $thanglap_dh = $_POST['tukhoa'];
    //đơn hàng
    $table_dh = "donhang";
    $donhangM = $this->load->model('donhangM');
    //chi tiết đơn hàng
    $table_ctdh = 'chitiet_donhang';
    //sản phẩm
    $table_sp = 'sanpham';
    $dieukien_tkt = "donhang.thanglap_dh = '$thanglap_dh'";
    $order_tkt = "donhang.thanglap_dh";
    $group_tkt = "chitiet_donhang.ma_sp, donhang.thanglap_dh";
    $data['sanpham_banthang_timkiem'] = $donhangM->sanphamban_timkiem($table_dh, $table_ctdh, $table_sp, $dieukien_tkt, $order_tkt, $group_tkt);
    $this->load->view_admin("trangchu/sanpham_banthang_timkiem", $data);
  }
  public function sanpham_banthang_nv_timkiem()
  {
    session::checksession();
    $ma_nv = session::get('ma_nv');
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
    $thanglap_dh = $_POST['tukhoa'];
    //đơn hàng
    $table_dh = "donhang";
    $donhangM = $this->load->model('donhangM');
    //chi tiết đơn hàng
    $table_ctdh = 'chitiet_donhang';
    //sản phẩm
    $table_sp = 'sanpham';
    $dieukien_tkt = "donhang.thanglap_dh = '$thanglap_dh'AND donhang.ma_nv = '$ma_nv'";
    $order_tkt = "donhang.thanglap_dh";
    $group_tkt = "chitiet_donhang.ma_sp, donhang.thanglap_dh";
    $data['sanpham_banthang_timkiem'] = $donhangM->sanphamban_timkiem($table_dh, $table_ctdh, $table_sp, $dieukien_tkt, $order_tkt, $group_tkt);
    $this->load->view_admin("trangchu/sanpham_banthang_timkiem", $data);
  }

  public function sanpham_bannam_timkiem()
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
    $this->load->view_admin("leftmenu", $data);
    $namlap_dh = $_POST['tukhoa'];
    //đơn hàng
    $table_dh = "donhang";
    $donhangM = $this->load->model('donhangM');
    //chi tiết đơn hàng
    $table_ctdh = 'chitiet_donhang';
    //sản phẩm
    $table_sp = 'sanpham';
    $dieukien_tknam = "donhang.namlap_dh = '$namlap_dh'";
    $order_tknam = "donhang.namlap_dh";
    $group_tknam = "chitiet_donhang.ma_sp, donhang.namlap_dh";
    $data['sanpham_bannam_timkiem'] = $donhangM->sanphamban_timkiem($table_dh, $table_ctdh, $table_sp, $dieukien_tknam, $order_tknam, $group_tknam);
    $this->load->view_admin("trangchu/sanpham_bannam_timkiem", $data);
  }
  public function sanpham_bannam_nv_timkiem()
  {
    session::checksession();
    $ma_nv = session::get('ma_nv');
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
    $namlap_dh = $_POST['tukhoa'];
    //đơn hàng
    $table_dh = "donhang";
    $donhangM = $this->load->model('donhangM');
    $table_ctdh = 'chitiet_donhang';
    $table_sp = 'sanpham';
    $dieukien_tknam = "donhang.namlap_dh = '$namlap_dh'AND donhang.ma_nv = '$ma_nv'";
    $order_tknam = "donhang.namlap_dh";
    $group_tknam = "chitiet_donhang.ma_sp, donhang.namlap_dh";
    $data['sanpham_bannam_timkiem'] = $donhangM->sanphamban_timkiem($table_dh, $table_ctdh, $table_sp, $dieukien_tknam, $order_tknam, $group_tknam);
    $this->load->view_admin("trangchu/sanpham_bannam_timkiem", $data);
  }
}
<?php
  use Carbon\Carbon;
  class hoi_dap extends controller{
    public function __construct()
    {
      $data = array();
      parent::__construct();
    }
    public function hoi_dap_insert(){
      session::init();
      $hoi_dapM = $this->load->model('hoi_dapM');
      $table_hd = "hoi_dap";
      $ma_sp = $_POST['ma_sp'];
      $ten_k = $_POST['ten_k'];
      $noidung_hd = $_POST['noidung_hd'];
      $ghichu_hd = $_POST['ghichu_hd'];
      $thoigian_hd = Carbon::now('Asia/Ho_Chi_Minh');
      $data_hd = array(
        'ma_sp' => $ma_sp,
        'ten_k' => $ten_k,
        'noidung_hd' => $noidung_hd,
        'thoigian_hd' => $thoigian_hd,
        'ma_nv' => '4',
        'ghichu_hd' => $ghichu_hd
      );
      $result_hd = $hoi_dapM->hoi_dap_insert($table_hd, $data_hd);
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $dieukien = "sanpham.ma_sp = '$ma_sp'";
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $table_dm = 'danhmuc_sanpham';
      $data['sanpham_ma'] = $sanphamM->sanpham_ma($table_sp, $dieukien);
      if($data['sanpham_ma']){
        foreach($data['sanpham_ma'] as $sp_m){
          $ma_dm = $sp_m['ma_dm'];
          $dieukien1 = "danhmuc_sanpham.ma_dm = '$ma_dm'";
          $data['danhmuc_ma'] = $danhmuc_sanphamM->danhmuc_sanpham_ma($table_dm, $dieukien1);
          if($data['danhmuc_ma']){
            foreach($data['danhmuc_ma'] as $dm_m){
              header("Location:".BASE_URL.'/'.$dm_m['ghichu_dm'].'/chitiet_sanpham'.'/'.$sp_m['ma_sp'].'/'.$sp_m['ma_th'].'/'.$ma_dm);
            }
          }
        }
      }
    }
    public function hoi_dap_insert_admin(){
      session::init();
      $hoi_dapM = $this->load->model('hoi_dapM');
      $table_hd = "hoi_dap";
      $parent = $_POST['parent'];
      $ma_sp = $_POST['ma_sp'];
      $ma_nv = $_POST['ma_nv'];
      $noidung_hd = $_POST['noidung_hd'];
      $thoigian_hd = Carbon::now('Asia/Ho_Chi_Minh');
      $data_hd = array(
        'parent' => $parent,
        'noidung_hd' => $noidung_hd,
        'thoigian_hd' => $thoigian_hd,
        'ma_sp' => $ma_sp,
        'ma_nv' => $ma_nv,
        'status' => '1'
      );
      $result_hd = $hoi_dapM->hoi_dap_insert($table_hd, $data_hd);
      header("Location:".BASE_URL."hoi_dap/hoi_dap_list");
    }
    public function hoi_dap_list(){
      session::init();
      $this->load->view_admin("header");
      //đơn hàng
      $table_dh = "donhang";
      $donhangM = $this->load->model('donhangM');
      //hỏi đáp
      $hoi_dapM = $this->load->model('hoi_dapM');
      $table_hd = "hoi_dap";
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
      // sản phẩm
      $table_sp = 'sanpham';
      $order = "hoi_dap.thoigian_hd desc ";
      $table_nv = 'nhanvien';
      $data['hoi_dap_listAll'] = $hoi_dapM->hoi_dap_listAll($table_hd, $table_sp,$table_nv, $order);
      $this->load->view_admin("hoi_dap/hoi_dap", $data);
    }
    public function hoi_dap_timkiem()
  {
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
    $table_nv = 'nhanvien';
    $table_sp = 'sanpham';
    $hoi_dapM = $this->load->model('hoi_dapM');
    $table_hd = "hoi_dap";
    $tukhoa = $_POST['tukhoa'];
    $dieukien = "sanpham.ten_sp LIKE '%$tukhoa%'";
    $data['hoi_dap_timkiem'] = $hoi_dapM->hoi_dap_timkiem($table_hd,$table_sp, $table_nv, $dieukien);
    $this->load->view_admin("hoi_dap/hoi_dap_timkiem", $data);
  }
  }
?>
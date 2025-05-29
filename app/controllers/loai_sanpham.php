<?php
  class loai_sanpham extends controller{
    public function __construct()
    {
      $data = array();
      $thongbao = array();
      parent::__construct();
    }
    public function loai_sanpham(){
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
        $loai_sanphamM = $this->load->model('loai_sanphamM');
        $table_lsp = 'loai_sanpham';
        $danhmuc_sanphamM = $this->load->model("danhmuc_sanphamM");
        $table_dm = 'danhmuc_sanpham';
        $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
        $data ['loai_sanpham'] = $loai_sanphamM->loai_sanpham_list($table_lsp, $table_dm);
        $this->load->view_admin("loai_sanpham/loai_sanpham", $data); 
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function loai_sanpham_insert(){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $loai_sanphamM = $this->load->model('loai_sanphamM');
        $table = 'loai_sanpham';
        $ten_lsp = $_POST['ten_lsp'];
        $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
        //chuyển chữ có dấu thành không dấu, bỏ dấu cách giữa các chữ
        $ghichu = $danhmuc_sanphamM->convert_name($ten_lsp);
        //chuyển chữ hoa thành chữ thường
        $ghichu_lsp = strtolower($ghichu);
        $ma_dm = $_POST['ma_dm'];
        $icon_lsp = $_POST['icon_lsp'];
        $data = array(
          'ma_dm' => $ma_dm,
          'ten_lsp' => $ten_lsp,
          'ghichu_lsp' => $ghichu_lsp,
          'icon_lsp' => $icon_lsp
        );
        $result = $loai_sanphamM->loai_sanpham_insert($table, $data);
        header("Location:".BASE_URL."loai_sanpham/loai_sanpham");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function loai_sanpham_edit($ma_lsp){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $loai_sanphamM = $this->load->model('loai_sanphamM');
        $table_lsp = 'loai_sanpham';
        $danhmuc_sanphamM = $this->load->model("danhmuc_sanphamM");
        $table_dm = 'danhmuc_sanpham';
        $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
        $dieukien = "loai_sanpham.ma_lsp='$ma_lsp'" ;
        $data['loai_sanpham_ma'] = $loai_sanphamM->loai_sanpham_ma($table_lsp, $dieukien);
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
        $this->load->view_admin("loai_sanpham/loai_sanpham_edit", $data);
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function loai_sanpham_update($ma_lsp){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $loai_sanphamM = $this->load->model('loai_sanphamM');
        $table = 'loai_sanpham';
        $dieukien = "loai_sanpham.ma_lsp='$ma_lsp'" ;
        $ten_lsp = $_POST['ten_lsp'];
        $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
        $ghichu = $danhmuc_sanphamM->convert_name($ten_lsp);
        $ghichu_lsp = strtolower($ghichu);
        $ma_dm = $_POST['ma_dm'];
        $data = array(
          'ma_dm' => $ma_dm,
          'ghichu_lsp' => $ghichu_lsp,
          'ten_lsp' => $ten_lsp
        );
        $result = $loai_sanphamM->loai_sanpham_update($table, $data, $dieukien);
        header("Location:".BASE_URL."loai_sanpham/loai_sanpham");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function loai_sanpham_delete($ma_lsp){
      session::init();
      $level=session::get('level');
      if($level == 1){
        $loai_sanphamM = $this->load->model('loai_sanphamM');
        $table = 'loai_sanpham';
        $dieukien = "loai_sanpham.ma_lsp='$ma_lsp'" ;
        $result = $loai_sanphamM->loai_sanpham_delete($table, $dieukien);
        header("Location:".BASE_URL."loai_sanpham/loai_sanpham");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function loai_sanpham_deleteAll()
    {
      session::init();
      $level=session::get('level');
      if($level == 1){
        $loai_sanphamM = $this->load->model('loai_sanphamM');
        $table = 'loai_sanpham';
        $result = $loai_sanphamM->loai_sanpham_deleteAll($table);
        header("Location:" . BASE_URL . "loai_sanpham/loai_sanpham");
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
    public function loai_sanpham_timkiem(){
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
        $loai_sanphamM = $this->load->model('loai_sanphamM');
        $table_lsp = 'loai_sanpham';
        $danhmuc_sanphamM = $this->load->model("danhmuc_sanphamM");
        $table_dm = 'danhmuc_sanpham';
        $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
        $tukhoa = $_POST['tukhoa'];
        $dieukien = "loai_sanpham.ten_lsp LIKE '%$tukhoa%'" ;
        $data ['loai_sanpham_timkiem'] = $loai_sanphamM->loai_sanpham_timkiem($table_lsp,$table_dm, $dieukien);
        $this->load->view_admin("loai_sanpham/loai_sanpham_timkiem", $data); 
      }else if($level == 2){
        header("Location:".BASE_URL."nhanvien/index");
      }
    }
  }
?>
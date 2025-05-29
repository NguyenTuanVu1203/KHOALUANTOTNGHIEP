<?php
  class giohang extends controller{
    public function __construct()
    {
      $data = array();
      $thongbao = array();
      parent::__construct();
    }
    public function giohang(){
      session::init();
      //danh mục sản phẩm
      $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
      $table_dm = 'danhmuc_sanpham';
      $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
      $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
      //màu
      $mauM = $this->load->model('mauM');
      $table_m = 'mau';
      $data ['mau'] = $mauM->mau($table_m);
      //sản phẩm
      $sanphamM = $this->load->model('sanphamM');
      $table_sp = 'sanpham';
      $data['sanpham'] = $sanphamM->sanpham($table_sp);
      $khuyenmaiM = $this->load->model('khuyenmaiM');
      $table = 'khuyenmai';
      $dieukien = 'tinhtrang_km = 0 and soluong_km >0';
      $data['khuyenmai_hien'] = $khuyenmaiM->khuyenmai_dieukien($table, $dieukien);
      $this->load->view_user("header", $data);
      $this->load->view_user("giohang", $data);
      $this->load->view_user("footer"); 
    }
    public function giohang_insert(){
      session::init();
      if(isset($_SESSION['giohang'])){
        $i = 0;
        foreach ($_SESSION['giohang'] as $key => $gh){
          if($_SESSION['giohang'][$key]['ma_sp'] == $_POST['ma_sp'] && $_SESSION['giohang'][$key]['ma_m'] == $_POST['ma_m']){
            $i ++;
            $_SESSION['giohang'][$key]['soluong_dat'] = $_SESSION['giohang'][$key]['soluong_dat'] + $_POST['soluong_dat'];
          }
        }
        if($i == 0){
          $giohang = array(
            'ma_sp' => $_POST['ma_sp'],
            'ma_m' => $_POST['ma_m'],
            'soluong_dat' => $_POST['soluong_dat'],
            'soluong_sp' => $_POST['soluong_sp']
          );
          $_SESSION['giohang'][] = $giohang;
        }
      }else{
        $giohang = array(
          'ma_sp' => $_POST['ma_sp'],
          'ma_m' => $_POST['ma_m'],
          'soluong_dat' => $_POST['soluong_dat'],
          'soluong_sp' => $_POST['soluong_sp']
        );
        $_SESSION['giohang'][] = $giohang;
      }
      $ma_sp = $_POST['ma_sp'];
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
    public function giohang_update($ma_sp){
      session::init();
      if(isset($_SESSION['giohang'])){
        foreach ($_SESSION['giohang'] as $key => $gh){
          if($gh['ma_sp'] == $ma_sp){
            $_SESSION['giohang'][$key]['soluong_dat'] = $_POST['soluong_dat'];
          }
        }
        header("Location:".BASE_URL."giohang/giohang");
      }
    }
    public function giohang_delete($ma_sp){
      session::init();
      if(isset($_SESSION['giohang'])){
        foreach ($_SESSION['giohang'] as $key => $gh){
          if($gh['ma_sp'] == $ma_sp){
            unset($_SESSION['giohang'][$key]);
            header("Location:".BASE_URL."giohang/giohang");
          }
        }
        
      }
      
    }
    public function giohang_delete_all(){
      session::init();
      if(isset($_SESSION['giohang'])){
        unset($_SESSION['giohang']);
        header("Location:".BASE_URL."giohang/giohang");
        
      }
    }
  }
?>
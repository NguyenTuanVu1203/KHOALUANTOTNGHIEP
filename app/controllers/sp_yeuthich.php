<?php
class sp_yeuthich extends controller
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
    $this->load->view_user("header", $data);
    $this->load->view_user("sp_yeuthich", $data);
    $this->load->view_user("footer");
  }
  public function sp_yeuthich_insert(){
    session::init();
    if(isset($_SESSION['sp_yeuthich'])){
      $i = 0;
      foreach ($_SESSION['sp_yeuthich'] as $key => $sp_yt){
        if($_SESSION['sp_yeuthich'][$key]['ma_sp'] == $_POST['ma_sp']){
          $i ++;
        }
      }
      if($i == 0){
        $sp_yeuthich = array(
          'ma_sp' => $_POST['ma_sp'],
          'ma_th' => $_POST['ma_th'],
          'ma_dm' => $_POST['ma_dm'],
          'ten_sp' => $_POST['ten_sp'],
          'hinh_sp' => $_POST['hinh_sp'],
          'ghichu_dm' => $_POST['ghichu_dm']
        );
        $_SESSION['sp_yeuthich'][] = $sp_yeuthich;
      }
    }else{
      $sp_yeuthich = array(
        'ma_sp' => $_POST['ma_sp'],
        'ma_th' => $_POST['ma_th'],
        'ma_dm' => $_POST['ma_dm'],
        'ten_sp' => $_POST['ten_sp'],
        'hinh_sp' => $_POST['hinh_sp'],
        'ghichu_dm' => $_POST['ghichu_dm']
      );
      $_SESSION['sp_yeuthich'][] = $sp_yeuthich;
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
  public function sp_yeuthich_delete($ma_sp){
    session::init();
    if(isset($_SESSION['sp_yeuthich'])){
      foreach ($_SESSION['sp_yeuthich'] as $key => $sp_yt){
        if($sp_yt['ma_sp'] == $ma_sp){
          unset($_SESSION['sp_yeuthich'][$key]);
          header("Location:".BASE_URL."sp_yeuthich/index");
        }
      }
    }
  }
}
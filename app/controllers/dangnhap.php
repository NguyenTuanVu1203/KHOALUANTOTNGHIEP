<?php
  class dangnhap extends controller{
    public function __construct()
    {
      $data = array();
      parent::__construct();
    }
    public function index(){
      $this->dangnhap();
    }
    public function dangnhap(){
      session::init();
      if(session::get('dangnhap') == true){
        header("Location:".BASE_URL."admin/index");
      }
      $this->load->view_admin("dangnhap");
    }
    public function nhanvien_dangnhap(){
      session::init();
      $nhanvienM = $this->load->model('nhanvienM');
      $user_nv = $_POST['user_nv'];
      $pass_nv = md5($_POST['pass_nv']);
      $table = 'nhanvien';
      $conut = $nhanvienM->nhanvien_dangnhap($table, $user_nv, $pass_nv);
      if($conut == 0 ){
        header("Location:".BASE_URL."dangnhap");
      }else{
        $result = $nhanvienM->get_dangnhap($table, $user_nv, $pass_nv);
        session::init();
        session::set('dangnhap',true);
        session::set('ten_nv', $result[0]['ten_nv']);
        session::set('ma_nv', $result[0]['ma_nv']);
        session::set('user_nv', $result[0]['user_nv']);
        session::set('level', $result[0]['level']);
        if($result[0]['level'] == 1){
          header("Location:".BASE_URL."admin/index");
        }else if($result[0]['level'] == 2){
          header("Location:".BASE_URL."nhanvien/index");
        }
        
      }
    }
    public function nhanvien_dangxuat(){
      session::init();
      session::destroy();
      header("Location:".BASE_URL."dangnhap");
    }
  }
?>
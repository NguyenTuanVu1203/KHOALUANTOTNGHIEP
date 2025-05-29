<?php
  class session{
    //khởi tạo session
    public static function init(){
      session_start();
    }
    //set dữ liệu
    public static function set ($key, $value){
      $_SESSION[$key] = $value;
    }
    //get dữ liệu
    public static function get($key){
      if (isset($_SESSION[$key])){
        return $_SESSION[$key];
      }else{
        return false;
      }
    }
    //huỷ tất cả session
    public static function destroy(){
      session_destroy();
    }
    //huỷ 1 session
    public static function unset($key){
      session_unset($key);
    }
    //kiểm tra session có tồn tại hay không
    public static function checksession(){
      self::init();
      if(self::get('dangnhap') == false){
        self::destroy();
        header("Location:".BASE_URL."dangnhap");
      }else{

      }
    }
  }
?>
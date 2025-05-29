<?php
  class load{
    public function __construct()
    {
    }
    public function view_user($filename, $data = false){
      require_once "app/views/user/".$filename.".php";
    }
    public function view_admin($filename, $data = false){
      require_once "app/views/admin/".$filename.".php";
    }
    public function model($filename){
      require_once "app/models/".$filename.".php";
      return new $filename;
    }
  }
?>
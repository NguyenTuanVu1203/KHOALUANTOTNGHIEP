<?php
class model
{
  protected $db = array();
  public function __construct()
  {
    $connect = 'mysql:dbname=nienluan; host=localhost; charset=utf8';
    $user = 'root';
    $pass = '';
    $this->db = new database($connect, $user, $pass);
  }
}
?>
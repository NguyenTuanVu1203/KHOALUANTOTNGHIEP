<?php
  class database extends PDO {
    public function __construct($connect, $user, $pass)
    {
      parent::__construct($connect, $user, $pass);
    }
    public function select($sql, $data = array(), $fetchstyle = PDO::FETCH_ASSOC){
      $statement = $this->prepare($sql);
      foreach ($data as $key => $value){
        $statement->bindParam($key, $value);
      }
      $statement->execute();
      return $statement->fetchAll($fetchstyle);
    }
    public function insert($table, $data){
      //thêm vào , giữa các key
      $keys = implode(",",array_keys($data));
      $values = ":".implode(", :",array_keys($data));
      $sql = "INSERT INTO $table ($keys) VALUES ($values)";
      $statement = $this->prepare($sql);
      foreach ($data as $key => $value){
        $statement->bindValue(":$key", $value);
      }
      return $statement->execute();
    }
    public function update($table, $data, $dieukien){
      $updateKey = NULL;
      foreach ($data as $key => $value){
        //nối các cột cần update lại
        $updateKey .= "$key=:$key,";
      }
      //cắt dấu , cuối hàng
      $updateKey = rtrim($updateKey, ",");
      $sql = "UPDATE $table SET $updateKey WHERE $dieukien";
      $statement = $this->prepare($sql);
      foreach ($data as $key => $value){
        $statement->bindValue(":$key", $value);
      }
      return $statement->execute();
    }
    public function delete ($table, $dieukien, $limit = 1){
      $sql = "DELETE FROM $table WHERE $dieukien LIMIT $limit";
      return $this->exec($sql);
    }
    public function deleteAll ($table){
      $sql = "DELETE FROM $table";
      return $this->exec($sql);
    }
    public function affectedRows($sql, $dk1, $dk2){
      $statement = $this->prepare($sql);
      $statement->execute(array($dk1, $dk2));
      return $statement->rowCount();
    }
    public function selectNV($sql, $dk1, $dk2){
      $statement = $this->prepare($sql);
      $statement->execute(array($dk1, $dk2));
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function tong($sql){
      $statement = $this->prepare($sql);
      // $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
  }
?>
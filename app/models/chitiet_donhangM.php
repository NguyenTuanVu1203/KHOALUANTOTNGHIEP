<?php
  class chitiet_donhangM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function chitiet_donhang_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function chitiet_donhang_madh($table_dh, $table_ctdh, $table_sp, $table_m, $table_dm, $table_km, $dieukien){
      $sql = "SELECT * FROM $table_ctdh join $table_dh on $table_ctdh.ma_dh = $table_dh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp join $table_m on $table_ctdh.ma_m = $table_m.ma_m join $table_dm on $table_dm.ma_dm = $table_sp.ma_dm join $table_km on $table_km.ma_km = $table_dh.ma_km where $dieukien";
      return $this->db->select($sql);
    }
    public function chitiet_donhang($table_ctdh, $table_dh, $dieukien){
      $sql = "SELECT * FROM $table_ctdh join $table_dh on $table_ctdh.ma_dh = $table_dh.ma_dh where $dieukien";
      return $this->db->select($sql);
    }
    public function chitiet_donhang_update($table, $data, $dieukien){
      return $this->db->update($table, $data, $dieukien);
    }
  }
<?php
use Carbon\Carbon;
  class donhangM extends model{
    public function __construct()
    {
      parent::__construct();
    }
    public function donhang_insert($table, $data){
      return $this->db->insert($table, $data);
    }
    public function donhang_list($table, $table_km){
      $sql = "SELECT * FROM $table join $table_km on $table.ma_km = $table_km.ma_km ORDER BY ngaylap_dh desc, giolap_dh desc";
      return $this->db->select($sql);
    }
    public function donhang_nv($table, $dieukien){
      $sql = "SELECT * FROM $table WHERE $dieukien ORDER BY ngaylap_dh desc, giolap_dh desc";
      return $this->db->select($sql);
    }
    public function donhang_ma($table, $dieukien){
      $sql = "SELECT * FROM $table where $dieukien";
      return $this->db->select($sql);
    }
    public function donhang_sdt($table_dh, $dieukien){
      $sql = "SELECT * FROM $table_dh WHERE $dieukien ORDER BY ngaylap_dh desc ";
      return $this->db->select($sql);
    }
    public function dem_nhanvien_homnay($table_dh, $ngay){
      $sql = "SELECT count(distinct $table_dh.ma_nv) as 'nhanvien_homnay'FROM $table_dh where ngaylap_dh = '$ngay'";
      return $this->db->select($sql);
    }
    public function nhanvien_homnay($table_dh,$table_nv, $ngay){
      $sql = "SELECT * FROM $table_dh join $table_nv on $table_dh.ma_nv = $table_nv.ma_nv where ngaylap_dh = '$ngay' group by $table_dh.ma_nv";
      return $this->db->select($sql);
    }
    public function donhang_update($table, $data, $dieukien){
      return $this->db->update($table, $data,$dieukien);
    }
    public function donhang_delete($table, $dieukien){
      return $this->db->delete($table, $dieukien);
    }
    public function donhang_deleteAll($table){
      return $this->db->deleteAll($table);
    }
    public function donhang_moi($table_dh, $dieukien){
      $sql = "SELECT * FROM $table_dh WHERE $dieukien ORDER BY ngaylap_dh desc, giolap_dh desc ";
      return $this->db->select($sql);
    }
    public function doanhthu_homnay ($table_dh, $ngay){
      $sql = "SELECT ngaylap_dh, tonggia_dh , SUM(tonggia_dh) AS tong FROM $table_dh WHERE $table_dh.ngaylap_dh = '$ngay'AND $table_dh.tinhtrang_dh != 0";
      return $this->db->select($sql);
    }
    public function doanhthu_homnay_nv ($table_dh, $ngay, $dieukien){
      $sql = "SELECT ngaylap_dh, tonggia_dh , SUM(tonggia_dh) AS tong FROM $table_dh WHERE $table_dh.ngaylap_dh = '$ngay' AND $dieukien";
      return $this->db->select($sql);
    }
    public function doanhthu_ngay_tung_nv ($table_dh,$table_nv){
      $sql = "SELECT ngaylap_dh, tonggia_dh , $table_nv.ten_nv, SUM(tonggia_dh) AS tong, count(ma_dh) AS so_dh FROM $table_dh join $table_nv on $table_dh.ma_nv = $table_nv.ma_nv group by $table_dh.ma_nv, ngaylap_dh order by ngaylap_dh ASC, tong DESC ";
      return $this->db->select($sql);
    }
    public function doanhthu_ngay_tung_nv_timkiem ($table_dh,$table_nv, $dieukien){
      $sql = "SELECT ngaylap_dh, tonggia_dh , $table_nv.ten_nv, SUM(tonggia_dh) AS tong, count(ma_dh) AS so_dh FROM $table_dh join $table_nv on $table_dh.ma_nv = $table_nv.ma_nv where $dieukien group by $table_dh.ma_nv, ngaylap_dh order by ngaylap_dh ASC, tong DESC ";
      return $this->db->select($sql);
    }
    public function doanhthu_thang_tung_nv ($table_dh,$table_nv){
      $sql = "SELECT thanglap_dh, tonggia_dh , $table_nv.ten_nv, SUM(tonggia_dh) AS tong, count(ma_dh) AS so_dh FROM $table_dh join $table_nv on $table_dh.ma_nv = $table_nv.ma_nv group by $table_dh.ma_nv, thanglap_dh order by thanglap_dh ASC, tong DESC ";
      return $this->db->select($sql);
    }
    public function doanhthu_thang_tung_nv_timkiem ($table_dh,$table_nv, $dieukien){
      $sql = "SELECT thanglap_dh, tonggia_dh , $table_nv.ten_nv, SUM(tonggia_dh) AS tong, count(ma_dh) AS so_dh FROM $table_dh join $table_nv on $table_dh.ma_nv = $table_nv.ma_nv where $dieukien group by $table_dh.ma_nv, thanglap_dh order by thanglap_dh ASC, tong DESC ";
      return $this->db->select($sql);
    }
    public function doanhthu_nam_tung_nv ($table_dh,$table_nv){
      $sql = "SELECT namlap_dh, tonggia_dh , $table_nv.ten_nv, SUM(tonggia_dh) AS tong, count(ma_dh) AS so_dh FROM $table_dh join $table_nv on $table_dh.ma_nv = $table_nv.ma_nv group by $table_dh.ma_nv, namlap_dh order by namlap_dh ASC, tong DESC ";
      return $this->db->select($sql);
    }
    public function doanhthu_nam_tung_nv_timkiem ($table_dh,$table_nv, $dieukien){
      $sql = "SELECT *, SUM(tonggia_dh) AS tong, count(ma_dh) AS so_dh FROM $table_dh join $table_nv on $table_dh.ma_nv = $table_nv.ma_nv where $dieukien group by $table_dh.ma_nv, namlap_dh order by namlap_dh ASC, tong DESC ";
      return $this->db->select($sql);
    }
    public function doanhthu_nv ($table_dh, $dieukien){
      $sql = "SELECT ngaylap_dh, tonggia_dh , SUM(tonggia_dh) AS tong_doanhthu FROM $table_dh WHERE $dieukien";
      return $this->db->select($sql);
    }
    public function soluong_ngay($table_dh, $table_sp, $table_ctdh){
      $sql = "SELECT * , SUM(soluong_dat) AS tongban_ngay FROM $table_ctdh join $table_dh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp where $table_dh.tinhtrang_dh != 0  GROUP BY ngaylap_dh ";
      return $this->db->select($sql);
    }
    public function soluong_ngay_nv($table_dh, $table_sp, $table_ctdh, $dieukien){
      $sql = "SELECT * , SUM(soluong_dat) AS tongban_ngay FROM $table_ctdh join $table_dh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp Where $dieukien  GROUP BY ngaylap_dh ";
      return $this->db->select($sql);
    }
    public function soluong_thang($table_dh, $table_sp, $table_ctdh){
      $sql = "SELECT * , SUM(soluong_dat) AS tongban_thang FROM $table_ctdh join $table_dh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp where $table_dh.tinhtrang_dh != 0 GROUP BY thanglap_dh ";
      return $this->db->select($sql);
    }
    public function soluong_thang_nv($table_dh, $table_sp, $table_ctdh, $dieukien){
      $sql = "SELECT * , SUM(soluong_dat) AS tongban_thang FROM $table_ctdh join $table_dh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp Where $dieukien GROUP BY thanglap_dh ";
      return $this->db->select($sql);
    }
    public function soluong_nam($table_dh, $table_sp, $table_ctdh){
      $sql = "SELECT * , SUM(soluong_dat) AS tongban_nam FROM $table_ctdh join $table_dh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp where $table_dh.tinhtrang_dh != 0 GROUP BY namlap_dh ";
      return $this->db->select($sql);
    }
    public function soluong_nam_nv($table_dh, $table_sp, $table_ctdh, $dieukien){
      $sql = "SELECT * , SUM(soluong_dat) AS tongban_nam FROM $table_ctdh join $table_dh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp Where $dieukien GROUP BY namlap_dh ";
      return $this->db->select($sql);
    }
    public function tongtien_ngay($table_dh){
      $sql = "SELECT * , SUM($table_dh.tonggia_dh) AS tongtien_ngay FROM $table_dh where $table_dh.tinhtrang_dh != 0 GROUP BY ngaylap_dh";
      return $this->db->select($sql);
    }
    public function tongtien_ngay_nv($table_dh, $dieukien){
      $sql = "SELECT * , SUM($table_dh.tonggia_dh) AS tongtien_ngay FROM $table_dh Where $dieukien GROUP BY ngaylap_dh";
      return $this->db->select($sql);
    }
    public function tongtien_thang($table_dh){
      $sql = "SELECT * , SUM($table_dh.tonggia_dh) AS tongtien_thang FROM $table_dh where $table_dh.tinhtrang_dh != 0 GROUP BY thanglap_dh";
      return $this->db->select($sql);
    }
    public function tongtien_nam($table_dh){
      $sql = "SELECT * , SUM($table_dh.tonggia_dh) AS tongtien_nam FROM $table_dh where $table_dh.tinhtrang_dh != 0 GROUP BY namlap_dh";
      return $this->db->select($sql);
    }
    public function tongtien_thang_nv($table_dh, $dieukien){
      $sql = "SELECT * , SUM($table_dh.tonggia_dh) AS tongtien_thang FROM $table_dh Where $dieukien GROUP BY thanglap_dh";
      return $this->db->select($sql);
    }
    public function tongtien_nam_nv($table_dh, $dieukien){
      $sql = "SELECT * , SUM($table_dh.tonggia_dh) AS tongtien_nam FROM $table_dh Where $dieukien GROUP BY namlap_dh";
      return $this->db->select($sql);
    }
    public function count_sp_ngay($table_dh, $table_ctdh, $table_sp){
      $sql = "SELECT *, SUM($table_ctdh.soluong_dat) as soluong FROM $table_dh join $table_ctdh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp where $table_dh.tinhtrang_dh != 0 GROUP BY $table_ctdh.ma_sp, $table_dh.ngaylap_dh ORDER BY $table_dh.ngaylap_dh desc , soluong desc ";
      return $this->db->select($sql);
    }
    public function count_sp_ngay_nv($table_dh, $table_ctdh, $table_sp, $dieukien){
      $sql = "SELECT *, SUM($table_ctdh.soluong_dat) as soluong FROM $table_dh join $table_ctdh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp Where $dieukien GROUP BY $table_ctdh.ma_sp, $table_dh.ngaylap_dh ORDER BY $table_dh.ngaylap_dh desc , soluong desc ";
      return $this->db->select($sql);
    }
    public function count_sp_thang($table_dh, $table_ctdh, $table_sp){
      $sql = "SELECT *, SUM($table_ctdh.soluong_dat) as soluong FROM $table_dh join $table_ctdh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp where $table_dh.tinhtrang_dh != 0 GROUP BY $table_ctdh.ma_sp, $table_dh.thanglap_dh ORDER BY $table_dh.thanglap_dh desc , soluong desc ";
      return $this->db->select($sql);
    }
    public function count_sp_thang_nv($table_dh, $table_ctdh, $table_sp, $dieukien){
      $sql = "SELECT *, SUM($table_ctdh.soluong_dat) as soluong FROM $table_dh join $table_ctdh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp where $dieukien GROUP BY $table_ctdh.ma_sp, $table_dh.thanglap_dh ORDER BY $table_dh.thanglap_dh desc , soluong desc ";
      return $this->db->select($sql);
    }
    public function count_sp_nam($table_dh, $table_ctdh, $table_sp){
      $sql = "SELECT *, SUM($table_ctdh.soluong_dat) as soluong FROM $table_dh join $table_ctdh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp where $table_dh.tinhtrang_dh != 0 GROUP BY $table_ctdh.ma_sp, $table_dh.namlap_dh ORDER BY $table_dh.namlap_dh desc , soluong desc ";
      return $this->db->select($sql);
    }
    public function count_sp_nam_nv($table_dh, $table_ctdh, $table_sp, $dieukien){
      $sql = "SELECT *, SUM($table_ctdh.soluong_dat) as soluong FROM $table_dh join $table_ctdh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp where $dieukien GROUP BY $table_ctdh.ma_sp, $table_dh.namlap_dh ORDER BY $table_dh.namlap_dh desc , soluong desc ";
      return $this->db->select($sql);
    }
    public function sanphamban_timkiem($table_dh, $table_ctdh, $table_sp, $dieukien, $order, $group){
      $sql = "SELECT *, SUM($table_ctdh.soluong_dat) as soluong FROM $table_dh join $table_ctdh on $table_dh.ma_dh = $table_ctdh.ma_dh join $table_sp on $table_ctdh.ma_sp = $table_sp.ma_sp WHERE $dieukien  GROUP BY $group ORDER BY $order desc , soluong desc ";
      return $this->db->select($sql);
    }
    public function donhang_timkiem($table_dh, $dieukien){
      $sql = "SELECT * FROM $table_dh WHERE $dieukien ORDER BY ngaylap_dh desc, giolap_dh desc";
      return $this->db->select($sql);
    }
  }
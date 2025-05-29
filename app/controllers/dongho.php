<?php
class dongho extends controller
{
  public function __construct()
  {
    $data = array();
    parent::__construct();
  }
  public function sanpham($ma_dm)
  {
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    $this->load->view_user("slider");
    // thương hiệu
    $table_th = 'thuonghieu';
    //danh mục - thương hiệu
    $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
    $table_dmth = 'danhmuc_thuonghieu';
    $dieukien = "danhmuc_thuonghieu.ma_dm = '$ma_dm'";
    $data['thuonghieu_ma_dm'] = $danhmuc_thuonghieuM->thuonghieu_ma_dm($table_th, $table_dm, $table_dmth, $dieukien);
    //sản phẩm
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    //chi tiết sản phẩm
    $table_ctsp = 'chitiet_sanpham';
    //độc quyền
    $dieukien1 = "sanpham.ma_dm = '$ma_dm' AND sanpham.tinhtrang_sp = 2";
    $limit1=1;
    $data['sanpham_ma_dm_limit1'] = $sanphamM->sanpham_ma_dm_limit($table_sp,$table_dm, $dieukien1, $limit1);
    $limit2 = '1,8';
    $data['sanpham_ma_dm_limit'] = $sanphamM->sanpham_ma_dm_limit($table_sp,$table_dm, $dieukien1, $limit2);
    //phái nữ
    $dieukien2 = "sanpham.ma_dm = '$ma_dm' AND chitiet_sanpham.doituong_sudung = 1";
    $data['sanpham_nu_limit1'] = $sanphamM->sanpham_doituong_limit($table_sp,$table_dm, $table_ctsp, $dieukien2, $limit1);
    $data['sanpham_nu_limit'] = $sanphamM->sanpham_doituong_limit($table_sp,$table_dm, $table_ctsp, $dieukien2, $limit2);
    //phái mạnh
    $dieukien3 = "sanpham.ma_dm = '$ma_dm' AND chitiet_sanpham.doituong_sudung = 2";
    $data['sanpham_nam_limit1'] = $sanphamM->sanpham_doituong_limit($table_sp,$table_dm, $table_ctsp, $dieukien3, $limit1);
    $data['sanpham_nam_limit'] = $sanphamM->sanpham_doituong_limit($table_sp,$table_dm, $table_ctsp, $dieukien3, $limit2);
    //trẻ em
    $dieukien4 = "sanpham.ma_dm = '$ma_dm' AND chitiet_sanpham.doituong_sudung = 3";
    $data['sanpham_treem_limit1'] = $sanphamM->sanpham_doituong_limit($table_sp,$table_dm, $table_ctsp, $dieukien4, $limit1);
    $data['sanpham_treem_limit'] = $sanphamM->sanpham_doituong_limit($table_sp,$table_dm, $table_ctsp, $dieukien4, $limit2);
     //tin tức
    $tintucM = $this->load->model('tintucM');
    $table_tt = 'tintuc';
    $limit = 6;
    //danh mục tin tức
    $table_dmtt = 'danhmuc_tintuc';
    $data['tintuc_limit'] = $tintucM->tintuc_limit($table_tt, $table_th, $table_dmtt, $limit);
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $data ['count_sao'] = $danhgiaM->count_sao($table_sp,$table_dg);
    $this->load->view_user("dongho/header_dongho", $data);
    $this->load->view_user("dongho/sanpham", $data);
    $this->load->view_user("footer");
  }
  public function chitiet_sanpham($ma_sp, $ma_th, $ma_dm)
  {
    session::init();
    //thêm lượt xem cho sản phẩm
    $luotxemM = $this->load->model('luotxemM');
    $table_lx = "luotxem";
    $table_sp = "sanpham";
    $data['luotxem_list'] = $luotxemM->luotxem_list($table_lx, $table_sp);
    $i = 0;
    foreach($data['luotxem_list'] as $key => $lx){
      if($lx['ma_sp'] == $ma_sp){
        $so_lx = $lx['so_lx'] + 1;
        $data = array(
          'so_lx' => $so_lx
        );
        $dieukien_lx = "luotxem.ma_sp = '$ma_sp'";
        $result = $luotxemM->luotxem_update($table_lx, $data, $dieukien_lx );
        $i++;
      }
    }
    if($i==0){
      $data = array(
        'so_lx' => 1,
        'ma_sp' => $ma_sp
      );
      $result = $luotxemM->luotxem_insert($table_lx, $data);
    }
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    //chi tiết sản phẩm
    $table_ctsp = 'chitiet_sanpham';
    //màu sản phẩm
    $mau_sanphamM = $this->load->model("mau_sanphamM");
    $table_msp = 'mau_sanpham';
    //loại sản phẩm
    $table_lsp = 'loai_sanpham';
    //thương hiệu
    $table_th = 'thuonghieu';
    //hình
    $hinhM = $this->load->model('hinhM');
    $table_hsp = 'hinh';
    $this->load->view_user("header", $data);
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    //màu
    $table_m = 'mau';
    $dieukien = "sanpham.ma_sp = '$ma_sp'";
    $data['sanpham_ma'] = $sanphamM->Usanpham_ma($table_sp, $table_dm, $table_ctsp, $table_msp, $table_th, $table_lsp, $table_hsp, $dieukien);
    //sản phẩm tương tự
    $dieukien_sp_tuongtu = "sanpham.ma_th = '$ma_th' AND sanpham.ma_dm = '$ma_dm'";
    $data['sanpham_tuongtu'] = $sanphamM->Usanpham_tuongtu($table_sp, $dieukien_sp_tuongtu);
    $dieukien1 = "hinh.ma_sp = '$ma_sp'";
    $data['hinh_limit1'] = $hinhM->hinh_limit1($table_hsp, $dieukien1);
    $data['hinh_ma'] = $hinhM->hinh_ma($table_hsp, $dieukien1);
    $dieukien2 = "mau_sanpham.ma_sp = '$ma_sp'";
    $data['mau_sanpham_ma'] = $mau_sanphamM->Umau_sanpham_ma($table_msp, $table_m, $dieukien2);
    //tin tức
    $tintucM = $this->load->model('tintucM');
    $table_tt = 'tintuc';
    //danh mục tin tức
    $table_dmtt = 'danhmuc_tintuc';
    $limit = 4;
    $data['tintuc'] = $tintucM->tintuc_limit($table_tt, $table_th, $table_dmtt, $limit);
    // hiển thị bình luận
    $hoi_dapM = $this->load->model('hoi_dapM');
    $table_hd = "hoi_dap";
    $order = "hoi_dap.thoigian_hd DESC";
    $table_nv = 'nhanvien';
    $dieukien3 = "hoi_dap.ma_sp = '$ma_sp'";
    $data['hoi_dap_list'] = $hoi_dapM->hoi_dap_list($table_hd, $table_sp,$table_nv, $dieukien3, $order);
    $order1 = "hoi_dap.thoigian_hd ASC ";
    $data['hoi_dap_list1'] = $hoi_dapM->hoi_dap_list($table_hd, $table_sp,$table_nv,$dieukien3, $order1);
    //hiển thị đánh giá
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $dieukien_dg = "danhgia.ma_sp = '$ma_sp'";
    $data['danhgia_ma_sp'] = $danhgiaM->danhgia_ma_sp($table_dg, $dieukien_dg);
    $data ['count_sao'] = $danhgiaM->count_sao($table_sp,$table_dg);
    //hiển thị khuyến mãi
    $khuyenmaiM = $this->load->model('khuyenmaiM');
    $table_km = 'khuyenmai';
    $dieukien_km = "khuyenmai.tinhtrang_km = 0 AND khuyenmai.ma_km !=6";
    $data['khuyenmai']= $khuyenmaiM-> khuyenmai_dieukien($table_km, $dieukien_km);
    $this->load->view_user("dongho/chitietsanpham", $data);
    $this->load->view_user("footer");
  }
  public function chitiet_sanpham_dg($ma_sp, $ma_th, $ma_dm, $ma_dh)
  {
    session::init();
    //thêm lượt xem cho sản phẩm
    $luotxemM = $this->load->model('luotxemM');
    $table_lx = "luotxem";
    $table_sp = "sanpham";
    $data['luotxem_list'] = $luotxemM->luotxem_list($table_lx, $table_sp);
    $i = 0;
    foreach($data['luotxem_list'] as $key => $lx){
      if($lx['ma_sp'] == $ma_sp){
        $so_lx = $lx['so_lx'] + 1;
        $data = array(
          'so_lx' => $so_lx
        );
        $dieukien_lx = "luotxem.ma_sp = '$ma_sp'";
        $result = $luotxemM->luotxem_update($table_lx, $data, $dieukien_lx );
        $i++;
      }
    }
    if($i==0){
      $data = array(
        'so_lx' => 1,
        'ma_sp' => $ma_sp
      );
      $result = $luotxemM->luotxem_insert($table_lx, $data);
    }
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    //chi tiết sản phẩm
    $table_ctsp = 'chitiet_sanpham';
    //màu sản phẩm
    $mau_sanphamM = $this->load->model("mau_sanphamM");
    $table_msp = 'mau_sanpham';
    //loại sản phẩm
    $table_lsp = 'loai_sanpham';
    //thương hiệu
    $table_th = 'thuonghieu';
    //hình
    $hinhM = $this->load->model('hinhM');
    $table_hsp = 'hinh';
    $this->load->view_user("header", $data);
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    //màu
    $table_m = 'mau';
    $dieukien = "sanpham.ma_sp = '$ma_sp'";
    $data['sanpham_ma'] = $sanphamM->Usanpham_ma($table_sp, $table_dm, $table_ctsp, $table_msp, $table_th, $table_lsp, $table_hsp, $dieukien);
    //sản phẩm tương tự
    $dieukien_sp_tuongtu = "sanpham.ma_th = '$ma_th' AND sanpham.ma_dm = '$ma_dm'";
    $data['sanpham_tuongtu'] = $sanphamM->Usanpham_tuongtu($table_sp, $dieukien_sp_tuongtu);
    $dieukien1 = "hinh.ma_sp = '$ma_sp'";
    $data['hinh_limit1'] = $hinhM->hinh_limit1($table_hsp, $dieukien1);
    $data['hinh_ma'] = $hinhM->hinh_ma($table_hsp, $dieukien1);
    $dieukien2 = "mau_sanpham.ma_sp = '$ma_sp'";
    $data['mau_sanpham_ma'] = $mau_sanphamM->Umau_sanpham_ma($table_msp, $table_m, $dieukien2);
    //tin tức
    $tintucM = $this->load->model('tintucM');
    $table_tt = 'tintuc';
    //danh mục tin tức
    $table_dmtt = 'danhmuc_tintuc';
    $limit = 4;
    $data['tintuc'] = $tintucM->tintuc_limit($table_tt, $table_th, $table_dmtt, $limit);
    // hiển thị bình luận
    $hoi_dapM = $this->load->model('hoi_dapM');
    $table_hd = "hoi_dap";
    $order = "hoi_dap.thoigian_hd DESC";
    $table_nv = 'nhanvien';
    $dieukien3 = "hoi_dap.ma_sp = '$ma_sp'";
    $data['hoi_dap_list'] = $hoi_dapM->hoi_dap_list($table_hd, $table_sp,$table_nv, $dieukien3, $order);
    $order1 = "hoi_dap.thoigian_hd ASC ";
    $data['hoi_dap_list1'] = $hoi_dapM->hoi_dap_list($table_hd, $table_sp,$table_nv,$dieukien3, $order1);
    //hiển thị đánh giá
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $dieukien_dg = "danhgia.ma_sp = '$ma_sp'";
    $data['danhgia_ma_sp'] = $danhgiaM->danhgia_ma_sp($table_dg, $dieukien_dg);
    $data ['count_sao'] = $danhgiaM->count_sao($table_sp,$table_dg);
    //hiển thị khuyến mãi
    $khuyenmaiM = $this->load->model('khuyenmaiM');
    $table_km = 'khuyenmai';
    $dieukien_km = "khuyenmai.tinhtrang_km = 0 AND khuyenmai.ma_km !=6";
    $data['khuyenmai']= $khuyenmaiM-> khuyenmai_dieukien($table_km, $dieukien_km);
    $chitiet_donhangM = $this->load->model('chitiet_donhangM');
    $table_ctdh = 'chitiet_donhang';
    $table_dh = 'donhang';
    $dieukien4 = "chitiet_donhang.ma_dh = '$ma_dh' and chitiet_donhang.ma_sp = '$ma_sp' ";
    $data['donhang'] = $chitiet_donhangM->chitiet_donhang($table_ctdh, $table_dh, $dieukien4);
    $this->load->view_user("dongho/chitietsanpham_danhgia", $data);
    $this->load->view_user("footer");
  }
  public function timkiem_thuonghieu($ma_dm, $ma_th)
  {
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    //thương hiệu
    $thuonghieuM = $this->load->model('thuonghieuM');
    $table_th = 'thuonghieu';
    $data['thuonghieu'] = $thuonghieuM->thuonghieu_list($table_th);
    //danh mục - thương hiệu
    $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
    $table_dmth = 'danhmuc_thuonghieu';
    $dieukien = "danhmuc_thuonghieu.ma_dm = '$ma_dm'";
    $data['thuonghieu_ma_dm'] = $danhmuc_thuonghieuM->thuonghieu_ma_dm($table_th, $table_dm, $table_dmth, $dieukien);
    //sản phẩm
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    $dieukien = "sanpham.ma_dm = '$ma_dm' && sanpham.ma_th = '$ma_th'";
    $data['sanpham_ma_dm_th'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien);
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $data ['count_sao'] = $danhgiaM->count_sao($table_sp,$table_dg);
    $this->load->view_user("dongho/header_dongho", $data);
    $this->load->view_user("dongho/timkiem_thuonghieu", $data);
    $this->load->view_user("footer");
  }
  public function timkiem_gia($start, $end){
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    //thương hiệu
    $table_th = 'thuonghieu';
    //danh mục - thương hiệu
    $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
    $table_dmth = 'danhmuc_thuonghieu';
    $ma_dm = '12';
    $dieukien = "danhmuc_thuonghieu.ma_dm = '$ma_dm'";
    $data['thuonghieu_ma_dm'] = $danhmuc_thuonghieuM->thuonghieu_ma_dm($table_th, $table_dm, $table_dmth, $dieukien);
    //sản phẩm
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    $start = $start.'000000';
    $end = $end.'000000';
    $dieukien1 = "sanpham.gia_sp BETWEEN '$start' AND '$end' AND sanpham.ma_dm = '$ma_dm'";
    $data['sanpham_ma_dm_gia'] = $sanphamM->sanpham_ma_dm($table_sp, $dieukien1);
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $data ['count_sao'] = $danhgiaM->count_sao($table_sp,$table_dg);
    $this->load->view_user("dongho/header_dongho", $data);
    $this->load->view_user("dongho/timkiem_gia", $data);
    $this->load->view_user("footer");
  }
  public function timkiem_doituong_sudung($doituong_sudung){
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    //thương hiệu
    $table_th = 'thuonghieu';
    //danh mục - thương hiệu
    $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
    $table_dmth = 'danhmuc_thuonghieu';
    $ma_dm = '12';
    $dieukien = "danhmuc_thuonghieu.ma_dm = '$ma_dm'";
    $data['thuonghieu_ma_dm'] = $danhmuc_thuonghieuM->thuonghieu_ma_dm($table_th, $table_dm, $table_dmth, $dieukien);
    //sản phẩm
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    //chi tiết sản phẩm
    $table_ctsp = 'chitiet_sanpham';
    $dieukien1 = "sanpham.ma_dm = '$ma_dm' AND chitiet_sanpham.doituong_sudung = '$doituong_sudung'";
    $data['sanpham_ma_dm_doituong'] = $sanphamM->sanpham_dm_ctsp($table_sp, $table_ctsp, $dieukien1);
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $data ['count_sao'] = $danhgiaM->count_sao($table_sp,$table_dg);
    $this->load->view_user("dongho/header_dongho", $data);
    $this->load->view_user("dongho/timkiem_doituong_sudung", $data);
    $this->load->view_user("footer");
  }
  public function timkiem_doituong_chatlieu_kinh($chatlieu_kinh){
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    //thương hiệu
    $table_th = 'thuonghieu';
    //danh mục - thương hiệu
    $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
    $table_dmth = 'danhmuc_thuonghieu';
    $ma_dm = '12';
    $dieukien = "danhmuc_thuonghieu.ma_dm = '$ma_dm'";
    $data['thuonghieu_ma_dm'] = $danhmuc_thuonghieuM->thuonghieu_ma_dm($table_th, $table_dm, $table_dmth, $dieukien);
    //sản phẩm
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    //chi tiết sản phẩm
    $table_ctsp = 'chitiet_sanpham';
    $dieukien1 = "sanpham.ma_dm = '$ma_dm' AND chitiet_sanpham.chatlieu_kinh = '$chatlieu_kinh'";
    $data['sanpham_ma_dm_chatlieukinh'] = $sanphamM->sanpham_dm_ctsp($table_sp, $table_ctsp, $dieukien1);
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $data ['count_sao'] = $danhgiaM->count_sao($table_sp,$table_dg);
    $this->load->view_user("dongho/header_dongho", $data);
    $this->load->view_user("dongho/timkiem_chatlieu_kinh", $data);
    $this->load->view_user("footer");
  }
  public function timkiem_chatlieu_day($chatlieu_day){
    session::init();
    //danh mục sản phẩm
    $danhmuc_sanphamM = $this->load->model('danhmuc_sanphamM');
    $table_dm = 'danhmuc_sanpham';
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    $data['danhmuc_sanpham_limit'] = $danhmuc_sanphamM->danhmuc_sanpham_limit($table_dm);
    $data['danhmuc_sanpham'] = $danhmuc_sanphamM->danhmuc_sanpham_list($table_dm);
    $this->load->view_user("header", $data);
    //thương hiệu
    $table_th = 'thuonghieu';
    //danh mục - thương hiệu
    $danhmuc_thuonghieuM = $this->load->model('danhmuc_thuonghieuM');
    $table_dmth = 'danhmuc_thuonghieu';
    $ma_dm = '12';
    $dieukien = "danhmuc_thuonghieu.ma_dm = '$ma_dm'";
    $data['thuonghieu_ma_dm'] = $danhmuc_thuonghieuM->thuonghieu_ma_dm($table_th, $table_dm, $table_dmth, $dieukien);
    //sản phẩm
    $sanphamM = $this->load->model('sanphamM');
    $table_sp = 'sanpham';
    //chi tiết sản phẩm
    $table_ctsp = 'chitiet_sanpham';
    $dieukien1 = "sanpham.ma_dm = '$ma_dm' AND chitiet_sanpham.chatlieu_day = '$chatlieu_day'";
    $data['sanpham_ma_dm_chatlieuday'] = $sanphamM->sanpham_dm_ctsp($table_sp, $table_ctsp, $dieukien1);
    $danhgiaM = $this->load->model('danhgiaM');
    $table_dg = 'danhgia';
    $data ['count_sao'] = $danhgiaM->count_sao($table_sp,$table_dg);
    $this->load->view_user("dongho/header_dongho", $data);
    $this->load->view_user("dongho/timkiem_chatlieu_day", $data);
    $this->load->view_user("footer");
  }
}
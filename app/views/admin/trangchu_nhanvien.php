<div id="wrapper">
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div>
                            <h4 class="header-title mb-3">Trang Chủ: Nhân Viên</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div>
                            <div class="card-box widget-inline">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-6 widget-inline-box">
                                        <div class="text-center p-3">
                                            <h2 class="mt-2">
                                                <i class="text-primary mdi mdi-cart mr-2"></i>
                                                <?php
                          $i=0;
                          foreach ($data['donhang'] as $key => $dh){
                            $i ++;
                          }
                          ?>
                                                <b><?php echo $i ?></b>
                                                <?php
                        ?>
                                            </h2>
                                            <p class="text-muted mb-0">Tổng số đơn hàng đã xử lý</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-6 widget-inline-box">
                                        <div class="text-center p-3">
                                            <h2 class="mt-2"><i class="text-teal mdi mdi-airplay mr-2"></i>
                                                <?php
                        foreach ($data['doanhthu_homnay'] as $key => $dt){
                          ?>
                                                <b><?php echo number_format($dt['tong'], 0, ',', '.') . ' <sup>đ</sup>' ?></b>
                                                <?php
                        }
                      ?>
                                            </h2>
                                            <p class="text-muted mb-0">Doanh thu hôm nay</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="text-center p-3">
                                            <h2 class="mt-2"></i>
                                                <?php
                        foreach ($data['doanhthu_nv'] as $key => $dt){
                          ?>
                                                <b><?php echo number_format($dt['tong_doanhthu'], 0, ',', '.') . ' <sup>đ</sup>' ?></b>
                                                <?php
                        }
                      ?>
                                            </h2>
                                            <p class="text-muted mb-0">Tổng doanh thu</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Thời gian vào</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                if($data['nhanvien_ma']){
                  foreach($data['nhanvien_ma'] as $nv_m){
                    ?>
                            <tr>
                                <th scope="row"><?php echo $nv_m['ten_nv'] ?></th>
                                <td><?php echo $nv_m['sdt_nv'] ?></td>
                                <td><?php echo $nv_m['diachi_nv'] ?></td>
                                <td><?php echo $nv_m['ngayvao'] ?></td>
                                <td>
                                    <a
                                        href="<?php echo BASE_URL ?>nhanvien/nhanvien_capnhat/<?php echo $nv_m['ma_nv'] ?>">
                                        <button type="button" class="btn sua">
                                            <i class="fas fa-edit"></i> Cập nhật
                                        </button>
                                    </a>
                                    <a
                                        href="<?php echo BASE_URL ?>nhanvien/nhanvien_matkhau/<?php echo $nv_m['ma_nv'] ?>">
                                        <button type="button" class="btn xoa">
                                            <i class="fa-solid fa-lock"></i> Đổi mật khẩu
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                  }
                }
              ?>
                        </tbody>
                    </table>
                </div>
                <!-- thống kê theo ngày -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="mt-0 font-14">Số lượng bán theo ngày</h5>
                            <div id="myfirstchartLine" style="height: 250px;"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="mt-0 font-14">Doanh thu theo ngày</h5>
                            <div id="myfirstchart" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-success title_page" role="alert">
                    <div class="row">
                        <div class="col-8 mt-2">
                            Sản phẩm theo ngày
                        </div>
                        <div class="col-4">
                            <form class="app-search" method="POST"
                                action="<?php echo BASE_URL ?>admin/sanpham_banngay_nv_timkiem">
                                <div class="app-search-box">
                                    <div class="input-group">
                                        <input type="text" name="tukhoa" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work"
                            data-offset="20" style="height: 300px; overflow: auto;">
                            <p>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Ngày lập đơn hàng</th>
                                        <th scope="col">Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    $i=0;
                    foreach ($data['count_sp_ngay'] as $key => $count){
                      $i++;
                      ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td><?php echo $count['ten_sp'] ?></td>
                                        <td><?php echo $count['ngaylap_dh'] ?></td>
                                        <td><?php echo $count['soluong'] ?></td>
                                    </tr>
                                    <?php
                    }
                  ?>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
                <!--  -->
                <!-- thống kê theo tháng -->
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="mt-0 font-14">Số lượng bán theo tháng</h5>
                            <div id="myfirstchartLine_thang" style="height: 250px;"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="mt-0 font-14">Doanh thu theo tháng</h5>
                            <div id="myfirstchart_thang" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-success title_page" role="alert">
                    <div class="row">
                        <div class="col-8 mt-2">
                            Sản phẩm theo tháng
                        </div>
                        <div class="col-4">
                            <form class="app-search" method="POST"
                                action="<?php echo BASE_URL ?>admin/sanpham_banthang_nv_timkiem">
                                <div class="app-search-box">
                                    <div class="input-group">
                                        <input type="text" name="tukhoa" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work"
                            data-offset="20" style="height: 300px; overflow: auto;">
                            <p>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Tháng lập đơn hàng</th>
                                        <th scope="col">Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    $i=0;
                    foreach ($data['count_sp_thang'] as $key => $count){
                      $i++;
                      ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td><?php echo $count['ten_sp'] ?></td>
                                        <td><?php echo $count['thanglap_dh'] ?></td>
                                        <td><?php echo $count['soluong'] ?></td>
                                    </tr>
                                    <?php
                    }
                  ?>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
                <!--  -->
                <!-- thống kê theo năm -->
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="mt-0 font-14">Số lượng bán theo năm</h5>
                            <div id="myfirstchartLine_nam" style="height: 250px;"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="mt-0 font-14">Doanh thu theo năm</h5>
                            <div id="myfirstchart_nam" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-success title_page" role="alert">
                    <div class="row">
                        <div class="col-8 mt-2">
                            Sản phẩm theo năm
                        </div>
                        <div class="col-4">
                            <form class="app-search" method="POST"
                                action="<?php echo BASE_URL ?>admin/sanpham_bannam_nv_timkiem">
                                <div class="app-search-box">
                                    <div class="input-group">
                                        <input type="text" name="tukhoa" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work"
                            data-offset="20" style="height: 300px; overflow: auto;">
                            <p>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Năm lập đơn hàng</th>
                                        <th scope="col">Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    $i=0;
                    foreach ($data['count_sp_nam'] as $key => $count){
                      $i++;
                      ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td><?php echo $count['ten_sp'] ?></td>
                                        <td><?php echo $count['namlap_dh'] ?></td>
                                        <td><?php echo $count['soluong'] ?></td>
                                    </tr>
                                    <?php
                    }
                  ?>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->
    </div>
    <!-- Vendor js -->
    <script src="../public/assets\js\vendor.min.js"></script>

    <script src="../public/assets\libs\morris-js\morris.min.js"></script>
    <script src="../public/assets\libs\raphael\raphael.min.js"></script>

    <script src="../public/assets\js\pages\dashboard.init.js"></script>

    <!-- App js -->
    <script src="../public/assets\js\app.min.js"></script>
    <!-- thống kê ngày -->
    <script>
    new Morris.Bar({
        element: 'myfirstchart',
        data: [
            <?php
        foreach ($data['tongtien_ngay'] as $key => $tk){
          $ngaylap_dh = $tk['ngaylap_dh'];
          $tongtien_ngay = $tk['tongtien_ngay'];
          echo "{ year: '$ngaylap_dh', value: $tongtien_ngay },";
        }
      ?>
        ],
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Tổng tiền']
    });
    </script>
    <script>
    new Morris.Line({
        element: 'myfirstchartLine',
        data: [
            <?php
        foreach ($data['soluong_ngay'] as $key => $tk){
          $ngaylap_dh = $tk['ngaylap_dh'];
          $tongban_ngay = $tk['tongban_ngay'];
          echo "{ year: '$ngaylap_dh', value: $tongban_ngay },";
        }
      ?>
        ],
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Số lượng']
    });
    </script>
    <!-- thống kê tháng -->
    <script>
    new Morris.Bar({
        element: 'myfirstchart_thang',
        data: [
            <?php
        foreach ($data['tongtien_thang'] as $key => $tk){
          $thanglap_dh = $tk['thanglap_dh'];
          $tongtien_thang = $tk['tongtien_thang'];
          echo "{ year: '$thanglap_dh', value: $tongtien_thang },";
        }
      ?>
        ],
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Tổng tiền']
    });
    </script>
    <script>
    new Morris.Line({
        element: 'myfirstchartLine_thang',
        data: [
            <?php
        foreach ($data['soluong_thang'] as $key => $tk){
          $thanglap_dh = $tk['thanglap_dh'];
          $tongban_thang = $tk['tongban_thang'];
          echo "{ year: '$thanglap_dh', value: $tongban_thang },";
        }
      ?>
        ],
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Số lượng']
    });
    </script>
    <!-- thống kê nam -->
    <script>
    new Morris.Bar({
        element: 'myfirstchart_nam',
        data: [
            <?php
        foreach ($data['tongtien_nam'] as $key => $tk){
          $namlap_dh = $tk['namlap_dh'];
          $tongtien_nam = $tk['tongtien_nam'];
          echo "{ year: '$namlap_dh', value: $tongtien_nam },";
        }
      ?>
        ],
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Tổng tiền']
    });
    </script>
    <script>
    new Morris.Line({
        element: 'myfirstchartLine_nam',
        data: [
            <?php
        foreach ($data['soluong_nam'] as $key => $tk){
          $namlap_dh = $tk['namlap_dh'];
          $tongban_nam = $tk['tongban_nam'];
          echo "{ year: '$namlap_dh', value: $tongban_nam },";
        }
      ?>
        ],
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Số lượng']
    });
    </script>
</div>
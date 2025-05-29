<!-- Đây là trang thống kê -->
<div id="wrapper">
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
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
                                            <p class="text-muted mb-0">Tổng số đơn hàng hôm nay</p>
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
                        foreach ($data['dem_nhanvien_homnay'] as $key => $nv){
                          ?>
                                                <b><?php echo $nv['nhanvien_homnay']?></b>
                                                <?php
                        }
                      ?>
                                            </h2>
                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" type="button"
                                                    data-toggle="dropdown" style="font-weight: bold;">Chi tiết <i
                                                        class="fa-solid fa-circle-info"></i>
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu"
                                                    style="padding: 15px; margin: 10px 120px; width: 200px;">
                                                    <?php
                            foreach ($data['nhanvien_homnay'] as $key => $nv){
                              ?>
                                                    <li><a href="<?php echo BASE_URL ?>thongke/thongtin_nhanvien/<?php echo $nv['ma_nv'] ?>"
                                                            style="color: black ;"><?php echo $nv['ten_nv']?></a></li>
                                                    <?php
                            }
                          ?>
                                                </ul>
                                            </div>
                                            <p class="text-muted mb-0">Số nhân viên làm việc hôm nay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- thống kê theo ngày -->
                <div class="alert alert-success title_page" role="alert">
                    <div class="row">
                        <div class="col-8 mt-2">
                            Doanh thu theo ngày của từng nhân viên
                        </div>
                        <div class="col-4">
                            <form class="app-search" method="POST"
                                action="<?php echo BASE_URL ?>thongke/timkiem_doanhthu_nhanvien_ngay">
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
                                        <th scope="col">Tên nhân viên</th>
                                        <th scope="col">Số đơn hàng</th>
                                        <th scope="col">Ngày</th>
                                        <th scope="col">Doanh thu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    $i=0;
                    foreach ($data['doanhthu_ngay_tung_nv'] as $key => $doanhthu){
                      $i++;
                      ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td><?php echo $doanhthu['ten_nv'] ?></td>
                                        <td><?php echo $doanhthu['so_dh'] ?></td>
                                        <td><?php echo $doanhthu['ngaylap_dh'] ?></td>
                                        <td><?php echo number_format($doanhthu['tong'], 0, ',', '.') . ' <sup>đ</sup>' ?>
                                        </td>
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
                <div class="alert alert-success title_page" role="alert">
                    <div class="row">
                        <div class="col-8 mt-2">
                            Doanh thu theo tháng của từng nhân viên
                        </div>
                        <div class="col-4">
                            <form class="app-search" method="POST"
                                action="<?php echo BASE_URL ?>thongke/timkiem_doanhthu_nhanvien_thang">
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
                                        <th scope="col">Tên nhân viên</th>
                                        <th scope="col">Số đơn hàng</th>
                                        <th scope="col">Tháng</th>
                                        <th scope="col">Doanh thu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    $i=0;
                    foreach ($data['doanhthu_thang_tung_nv'] as $key => $doanhthu){
                      $i++;
                      ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td><?php echo $doanhthu['ten_nv'] ?></td>
                                        <td><?php echo $doanhthu['so_dh'] ?></td>
                                        <td><?php echo $doanhthu['thanglap_dh'] ?></td>
                                        <td><?php echo number_format($doanhthu['tong'], 0, ',', '.') . ' <sup>đ</sup>' ?>
                                        </td>
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
                <div class="alert alert-success title_page" role="alert">
                    <div class="row">
                        <div class="col-8 mt-2">
                            Doanh thu theo năm của từng nhân viên
                        </div>
                        <div class="col-4">
                            <form class="app-search" method="POST"
                                action="<?php echo BASE_URL ?>thongke/timkiem_doanhthu_nhanvien_nam">
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
                                        <th scope="col">Tên nhân viên</th>
                                        <th scope="col">Số đơn hàng</th>
                                        <th scope="col">Năm</th>
                                        <th scope="col">Doanh thu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    $i=0;
                    foreach ($data['doanhthu_nam_tung_nv'] as $key => $doanhthu){
                      $i++;
                      ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td><?php echo $doanhthu['ten_nv'] ?></td>
                                        <td><?php echo $doanhthu['so_dh'] ?></td>
                                        <td><?php echo $doanhthu['namlap_dh'] ?></td>
                                        <td><?php echo number_format($doanhthu['tong'], 0, ',', '.') . ' <sup>đ</sup>' ?>
                                        </td>
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
</div>
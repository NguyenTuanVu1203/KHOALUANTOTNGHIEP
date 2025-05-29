<?php
  use Carbon\Carbon;
?>
<div id="wrapper">
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="alert alert-success title_page" role="alert">
                    <div class="row">
                        <div class="col-8 mt-2">
                            <a href="<?php echo BASE_URL ?>admin/index">
                                <button type="button" class="btn btn-warning">
                                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                                </button> &ensp;
                            </a>
                            Tìm sản phẩm bán được theo ngày
                        </div>
                        <div class="col-4">
                            <form class="app-search" method="POST"
                                action="<?php echo BASE_URL ?>admin/sanpham_banngay_timkiem">
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
                    foreach ($data['sanpham_banngay_timkiem'] as $key => $count){
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
                                    <p style="color: #E04D01 ;">Tổng: <b><?php echo $i ?></b> sản phẩm bán được trong
                                        ngày <b><?php  echo $count['ngaylap_dh']?></b></p>
                                    <?php
                  ?>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
                <!--  -->
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
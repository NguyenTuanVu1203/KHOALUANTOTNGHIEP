<div class=" main container mt-2">
    <div class="deal_ngon p-4">
        <div class="row">
            <div class="col-md-12">
                <img src="<?php echo BASE_URL ?>public/img/banner/deal_ngon.png" alt=""
                    class="img-responsive center-block">
            </div>
        </div>
        <div class="row mt-3 mb-4">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                    <div class="carousel-inner">
                        <?php
            foreach ($data['sanpham_limit1'] as $key => $sp) {
            ?>
                        <div class="item active">
                            <div class="col-xs-12 col-sm-6 col-md-2 img-hover-zoom img-hover-zoom--brightness">
                                <a
                                    href="<?php echo BASE_URL ?><?php echo $sp['ghichu_dm'] ?>/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>"><img
                                        src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                                        class="img-responsive center-block"></a>
                                <h4 class="text-center fw-bold fs-5"><?php echo $sp['ten_sp'] ?></h4>
                                <h5 class="text-center gia fs-4">
                                    <?php echo number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>'  ?></h5>
                                <?php
                    foreach($data['count_sao'] as $key => $count_sao){
                      if($sp['ma_sp'] == $count_sao['ma_sp']){
                        $tb= ceil($count_sao['tongsao']/$count_sao['so_dg']) 
                        ?>
                                <div>
                                    <?php
                              for($i = 1; $i<=$tb; $i++){
                                ?>
                                    <i class="fa-solid fa-star" style="color: #FE8C23;"></i>
                                    <?php
                              }
                              if($tb<5){
                                for($i = 1; $i<=5-$tb; $i++){
                                  ?>
                                    <i class="fa-solid fa-star" style="color: gray;"></i>
                                    <?php
                                }
                              }
                            ?>
                                </div>


                                <?php
                      }
                    }
                  ?>
                            </div>
                        </div>
                        <?php
            }
            foreach ($data['sanpham_limit'] as $key => $sp) {
            ?>
                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-2 img-hover-zoom img-hover-zoom--brightness">
                                <a
                                    href="<?php echo BASE_URL ?><?php echo $sp['ghichu_dm'] ?>/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>"><img
                                        src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                                        class="img-responsive center-block"></a>
                                <h4 class="text-center fw-bold fs-5"><?php echo $sp['ten_sp'] ?></h4>
                                <h5 class="text-center gia fs-4">
                                    <?php echo number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>'  ?></h5>
                                <?php
                    foreach($data['count_sao'] as $key => $count_sao){
                      if($sp['ma_sp'] == $count_sao['ma_sp']){
                        $tb= ceil($count_sao['tongsao']/$count_sao['so_dg']) 
                        ?>
                                <div>
                                    <?php
                              for($i = 1; $i<=$tb; $i++){
                                ?>
                                    <i class="fa-solid fa-star" style="color: #367e18;"></i>
                                    <?php
                              }
                              if($tb<5){
                                for($i = 1; $i<=5-$tb; $i++){
                                  ?>
                                    <i class="fa-solid fa-star" style="color: gray;"></i>
                                    <?php
                                }
                              }
                            ?>
                                </div>
                                <?php
                      }
                    }
                  ?>
                            </div>
                        </div>
                        <?php
            }
            ?>
                    </div>
                    <!-- left,right control -->
                    <div id="slider-control">
                        <a class="left carousel-control" href="#itemslider" data-slide="prev"><i
                                class="fas fa-angle-left icon_arrow"></i></a>
                        <a class="right carousel-control" href="#itemslider" data-slide="next"><i
                                class="fas fa-angle-right icon_arrow"></i></a>
                    </div>
                </div>
            </div>
            <a href="" style="text-align:center ;" class="mt-4">
                <button type="button" class="btn btn-success" style="font-weight:bold ; background-color:#367e18 ;">Xem
                    Tất Cả &ensp; <i class="fa-solid fa-caret-right"></i></button>
            </a>
        </div>
    </div>
    <!-- điện thoại -->
    <div class="sanpham mb-3">
        <div class="row">
            <div class="col-md-12">
                <h2 class="gachchan"><b>Điện thoại</b></h2>
            </div>
        </div>
        <div class="row">
            <?php
      foreach ($data['sanpham_dt_limit'] as $key => $sp) {
      ?>
            <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5 img-hover-zoom img-hover-zoom--brightness">
                <a
                    href="<?php echo BASE_URL ?>dienthoai/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
                    <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                        class="d-block w-100">
                </a>
                <p class="text-center mt-3 sanpham_item_title fw-bold"><?php echo $sp['ten_sp'] ?></p>
                <?php
            foreach($data['count_sao'] as $key => $count_sao){
              if($sp['ma_sp'] == $count_sao['ma_sp']){
                $tb= ceil($count_sao['tongsao']/$count_sao['so_dg']) 
                ?>
                <div>
                    <?php
                      for($i = 1; $i<=$tb; $i++){
                        ?>
                    <i class="fa-solid fa-star" style="color: #FE8C23;"></i>
                    <?php
                      }
                      if($tb<5){
                        for($i = 1; $i<=5-$tb; $i++){
                          ?>
                    <i class="fa-solid fa-star" style="color: gray;"></i>
                    <?php
                        }
                      }
                    ?>
                </div>


                <?php
              }
            }
          ?>
                <div class="row tex-center ms-2">
                    <?php
              $ma_sp = $sp['ma_sp'];
              $con = mysqli_connect('localhost', 'root', '', 'nienluan');
              $result = mysqli_query($con, "SELECT * FROM `mau_sanpham` join `sanpham` on mau_sanpham.ma_sp = sanpham.ma_sp join `mau` on mau_sanpham.ma_m = mau.ma_m WHERE sanpham.ma_sp = '$ma_sp'");
              while ($row = mysqli_fetch_assoc($result)) {
                $arr[$row['ma_m']]['ten_m'] = $row['ten_m'];
                $arr[$row['ma_m']]['mau'] = $row['mau'];
                ?>
                    <div class="col-2">
                        <span
                            style="border-radius:100% ; background-color: <?php echo $row['mau'] ?> ; color: <?php echo $row['mau'] ?>;">....</span>
                    </div>
                    <?php
              }
            ?>
                </div>
                <p class="fw-bold text-center mt-2 sanpham_gia">
                    <?php echo number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>'  ?></p>
            </div>
            <?php
      }
      ?>
        </div>
        <div style=" text-align: center;" class="mt-4">
            <a href="<?php echo BASE_URL ?>/dienthoai/sanpham/8">
                <button type="button" class="btn btn-success" style="font-weight:bold ; background-color:#367e18 ;">Xem
                    Tất Cả &ensp; <i class="fa-solid fa-caret-right"></i></button>
            </a>
        </div>
    </div>
    <!--  -->

    <!-- laptop -->
    <div class="sanpham mb-3 laptop">
        <div class="row">
            <div class="col-md-12">
                <!-- <p class="pt-3 ps-3" style="font-size: 25px; color: black; font-weight: bold;   border-bottom: 4px solid #ff5b00; width: 10%;">Laptop</p> -->
                <img src="<?php echo BASE_URL ?>public/img/banner/banner_laptop.png"
                    class="img-responsive center-block">
            </div>
        </div>
        <div class="row">
            <?php
      foreach ($data['sp_laptop_limit'] as $key => $sp) {
      ?>
            <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5 img-hover-zoom img-hover-zoom--brightness">
                <a
                    href="<?php echo BASE_URL ?>laptop/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
                    <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                        class="d-block w-100">
                </a>
                <p class="text-center mt-3 sanpham_item_title" style="color: #003865; font-weight: bold;">
                    <?php echo $sp['ten_sp'] ?>
                </p>
                <?php
            foreach($data['count_sao'] as $key => $count_sao){
              if($sp['ma_sp'] == $count_sao['ma_sp']){
                $tb= ceil($count_sao['tongsao']/$count_sao['so_dg']) 
                ?>
                <div>
                    <?php
                      for($i = 1; $i<=$tb; $i++){
                        ?>
                    <i class="fa-solid fa-star" style="color: #FE8C23;"></i>
                    <?php
                      }
                      if($tb<5){
                        for($i = 1; $i<=5-$tb; $i++){
                          ?>
                    <i class="fa-solid fa-star" style="color: gray;"></i>
                    <?php
                        }
                      }
                    ?>
                </div>


                <?php
              }
            }
          ?>
                <div class="row tex-center ms-2">
                    <?php
            $ma_sp = $sp['ma_sp'];
            $con = mysqli_connect('localhost', 'root', '', 'nienluan');
            $result = mysqli_query($con, "SELECT * FROM `mau_sanpham` join `sanpham` on mau_sanpham.ma_sp = sanpham.ma_sp join `mau` on mau_sanpham.ma_m = mau.ma_m WHERE sanpham.ma_sp = '$ma_sp'");
            while ($row = mysqli_fetch_assoc($result)) {
              $arr[$row['ma_m']]['ten_m'] = $row['ten_m'];
              $arr[$row['ma_m']]['mau'] = $row['mau'];
            ?>
                    <div class="col-2">
                        <span
                            style="border-radius:100% ; background-color: <?php echo $row['mau'] ?> ; color: <?php echo $row['mau'] ?>;">....</span>
                    </div>
                    <?php
            }
            ?>
                </div>
                <p class="fw-bold text-center mt-2 sanpham_gia">
                    <?php echo number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>'  ?></p>
            </div>
            <?php
      }
      ?>
        </div>
        <div style=" text-align: center;" class="mt-4">
            <a href="<?php echo BASE_URL ?>/laptop/sanpham/9">
                <button type="button" class="btn btn-success"
                    style="font-weight:bold ; background-color:white ; color: #367e18;">Xem Tất Cả &ensp; <i
                        class="fa-solid fa-caret-right"></i></button>
            </a>
        </div>
    </div>
    <!--  -->

    <!-- Smartwatch -->
    <div class="sanpham mb-3">
        <div class="row">
            <div class="col-md-12">
                <h2 class="gachchan"><b>Smartwatch</b></h2>
            </div>
        </div>
        <div class="row">
            <?php
      foreach ($data['sp_smartwatch_limit'] as $key => $sp) {
      ?>
            <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5 img-hover-zoom img-hover-zoom--brightness">
                <a
                    href="<?php echo BASE_URL ?>smartwatch/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
                    <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                        class="d-block w-100">
                </a>
                <p class="text-center mt-3 sanpham_item_title fw-bold"><?php echo $sp['ten_sp'] ?></p>
                <?php
            foreach($data['count_sao'] as $key => $count_sao){
              if($sp['ma_sp'] == $count_sao['ma_sp']){
                $tb= ceil($count_sao['tongsao']/$count_sao['so_dg']) 
                ?>
                <div>
                    <?php
                      for($i = 1; $i<=$tb; $i++){
                        ?>
                    <i class="fa-solid fa-star" style="color: #FE8C23;"></i>
                    <?php
                      }
                      if($tb<5){
                        for($i = 1; $i<=5-$tb; $i++){
                          ?>
                    <i class="fa-solid fa-star" style="color: gray;"></i>
                    <?php
                        }
                      }
                    ?>
                </div>


                <?php
              }
            }
          ?>
                <div class="row tex-center ms-2">
                    <?php
            $ma_sp = $sp['ma_sp'];
            $con = mysqli_connect('localhost', 'root', '', 'nienluan');
            $result = mysqli_query($con, "SELECT * FROM `mau_sanpham` join `sanpham` on mau_sanpham.ma_sp = sanpham.ma_sp join `mau` on mau_sanpham.ma_m = mau.ma_m WHERE sanpham.ma_sp = '$ma_sp'");
            while ($row = mysqli_fetch_assoc($result)) {
              $arr[$row['ma_m']]['ten_m'] = $row['ten_m'];
              $arr[$row['ma_m']]['mau'] = $row['mau'];
            ?>
                    <div class="col-2">
                        <span
                            style="border-radius:100% ; background-color: <?php echo $row['mau'] ?> ; color: <?php echo $row['mau'] ?>;">....</span>
                    </div>
                    <?php
            }
            ?>
                </div>
                <p class="fw-bold text-center mt-2 sanpham_gia">
                    <?php echo number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>'  ?></p>
            </div>
            <?php
      }
      ?>
        </div>
        <div style=" text-align: center;" class="mt-4">
            <a href="<?php echo BASE_URL ?>/smartwatch/sanpham/11">
                <button type="button" class="btn btn-success" style="font-weight:bold ; background-color:#367e18 ;">Xem
                    Tất Cả &ensp; <i class="fa-solid fa-caret-right"></i></button>
            </a>
        </div>
    </div>
    <!--  -->
    <!-- danh mục nổi bật -->
    <div class="danhmuc_noibat">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h2>danh mục <b>nổi bật</b></h2>
            </div>
        </div>
        <div class="row">
            <?php
      foreach ($data['danhmuc_sanpham'] as $key => $dm) {
      ?>
            <div class="col-1 danhmuc_noibat_item mt-3"
                style="background-color:<?php echo $dm['mamau_dm'] ?> ; margin-right: 15px;">
                <p class="text-center mt-2 danhmuc_noibat_item_title"><?php echo $dm['ten_dm'] ?></p>
                <a href="<?php echo BASE_URL ?><?php echo $dm['ghichu_dm'] ?>/sanpham/<?php echo $dm['ma_dm'] ?>">
                    <img class="giua mb-1"
                        src="<?php echo BASE_URL ?>public/uploads/danhmuc/<?php echo $dm['hinh_dm'] ?>"
                        style="width:90% ;">
                </a>
            </div>
            <?php
      }
      ?>
        </div>
    </div>

    <!--  -->
    <!-- chuyên trang thương hiệu -->
    <div class="chuyentrang_thuonghieu">
        <div class="row">
            <div class="col-md-12 mb-4 mt-2">
                <h2 class="gachchan"><b>chuyên trang thương hiệu</b></h2>
            </div>
        </div>
        <div class="row mb-3">
            <?php
      foreach ($data['thuonghieu'] as $key => $th) {
      ?>
            <div class="col-3">
                <a
                    href="<?php echo BASE_URL ?>chuyentrang_thuonghieu/<?php echo $th['ghichu_th']  ?>/<?php echo $th['ma_th'] ?>">
                    <img src="<?php echo BASE_URL ?>public/uploads/thuonghieu/<?php echo $th['hinh_th'] ?>"
                        class="d-block w-100" style="border-radius:15px ;">
                </a>
            </div>
            <?php
      }
      ?>
        </div>
    </div>

    <!--  -->

    <!-- 24h công nghệ -->
    <div class="h_congnghe">
        <div class="h_congnghe_title">
            <button type="button" class="btn btn-danger mt-3 mb-4">
                <a href="" style="text-decoration: none">
                    <div class="spinner-grow text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span style="font-weight:bold ; color: white; font-size: 20px;">24H CÔNG NGHỆ</span>
                </a>
            </button>
        </div>
        <div class="row">
            <?php
        foreach ($data['tintuc_limit'] as $key => $tt) {
          ?>
            <div class="h_congnghe_item col-6 pt-3 pb-3 pe-4">
                <a href="<?php echo BASE_URL ?>index/chitiet_tintuc/<?php echo $tt['ma_tt'] ?>"
                    style="text-decoration: none;" class="text-dark">
                    <div class="row">
                        <div class="col-3">
                            <img style="width: 100%;"
                                src="<?php echo BASE_URL ?>public/uploads/tintuc/<?php echo $tt['hinh_tt'] ?>" alt="">
                        </div>
                        <div class="col-9">
                            <h4 class="fw-bold"><?php echo $tt['ten_tt'] ?></h4>
                        </div>
                    </div>
                </a>
            </div>
            <?php 
        }
      ?>
        </div>
    </div>

    <!--  -->
    <!-- script chạy deal ngon mỗi ngày -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#itemslider').carousel({
            interval: 3000
        });
        $('.carousel-showmanymoveone .item').each(function() {
            var itemToClone = $(this);
            for (var i = 1; i < 6; i++) {
                itemToClone = itemToClone.next();
                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                }
                itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-" + (i))
                    .appendTo($(this));
            }
        });
    });
    </script>
    <!--  -->
</div>
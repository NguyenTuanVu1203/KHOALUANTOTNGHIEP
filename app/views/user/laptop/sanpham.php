<div class="list_sanpham mt-4 container">
    <div class="deal_ngon p-4" style="background-color: #C3FF99;">
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
              foreach ($data['sanpham_deal1'] as $key => $sp){
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
              foreach ($data['sanpham_deal'] as $key => $sp){
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
    <div class="laptop_gaming mt-4" id="gaming">
        <img src="<?php echo BASE_URL ?>public/img/banner/banner_laptop_gaming.jpg" class="d-block w-100 mb-3">
        <div class="row mb-5">
            <?php
        foreach ($data['sanpham_gaming'] as $key => $sp){
          ?>
            <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5 img-hover-zoom img-hover-zoom--brightness">
                <a
                    href="<?php echo BASE_URL ?>laptop/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
                    <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                        class="d-block w-100">
                </a>
                <p class="text-center mt-3 sanpham_item_title"><?php echo $sp['ten_sp'] ?></p>
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
    </div>
    <div class="laptop_hoctap mt-4" id="hoctapvanphong">
        <img src="<?php echo BASE_URL ?>public/img/banner/banner_laptop_hoctap.jpg" class="d-block w-100 mb-3">
        <div class="row mb-5">
            <?php
        foreach ($data['sanpham_hoctap'] as $key => $sp){
          ?>
            <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5 img-hover-zoom img-hover-zoom--brightness">
                <a
                    href="<?php echo BASE_URL ?>laptop/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
                    <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                        class="d-block w-100">
                </a>
                <p class="text-center mt-3 sanpham_item_title"><?php echo $sp['ten_sp'] ?></p>
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
    </div>
    <div class="laptop_dohoa mt-4" id="dohoakythuat">
        <img src="<?php echo BASE_URL ?>public/img/banner/banner_laptop_dohoa.jpg" class="d-block w-100 mb-3">
        <div class="row mb-5">
            <?php
        foreach ($data['sanpham_dohoa'] as $key => $sp){
          ?>
            <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5 img-hover-zoom img-hover-zoom--brightness">
                <a
                    href="<?php echo BASE_URL ?>laptop/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
                    <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                        class="d-block w-100">
                </a>
                <p class="text-center mt-3 sanpham_item_title"><?php echo $sp['ten_sp'] ?></p>
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
    </div>
    <div class="laptop_mong mt-4" id="mongnhe">
        <img src="<?php echo BASE_URL ?>public/img/banner/banner_laptop_mong.jpg" class="d-block w-100 mb-3">
        <div class="row mb-5">
            <?php
        foreach ($data['sanpham_nhe'] as $key => $sp){
          ?>
            <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5 img-hover-zoom img-hover-zoom--brightness">
                <a
                    href="<?php echo BASE_URL ?>laptop/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
                    <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                        class="d-block w-100">
                </a>
                <p class="text-center mt-3 sanpham_item_title"><?php echo $sp['ten_sp'] ?></p>
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
    </div>
    <div class="laptop_caocap mt-4" id="caocapsangtrong">
        <img src="<?php echo BASE_URL ?>public/img/banner/banner_laptop_caocap.jpg" class="d-block w-100 mb-3">
        <div class="row mb-5">
            <?php
        foreach ($data['sanpham_sangtrong'] as $key => $sp){
          ?>
            <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5 img-hover-zoom img-hover-zoom--brightness">
                <a
                    href="<?php echo BASE_URL ?>laptop/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
                    <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                        class="d-block w-100">
                </a>
                <p class="text-center mt-3 sanpham_item_title"><?php echo $sp['ten_sp'] ?></p>
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
    </div>

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
</div>
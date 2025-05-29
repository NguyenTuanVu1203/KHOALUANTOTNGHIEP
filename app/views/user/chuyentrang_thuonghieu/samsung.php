<div class="container mt-4 mb-4">
    <div class="row ">
        <div class="col-8">
            <img style="width:25% ;"
                src="<?php echo BASE_URL ?>public/img/chuyentrang_thuonghieu/samsung/samsung2021.png" alt="">
        </div>
        <div class="col-4">
            <div class="row mt-4">
                <?php
          foreach ($data['danhmuc_ma_thuonghieu'] as $key => $dmth){
            ?>
                <div class="col-4 ctth_dm text-center">
                    <a href="#<?php echo $dmth['ghichu_dm'] ?>">
                        <?php echo $dmth['ten_dm'] ?>
                    </a>
                </div>
                <?php
          }
        ?>
            </div>
        </div>
    </div>
    <!-- slider -->
    <div class="row mt-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="height:220px ;"
                        src="<?php echo BASE_URL ?>public/img/chuyentrang_thuonghieu/samsung/slider1.png"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img style="height:220px ;"
                        src="<?php echo BASE_URL ?>public/img/chuyentrang_thuonghieu/samsung/slider2.png"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img style="height:220px ;"
                        src="<?php echo BASE_URL ?>public/img/chuyentrang_thuonghieu/samsung/slider3.png"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!--  -->
    <!-- điện thoại -->
    <div class="row ctth_dienthoai" id="dienthoai">
        <div>
            <h2 style="color: white;">ĐIỆN THOẠI</h2>
        </div>
        <?php
      foreach ($data['sanpham_ctth'] as $key => $sp){
        ?>
        <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5 img-hover-zoom img-hover-zoom--brightness">
            <a
                href="<?php echo BASE_URL ?>dienthoai/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
                <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                    class="d-block w-100">
            </a>
            <p class="text-center mt-3 sanpham_item_title text-light"><?php echo $sp['ten_sp'] ?></p>
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
            <p class="fw-bold text-center mt-2 sanpham_gia" style="color: #D9D7F1;">
                <?php echo number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>'  ?></p>
        </div>
        <?php
      }
    ?>
    </div>
    <div class="row" id="table">
        <div>
            <h2>TABLE</h2>
        </div>
        <?php
      foreach ($data['sanpham_ctth_table'] as $key => $sp){
        ?>
        <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5">
            <a
                href="<?php echo BASE_URL ?>dienthoai/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
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
    <div class="row" id="smartwatch">
        <div>
            <h2>SMARTWATCH</h2>
        </div>
        <?php
      foreach ($data['sanpham_ctth_smartwatch'] as $key => $sp){
        ?>
        <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5">
            <a
                href="<?php echo BASE_URL ?>dienthoai/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
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
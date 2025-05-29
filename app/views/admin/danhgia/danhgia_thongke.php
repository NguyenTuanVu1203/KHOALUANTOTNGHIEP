<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <div class="row">
                <div class="col-6 mt-2">
                    Thông tin đánh giá của sản phẩm
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>danhgia/thongke_timkiem" method="POST">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="tukhoa">
                        <button class="btn btn-success btn_search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="tr_table">
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Tổng số sao</th>
                    <th scope="col">Số lượt đánh giá</th>
                    <th scope="col">Trung bình</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i=0;
          foreach($data['count_sao'] as $key => $count_sao){
            ?>
                <tr>
                    <td>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title" style="font-weight: bold;">
                                        <?php echo $count_sao['ten_sp'] ?>
                                    </h4>
                                </div>
                                <div id="collapse" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <?php
                            foreach($data['count_sao_chitiet'] as $key => $count_sao_chitiet){
                              if($count_sao['ma_sp'] == $count_sao_chitiet['ma_sp']){
                                ?>
                                        <?php
                                    for($i =1 ; $i<=$count_sao_chitiet['sosao_dg']; $i++){
                                      ?>
                                        <i class="fa-solid fa-star" style="color: #FE8C23;"></i>
                                        <?php
                                    }
                                    if($count_sao_chitiet['sosao_dg']<5){
                                      for($i =1 ; $i<=5-$count_sao_chitiet['sosao_dg']; $i++){
                                        ?>
                                        <i class="fa-solid fa-star" style="color: gray;"></i>
                                        <?php
                                      }
                                    }
                                  ?>
                                        <span style="font-weight: bold;">_____<?php echo $count_sao_chitiet['so_dg'] ?>
                                            đánh giá <br></span>
                                        <?php
                              }
                            }
                          ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php echo $count_sao['tongsao'] ?>
                    </td>
                    <td>
                        <?php echo $count_sao['so_dg'] ?>
                    </td>
                    <td>
                        <?php
                    $tb= ceil($count_sao['tongsao']/$count_sao['so_dg']) 
                    ?>
                        <span style="font-weight: bold;"><?php echo $tb ?></span>
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
                        <?php
                  ?>
                    </td>
                </tr>
                <?php
          }
        ?>
            </tbody>
        </table>
    </div>
    <!-- Vendor js -->
    <script src="<?php echo BASE_URL ?>public/assets\js\vendor.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\libs\morris-js\morris.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\libs\raphael\raphael.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\js\pages\dashboard.init.js"></script>
    <!-- App js -->
    <script src="<?php echo BASE_URL ?>public/assets\js\app.min.js"></script>
</div>
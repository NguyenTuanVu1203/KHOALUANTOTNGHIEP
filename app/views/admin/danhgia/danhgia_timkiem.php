<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <div class="row">
                <div class="col-6 mt-2">
                    <a href="<?php echo BASE_URL ?>danhgia/danhgia">
                        <button type="button" class="btn btn-warning">
                            <i class="fas fa-solid fa-caret-left"></i>&ensp;
                        </button> &ensp;
                    </a>
                    Thông tin đánh giá của sản phẩm
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>danhgia/danhgia_timkiem" method="POST">
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
                    <th scope="col">STT</th>
                    <th scope="col">Tên khách</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Số lượng sao</th>
                    <th scope="col">Thời gian</th>
                    <th scope="col">Sản phẩm</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i=0;
          foreach($data['danhgia'] as $key => $dg){
            $i++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $dg['ten_k'] ?></td>
                    <td style="width:30% ;"><?php echo $dg['noidung_dg'] ?></td>
                    <td>
                        <?php
                    for($i=1; $i<=$dg['sosao_dg']; $i++){
                      ?>
                        <i class="fa-solid fa-star" style="color: #FE8C23;"></i>
                        <?php
                    }
                    if($dg['sosao_dg']<5){
                      for($i=1; $i<=5-$dg['sosao_dg']; $i++){
                        ?>
                        <i class="fa-solid fa-star"></i>
                        <?php
                      }
                    }
                  ?>
                    </td>
                    <td><?php echo $dg['thoigian_dg'] ?></td>
                    <td>
                        <a
                            href="<?php echo BASE_URL ?><?php echo $dg['ghichu_dm'] ?>/chitiet_sanpham/<?php echo $dg['ma_sp'] ?>/<?php echo $dg['ma_th'] ?>/<?php echo $dg['ma_dm'] ?>">
                            <button type="button" class="btn btn-warning" style="font-weight: bold;">
                                <?php echo $dg['ten_sp'] ?>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php
          }
          echo '<p class="text-warning" style="font-weight: bold;">Tổng: '.$i.'</p>';
          $level=session::get('level');
          if($level == 1){
            ?>
                <a onclick="return confirm('Bạn có muốn xóa tất cả không?')"
                    href="<?php echo BASE_URL ?>danhgia/danhgia_deleteAll">
                    <button type="button" class="btn"
                        style="background-color: red; font-weight: bold; margin-bottom: 10px;">
                        <i class="fas fa-trash-alt"></i> Xoá tất cả
                    </button>
                </a>
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
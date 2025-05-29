<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <div class="row">
                <div class="col-6 mt-2">
                    <a href="<?php echo BASE_URL ?>danhmuc_sanpham/danhmuc_sanpham">
                        <button type="button" class="btn btn-warning">
                            <i class="fas fa-solid fa-caret-left"></i>&ensp;
                        </button> &ensp;
                    </a>
                    Thông tin danh mục
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>danhmuc_sanpham/danhmuc_sanpham_timkiem"
                        method="POST">
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
                    <th scope="col">Tên</th>
                    <th scope="col">Mã màu</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i=0;
          foreach($data['danhmuc_sanpham_timkiem'] as $key => $dm){
            $i++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $dm['ten_dm'] ?></td>
                    <td><?php echo $dm['mamau_dm'] ?></td>
                    <td>
                        <img style="width: 25%;"
                            src="<?php echo BASE_URL ?>public/uploads/danhmuc/<?php echo $dm['hinh_dm'] ?>" alt="">
                    </td>
                    <td>
                        <a href="<?php echo BASE_URL ?>danhmuc_sanpham/danhmuc_sanpham_edit/<?php echo $dm['ma_dm'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa <?php echo $dm['ten_dm'] ?> không?')"
                            href="<?php echo BASE_URL ?>danhmuc_sanpham/danhmuc_sanpham_delete/<?php echo $dm['ma_dm'] ?>">
                            <button type="button" class="btn xoa">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </a>
                        <?php
                    if($dm['tinhtrang_dm'] == 0){
                      ?>
                        <a
                            href="<?php echo BASE_URL ?>danhmuc_sanpham/danhmuc_sanpham_tuychinh/<?php echo $dm['ma_dm'] ?>/1">
                            <button type="button" class="btn an">
                                Ẩn
                            </button>
                        </a>
                        <?php
                    }else if($dm['tinhtrang_dm'] == 1){
                      ?>
                        <a
                            href="<?php echo BASE_URL ?>danhmuc_sanpham/danhmuc_sanpham_tuychinh/<?php echo $dm['ma_dm'] ?>/0">
                            <button type="button" class="btn hien">
                                Hiện
                            </button>
                        </a>
                        <?php
                    }
                  ?>
                    </td>
                </tr>
                <?php
          }
          echo '<p class="text-warning" style="font-weight: bold;">Tổng: '.$i.'</p>';
          $level=session::get('level');
          if($level == 1){
            ?>
                <a onclick="return confirm('Bạn có muốn xóa tất cả không?')"
                    href="<?php echo BASE_URL ?>danhmuc_sanpham/danhmuc_sanpham_deleteAll">
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
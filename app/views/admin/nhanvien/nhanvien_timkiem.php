<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <div class="row">
                <div class="col-6 mt-2">
                    <a href="<?php echo BASE_URL ?>nhanvien/nhanvien">
                        <button type="button" class="btn btn-warning">
                            <i class="fas fa-solid fa-caret-left"></i>&ensp;
                        </button> &ensp;
                    </a>
                    Thông tin nhân viên
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>nhanvien/nhanvien_timkiem" method="POST">
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
                    <th scope="col">Username</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Ngày vào</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i=0;
          foreach($data['nhanvien_timkiem'] as $key => $nv){
            $i++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $nv['ten_nv'] ?></td>
                    <td><?php echo $nv['user_nv'] ?></td>
                    <td><?php echo $nv['sdt_nv'] ?></td>
                    <td><?php echo $nv['diachi_nv'] ?></td>
                    <td><?php echo $nv['ngayvao'] ?></td>
                    <td>
                        <a href="<?php echo BASE_URL ?>nhanvien/nhanvien_edit/<?php echo $nv['ma_nv'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <?php
                    if($nv['level'] !=1){
                      ?>
                        <a onclick="return confirm('Bạn có muốn xóa nhân viên <?php echo $nv['ten_nv'] ?> không?')"
                            href="<?php echo BASE_URL ?>nhanvien/nhanvien_delete/<?php echo $nv['ma_nv'] ?>">
                            <button type="button" class="btn xoa">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </a>
                        <?php
                    }
                  ?>
                        <?php
                    if($nv['tinhtrang_nv'] == 0 && $nv['level'] !=1){
                      ?>
                        <a href="<?php echo BASE_URL ?>nhanvien/nhanvien_an/<?php echo $nv['ma_nv'] ?>">
                            <button type="button" class="btn an">
                                Vô hiệu hoá
                            </button>
                        </a>
                        <?php
                    }else if($nv['tinhtrang_nv'] == 1 && $nv['level'] !=1){
                      ?>
                        <a href="<?php echo BASE_URL ?>nhanvien/nhanvien_hien/<?php echo $nv['ma_nv'] ?>">
                            <button type="button" class="btn hien">
                                Kích hoạt
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
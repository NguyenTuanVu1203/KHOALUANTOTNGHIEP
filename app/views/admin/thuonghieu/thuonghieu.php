<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            Thêm thông tin thương hiệu
        </div>
        <form action="<?php echo BASE_URL ?>thuonghieu/thuonghieu_insert" method="POST" autocomplete="off"
            enctype="multipart/form-data">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_th">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Logo: </th>
                        <td class="was-validated">
                            <input type='file' name="logo_th">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Hình: </th>
                        <td class="was-validated">
                            <input type='file' name="hinh_th">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="insert_th">
                                <i class="fas fa-plus-square"></i>
                                Thêm
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div class="alert alert-success title_page" role="alert">
            <div class="row">
                <div class="col-6 mt-2">
                    Thông tin thương hiệu
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>thuonghieu/thuonghieu_timkiem" method="POST">
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
                    <th scope="col">Logo</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i=0;
          foreach($data['thuonghieu'] as $key => $th){
            $i++;
            ?>
                <tr>
                    <th scope="row" style="width: 5%;"><?php echo $i ?></th>
                    <td style="width: 15%;"><?php echo $th['ten_th'] ?></td>
                    <td style="width: 20%;">
                        <img style="width: 40%;"
                            src="<?php echo BASE_URL ?>public/uploads/thuonghieu/<?php echo $th['logo_th'] ?>" alt="">
                    </td>
                    <td style="width: 20%;">
                        <img style="width: 50%;"
                            src="<?php echo BASE_URL ?>public/uploads/thuonghieu/<?php echo $th['hinh_th'] ?>" alt="">
                    </td>
                    <td style="width: 20%;">
                        <a href="<?php echo BASE_URL ?>thuonghieu/thuonghieu_edit/<?php echo $th['ma_th'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa <?php echo $th['ten_th'] ?> không?')"
                            href="<?php echo BASE_URL ?>thuonghieu/thuonghieu_delete/<?php echo $th['ma_th'] ?>">
                            <button type="button" class="btn xoa">
                                <i class="fas fa-trash-alt"></i>
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
                    href="<?php echo BASE_URL ?>thuonghieu/thuonghieu_deleteAll">
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
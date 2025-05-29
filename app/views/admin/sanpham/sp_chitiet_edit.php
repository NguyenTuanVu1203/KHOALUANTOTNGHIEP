<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>sanpham/sp_chitiet">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin chi tiết: Điện thoại - Table
        </div>
        <?php
      foreach ($data['sp_chitiet_ma'] as $key => $ctsp){
        ?>
        <form action="<?php echo BASE_URL ?>sanpham/sp_chitiet_update/<?php echo $ctsp['ma_ctsp'] ?>" method="POST"
            autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Sản phẩm: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_sp">
                                <option>Chọn sản phâm</option>
                                <?php
                        foreach ($data['sanpham_ma_dm'] as $key => $sp) {
                          ?>
                                <option <?php
                                if($ctsp['ma_sp'] == $sp['ma_sp']){
                                  echo 'selected';
                                }
                              ?> value="<?php echo $sp['ma_sp'] ?>"><?php echo $sp['ten_sp'] ?></option>
                                <?php
                        }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Màn hình: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="manhinh"
                                value="<?php echo $ctsp['manhinh'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Hệ điều hành: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="hedieuhanh"
                                value="<?php echo $ctsp['hedieuhanh'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Camera sau: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="camera_sau"
                                value="<?php echo $ctsp['camera_sau'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Camera trước: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="camera_truoc"
                                value="<?php echo $ctsp['camera_truoc'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Chip: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="chip"
                                value="<?php echo $ctsp['chip'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">RAM</th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ram">
                                <?php
                        if($ctsp['ram'] == 2){
                          ?>
                                <option>Chọn</option>
                                <option value="2" selected>2GB</option>
                                <option value="3">3GB</option>
                                <option value="4">4GB</option>
                                <option value="6">6GB</option>
                                <option value="8">8GB</option>
                                <option value="12">12GB</option>
                                <?php
                        }else if($ctsp['ram'] == 3){
                          ?>
                                <option>Chọn</option>
                                <option value="2">2GB</option>
                                <option value="3" selected>3GB</option>
                                <option value="4">4GB</option>
                                <option value="6">6GB</option>
                                <option value="8">8GB</option>
                                <option value="12">12GB</option>
                                <?php
                        }else if($ctsp['ram'] == 4){
                          ?>
                                <option>Chọn</option>
                                <option value="2">2GB</option>
                                <option value="3">3GB</option>
                                <option value="4" selected>4GB</option>
                                <option value="6">6GB</option>
                                <option value="8">8GB</option>
                                <option value="12">12GB</option>
                                <?php
                        }else if($ctsp['ram'] == 6){
                          ?>
                                <option>Chọn</option>
                                <option value="2">2GB</option>
                                <option value="3">3GB</option>
                                <option value="4">4GB</option>
                                <option value="6" selected>6GB</option>
                                <option value="8">8GB</option>
                                <option value="12">12GB</option>
                                <?php
                        }else if($ctsp['ram'] == 8){
                          ?>
                                <option>Chọn</option>
                                <option value="2">2GB</option>
                                <option value="3">3GB</option>
                                <option value="4">4GB</option>
                                <option value="6">6GB</option>
                                <option value="8" selected>8GB</option>
                                <option value="12">12GB</option>
                                <?php
                        }else if($ctsp['ram'] == 12){
                          ?>
                                <option>Chọn</option>
                                <option value="2">2GB</option>
                                <option value="3">3GB</option>
                                <option value="4">4GB</option>
                                <option value="6">6GB</option>
                                <option value="8">8GB</option>
                                <option value="12" selected>12GB</option>
                                <?php
                        }else{
                          ?>
                                <option>Chọn</option>
                                <option value="2">2GB</option>
                                <option value="3">3GB</option>
                                <option value="4">4GB</option>
                                <option value="6">6GB</option>
                                <option value="8">8GB</option>
                                <option value="12">12GB</option>
                                <?php
                        }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Bộ nhớ trong</th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="rom">
                                <?php
                        if ($ctsp['rom'] == 8){
                          ?>
                                <option>Chọn</option>
                                <option value="8" selected>8GB</option>
                                <option value="16">16GB</option>
                                <option value="32">32GB</option>
                                <option value="64">64GB</option>
                                <option value="128">128GB</option>
                                <option value="256">256GB</option>
                                <option value="512">512GB</option>
                                <?php
                        }else if($ctsp['rom'] == 16){
                          ?>
                                <option>Chọn</option>
                                <option value="8">8GB</option>
                                <option value="16" selected>16GB</option>
                                <option value="32">32GB</option>
                                <option value="64">64GB</option>
                                <option value="128">128GB</option>
                                <option value="256">256GB</option>
                                <option value="512">512GB</option>
                                <?php
                        }else if($ctsp['rom'] == 32){
                          ?>
                                <option>Chọn</option>
                                <option value="8">8GB</option>
                                <option value="16">16GB</option>
                                <option value="32" selected>32GB</option>
                                <option value="64">64GB</option>
                                <option value="128">128GB</option>
                                <option value="256">256GB</option>
                                <option value="512">512GB</option>
                                <?php
                        }else if($ctsp['rom'] == 64){
                          ?>
                                <option>Chọn</option>
                                <option value="8">8GB</option>
                                <option value="16">16GB</option>
                                <option value="32">32GB</option>
                                <option value="64" selected>64GB</option>
                                <option value="128">128GB</option>
                                <option value="256">256GB</option>
                                <option value="512">512GB</option>
                                <?php
                        } else if($ctsp['rom'] == 128){
                          ?>
                                <option>Chọn</option>
                                <option value="8">8GB</option>
                                <option value="16">16GB</option>
                                <option value="32">32GB</option>
                                <option value="64">64GB</option>
                                <option value="128" selected>128GB</option>
                                <option value="256">256GB</option>
                                <option value="512">512GB</option>
                                <?php
                        }else if($ctsp['rom'] == 256){
                          ?>
                                <option>Chọn</option>
                                <option value="8">8GB</option>
                                <option value="16">16GB</option>
                                <option value="32">32GB</option>
                                <option value="64">64GB</option>
                                <option value="128">128GB</option>
                                <option value="256" selected>256GB</option>
                                <option value="512">512GB</option>
                                <?php
                        }else if($ctsp['rom'] == 512){
                          ?>
                                <option>Chọn</option>
                                <option value="8">8GB</option>
                                <option value="16">16GB</option>
                                <option value="32">32GB</option>
                                <option value="64">64GB</option>
                                <option value="128">128GB</option>
                                <option value="256">256GB</option>
                                <option value="512" selected>512GB</option>
                                <?php
                        }else{
                          ?>
                                <option>Chọn</option>
                                <option value="8">8GB</option>
                                <option value="16">16GB</option>
                                <option value="32">32GB</option>
                                <option value="64">64GB</option>
                                <option value="128">128GB</option>
                                <option value="256">256GB</option>
                                <option value="512">512GB</option>
                                <?php
                        }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">SIM: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="sim"
                                value="<?php echo $ctsp['sim'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Pin, sạc: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="pin"
                                value="<?php echo $ctsp['pin'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Bộ sản phẩm: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="bo_sanpham"
                                value="<?php echo $ctsp['bo_sanpham'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="update_ncc">
                                <i class="fas fa-edit"></i>
                                Cập nhật
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php
      }
    ?>

    </div>
    <!-- Vendor js -->
    <script src="<?php echo BASE_URL ?>public/assets\js\vendor.min.js"></script>

    <script src="<?php echo BASE_URL ?>public/assets\libs\morris-js\morris.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\libs\raphael\raphael.min.js"></script>

    <script src="<?php echo BASE_URL ?>public/assets\js\pages\dashboard.init.js"></script>

    <!-- App js -->
    <script src="<?php echo BASE_URL ?>public/assets\js\app.min.js"></script>
    <!-- trình soạn thảo  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('thongtin_sp');
    </script>
    <!--  -->
</div>
<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>sanpham/sp_chitiet_maytinh">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin chi tiết: Máy tính để bàn
        </div>
        <?php
      foreach ($data['sp_chitiet_ma'] as $key => $ctsp){
        ?>
        <form action="<?php echo BASE_URL ?>sanpham/sp_chitiet_maytinh_update/<?php echo $ctsp['ma_ctsp'] ?>"
            method="POST" autocomplete="off">
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
                                if ($ctsp['ma_sp'] == $sp['ma_sp']){
                                  echo 'selected';
                                }
                              ?> value="<?php echo $sp['ma_sp'] ?>"> <?php echo $sp['ten_sp'] ?></option>
                                <?php
                        }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Công nghệ CPU: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="congnghe_cpu"
                                value="<?php echo $ctsp['congnghe_cpu'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">RAM</th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ram">
                                <?php
                        if($ctsp['ram'] == 4){
                          ?>
                                <option>Chọn</option>
                                <option value="4" selected>4GB</option>
                                <option value="8">8GB</option>
                                <option value="16">16GB</option>
                                <?php
                        }else if($ctsp['ram'] == 8){
                          ?>
                                <option>Chọn</option>
                                <option value="4">4GB</option>
                                <option value="8" selected>8GB</option>
                                <option value="16">16GB</option>
                                <?php
                        }else if($ctsp['ram'] == 16){
                          ?>
                                <option>Chọn</option>
                                <option value="4">4GB</option>
                                <option value="8">8GB</option>
                                <option value="16" selected>16GB</option>
                                <?php
                        }else{
                          ?>
                                <option>Chọn</option>
                                <option value="4">4GB</option>
                                <option value="8">8GB</option>
                                <option value="16">16GB</option>
                                <?php
                        }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Ổ cứng</th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="rom">
                                <?php
                        if($ctsp['rom'] == 256){
                          ?>
                                <option>Chọn</option>
                                <option value="256" selected>SSD 256GB</option>
                                <option value="512">SSD 512GB</option>
                                <?php
                        }else if($ctsp['rom'] == 512){
                          ?>
                                <option>Chọn</option>
                                <option value="256">SSD 256GB</option>
                                <option value="512" selected>SSD 512GB</option>
                                <?php
                        }else{
                          ?>
                                <option>Chọn</option>
                                <option value="256">SSD 256GB</option>
                                <option value="512">SSD 512GB</option>
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
                        <th scope="row" class="title_table">Card màn hình: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="card_manhinh"
                                value="<?php echo $ctsp['card_manhinh'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Cổng kết nối: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="cong_ketnoi"
                                value="<?php echo $ctsp['cong_ketnoi'] ?>">
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
                        <th scope="row" class="title_table">Kích thước: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="kichthuoc"
                                value="<?php echo $ctsp['kichthuoc'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Bộ sản phẩm chuẩn: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="bo_sanpham"
                                value="<?php echo $ctsp['bo_sanpham'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="update">
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
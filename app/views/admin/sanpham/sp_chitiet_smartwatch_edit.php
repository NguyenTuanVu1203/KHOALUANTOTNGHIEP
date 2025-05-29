<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>sanpham/sp_chitiet_smartwatch">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin chi tiết: Smartwach
        </div>
        <?php
      foreach ($data['sp_chitiet_ma'] as $key => $ctsp){
        ?>
        <form action="<?php echo BASE_URL ?>sanpham/sp_chitiet_smartwatch_update/<?php echo $ctsp['ma_ctsp'] ?>"
            method="POST" autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Sản phẩm: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_sp">
                                <option>Chọn sản phẩm</option>
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
                        <th scope="row" class="title_table">Thời lượng pin: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="thoiluong_pin"
                                value="<?php echo $ctsp['thoiluong_pin'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Kết nối với hệ điều hành: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="hedieuhanh"
                                value="<?php echo $ctsp['hedieuhanh'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Mặt: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="mat"
                                value="<?php echo $ctsp['mat'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Tính năng cho sức khoẻ: </th>
                        <td class="was-validated">
                            <textarea name="tinhnang_suckhoe" id="" cols="20" rows="6" class='form-control input_table'
                                style="resize: none;" required><?php echo $ctsp['tinhnang_suckhoe'] ?></textarea>
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
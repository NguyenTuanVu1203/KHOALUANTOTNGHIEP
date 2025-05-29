<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>sanpham/sp_chitiet_laptop">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin chi tiết: Laptop
        </div>
        <?php
      foreach ($data['sp_chitiet_ma'] as $key => $ctsp){
        ?>
        <form action="<?php echo BASE_URL ?>sanpham/sp_chitiet_laptop_update/<?php echo $ctsp['ma_ctsp'] ?>"
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
                        <th scope="row" class="title_table">CPU: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="cpu"
                                value="<?php echo $ctsp['cpu'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">RAM: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="ram"
                                value="<?php echo $ctsp['ram'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Ổ cứng: </th>
                        <td class="was-validated">
                            <textarea name="rom" id="" cols="20" rows="6" class='form-control input_table'
                                style="resize: none;" required><?php echo $ctsp['rom'] ?></textarea>
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
                        <th scope="row" class="title_table">Thiết kế: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="thietke"
                                value="<?php echo $ctsp['thietke'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Kích thước, trọng lượng: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="kichthuoc"
                                value="<?php echo $ctsp['kichthuoc'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Thời điểm ra mắt: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="thoidiem_ramat"
                                value="<?php echo $ctsp['thoidiem_ramat'] ?>">
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
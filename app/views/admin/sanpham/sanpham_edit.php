<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>sanpham/sanpham">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin sản phẩm
        </div>
        <?php
      foreach ($data['sanpham_ma'] as $key => $sp){
        ?>
        <form action="<?php echo BASE_URL ?>sanpham/sanpham_update/<?php echo $sp['ma_sp'] ?>" method="POST"
            autocomplete="off" enctype="multipart/form-data">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_sp"
                                value="<?php echo $sp['ten_sp'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Gía: </th>
                        <td class="was-validated">
                            <input type='number' class='form-control input_table' required name="gia_sp"
                                value="<?php echo $sp['gia_sp'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Số lượng: </th>
                        <td class="was-validated">
                            <input type='number' class='form-control input_table' required name="soluong_sp"
                                value="<?php echo $sp['soluong_sp'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Thông tin: </th>
                        <td class="was-validated">
                            <textarea name="thongtin_sp" id="" cols="60"
                                rows="10"><?php echo $sp['thongtin_sp'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Hình: </th>
                        <td class="was-validated">
                            <input type='file' name="hinh_sp">
                            <p>
                                <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                                    style="width: 10%;">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Hình chi tiết: </th>
                        <td class="was-validated">
                            <input type='file' name="hinhchitiet_sp">
                            <p>
                                <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinhchitiet_sp'] ?>"
                                    style="width: 10%;">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Tình trạng sản phẩm</th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="tinhtrang_sp">
                                <?php
                        if($sp['tinhtrang_sp'] == 1){
                          ?>
                                <option>Chọn</option>
                                <option value="1" selected>Sản phẩm mới ra mắt</option>
                                <option value="2">Sản phẩm độc quyền</option>
                                <?php
                        }else if($sp['tinhtrang_sp'] == 2){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Sản phẩm mới ra mắt</option>
                                <option value="2" selected>Sản phẩm độc quyền</option>
                                <?php
                        }else{
                          ?>
                                <option selected>Chọn</option>
                                <option value="1">Sản phẩm mới ra mắt</option>
                                <option value="2">Sản phẩm độc quyền</option>
                                <?php
                        }
                      ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Danh mục: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_dm">
                                <option>Chọn danh mục</option>
                                <?php
                      foreach ($data['danhmuc_sanpham'] as $key => $dm) {
                      ?>
                                <option <?php
                          if($sp['ma_dm'] == $dm['ma_dm']){
                            echo 'selected';
                          }
                        ?> value="<?php echo $dm['ma_dm'] ?>"><?php echo $dm['ten_dm'] ?></option>
                                <?php
                      }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Nhà cung cấp: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_ncc">
                                <option>Chọn nhà cung cấp</option>
                                <?php
                      foreach ($data['nhacungcap'] as $key => $ncc) {
                      ?>
                                <option <?php
                          if($sp['ma_ncc'] == $ncc['ma_ncc']){
                            echo 'selected';
                          }
                        ?> value="<?php echo $ncc['ma_ncc'] ?>"><?php echo $ncc['ten_ncc'] ?></option>
                                <?php
                      }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Loại sản phẩm: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_lsp">
                                <option>Chọn loại sản phẩm</option>
                                <?php
                      foreach ($data['loai_sanpham'] as $key => $lsp) {
                      ?>
                                <option <?php
                          if($sp['ma_lsp'] == $lsp['ma_lsp']){
                            echo 'selected';
                          }
                        ?> value="<?php echo $lsp['ma_lsp'] ?>"><?php echo $lsp['ten_lsp'] ?></option>
                                <?php
                      }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Thương hiệu: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_th">
                                <option>Chọn thương hiệu</option>
                                <?php
                      foreach ($data['thuonghieu'] as $key => $th) {
                      ?>
                                <option <?php
                          if($sp['ma_th'] == $th['ma_th']){
                            echo 'selected';
                          }
                        ?> value="<?php echo $th['ma_th'] ?>"><?php echo $th['ten_th'] ?></option>
                                <?php
                      }
                      ?>
                            </select>
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
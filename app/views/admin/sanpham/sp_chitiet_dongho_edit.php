<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>sanpham/sp_chitiet_dongho">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin chi tiết: Đồng hồ
        </div>
        <?php
      foreach ($data['sp_chitiet_ma'] as $key => $ctsp){
        ?>
        <form action="<?php echo BASE_URL ?>sanpham/sp_chitiet_dongho_update/<?php echo $ctsp['ma_ctsp'] ?>"
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
                                if ($ctsp['ma_sp'] == $sp['ma_sp']){
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
                        <th scope="row">Đối tượng sử dụng</th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="doituong_sudung">
                                <?php
                        if($ctsp['doituong_sudung'] == 1){
                          ?>
                                <option>Chọn</option>
                                <option value="1" selected>Nữ</option>
                                <option value="2">Nam</option>
                                <option value="3">Trẻ em</option>
                                <?php
                        } else if($ctsp['doituong_sudung'] == 2){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Nữ</option>
                                <option value="2" selected>Nam</option>
                                <option value="3">Trẻ em</option>
                                <?php
                        }else if($ctsp['doituong_sudung'] == 3){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Nữ</option>
                                <option value="2">Nam</option>
                                <option value="3" selected>Trẻ em</option>
                                <?php
                        }else{
                          ?>
                                <option>Chọn</option>
                                <option value="1">Nữ</option>
                                <option value="2">Nam</option>
                                <option value="3">Trẻ em</option>
                                <?php
                        }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Đường kính mặt: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="duongkinh_mat"
                                value="<?php echo $ctsp['duongkinh_mat'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Chất liệu mặt kinh</th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="chatlieu_kinh">
                                <?php
                        if($ctsp['chatlieu_kinh'] == 1){
                          ?>
                                <option>Chọn</option>
                                <option value="1" selected>Kính Sapphire</option>
                                <option value="2">Kính khoáng (Mineral)</option>
                                <option value="3">Nhựa Resin</option>
                                <?php
                        }else if($ctsp['chatlieu_kinh'] == 2){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Kính Sapphire</option>
                                <option value="2" selected>Kính khoáng (Mineral)</option>
                                <option value="3">Nhựa Resin</option>
                                <?php
                        }else if($ctsp['chatlieu_kinh'] == 3){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Kính Sapphire</option>
                                <option value="2">Kính khoáng (Mineral)</option>
                                <option value="3" selected>Nhựa Resin</option>
                                <?php
                        } else{
                          ?>
                                <option>Chọn</option>
                                <option value="1">Kính Sapphire</option>
                                <option value="2">Kính khoáng (Mineral)</option>
                                <option value="3">Nhựa Resin</option>
                                <?php
                        }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Chất liệu dây</th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="chatlieu_day">
                                <?php
                        if($ctsp['chatlieu_day'] == 1){
                          ?>
                                <option>Chọn</option>
                                <option value="1" selected>Da thật</option>
                                <option value="2">Da tổng hợp</option>
                                <option value="3">Gốm sứ (Ceramic)</option>
                                <option value="4">Thép không gỉ</option>
                                <option value="5">Kim loại</option>
                                <option value="6">Hợp kim</option>
                                <option value="7">Vải</option>
                                <option value="8">Silicone/Cao su</option>
                                <option value="9">Nhựa</option>
                                <?php
                        }else if($ctsp['chatlieu_day']==2){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Da thật</option>
                                <option value="2" selected>Da tổng hợp</option>
                                <option value="3">Gốm sứ (Ceramic)</option>
                                <option value="4">Thép không gỉ</option>
                                <option value="5">Kim loại</option>
                                <option value="6">Hợp kim</option>
                                <option value="7">Vải</option>
                                <option value="8">Silicone/Cao su</option>
                                <option value="9">Nhựa</option>
                                <?php
                        } else if($ctsp['chatlieu_day'] == 3){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Da thật</option>
                                <option value="2">Da tổng hợp</option>
                                <option value="3" selected>Gốm sứ (Ceramic)</option>
                                <option value="4">Thép không gỉ</option>
                                <option value="5">Kim loại</option>
                                <option value="6">Hợp kim</option>
                                <option value="7">Vải</option>
                                <option value="8">Silicone/Cao su</option>
                                <option value="9">Nhựa</option>
                                <?php
                        } else if($ctsp['chatlieu_day'] == 4){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Da thật</option>
                                <option value="2">Da tổng hợp</option>
                                <option value="3">Gốm sứ (Ceramic)</option>
                                <option value="4" selected>Thép không gỉ</option>
                                <option value="5">Kim loại</option>
                                <option value="6">Hợp kim</option>
                                <option value="7">Vải</option>
                                <option value="8">Silicone/Cao su</option>
                                <option value="9">Nhựa</option>
                                <?php
                        } else if($ctsp['chatlieu_day'] == 5){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Da thật</option>
                                <option value="2">Da tổng hợp</option>
                                <option value="3">Gốm sứ (Ceramic)</option>
                                <option value="4">Thép không gỉ</option>
                                <option value="5" selected>Kim loại</option>
                                <option value="6">Hợp kim</option>
                                <option value="7">Vải</option>
                                <option value="8">Silicone/Cao su</option>
                                <option value="9">Nhựa</option>
                                <?php
                        } else if($ctsp['chatlieu_day'] == 6){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Da thật</option>
                                <option value="2">Da tổng hợp</option>
                                <option value="3">Gốm sứ (Ceramic)</option>
                                <option value="4">Thép không gỉ</option>
                                <option value="5">Kim loại</option>
                                <option value="6" selected>Hợp kim</option>
                                <option value="7">Vải</option>
                                <option value="8">Silicone/Cao su</option>
                                <option value="9">Nhựa</option>
                                <?php
                        }else if($ctsp['chatlieu_day'] == 7){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Da thật</option>
                                <option value="2">Da tổng hợp</option>
                                <option value="3">Gốm sứ (Ceramic)</option>
                                <option value="4">Thép không gỉ</option>
                                <option value="5">Kim loại</option>
                                <option value="6">Hợp kim</option>
                                <option value="7" selected>Vải</option>
                                <option value="8">Silicone/Cao su</option>
                                <option value="9">Nhựa</option>
                                <?php
                        }else if($ctsp['chatlieu_day'] == 8){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Da thật</option>
                                <option value="2">Da tổng hợp</option>
                                <option value="3">Gốm sứ (Ceramic)</option>
                                <option value="4">Thép không gỉ</option>
                                <option value="5">Kim loại</option>
                                <option value="6">Hợp kim</option>
                                <option value="7">Vải</option>
                                <option value="8" selected>Silicone/Cao su</option>
                                <option value="9">Nhựa</option>
                                <?php
                        }else if($ctsp['chatlieu_day'] == 8){
                          ?>
                                <option>Chọn</option>
                                <option value="1">Da thật</option>
                                <option value="2">Da tổng hợp</option>
                                <option value="3">Gốm sứ (Ceramic)</option>
                                <option value="4">Thép không gỉ</option>
                                <option value="5">Kim loại</option>
                                <option value="6">Hợp kim</option>
                                <option value="7">Vải</option>
                                <option value="8">Silicone/Cao su</option>
                                <option value="9" selected>Nhựa</option>
                                <?php
                        } else{
                          ?>
                                <option>Chọn</option>
                                <option value="1">Da thật</option>
                                <option value="2">Da tổng hợp</option>
                                <option value="3">Gốm sứ (Ceramic)</option>
                                <option value="4">Thép không gỉ</option>
                                <option value="5">Kim loại</option>
                                <option value="6">Hợp kim</option>
                                <option value="7">Vải</option>
                                <option value="8">Silicone/Cao su</option>
                                <option value="9">Nhựa</option>
                                <?php
                        }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Chống nước: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="chongnuoc"
                                value="<?php echo $ctsp['chongnuoc'] ?>">
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
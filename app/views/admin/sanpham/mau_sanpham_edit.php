<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>sanpham/mau_sanpham">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật màu cho sản phẩm
        </div>
        <?php
      foreach ($data['mau_sanpham_ma'] as $key => $msp){
        ?>
        <form
            action="<?php echo BASE_URL ?>sanpham/mau_sanpham_update/<?php echo $msp['ma_sp'] ?>/<?php echo $msp['ma_m'] ?>"
            method="POST" autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Sản phẩm: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_sp">
                                <option>Chọn sản phẩm</option>
                                <?php
                        foreach ($data['sanpham'] as $key => $sp){
                          ?>
                                <option <?php
                                if($msp['ma_sp'] == $sp['ma_sp']){
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
                        <th scope="row">Màu: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_m">
                                <option>Chọn màu</option>
                                <?php
                        foreach ($data['mau'] as $key => $m){
                          ?>
                                <option <?php
                                if($msp['ma_m'] == $m['ma_m']){
                                  echo 'selected';
                                }
                              ?> value="<?php echo $m['ma_m'] ?>"><?php echo $m['ten_m'] ?></option>
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
</div>
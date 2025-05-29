<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>donhang/donhang">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Bảo hành
        </div>
        <?php
      foreach ($data['donhang_ma'] as $key => $dh_ma){
        ?>
        <form action="<?php echo BASE_URL ?>baohanh/baohanh_insert" method="POST" autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Mã đơn hàng: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_dh">
                                <option>Chọn mã đơn hàng</option>
                                <?php
                        foreach ($data['donhang'] as $key => $dh){
                          ?>
                                <option <?php
                                if($dh_ma['ma_dh'] == $dh['ma_dh']){
                                  echo 'selected';
                                }
                              ?> value="<?php echo $dh['ma_dh'] ?>"><?php echo $dh['ma_dh'] ?>
                                </option>
                                <?php
                        }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Sản phẩm: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_sp">
                                <option>Chọn sản phẩm</option>
                                <?php
                        foreach ($data['sanpham_donhang'] as $key => $sp){
                          ?>
                                <option value="<?php echo $sp['ma_sp'] ?>">
                                    <?php echo $sp['ten_sp'].' - '.$sp['ten_m'] .' - '.$sp['soluong_dat'].' - '. number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>'  ?>
                                </option>
                                <?php
                        }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Nội dung: </th>
                        <td class="was-validated">
                            <textarea name="noidung_bh" id="" cols="60" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="insert_dmtt">
                                <i class="fas fa-plus-square"></i>
                                Thêm
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
    CKEDITOR.replace('noidung_bh');
    </script>
    <!--  -->
</div>
<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>baohanh/baohanh_list">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Sửa thông tin bảo hành
        </div>
        <?php
      foreach ($data['baohanh_ma'] as $key => $bh_ma){
        ?>
        <form action="<?php echo BASE_URL ?>baohanh/baohanh_update/<?php echo $bh_ma['ma_bh'] ?>" method="POST"
            autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Mã đơn hàng: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="ma_dh"
                                value="<?php echo $bh_ma['ma_dh'] ?>" readonly>
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
                                <option <?php
                                if($sp['ma_sp'] == $bh_ma['ma_sp']){
                                  echo 'selected';
                                }
                              ?> value="<?php echo $sp['ma_sp'] ?>">
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
                            <textarea name="noidung_bh" id="" cols="60" rows="10">
                      <?php echo $bh_ma['noidung_bh'] ?>
                    </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="update_dmth">
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
    <script src="<?php echo BASE_URL ?>public/assets\js\vendor.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\libs\morris-js\morris.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\libs\raphael\raphael.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\js\pages\dashboard.init.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\js\app.min.js"></script>
    <!-- trình soạn thảo  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('noidung_bh');
    </script>
    <!--  -->
</div>
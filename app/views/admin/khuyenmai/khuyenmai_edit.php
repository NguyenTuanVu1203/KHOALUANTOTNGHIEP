<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>khuyenmai/khuyenmai">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin khuyến mãi
        </div>
        <?php
      foreach ($data['khuyenmai_ma'] as $key => $km){
        ?>
        <form action="<?php echo BASE_URL ?>khuyenmai/khuyenmai_update/<?php echo $km['ma_km'] ?>" method="POST"
            autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_km"
                                value="<?php echo $km['ten_km'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Phần trăm khuyến mãi: </th>
                        <td class="was-validated">
                            <input type='number' class='form-control input_table' min="0" required name="phantram_km"
                                value="<?php echo $km['phantram_km'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Điều kiện khuyến mãi: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="dieukien_km"
                                value="<?php echo $km['dieukien_km'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Thời gian bắt đầu khuyến mãi </th>
                        <td class="was-validated">
                            <input type='date' class='form-control input_table' required autofocus name="batdau_km"
                                value="<?php echo $km['batdau_km'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Thời gian kết thúc khuyến mãi </th>
                        <td class="was-validated">
                            <input type='date' class='form-control input_table' required autofocus name="ketthuc_km"
                                value="<?php echo $km['ketthuc_km'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Số lượng khuyến mãi: </th>
                        <td class="was-validated">
                            <input type='number' class='form-control input_table' min="0" required autofocus
                                name="soluong_km" value="<?php echo $km['soluong_km'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Danh mục: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="loai_km">
                                <?php
                        if($km['loai_km'] == 1){
                          ?>
                                <option value="1" selected>Khuyến mãi vận chuyển</option>
                                <option value="2">Khuyến mãi giảm giá</option>
                                <?php
                        }else if($km['loai_km'] == 2){
                          ?>
                                <option value="1">Khuyến mãi vận chuyển</option>
                                <option value="2" selected>Khuyến mãi giảm giá</option>
                                <?php
                        }else{
                          ?>
                                <option value="1">Khuyến mãi vận chuyển</option>
                                <option value="2">Khuyến mãi giảm giá</option>
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
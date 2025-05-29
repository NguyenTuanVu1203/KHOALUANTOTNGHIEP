<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>nhanvien/nhanvien">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin nhân viên
        </div>
        <?php
      foreach ($data['nhanvien_ma'] as $key => $nv){
        ?>
        <form action="<?php echo BASE_URL ?>nhanvien/nhanvien_update/<?php echo $nv['ma_nv'] ?>" method="POST"
            autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_nv"
                                value="<?php echo $nv['ten_nv'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Số điện thoại: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required
                                pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" maxlength="10"
                                name="sdt_nv" value="<?php echo $nv['sdt_nv'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Địa chỉ: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="diachi_nv" minlength="5"
                                value="<?php echo $nv['diachi_nv'] ?>">
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
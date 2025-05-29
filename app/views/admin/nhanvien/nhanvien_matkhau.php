<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>nhanvien/nhanvien">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật mật khẩu nhân viên
        </div>
        <?php
      foreach ($data['nhanvien_ma'] as $key => $nv){
        ?>
        <form action="<?php echo BASE_URL ?>nhanvien/nhanvien_update_matkhau/<?php echo $nv['ma_nv'] ?>" method="POST"
            autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_nv"
                                value="<?php echo $nv['ten_nv'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Mật khẩu cũ </th>
                        <td class="was-validated">
                            <input type='password' class='form-control input_table' required name="pass_cu">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Mật khẩu mới: </th>
                        <td class="was-validated">
                            <input type='password' class='form-control input_table' required name="pass_moi"
                                minlength="5">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold">
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
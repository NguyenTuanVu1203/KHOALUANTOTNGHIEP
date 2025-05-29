<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>thuonghieu/thuonghieu">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin thương hiệu
        </div>
        <?php
      foreach ($data['thuonghieu_ma'] as $key => $th){
        ?>
        <form action="<?php echo BASE_URL ?>thuonghieu/thuonghieu_update/<?php echo $th['ma_th'] ?>" method="POST"
            autocomplete="off" enctype="multipart/form-data">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_th"
                                value="<?php echo $th['ten_th'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Logo: </th>
                        <td class="was-validated">
                            <input type='file' name="logo_th">
                            <p>
                                <img style="width: 10%;"
                                    src="<?php echo BASE_URL ?>public/uploads/thuonghieu/<?php echo $th['logo_th'] ?>"
                                    alt="">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Hình: </th>
                        <td class="was-validated">
                            <input type='file' name="hinh_th">
                            <p>
                                <img style="width: 10%;"
                                    src="<?php echo BASE_URL ?>public/uploads/thuonghieu/<?php echo $th['hinh_th'] ?>"
                                    alt="">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="update_th">
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
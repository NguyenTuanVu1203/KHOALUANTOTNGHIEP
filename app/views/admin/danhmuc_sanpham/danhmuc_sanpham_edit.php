<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>danhmuc_sanpham/danhmuc_sanpham">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin danh mục
        </div>
        <?php
      foreach ($data['danhmuc_sanpham_ma'] as $key => $dm){
        ?>
        <form action="<?php echo BASE_URL ?>danhmuc_sanpham/danhmuc_sanpham_update/<?php echo $dm['ma_dm'] ?>"
            method="POST" autocomplete="off" enctype="multipart/form-data">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_dm"
                                value="<?php echo $dm['ten_dm'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Mã màu: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="mamau_dm"
                                value="<?php echo $dm['mamau_dm'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Hình: </th>
                        <td class="was-validated">
                            <input type='file' name="hinh_dm">
                            <p>
                                <img style="width: 10%;"
                                    src="<?php echo BASE_URL ?>public/uploads/danhmuc/<?php echo $dm['hinh_dm'] ?>"
                                    alt="">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="update_dm">
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
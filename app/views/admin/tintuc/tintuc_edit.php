<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>tintuc/tintuc">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật tin tức
        </div>
        <?php
      foreach ($data['tintuc_ma'] as $key => $tt){
        ?>
        <form action="<?php echo BASE_URL ?>tintuc/tintuc_update/<?php echo $tt['ma_tt'] ?>" method="POST"
            autocomplete="off" enctype="multipart/form-data">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_tt"
                                value="<?php echo $tt['ten_tt'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Danh mục tin tức: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_dmtt">
                                <option>Chọn danh mục</option>
                                <?php
                        foreach ($data['danhmuc_tintuc'] as $key => $dmtt){
                          ?>
                                <option <?php
                                if($tt['ma_dmtt'] == $dmtt['ma_dmtt']){
                                  echo "selected";
                                }
                              ?> value="<?php echo $dmtt['ma_dmtt'] ?>"><?php echo $dmtt['ten_dmtt'] ?></option>
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
                        foreach ($data['thuonghieu'] as $key => $th){
                          ?>
                                <option <?php
                                if($tt['ma_th'] == $th['ma_th']){
                                  echo "selected";
                                }
                              ?> value="<?php echo $th['ma_th'] ?>"><?php echo $th['ten_th'] ?></option>
                                <?php
                        }
                      ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Hình: </th>
                        <td class="was-validated">
                            <input type='file' name="hinh_tt">
                            <p>
                                <img style="width: 10%;"
                                    src="<?php echo BASE_URL ?>public/uploads/tintuc/<?php echo $tt['hinh_tt'] ?>"
                                    alt="">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Nội dung: </th>
                        <td class="was-validated">
                            <textarea name="noidung_tt" id="" cols="60"
                                rows="10"><?php echo $tt['noidung_tt'] ?></textarea>
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
    <!-- trình soạn thảo  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('noidung_tt');
    </script>
    <!--  -->
</div>
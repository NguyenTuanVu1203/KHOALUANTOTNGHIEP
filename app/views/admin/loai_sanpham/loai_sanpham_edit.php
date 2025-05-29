<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>loai_sanpham/loai_sanpham">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin loại sản phẩm
        </div>
        <?php
      foreach ($data['loai_sanpham_ma'] as $key => $lsp){
        ?>
        <form action="<?php echo BASE_URL ?>loai_sanpham/loai_sanpham_update/<?php echo $lsp['ma_lsp'] ?>" method="POST"
            autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_lsp"
                                value="<?php echo $lsp['ten_lsp'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Danh mục: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_dm">
                                <option>Chọn danh mục</option>
                                <?php
                        foreach ($data['danhmuc_sanpham'] as $key => $dm){
                          ?>
                                <option <?php
                              if($lsp['ma_dm'] == $dm['ma_dm']){
                                echo 'selected';
                              }
                            ?> value="<?php echo $dm['ma_dm'] ?>"><?php echo $dm['ten_dm'] ?></option>
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
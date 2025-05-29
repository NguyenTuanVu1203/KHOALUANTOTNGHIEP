<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            Thêm thông tin danh mục - thương hiệu
        </div>
        <form action="<?php echo BASE_URL ?>danhmuc_thuonghieu/danhmuc_thuonghieu_insert" method="POST"
            autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Danh mục: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_dm">
                                <option>Chọn danh mục</option>
                                <?php
                  foreach ($data['danhmuc_sanpham'] as $key => $dm){
                    ?>
                                <option value="<?php echo $dm['ma_dm'] ?>"><?php echo $dm['ten_dm'] ?></option>
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
                                <option value="<?php echo $th['ma_th'] ?>"><?php echo $th['ten_th'] ?></option>
                                <?php
                  }
                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="insert_dmth">
                                <i class="fas fa-plus-square"></i>
                                Thêm
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div class="alert alert-success title_page" role="alert">
            <div class="row">
                <div class="col-6 mt-2">
                    Thông tin danh mục - thương hiệu
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>danhmuc_thuonghieu/danhmuc_thuonghieu_timkiem"
                        method="POST">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="tukhoa">
                        <button class="btn btn-success btn_search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="tr_table">
                    <th scope="col">STT</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Thương hiệu</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i=0;
          foreach($data['danhmuc_thuongieu'] as $key => $dmth){
            $i++;
            ?>
                <tr>
                    <th scope="row" style="width:10% ;"><?php echo $i ?></th>
                    <td style="width:30% ;"> <?php echo $dmth['ten_dm'] ?></td>
                    <td style="width:30% ;"><?php echo $dmth['ten_th'] ?></td>
                    <td style="width:30% ;">
                        <a
                            href="<?php echo BASE_URL ?>danhmuc_thuonghieu/danhmuc_thuonghieu_edit/<?php echo $dmth['ma_dm'] ?>/<?php echo $dmth['ma_th'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa thương hiệu <?php echo $dmth['ten_th'] ?> thuộc danh mục <?php echo $dmth['ten_dm'] ?> không?')"
                            href="<?php echo BASE_URL ?>danhmuc_thuonghieu/danhmuc_thuonghieu_delete/<?php echo $dmth['ma_dm'] ?>/<?php echo $dmth['ma_th'] ?>">
                            <button type="button" class="btn xoa">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php
          }
          echo '<p class="text-warning" style="font-weight: bold;">Tổng: '.$i.'</p>';
          $level=session::get('level');
          if($level == 1){
            ?>
                <a onclick="return confirm('Bạn có muốn xóa tất cả không?')"
                    href="<?php echo BASE_URL ?>danhmuc_thuonghieu/danhmuc_thuonghieu_deleteAll">
                    <button type="button" class="btn"
                        style="background-color: red; font-weight: bold; margin-bottom: 10px;">
                        <i class="fas fa-trash-alt"></i> Xoá tất cả
                    </button>
                </a>
                <?php
          }
        ?>
            </tbody>
        </table>
    </div>
    <!-- Vendor js -->
    <script src="<?php echo BASE_URL ?>public/assets\js\vendor.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\libs\morris-js\morris.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\libs\raphael\raphael.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\js\pages\dashboard.init.js"></script>
    <!-- App js -->
    <script src="<?php echo BASE_URL ?>public/assets\js\app.min.js"></script>
</div>
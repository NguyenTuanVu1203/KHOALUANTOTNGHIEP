<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            Thêm thông tin danh mục
        </div>
        <form action="<?php echo BASE_URL ?>danhmuc_tintuc/danhmuc_tintuc_insert" method="POST" autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_dmtt">
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
        <div class="alert alert-success title_page" role="alert">
            <div class="row">
                <div class="col-6 mt-2">
                    Thông tin danh mục
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>danhmuc_tintuc/danhmuc_tintuc_timkiem"
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
                    <th scope="col">Mã danh mục</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i=0;
          foreach($data['danhmuc_tintuc'] as $key => $dmtt){
            $i++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $dmtt['ma_dmtt'] ?></td>
                    <td><?php echo $dmtt['ten_dmtt'] ?></td>
                    <td>
                        <a
                            href="<?php echo BASE_URL ?>danhmuc_tintuc/danhmuc_tintuc_edit/<?php echo $dmtt['ma_dmtt'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa <?php echo $dmtt['ten_dmtt'] ?> không?')"
                            href="<?php echo BASE_URL ?>danhmuc_tintuc/danhmuc_tintuc_delete/<?php echo $dmtt['ma_dmtt'] ?>">
                            <button type="button" class="btn xoa">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </a>
                        <?php
                    if($dmtt['tinhtrang_dmtt'] == 0){
                      ?>
                        <a
                            href="<?php echo BASE_URL ?>danhmuc_tintuc/danhmuc_tintuc_tuychinh/<?php echo $dmtt['ma_dmtt'] ?>/1">
                            <button type="button" class="btn an">
                                Ẩn
                            </button>
                        </a>
                        <?php
                    }else if($dmtt['tinhtrang_dmtt'] == 1){
                      ?>
                        <a
                            href="<?php echo BASE_URL ?>danhmuc_tintuc/danhmuc_tintuc_tuychinh/<?php echo $dmtt['ma_dmtt'] ?>/0">
                            <button type="button" class="btn hien">
                                Hiện
                            </button>
                        </a>
                        <?php
                    }
                  ?>
                    </td>
                </tr>
                <?php
          }
          echo '<p class="text-warning" style="font-weight: bold;">Tổng: '.$i.'</p>';
          $level=session::get('level');
          if($level == 1){
            ?>
                <a onclick="return confirm('Bạn có muốn xóa tất cả không?')"
                    href="<?php echo BASE_URL ?>danhmuc_tintuc/danhmuc_tintuc_deleteAll">
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
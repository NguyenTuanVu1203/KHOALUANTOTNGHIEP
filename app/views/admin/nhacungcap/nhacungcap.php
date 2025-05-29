<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            Thêm thông tin nhà cung cấp
        </div>
        <form action="<?php echo BASE_URL ?>nhacungcap/nhacungcap_insert" method="POST" autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_ncc">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Địa chỉ: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="diachi_ncc">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Sô điện thoại: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required
                                pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" maxlength="10"
                                name="sdt_ncc">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Email: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="email_ncc">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="insert_ncc">
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
                    Thông tin nhà cung cấp
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>nhacungcap/nhacungcap_timkiem" method="POST">
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
                    <th scope="col">Tên</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i=0;
          foreach($data['nhacungcap'] as $key => $ncc){
            $i++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $ncc['ten_ncc'] ?></td>
                    <td><?php echo $ncc['diachi_ncc'] ?></td>
                    <td><?php echo $ncc['sdt_ncc'] ?></td>
                    <td><?php echo $ncc['email_ncc'] ?></td>
                    <td>
                        <a href="<?php echo BASE_URL ?>nhacungcap/nhacungcap_edit/<?php echo $ncc['ma_ncc'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa <?php echo $ncc['ten_ncc'] ?> không?')"
                            href="<?php echo BASE_URL ?>nhacungcap/nhacungcap_delete/<?php echo $ncc['ma_ncc'] ?>">
                            <button type="button" class="btn xoa">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </a>
                        <?php
                    if($ncc['tinhtrang_ncc'] == 0){
                      ?>
                        <a href="<?php echo BASE_URL ?>nhacungcap/nhacungcap_tuychinh/<?php echo $ncc['ma_ncc'] ?>/1">
                            <button type="button" class="btn an">
                                Ẩn
                            </button>
                        </a>
                        <?php
                    }else if($ncc['tinhtrang_ncc'] == 1){
                      ?>
                        <a href="<?php echo BASE_URL ?>nhacungcap/nhacungcap_tuychinh/<?php echo $ncc['ma_ncc'] ?>/0">
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
                    href="<?php echo BASE_URL ?>nhacungcap/nhacungcap_deleteAll">
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
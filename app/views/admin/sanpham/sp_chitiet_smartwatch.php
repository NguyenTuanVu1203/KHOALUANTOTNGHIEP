<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            Thêm thông tin chi tiết: Smartwach
        </div>
        <form action="<?php echo BASE_URL ?>sanpham/sp_chitiet_smartwatch_insert" method="POST" autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Sản phẩm: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_sp">
                                <!-- <option>Chọn sản phẩm</option> -->
                                <?php
                  foreach ($data['sanpham_ma_dm'] as $key => $sp) {
                    ?>
                                <option value="<?php echo $sp['ma_sp'] ?>"><?php echo $sp['ten_sp'] ?></option>
                                <?php
                  }
                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Màn hình: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="manhinh">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Thời lượng pin: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="thoiluong_pin">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Kết nối với hệ điều hành: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="hedieuhanh">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Mặt: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="mat">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Tính năng cho sức khoẻ: </th>
                        <td class="was-validated">
                            <textarea name="tinhnang_suckhoe" id="" cols="20" rows="6" class='form-control input_table'
                                style="resize: none;" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Bộ sản phẩm: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="bo_sanpham">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="insert_sp">
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
                    Thông tin chi tiết: Smartwatch
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>sanpham/sp_chitiet_smartwatch_timkiem"
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
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Chi tiêt</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $i = 0;
        foreach ($data['sp_chitiet_smartwatch_list'] as $key => $ctsp) {
          $i++;
          ?>
                <tr>
                    <th scope="row" style="width: 10%;"><?php echo $i ?></th>
                    <td style="width: 30%;"><?php echo $ctsp['ten_sp'] ?></td>
                    <td style="width: 45%;">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work"
                                    data-offset="20" style="height: 100px; overflow: auto;">
                                    <p>
                                        <b>Màn hình:</b> <?php echo $ctsp['manhinh'] ?> <br>
                                        <b>Thời lượng pin:</b> <?php echo $ctsp['thoiluong_pin'] ?> <br>
                                        <b>Kết nối hệ điều hành:</b> <?php echo $ctsp['hedieuhanh'] ?> <br>
                                        <b>Mặt:</b> <?php echo $ctsp['mat'] ?> <br>
                                        <b>Tính năng cho sức khoẻ:</b> <?php echo $ctsp['tinhnang_suckhoe'] ?> <br>
                                        <b>Bộ sản phẩm:</b> <?php echo $ctsp['bo_sanpham'] ?> <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 15%;">
                        <a
                            href="<?php echo BASE_URL ?>sanpham/sp_chitiet_smartwatch_edit/<?php echo $ctsp['ma_ctsp'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa sản phẩm <?php echo $ctsp['ten_sp'] ?> không?')"
                            href="<?php echo BASE_URL ?>sanpham/sp_chitiet_smartwatch_delete/<?php echo $ctsp['ma_ctsp'] ?>">
                            <button type="button" class="btn xoa">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php
        }
        echo '<p class="text-warning" style="font-weight: bold;">Tổng: ' . $i . '</p>';
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
    <!-- trình soạn thảo  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('thongtin_sp');
    </script>
    <!--  -->
</div>
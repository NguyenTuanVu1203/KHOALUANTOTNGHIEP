<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            Thêm thông tin chi tiết: Laptop
        </div>
        <form action="<?php echo BASE_URL ?>sanpham/sp_chitiet_laptop_insert" method="POST" autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Sản phẩm: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_sp">
                                <option>Chọn sản phẩm</option>
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
                        <th scope="row" class="title_table">CPU: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="cpu">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">RAM: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="ram">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Ổ cứng: </th>
                        <td class="was-validated">
                            <textarea name="rom" id="" cols="20" rows="6" class='form-control input_table'
                                style="resize: none;" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Màn hình: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="manhinh">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Card màn hình: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="card_manhinh">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Cổng kết nối: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="cong_ketnoi">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Hệ điều hành: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="hedieuhanh">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Thiết kế: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="thietke">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Kích thước, trọng lượng: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="kichthuoc">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Thời điểm ra mắt: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="thoidiem_ramat">
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
                    Thông tin chi tiết: Laptop
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>sanpham/sp_chitiet_laptop_timkiem" method="POST">
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
        foreach ($data['sp_chitiet_laptop_list'] as $key => $ctsp) {
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
                                        <b>CPU:</b> <?php echo $ctsp['cpu'] ?> <br>
                                        <b>RAM:</b> <?php echo $ctsp['ram'] ?> <br>
                                        <b>Ổ cứng:</b> <?php echo $ctsp['rom'] ?> <br>
                                        <b>Màn hình:</b> <?php echo $ctsp['manhinh'] ?> <br>
                                        <b>Card màn hình:</b> <?php echo $ctsp['card_manhinh'] ?> <br>
                                        <b>Cổng kết nối:</b> <?php echo $ctsp['cong_ketnoi'] ?> <br>
                                        <b>Hệ điều hành:</b> <?php echo $ctsp['hedieuhanh'] ?> <br>
                                        <b>Thiết kế:</b> <?php echo $ctsp['thietke'] ?> <br>
                                        <b>Kích thước, trọng lượng:</b> <?php echo $ctsp['kichthuoc'] ?> <br>
                                        <b>Thời điểm ra mắt:</b> <?php echo $ctsp['thoidiem_ramat'] ?> <br>
                                        <b>Bộ sản phẩm:</b> <?php echo $ctsp['bo_sanpham'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 15%;">
                        <a href="<?php echo BASE_URL ?>sanpham/sp_chitiet_laptop_edit/<?php echo $ctsp['ma_ctsp'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa sản phẩm <?php echo $ctsp['ten_sp'] ?> không?')"
                            href="<?php echo BASE_URL ?>sanpham/sp_chitiet_laptop_delete/<?php echo $ctsp['ma_ctsp'] ?>">
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
<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            Thêm thông tin chi tiết: Máy tính để bàn
        </div>
        <form action="<?php echo BASE_URL ?>sanpham/sp_chitiet_maytinh_insert" method="POST" autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Sản phẩm: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_sp">
                                <!-- <option>Chọn sản phâm</option> -->
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
                        <th scope="row" class="title_table">Công nghệ CPU: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="congnghe_cpu">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">RAM</th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ram">
                                <option>Chọn</option>
                                <option value="4">4GB</option>
                                <option value="8">8GB</option>
                                <option value="16">16GB</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Ổ cứng</th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="rom">
                                <option>Chọn</option>
                                <option value="256">SSD 256GB</option>
                                <option value="512">SSD 512GB</option>
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
                        <th scope="row" class="title_table">Kích thước: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="kichthuoc">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Bộ sản phẩm chuẩn: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="bo_sanpham">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="insert">
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
                    Thông tin chi tiết: Máy tính để bàn
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>sanpham/sp_chitiet_maytinh_timkiem"
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
        foreach ($data['sp_chitiet_maytinh_list'] as $key => $ctsp) {
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
                                        <b> Công nghệ CPU:</b> <?php echo $ctsp['congnghe_cpu'] ?> <br>
                                        <b>RAM:</b> <?php echo $ctsp['ram'].'GB' ?> <br>
                                        <b>Ổ cứng:</b> <?php echo 'SSD '.$ctsp['rom'].'GB' ?> <br>
                                        <b>Màn hình:</b> <?php echo $ctsp['manhinh'] ?> <br>
                                        <b>Card màn hình:</b> <?php echo $ctsp['card_manhinh'] ?> <br>
                                        <b>Cổng kết nối:</b> <?php echo $ctsp['cong_ketnoi'] ?> <br>
                                        <b>Hệ điều hành:</b> <?php echo $ctsp['hedieuhanh']?> <br>
                                        <b>Kích thước:</b> <?php echo $ctsp['kichthuoc'] ?> <br>
                                        <b>Bộ sản phẩm chuẩn:</b> <?php echo $ctsp['bo_sanpham'] ?> <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 15%;">
                        <a href="<?php echo BASE_URL ?>sanpham/sp_chitiet_maytinh_edit/<?php echo $ctsp['ma_ctsp'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa sản phẩm <?php echo $ctsp['ten_sp'] ?> không?')"
                            href="<?php echo BASE_URL ?>sanpham/sp_chitiet_maytinh_delete/<?php echo $ctsp['ma_ctsp'] ?>">
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
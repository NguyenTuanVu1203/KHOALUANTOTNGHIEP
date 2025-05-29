<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            Thêm thông tin sản phẩm
        </div>
        <form action="<?php echo BASE_URL ?>sanpham/sanpham_insert" method="POST" autocomplete="off"
            enctype="multipart/form-data">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="ten_sp">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Gía: </th>
                        <td class="was-validated">
                            <input type='number' class='form-control input_table' required name="gia_sp">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Số lượng: </th>
                        <td class="was-validated">
                            <input type='number' class='form-control input_table' required name="soluong_sp">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Thông tin: </th>
                        <td class="was-validated">
                            <textarea name="thongtin_sp" id="" cols="60" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Hình: </th>
                        <td class="was-validated">
                            <input type='file' name="hinh_sp">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Hình chi tiết: </th>
                        <td class="was-validated">
                            <input type='file' name="hinhchitiet_sp">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Tình trạng sản phẩm</th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="tinhtrang_sp">
                                <option>Chọn</option>
                                <option value="1">Sản phẩm mới ra mắt</option>
                                <option value="2">Sản phẩm độc quyền</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Danh mục: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_dm">
                                <option>Chọn danh mục</option>
                                <?php
                foreach ($data['danhmuc_sanpham'] as $key => $dm) {
                ?>
                                <option value="<?php echo $dm['ma_dm'] ?>"><?php echo $dm['ten_dm'] ?></option>
                                <?php
                }
                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Nhà cung cấp: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_ncc">
                                <option>Chọn nhà cung cấp</option>
                                <?php
                  foreach ($data['nhacungcap'] as $key => $ncc) {
                    ?>
                                <option value="<?php echo $ncc['ma_ncc'] ?>"><?php echo $ncc['ten_ncc'] ?></option>
                                <?php
                  }
                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Loại sản phẩm: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_lsp">
                                <option>Chọn loại sản phẩm</option>
                                <?php
                foreach ($data['loai_sanpham'] as $key => $lsp) {
                ?>
                                <option value="<?php echo $lsp['ma_lsp'] ?>"><?php echo $lsp['ten_lsp'] ?></option>
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
                foreach ($data['thuonghieu'] as $key => $th) {
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
                    Thông tin sản phẩm
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>sanpham/sanpham_timkiem" method="POST">
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
                    <th scope="col">Gía</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Chi tiết</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i = 0;
          foreach ($data['sanpham'] as $key => $sp) {
            $i++;
            ?>
                <tr>
                    <th scope="row" style="width: 5%;"><?php echo $i ?></th>
                    <td style="width: 5%;"><?php echo $sp['ten_sp'] ?></td>
                    <td style="width: 5%;">
                        <?php echo number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>'  ?></td>
                    <td style="width: 5%;"><?php echo $sp['soluong_sp'] ?></td>
                    <td style="width: 20%;">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work"
                                    data-offset="20" style="height: 100px; overflow: auto;">
                                    <p>
                                        <b> Danh mục sản phẩm:</b> <?php echo $sp['ten_dm'] ?> <br>
                                        <b>Thương hiệu:</b> <?php echo $sp['ten_th'] ?> <br>
                                        <b>Loại sản phẩm:</b> <?php echo $sp['ten_lsp'] ?> <br>
                                        <b>Nhà cung cấp:</b> <?php echo $sp['ten_ncc'] ?> <br>
                                        <b>Nhân viên:</b> <?php echo $sp['ten_nv'] ?> <br>
                                        <b>Tình trạng sản phẩm:</b>
                                        <?php
                            if($sp['tinhtrang_sp'] == 1){
                              echo 'Sản phẩm mới ra mắt';
                            }else if($sp['tinhtrang_sp'] == 2){
                              echo 'Sản phẩm độc quyền';
                            }else{
                              echo 'Sản phẩm mới';
                            }
                          ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 15%;">
                        <img style="width: 40%;"
                            src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>" alt="">
                    </td>
                    <td style="width: 15%;">
                        <a href="<?php echo BASE_URL ?>sanpham/sanpham_edit/<?php echo $sp['ma_sp'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa sản phẩm <?php echo $sp['ten_sp'] ?> không?')"
                            href="<?php echo BASE_URL ?>sanpham/sanpham_delete/<?php echo $sp['ma_sp'] ?>">
                            <button type="button" class="btn xoa">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php
          }
          echo '<p class="text-warning" style="font-weight: bold;">Tổng: ' . $i . '</p>';
          $level=session::get('level');
          if($level == 1){
            ?>
                <div class="row">
                    <div class="col-10">
                        <a onclick="return confirm('Bạn có muốn xóa tất cả không?')"
                            href="<?php echo BASE_URL ?>sanpham/sanpham_deleteAll">
                            <button type="button" class="btn"
                                style="background-color: red; font-weight: bold; margin-bottom: 10px;">
                                <i class="fas fa-trash-alt"></i> Xoá tất cả
                            </button>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="<?php echo BASE_URL ?>sanpham/sanpham_sort/ASC">
                            <button type="button" class="btn btn-warning">Gía &ensp; <i
                                    class="fa-solid fa-angles-up"></i></button>
                        </a>
                        <a href="<?php echo BASE_URL ?>sanpham/sanpham_sort/DESC">
                            <button type="button" class="btn btn-warning">Gía &ensp; <i
                                    class="fa-solid fa-angles-down"></i></button>
                        </a>
                    </div>
                </div>

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
    <!-- trình soạn thảo  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('thongtin_sp');
    </script>
    <!--  -->
</div>
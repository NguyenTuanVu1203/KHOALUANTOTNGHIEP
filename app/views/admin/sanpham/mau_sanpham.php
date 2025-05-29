<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            Thêm màu cho sản phẩm
        </div>
        <form action="<?php echo BASE_URL ?>sanpham/mau_sanpham_insert" method="POST" autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Sản phẩm: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_sp">
                                <?php
                  foreach ($data['sanpham'] as $key => $sp){
                    ?>
                                <option value="<?php echo $sp['ma_sp'] ?>"><?php echo $sp['ten_sp'] ?></option>
                                <?php
                  }
                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Màu: </th>
                        <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_m">
                                <option>Chọn màu</option>
                                <?php
                  foreach ($data['mau'] as $key => $m){
                    ?>
                                <option value="<?php echo $m['ma_m'] ?>"><?php echo $m['ten_m'] ?></option>
                                <?php
                  }
                ?>
                            </select>
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
                    Màu của sản phẩm
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>sanpham/mau_sanpham_timkiem" method="POST">
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
                    <th scope="col">Màu</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i=0;
          foreach($data['mau_sanpham_list'] as $key => $msp){
            $i++;
            ?>
                <tr>
                    <th scope="row" style="width:10% ;"><?php echo $i ?></th>
                    <td style="width:30% ;"> <?php echo $msp['ten_sp'] ?></td>
                    <td style="width:30% ;"><?php echo $msp['ten_m'] ?></td>
                    <td style="width:30% ;">
                        <a
                            href="<?php echo BASE_URL ?>sanpham/mau_sanpham_edit/<?php echo $msp['ma_sp'] ?>/<?php echo $msp['ma_m'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa màu <?php echo $msp['ten_m'] ?>  của sản phẩm <?php echo $msp['ten_sp'] ?> không?')"
                            href="<?php echo BASE_URL ?>sanpham/mau_sanpham_delete/<?php echo $msp['ma_sp'] ?>/<?php echo $msp['ma_m'] ?>">
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
                    href="<?php echo BASE_URL ?>sanpham/mau_sanpham_deleteAll">
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
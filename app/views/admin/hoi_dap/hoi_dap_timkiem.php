<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <div class="row">
                <div class="col-6 mt-2">
                    <a href="<?php echo BASE_URL ?>hoi_dap/hoi_dap_list">
                        <button type="button" class="btn btn-warning">
                            <i class="fas fa-solid fa-caret-left"></i>&ensp;
                        </button> &ensp;
                    </a>
                    Hỏi đáp
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>hoi_dap/hoi_dap_timkiem" method="POST">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="tukhoa">
                        <button class="btn btn-success btn_search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="tr_table text-center">
                    <th scope="col">Nội dung</th>
                    <th scope="col">Tên người gửi</th>
                    <th scope="col">Tên sản phẩm</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i=0;
          $ma_nv = session::get('ma_nv');
          foreach($data['hoi_dap_timkiem'] as $key => $hd){
            $i++;
            ?>
                <tr>
                    <?php
                    if($hd['status'] == 0 && $hd['parent'] == 0){
                      ?>
                    <td style="width:50% ;">
                        <?php echo $hd['noidung_hd'] ?>
                        <?php
                            foreach($data['hoi_dap_timkiem'] as $key => $hd1){
                              if($hd1['parent'] == $hd['ma_hd'] && $hd1['status'] !=0){
                                ?>
                        <p style="color:black ; font-weight:bold ;"><?php echo $hd1['noidung_hd'] ?></p>
                        <?php
                              }
                            }
                          ?>
                        <form action="<?php echo BASE_URL ?>hoi_dap/hoi_dap_insert_admin" method="post">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <input type="hidden" name="ma_sp" class="form-control"
                                        value="<?php echo $hd['ma_sp'] ?>">
                                    <input type="hidden" name="parent" class="form-control"
                                        value="<?php echo $hd['ma_hd'] ?>">
                                    <input type="hidden" name="ma_nv" value="<?php echo $ma_nv ?>" class="form-control">
                                    <textarea class="form-control" name="noidung_hd" rows="3"></textarea>
                                    <button type="submit" class="btn btn-primary mt-3 float-end">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td style="width:20% ;"><?php echo $hd['ten_k'] ?></td>
                    <td style="width:30% ;">
                        <a
                            href="<?php echo BASE_URL ?><?php echo $hd['ghichu_hd'] ?>/chitiet_sanpham/<?php echo $hd['ma_sp'] ?>/<?php echo $hd['ma_th'] ?>/<?php echo $hd['ma_dm'] ?>">
                            <button type="button" class="btn btn-warning" style="font-weight: bold;">
                                <?php echo $hd['ten_sp'] ?>
                            </button>
                        </a>
                    </td>
                    <?php
                    }
                    
                  ?>
                </tr>
                <?php
            
          }
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
<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <div class="row">
                <div class="col-6 mt-2">
                    Thông tin bảo hành
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>baohanh/baohanh_timkiem" method="POST"
                        autocomplete="off">
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
                    <th scope="col">Thông tin khách</th>
                    <th scope="col">Thông tin đơn hàng</th>
                    <th scope="col">Nội dung bảo hành</th>
                    <th scope="col">Ngày bảo hành</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i = 0;
          foreach ($data['baohanh_list'] as $key => $bh){
            $i ++;
            ?>
                <tr>
                    <th scope="row" style="width: 5%;"><?php echo $i ?></th>
                    <td style="width: 25%;">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work"
                                    data-offset="20" style="height: 100px; overflow: auto;">
                                    <p>
                                        <b>Tên:</b> <?php echo $bh['ten_k'] ?> <br>
                                        <b>Số điện thoại:</b> <?php echo $bh['sdt_k'] ?> <br>
                                        <b>Giới tính:</b>
                                        <?php
                              if($bh['gioitinh_k'] == 1){
                                echo 'Nam';
                              } else if($bh['gioitinh_k'] == 2){
                                echo 'Nữ';
                              } else{
                                echo '';
                              }
                            ?> <br>
                                        <b>Địa chỉ:</b> <?php echo $bh['diachi_k'] ?> <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 25%;">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work"
                                    data-offset="20" style="height: 100px; overflow: auto;">
                                    <p>
                                        <b>Mã đơn hàng:</b> <?php echo $bh['ma_dh'] ?> <br>
                                        <b>Tên sản phẩm:</b> <?php echo $bh['ten_sp'] ?> <br>
                                        <b>Số lượng đặt:</b> <?php echo $bh['soluong_dat'] ?> <br>
                                        <b>Thời gian bảo hành:</b> <?php echo $bh['thoigian_bh'] ?> <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 20%;"><?php echo $bh['noidung_bh'] ?></td>
                    <td style="width: 10%;"><?php echo $bh['ngay_bh'] ?></td>
                    <td style="width: 15%;">
                        <a
                            href="<?php echo BASE_URL ?>baohanh/baohanh_edit/<?php echo $bh['ma_bh'] ?>/<?php echo $bh['ma_dh'] ?>">
                            <button type="button" class="btn sua">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa không?')"
                            href="<?php echo BASE_URL ?>baohanh/baohanh_delete/<?php echo $bh['ma_bh'] ?>">
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
                    href="<?php echo BASE_URL ?>baohanh/baohanh_deleteAll">
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

</div>
<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            Đơn đang vận chuyển
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="tr_table">
                    <th scope="col">STT</th>
                    <th scope="col">Thông tin khách</th>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tổng giá</th>
                    <th scope="col">Thời gian đặt</th>
                    <th scope="col">Thời gian xử lý</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i = 0;
          foreach ($data['donhang_dangvanchuyen'] as $key => $dh){
            $i ++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work"
                                    data-offset="20" style="height: 100px; overflow: auto;">
                                    <p>
                                        <b>Tên:</b> <?php echo $dh['ten_k'] ?> <br>
                                        <b>Số điện thoại:</b> <?php echo $dh['sdt_k'] ?> <br>
                                        <b>Giới tính:</b>
                                        <?php
                              if($dh['gioitinh_k'] == 1){
                                echo 'Nam';
                              } else if($dh['gioitinh_k'] == 2){
                                echo 'Nữ';
                              } else{
                                echo '';
                              }
                            ?> <br>
                                        <b>Địa chỉ:</b> <?php echo $dh['diachi_k'] ?> <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><?php echo $dh['ma_dh'] ?></td>
                    <td><?php echo number_format($dh['tonggia_dh'], 0, ',', '.') . ' <sup>đ</sup>' ?></td>
                    <td><?php echo $dh['ngaylap_dh'].'  '.$dh['giolap_dh'] ?></td>
                    <td><?php echo $dh['ngay_xuly']?></td>
                    <td>
                        <a href="<?php echo BASE_URL ?>donhang/chitiet_donhang/<?php echo $dh['ma_dh'] ?>">
                            <button type="button" class="btn sua" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Chi tiết đơn hàng">
                                <i class="fa-solid fa-circle-info"></i>
                            </button>
                        </a>
                        <?php
                    if($dh['tinhtrang_dh'] == 0){
                      ?>
                        <a href="<?php echo BASE_URL ?>donhang/xuly/<?php echo $dh['ma_dh'] ?>">
                            <button type="button" class="btn moi" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Xử lý đơn hàng">
                                <i class="fa-solid fa-circle-plus"></i>
                            </button>
                        </a>
                        <a onclick="return confirm('Bạn có muốn huỷ đơn hàng không?')"
                            href="<?php echo BASE_URL ?>donhang/huy/<?php echo $dh['ma_dh'] ?>">
                            <button type="button" class="btn xoa" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Huỷ đơn hàng">
                                <i class="fa-solid fa-ban"></i>
                            </button>
                        </a>
                        <?php
                    }else if($dh['tinhtrang_dh'] == 1){
                      ?>

                        <a href="<?php echo BASE_URL ?>baohanh/baohanh/<?php echo $dh['ma_dh'] ?>">
                            <button type="button" class="btn baohanh" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Bảo hành">
                                <i class="fa-solid fa-file-shield"></i>
                            </button>
                        </a>
                        <?php
                    }else if($dh['tinhtrang_dh'] == 2){
                      ?>

                        <a href="<?php echo BASE_URL ?>baohanh/baohanh/<?php echo $dh['ma_dh'] ?>">
                            <button type="button" class="btn baohanh" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Bảo hành">
                                <i class="fa-solid fa-file-shield"></i>
                            </button>
                        </a>
                        <?php
                    }
                  ?>
                    </td>
                </tr>
                <?php
          }
          echo '<p class="text-warning" style="font-weight: bold;">Tổng: '.$i.' đơn hàng'.'</p>';
        ?>
            </tbody>
        </table>
    </div>
</div>
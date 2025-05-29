<div class="container lichsu_donhang mt-4">
    <?php
    foreach ($data['donhang_sdt'] as $key => $dh){
      ?>
    <p>Xin chào <b><?php echo $dh['ten_k'] ?> - <?php echo $dh['sdt_k'] ?></b></p>
    <?php
      break;
    }
  ?>
    <!-- <h2>LỊCH SỬ ĐƠN HÀNG</h2> -->
    <div class="alert alert-info mt-4" role="alert" style="text-align: center; font-weight: bold; font-size: 20px;">
        LỊCH SỬ ĐƠN HÀNG
    </div>
    <div class="mt-5">
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th scope="col">STT</th>
                    <th scope="col">Thời gian đặt hàng</th>
                    <th scope="col">Thời gian xử lý đặt hàng</th>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tổng giá</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i = 0;
          foreach ($data['donhang_sdt'] as $key => $dh){
            $i ++;
            ?>
                <tr style="color:
                <?php
                  if($dh['tinhtrang_dh'] == 0){
                    echo '#990000';
                  } else if($dh['tinhtrang_dh'] == 1){
                    echo '#003865';
                  }else {
                    echo 'black';
                  }
                ?> ; font-weight: bold ;">
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $dh['ngaylap_dh'].' '.$dh['giolap_dh'] ?></td>
                    <td><?php echo $dh['ngay_xuly']?></td>
                    <td><?php echo $dh['ma_dh'] ?></td>
                    <td><?php echo number_format($dh['tonggia_dh'], 0, ',', '.') . ' <sup>đ</sup>' ?></td>
                    <td>
                        <a href="<?php echo BASE_URL ?>index/lichsudonhang_chitiet/<?php echo $dh['ma_dh'] ?>">
                            <button type="button" class="btn btn-warning btn_chitiet" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Chi tiết đơn hàng">
                                <i class="fa-solid fa-circle-info"></i>
                            </button>
                        </a>
                        <?php
                    if($dh['tinhtrang_dh'] == 0){
                      ?>
                        <a onclick="return confirm('Bạn có muốn huỷ đơn hàng?')"
                            href="<?php echo BASE_URL ?>index/huy/<?php echo $dh['ma_dh'] ?>">
                            <button type="button" class="btn xoa">
                                <i class="fa-solid fa-ban"></i>
                            </button>
                        </a>
                        <?php
                    } else if($dh['tinhtrang_dh'] == 1){
                      ?>
                        <!-- <button type="button" class="btn vanchuyen" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Đang vận chuyển">
                          <i class="fa-solid fa-truck-fast"></i>
                        </button> -->
                        <a href="<?php echo BASE_URL ?>index/danhan/<?php echo $dh['ma_dh'] ?>">
                            <button type="button" class="btn danhan" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Xác nhận đã nhận hàng">
                                <i class="fa-solid fa-check-to-slot"></i>
                            </button>
                        </a>
                        <a href="<?php echo BASE_URL ?>index/baohanh/<?php echo $dh['ma_dh'] ?>">
                            <button type="button" class="btn baohanh" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Thông tin bảo hành">
                                <i class="fa-solid fa-file-shield"></i>
                            </button>
                        </a>
                        <?php
                    }else {
                      ?>
                        <a href="<?php echo BASE_URL ?>index/baohanh/<?php echo $dh['ma_dh'] ?>">
                            <button type="button" class="btn baohanh" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Thông tin bảo hành">
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
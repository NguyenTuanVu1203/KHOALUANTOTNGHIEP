<div class="container lichsudonhang_chitiet">
    <h2>CHI TIẾT ĐƠN HÀNG</h2>
    <form action="<?php echo BASE_URL ?>index/lichsu_donhang" method="POST">
        <?php
      foreach ($data['lichsudonhang_chitiet'] as $key => $dh){
        ?>
        <input type="hidden" style="border-radius:15px ;" class="form-control mt-4" name="sdt_k"
            value="<?php echo $dh['sdt_k'] ?>">
        <?php
            if(session::get('nhapmatkhau')){
              $matkhau_k = session::get('matkhau_k');
              ?>
        <input type="hidden" style="border-radius:15px ;" class="form-control mt-4" name="matkhau_k"
            value="<?php echo $matkhau_k ?>">
        <?php
            }
          ?>

        <?php
      }
    ?>
        <button type="submit" class="btn btn-success" style="font-weight: bold;">Quay lại</button>
    </form>
    <div class="mt-3">
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th scope="col">STT</th>
                    <th scope="col">Thông tin sản phẩm</th>
                    <th scope="col">Số lượng đặt</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Thời gian bảo hành</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i = 0;
          foreach ($data['lichsudonhang_chitiet'] as $key => $ctdh){
            $i ++;
            ?>
                <tr>
                    <th scope="row" style="width: 5%;"><?php echo $i ?></th>
                    <td style="width: 35%;">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work"
                                    data-offset="20" style="height: 100px; overflow: auto;">
                                    <p>
                                        <b>Tên:</b> <?php echo $ctdh['ten_sp'] ?> <br>
                                        <b>Gía: </b>
                                        <?php echo number_format($ctdh['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>' ?> <br>
                                        <b>Màu: </b> <?php echo $ctdh['ten_m'] ?> <br>
                                        <b>Hình:</b>
                                        <img style="width: 40%;"
                                            src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $ctdh['hinh_sp'] ?>">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 10%;"><?php echo $ctdh['soluong_dat'] ?></td>
                    <td style="width: 15%;">
                        <?php echo number_format($ctdh['gia_sp'] * $ctdh['soluong_dat'], 0, ',', '.') . ' <sup>đ</sup>' ?>
                    </td>
                    <td style="width: 25%;">
                        <?php echo $ctdh['thoigian_bh'] ?>
                    </td>
                    <td style="width: 10%;">
                        <?php if ($ctdh['tinhtrang_dh'] == 3): ?>
                        <?php if ($ctdh['tinhtrang_ctdh'] == 0): ?>
                        <a
                            href="<?= BASE_URL . $ctdh['ghichu_dm'] ?>/chitiet_sanpham_dg/<?= $ctdh['ma_sp'] ?>/<?= $ctdh['ma_th'] ?>/<?= $ctdh['ma_dm'] ?>/<?= $ctdh['ma_dh'] ?>">
                            <button type="button" class="btn btn-warning btn_chitiet" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Chi tiết sản phẩm">
                                <i class="fa-solid fa-star"></i> Đánh giá
                            </button>
                        </a>
                        <?php else: ?>
                        <a
                            href="<?= BASE_URL . $ctdh['ghichu_dm'] ?>/chitiet_sanpham/<?= $ctdh['ma_sp'] ?>/<?= $ctdh['ma_th'] ?>/<?= $ctdh['ma_dm'] ?>">
                            <button type="button" class="btn btn-warning btn_chitiet" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Chi tiết sản phẩm">
                                <i class="fa-solid fa-eye"></i> Chi tiết
                            </button>
                        </a>
                        <?php endif; ?>
                        <?php elseif ($ctdh['tinhtrang_dh'] == 2): ?>
                        <!-- Điều kiện mới tại đây -->
                        <a
                            href="<?= BASE_URL . $ctdh['ghichu_dm'] ?>/chitiet_sanpham_dg/<?= $ctdh['ma_sp'] ?>/<?= $ctdh['ma_th'] ?>/<?= $ctdh['ma_dm'] ?>/<?= $ctdh['ma_dh'] ?>">
                            <button type="button" class="btn btn-warning btn_chitiet" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Chi tiết sản phẩm">
                                <i class="fa-solid fa-star"></i> Đánh giá
                            </button>
                        </a>
                        <?php else: ?>
                        <a
                            href="<?= BASE_URL . $ctdh['ghichu_dm'] ?>/chitiet_sanpham/<?= $ctdh['ma_sp'] ?>/<?= $ctdh['ma_th'] ?>/<?= $ctdh['ma_dm'] ?>">
                            <button type="button" class="btn btn-warning btn_chitiet" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Chi tiết sản phẩm">
                                <i class="fa-solid fa-eye"></i> Chi tiết
                            </button>
                        </a>
                        <?php endif; ?>


                    </td>
                </tr>
                <?php
          }
          ?>
                <tr>
                    <td colspan="2" class="text-center" style="font-weight: bold; color:#EF5B0C ;">
                        Tạm tính:
                        <?php
                  if($ctdh['tonggia_dh'] < 2000000){
                    echo number_format($ctdh['tonggia_dh']-30000, 0, ',', '.') . ' <sup>đ</sup>';
                  }else if($ctdh['tonggia_dh'] >=2000000){
                    echo number_format($ctdh['tonggia_dh'], 0, ',', '.') . ' <sup>đ</sup>';
                  }
                ?>
                    </td>
                    <td colspan="2" style="color: #038018;">
                        <?php
                  if($ctdh['tonggia_dh'] >= 2000000){
                    ?>
                        Miễn phí vẫn chuyển
                        <?php
                  }else if($ctdh['tonggia_dh'] < 2000000){
                    ?>
                        Phí vận chuyển: 30.000 <sup>đ</sup>
                        <?php
                  }
                ?>
                    </td>
                    <td colspan="1" style="color: #ff5e14; font-weight: bold;">
                        Tổng:
                        <?php
                  echo number_format($ctdh['tonggia_dh'], 0, ',', '.') . ' <sup>đ</sup>';
                ?>
                    </td>
                </tr>
                <?php
        ?>
            </tbody>
        </table>
    </div>
</div>
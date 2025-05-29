<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>donhang/donhang">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Chi tiết đơn hàng
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="tr_table">
                    <th scope="col">STT</th>
                    <th scope="col">Thông tin sản phẩm</th>
                    <th scope="col">Số lượng đặt</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Thời gian bảo hành</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i = 0;
          foreach ($data['chitiet_donhang_madh'] as $key => $ctdh){
            $i ++;
            ?>
                <tr>
                    <th scope="row" style="width: 5%;"><?php echo $i ?></th>
                    <td style="width: 45%;">
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
                    <td style="width: 20%;">
                        <?php echo number_format($ctdh['gia_sp'] * $ctdh['soluong_dat'], 0, ',', '.') . ' <sup>đ</sup>' ?>
                    </td>
                    <td style="width: 25%;">
                        <?php echo $ctdh['thoigian_bh'] ?>
                    </td>
                </tr>
                <?php
          }
          ?>
                <tr>
                    <td colspan="2" class="text-center" style="font-weight: bold; color:#EF5B0C ;">
                        Tạm tính:
                        <?php
                  $tong = 0;
                  foreach ($data['chitiet_donhang_madh'] as $key => $ctdh){
                    $tong = $tong + ($ctdh['gia_sp']*$ctdh['soluong_dat']);
                  }
                  if($tong < 2000000){
                    echo number_format($tong-30000, 0, ',', '.') . ' <sup>đ</sup>';
                  }else if($tong > 2000000){
                    echo number_format($tong, 0, ',', '.') . ' <sup>đ</sup>';
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
                        <br>
                        <?php
                  $tong = 0;
                  $giamgia =0;
                  foreach ($data['chitiet_donhang_madh'] as $key => $ctdh){
                    $tong = $tong + ($ctdh['gia_sp']*$ctdh['soluong_dat']);
                  }
                  foreach ($data['chitiet_donhang_madh'] as $key => $ctdh){
                    if($ctdh['ma_km'] !=6){
                      $giamgia = ($tong*$ctdh['phantram_km'])/100;
                    }else{
                      $giamgia = 0;
                    }
                  }
                  ?>
                        <span style="font-weight: bold; color: #0D4C92;">Giảm giá:
                            <?php echo number_format($giamgia, 0, ',', '.') . ' <sup>đ</sup>' ?></span>
                        <?php
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
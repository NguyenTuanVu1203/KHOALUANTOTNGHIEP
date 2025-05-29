<div id="wrapper" class="container">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <div class="row">
                <h2>Thông tin bảo hành</h2>
            </div>
        </div>
        <div class="row mb-3">
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
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th scope="col">STT</th>
                    <th scope="col">Thông tin đơn hàng</th>
                    <th scope="col">Nội dung bảo hành</th>
                    <th scope="col">Ngày bảo hành</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $i = 0;
          foreach ($data['baohanh_ma_dh'] as $key => $bh){
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
                                        <b>Mã đơn hàng:</b> <?php echo $bh['ma_dh'] ?> <br>
                                        <b>Tên sản phẩm:</b> <?php echo $bh['ten_sp'] ?> <br>
                                        <b>Số lượng đặt:</b> <?php echo $bh['soluong_dat'] ?> <br>
                                        <b>Thời gian bảo hành:</b> <?php echo $bh['thoigian_bh'] ?> <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 40%;"><?php echo $bh['noidung_bh'] ?></td>
                    <td style="width: 20%;"><?php echo $bh['ngay_bh'] ?></td>
                </tr>
                <?php
          }
          echo '<p class="text-warning" style="font-weight: bold;">Tổng: '.$i.'</p>';
        ?>
            </tbody>
        </table>
    </div>

</div>
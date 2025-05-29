<div class="container">
    <?php
    if (isset($_SESSION['sp_yeuthich'])){
      ?>
    <div class="alert alert-info mt-4" role="alert" style="text-align: center; font-weight: bold; font-size: 20px;">
        SẢN PHẨM YÊU THÍCH
    </div>
    <div class="mt-4">
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                foreach($_SESSION['sp_yeuthich'] as $key => $sp_yt){
                  $i++;
                  ?>
                <tr>
                    <td style="width: 5%;"><?php echo $i ?></td>
                    <td style="width: 30%;"><?php echo $sp_yt['ten_sp'] ?></td>
                    <td style="width: 35%;">
                        <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp_yt['hinh_sp'] ?>"
                            style="width: 15%;">
                    </td>
                    <td style="width: 30%;">
                        <a
                            href="<?php echo BASE_URL ?><?php echo $sp_yt['ghichu_dm'] ?>/chitiet_sanpham/<?php echo $sp_yt['ma_sp'] ?>/<?php echo $sp_yt['ma_th'] ?>/<?php echo $sp_yt['ma_dm'] ?>">

                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa sản phẩm yêu thích không?')"
                            href="<?php echo BASE_URL ?>sp_yeuthich/sp_yeuthich_delete/<?php echo $sp_yt['ma_sp'] ?>">
                            <button type="button" class="btn xoa">
                                <i class="fas fa-trash-alt"></i> Xoá
                            </button>
                        </a>
                    </td>
                </tr>
                <?php
                }
              ?>
            </tbody>
        </table>
    </div>
    <?php
    }else{
      ?>
    <div style="text-align: center;">
        <i class="fa-solid fa-heart-crack" style=" font-size: 200px; color: #FFFBC1;"></i>
    </div>
    <?php
    }
  ?>

</div>
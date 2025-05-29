<div class="list_sanpham mt-4 container">
    <div class="row mb-4 timkiem_hang ">
        <?php 
      foreach ($data['thuonghieu_ma_dm'] as $key => $dmth){
        ?>
        <div class="col-2 p-3 p-3 btn_hang">
            <a
                href="<?php echo BASE_URL ?>smartwatch/timkiem_thuonghieu/<?php echo $dmth['ma_dm'] ?>/<?php echo $dmth['ma_th'] ?>">
                <img src="<?php echo BASE_URL ?>public/uploads/thuonghieu/<?php echo $dmth['logo_th'] ?>"
                    class="d-block w-100">
            </a>
        </div>
        <?php
      }
    ?>
    </div>
    <div class="row">
        <?php
      foreach ($data['loai_sanpham_ma'] as $key => $lsp){
        ?>
        <div class="col-2 timkiem_sanpham_loai " style="text-align: center ;">
            <a href="#<?php echo $lsp['ghichu_lsp'] ?>" style="  text-decoration: none;">
                <?php echo $lsp['icon_lsp'] ?> <br>
                <p class="mt-2"><?php echo $lsp['ten_lsp'] ?></p>
            </a>
        </div>
        <?php
      }
    ?>
    </div>
</div>
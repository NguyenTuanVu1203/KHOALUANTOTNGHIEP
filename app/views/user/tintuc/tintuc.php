<div class="tintuc container mt-3 mb-3">
    <div class="row">
        <?php
      foreach ($data['danhmuc_tintuc'] as $key => $dmtt){
        ?>
        <div class="col-1 tintuc_dm">
            <a href="<?php echo BASE_URL ?>index/tintuc_danhmuc/<?php echo $dmtt['ma_dmtt'] ?>">
                <button type="button" class="btn btn-light fw-bold"><?php echo $dmtt['ten_dmtt'] ?></button>
            </a>
        </div>
        <?php
      }
    ?>
    </div>
    <div class="row mt-3 pb-4" style="border-bottom:2px solid #C9BBCF ;">
        <div class="col-9">
            <div class="row">
                <?php
          foreach($data['tintuc_limit1'] as $key => $tt){
            ?>
                <div class="col-8">
                    <div>
                        <a href="<?php echo BASE_URL ?>index/chitiet_tintuc/<?php echo $tt['ma_tt'] ?>">
                            <img src="<?php echo BASE_URL ?>public/uploads/tintuc/<?php echo $tt['hinh_tt'] ?>"
                                class="d-block w-100">
                        </a>
                        <h4 class="fw-bold"><?php echo $tt['ten_tt'] ?></h4>
                    </div>
                </div>
                <?php
          }
        ?>
                <div class="col-4">
                    <?php
            foreach($data['tintuc_limit2'] as $key => $tt){
              ?>
                    <div class="row">
                        <a href="<?php echo BASE_URL ?>index/chitiet_tintuc/<?php echo $tt['ma_tt'] ?>">
                            <img src="<?php echo BASE_URL ?>public/uploads/tintuc/<?php echo $tt['hinh_tt'] ?>"
                                class="d-block w-100">
                        </a>
                        <p class="mt-2"> <?php echo $tt['ten_tt'] ?></p>
                    </div>
                    <?php
            }
          ?>

                </div>
            </div>
        </div>
        <div class="col-3">
            <h4 class="text-center fw-bold">Sản phẩm</h4>
            <?php
        foreach ($data['sanpham'] as $key => $sp){
          ?>
            <div class="sanpham_item row mt-4 ms-2 img-hover-zoom img-hover-zoom--brightness">
                <a href="<?php echo BASE_URL ?>dienthoai/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>"
                    class="col-4">
                    <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                        class="d-block w-100">
                </a>
                <div class="col-8">
                    <p class="text-center mt-3 sanpham_item_title"><?php echo $sp['ten_sp'] ?></p>
                    <p class="fw-bold text-center mt-2 sanpham_gia">
                        <?php echo number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>'  ?></p>
                </div>

            </div>
            <?php
        }
      ?>
        </div>
    </div>
    <div class="row mt-3">
        <?php
      foreach ($data['tintuc_limit4'] as $key => $tt){
        ?>
        <div class="col-6 mb-3">
            <div class="row">
                <div class="col-4">
                    <a href="<?php echo BASE_URL ?>index/chitiet_tintuc/<?php echo $tt['ma_tt'] ?>">
                        <img src="<?php echo BASE_URL ?>public/uploads/tintuc/<?php echo $tt['hinh_tt'] ?>" alt=""
                            class="d-block w-100">
                    </a>
                </div>
                <div class="col-8">
                    <h4 class="fw-bold"><?php echo $tt['ten_tt'] ?></h4>
                </div>
            </div>
        </div>
        <?php
      }
    ?>
    </div>
</div>
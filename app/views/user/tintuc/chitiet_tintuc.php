<div class="container mt-3">
    <div class="row mb-3">
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
    <?php
    foreach($data['tintuc_ma'] as $key => $tt){
      ?>
    <div class="row">
        <div class="col-4">
            <img style="width: 100%;" src="<?php echo BASE_URL ?>public/uploads/tintuc/<?php echo $tt['hinh_tt'] ?>"
                alt="">
        </div>
        <div class="col-8 mt-4">
            <h2><?php echo $tt['ten_tt'] ?></h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <p>
            <?php echo $tt['noidung_tt'] ?>
        </p>
    </div>
    <?php
    }
  ?>
</div>
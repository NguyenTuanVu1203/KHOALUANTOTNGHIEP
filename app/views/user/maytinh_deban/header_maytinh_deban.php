<div class="list_sanpham mt-4 container">
    <div class="row mb-4">
        <div class="col-2">
            <div class="btn-group ">
                <button type="button" class="btn btn-light dropdown-toggle btn_loc" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    &emsp;&emsp;&emsp;&emsp;RAM&emsp;&emsp;&emsp;&emsp;
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="<?php echo BASE_URL ?>maytinhdeban/timkiem_ram/4">4GB</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo BASE_URL ?>maytinhdeban/timkiem_ram/8">8GB</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo BASE_URL ?>maytinhdeban/timkiem_ram/16">16GB</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-2">
            <div class="btn-group ">
                <button type="button" class="btn btn-light dropdown-toggle btn_loc" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    &emsp;&emsp;Ổ cứng&emsp;&emsp;
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="<?php echo BASE_URL ?>maytinhdeban/timkiem_rom/256">SSD 256GB</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo BASE_URL ?>maytinhdeban/timkiem_rom/512">SSD 512GB</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-2">
            <a href="<?php echo BASE_URL ?>maytinhdeban/timkiem/ASC">
                <button style="width: 100%;" type="button" class="btn btn-warning ">Gía &ensp; <i
                        class="fa-solid fa-angles-up"></i></button>
            </a>
        </div>
        <div class="col-2">
            <a href="<?php echo BASE_URL ?>maytinhdeban/timkiem/DESC">
                <button style="width: 100%;" type="button" class="btn btn-warning ">Gía &ensp; <i
                        class="fa-solid fa-angles-down"></i></button>
            </a>
        </div>

    </div>
    <div class="row mb-4 timkiem_hang ">
        <?php
      foreach ($data['thuonghieu_ma_dm'] as $key => $dmth){
        ?>
        <div class="col-2 p-3 p-3 btn_hang">
            <a
                href="<?php echo BASE_URL ?>maytinhdeban/timkiem_thuonghieu/<?php echo $dmth['ma_dm'] ?>/<?php echo $dmth['ma_th'] ?>">
                <img src="<?php echo BASE_URL ?>public/uploads/thuonghieu/<?php echo $dmth['logo_th'] ?>"
                    class="d-block w-100">
            </a>
        </div>
        <?php
      }
    ?>
    </div>
</div>
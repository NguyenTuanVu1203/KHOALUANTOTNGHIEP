<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <div class="row">
                <div class="col-6 mt-2">
                    Thông tin lượt xem của sản phẩm
                </div>
                <div class="col-6">
                    <form class="d-flex" action="<?php echo BASE_URL ?>luotxem/luotxem_timkiem" method="POST">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="tukhoa">
                        <button class="btn btn-success btn_search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
                <a href="<?php echo BASE_URL ?>luotxem/luotxem/ASC">
                    <button type="button" class="btn btn-warning">Lượt xem &ensp; <i
                            class="fa-solid fa-angles-up"></i></button>
                </a>
                <a href="<?php echo BASE_URL ?>luotxem/luotxem/DESC">
                    <button type="button" class="btn btn-warning">Lượt xem &ensp; <i
                            class="fa-solid fa-angles-down"></i></button>
                </a>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                    style="height: 650px; overflow: auto;">
                    <p>
                    <table class="table table-hover">
                        <thead>
                            <tr class="tr_table">
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượt xem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                $i=0;
                foreach($data['luotxem'] as $key => $lx){
                  $i++;
                  ?>
                            <tr>
                                <th scope="row"><?php echo $i ?></th>
                                <td><?php echo $lx['ten_sp'] ?></td>
                                <td><?php echo $lx['so_lx'] ?></td>
                            </tr>
                            <?php
                }
                echo '<p class="text-warning" style="font-weight: bold;">Tổng: '.$i.'</p>';
              ?>
                        </tbody>
                    </table>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor js -->
    <script src="<?php echo BASE_URL ?>public/assets\js\vendor.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\libs\morris-js\morris.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\libs\raphael\raphael.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/assets\js\pages\dashboard.init.js"></script>
    <!-- App js -->
    <script src="<?php echo BASE_URL ?>public/assets\js\app.min.js"></script>
</div>
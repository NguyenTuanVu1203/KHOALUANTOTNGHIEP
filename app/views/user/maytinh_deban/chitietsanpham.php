<div class="container mb-4">
  <div class="horizontal">
    <?php
      foreach($data['sanpham_ma'] as $key => $sp){
        ?>
          <div class="verticals ten offset-by-one">
            <ol class="breadcrumb breadcrumb-fill2 style2">
              <li><a href="<?php echo BASE_URL ?>index/index"><i class="fa fa-home"></i></a></li>
              <li class="fw-bold"><a href="<?php echo BASE_URL ?><?php echo $sp['ghichu_dm'] ?>/sanpham/13"><?php echo $sp['ten_dm'] ?></a></li>
              <li class="fw-bold"><a href=""><?php echo $sp['ten_th'] ?></a></li>
            </ol>
          </div>
        <?php
      }
    ?>
  </div>
  <div class="chitiet_sanpham_title">
    <?php
      foreach($data['sanpham_ma'] as $key => $sp){
        ?>
          <h3 class="fw-bold">
            Sản phẩm: <?php echo $sp['ten_sp'] ?>
            <?php
              if($data['danhgia_ma_sp']){
                $so_danhgia=0;
                $sao_5 = 0;
                $sao_4 = 0;
                $sao_3 = 0;
                $sao_2 = 0;
                $sao_1 = 0;
                $tb = 0;
                foreach($data['danhgia_ma_sp'] as $key => $dg){
                  $so_danhgia++;
                  if($dg['sosao_dg'] == 5){
                    $sao_5++;
                  }else if($dg['sosao_dg'] == 4){
                    $sao_4++;
                  }else if($dg['sosao_dg'] == 3){
                    $sao_3++;
                  }else if($dg['sosao_dg'] == 2){
                    $sao_2++;
                  }else if($dg['sosao_dg'] == 1){
                    $sao_1++;
                  }
                }
                $tb = ceil((5*$sao_5 + 4*$sao_4 + 3*$sao_3 + 2*$sao_2 + $sao_1)/$so_danhgia);
                ?>
                <?php
                  for($i = 1; $i<=$tb; $i++){
                    ?>
                      <i class="fa-solid fa-star" style="color: #FE8C23;"></i>
                    <?php
                  }
                  if($tb<5){
                    for($i = 1; $i<=5-$tb; $i++){
                      ?>
                        <i class="fa-solid fa-star" style="color: gray;"></i>
                      <?php
                    }
                  }
                ?>
                <?php
              }
              
            ?>
          </h3>
          <form action="<?php echo BASE_URL ?>sp_yeuthich/sp_yeuthich_insert" method="POST">
            <input type="hidden" value="<?php echo $sp['ma_sp'] ?>" name="ma_sp">
            <input type="hidden" value="<?php echo $sp['ma_th'] ?>" name="ma_th">
            <input type="hidden" value="<?php echo $sp['ma_dm'] ?>" name="ma_dm">
            <input type="hidden" value="<?php echo $sp['ten_sp'] ?>" name="ten_sp">
            <input type="hidden" value="<?php echo $sp['hinh_sp'] ?>" name="hinh_sp">
            <input type="hidden" value="<?php echo $sp['ghichu_dm'] ?>" name="ghichu_dm">
            <?php
              $i = 0;
              if(isset($_SESSION['sp_yeuthich'])){
                foreach($_SESSION['sp_yeuthich'] as $key => $sp_yt){
                  if ($sp_yt['ma_sp'] == $sp['ma_sp']){
                    ?>
                      <button type="submit" style="border: none; background-color: white;">
                        <i class="fa-solid fa-heart" style="color:#E51F22 ; font-size: 30px;"></i>
                      </button>
                    <?php
                    $i = $i + 1;
                    break;
                    
                  }
                }
                if($i == 0){
                  ?>
                    <button type="submit" style="border: none; background-color: white;">
                      <i class="fa-solid fa-heart" style="font-size: 30px;"></i>
                    </button>
                  <?php
                }
                
              }else{
                ?>
                  <button type="submit" style="border: none; background-color: white;">
                    <i class="fa-solid fa-heart"></i>
                  </button>
                <?php
              }
            ?>
          </form>
        <?php
      }
    ?>
  </div>
  <div class="row mt-3">
    <div class="col-7">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php
            foreach($data['hinh_limit1'] as $key => $h){
              ?>
                <div class="carousel-item active" data-bs-interval="1000">
                  <img src="<?php echo BASE_URL ?>public/uploads/hinh_chitiet/<?php echo $h['hinh'] ?>" class="d-block w-100" alt="...">
                </div>
              <?php
            }
          ?>
          <?php
            foreach($data['hinh_ma'] as $key => $h){
              ?>
                <div class="carousel-item" data-bs-interval="2000">
                  <img src="<?php echo BASE_URL ?>public/uploads/hinh_chitiet/<?php echo $h['hinh'] ?>" class="d-block w-100" alt="...">
                </div>
              <?php
            }
          ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div class="row mt-4">
        <div class="col-6">
          <div class="row">
            <div class="col-1">
              <img src="<?php echo BASE_URL ?>public/img/chitiet_sanpham/1.jpg" class="d-block">
            </div>
            <div class="col-11">
              <p class="ps-4">Hư gì đổi nấy <b>12</b> tháng tại 3192 siêu thị toàn quốc (miễn phí tháng đầu)</p>
            </div>
          </div>
          <div class="row">
            <div class="col-1">
              <img src="<?php echo BASE_URL ?>public/img/chitiet_sanpham/2.jpg" class="d-block">
            </div>
            <div class="col-11">
              <?php
                foreach($data['sanpham_ma'] as $key => $sp){
                  ?>
                    <p class="ps-4">Bộ bán hàng chuẩn: <?php echo $sp['bo_sanpham'] ?></p>
                  <?php
                }
              ?>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="row">
            <div class="col-1">
              <img src="<?php echo BASE_URL ?>public/img/chitiet_sanpham/3.jpg" class="d-block">
            </div>
            <div class="col-11">
              <p class="ps-4">Bảo hành chính hãng điện thoại 1 năm tại các trung tâm bảo hành hãng </p>
            </div>
          </div>
        </div>
      </div>
      <?php
        foreach($data['sanpham_ma'] as $key => $sp){
          ?>
            <div>
              <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinhchitiet_sp'] ?>" alt="" class="d-block w-100">
            </div>
          <?php
        }
      ?>
      <div class="khuyenmai">
        <div class="">
          <div class="plans">
            <?php
              if($data['khuyenmai']){
                ?>
                  <div class="title khuyenmai_title" style="font-weight: bold; color: #E51F22; font-size: 20px;"> <i class="fa-solid fa-gift" style="font-size:25px ;"></i> &ensp;Khuyến mãi</div>
                <?php
                foreach($data['khuyenmai'] as $key => $km){
                  ?>
                    <label class="plan basic-plan" for="1">
                      <input type="hidden" name="ma_km" id="1" value="<?php echo $km['ma_km'] ?>" />
                      <div class="plan-content">
                        <img loading="lazy" src="<?php echo BASE_URL ?>public/img/logo/sale.png" alt="" />
                        <div class="plan-details">
                          <span><?php echo $km['ten_km'] ?></span>
                          <p>Đơn tối thiểu <?php echo number_format($km['dieukien_km'], 0, ',', '.') . ' <sup>đ</sup>'.' được giảm '?><?php echo $km['phantram_km'].'%' ?></p>
                        </div>
                      </div>
                    </label>
                  <?php
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-5" style="border-left: 2px solid #c7c7c7;">
      <?php 
        foreach ($data['sanpham_ma'] as $key => $sp){
          ?>
            <div class="chitiet_sanpham_gia">
              <div class="alert alert-danger" role="alert" style="background-color:#FEE2E2 ; color: red; font-weight: bold; font-size: 20px;">
                <i class="fa-solid fa-circle-dollar-to-slot"></i> &ensp;
                <?php echo number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>'  ?>
                <span style="color: gray; text-decoration: line-through;"><?php echo number_format($sp['gia_sp']+200000, 0, ',', '.') . ' <sup>đ</sup>'  ?></span>
                <p style="font-size:15px ; color: gray;">Số lượng sản phẩm còn lại: <?php echo $sp['soluong_sp'] ?></p>
              </div>
            </div>
            <div class="mota">
              <p style="font-weight:bold ;">Sản phẩm có những màu: </p>
              <?php
                foreach ($data['mau_sanpham_ma'] as $key => $msp){
                  ?>
                    <button type="button" class="btn btn-success" style="background-color:#16511a ;">
                    <span style="border-radius: 50%; background-color: <?php echo $msp['mau'] ?>; color: <?php echo $msp['mau'] ?>;">... </span> &ensp;
                      <?php echo $msp['ten_m'] ?>
                    </button>
                  <?php
                }
              ?>
              <p class="mt-3" style="font-weight: bold;">
                Miễn phí giao hàng cho đơn hàng từ
                <button type="button" class="btn btn-danger">2.000.000 <sup>đ</sup></button>
              </p>
            </div>
            <div class="thongso_kythuat">
              <div class="row py-5 justify-content-center">
                <div class="col-md-12">
                  <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                    style="height: 350px; overflow: auto;">
                    <div class="alert alert-info text-center" role="alert" style="font-size: 18px; font-weight: bold;">
                      Cấu hình Máy tính: <?php echo $sp['ten_sp'] ?>
                    </div>
                    <p>
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <th scope="row">Công nghệ CPU </th>
                          <td><?php echo $sp['congnghe_cpu'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">RAM:</th>
                          <td><?php echo $sp['ram'].' GB' ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Ổ cứng:</th>
                          <td><?php echo 'SSD '.$sp['rom'].' GB' ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Màn hình: </th>
                          <td><?php echo $sp['manhinh'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Card màn hình:</th>
                          <td><?php echo $sp['card_manhinh'] ?></td>
                        </tr>

                        <tr>
                          <th scope="row">Cổng kết nối:</th>
                          <td><?php echo $sp['cong_ketnoi'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Hệ điều hành:</th>
                          <td><?php echo $sp['hedieuhanh'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Kích thước:</th>
                          <td><?php echo $sp['kichthuoc'] ?></td>
                        </tr>
                      </tbody>
                    </table>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          <?php
        }
      ?>
      <?php
        foreach ($data['sanpham_ma'] as $key => $sp){
          ?>
            <div class="chonmau">
              <form action="<?php echo BASE_URL ?>giohang/giohang_insert" method="POST">
                <input type="hidden" value="1" name="soluong_dat">
                <input type="hidden" value="<?php echo $sp['ma_sp'] ?>" name="ma_sp">
                <input type="hidden" value="<?php echo $sp['soluong_sp'] ?>" name="soluong_sp">
                <div class="">
                  <div class="">
                      <!-- 	Select	 -->
                      <div class="select-control">
                        <span class="select-control__title">Màu của sản phẩm</span>
                        <select class="select" id="js-select" name="ma_m">
                          <?php
                            $i=0;
                            foreach ($data['mau_sanpham_ma'] as $key => $msp){
                              $i++;
                              ?>
                                <option class="select__item" value="<?php echo $msp['ma_m'] ?>"><?php echo $msp['ten_m'] ?></option>
                                
                              <?php
                            }
                          ?>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="d-grid gap-2 btn_themgiohang">
                  <?php
                    if ($sp['soluong_sp'] > 0){
                      ?>
                        <button onclick="return confirm('Sản phẩm <?php echo $sp['ten_sp'] ?> được thêm thành công !!!')" class="btn btn-light p-4" type="submit" style="background-color:#E51F22 ; color: white; font-size: 18px; font-weight: bold;">Thêm vào giỏ hàng</button>
                      <?php
                    }else{
                      ?>
                        <button type="button" class="btn" style="padding: 15px; background-color: #497174; color: white; font-weight: bold;">Sản phẩm hết hàng</button>
                      <?php
                    }
                  ?>
                </div>
              </form>
            </div>
          <?php
        }
      ?>
      <div class="h_congnghe_item pt-3 pb-3 ps-3">
        <?php
          foreach ($data['tintuc'] as $key => $tt){
            ?>
              <div class="mt-3 mb-3">
                <a href="<?php echo BASE_URL ?>index/chitiet_tintuc/<?php echo $tt['ma_tt'] ?>" style="text-decoration: none;" class="text-dark">
                  <div class="row">
                    <div class="col-3">
                      <img src="<?php echo BASE_URL ?>public/uploads/tintuc/<?php echo $tt['hinh_tt'] ?>" class="d-block w-100">
                    </div>
                    <div class="col-9">
                      <p class="fw-bold"><?php echo $tt['ten_tt'] ?></p>
                    </div>
                  </div>
                </a>
              </div>
            <?php
          }
        ?>
      </div>
    </div>

  </div>
  <div class="thongtin_sanpham">
    <div class="">
      <!-- <h2 class="py-3 text-center">Thông tin sản phẩm</h2> -->
      <div class="alert alert-warning" role="alert" style="font-weight: bold; font-size: 20px; text-align: center; color: white; background-color: #E6A157;">
        THÔNG TIN SẢN PHẨM
      </div>
      <div class="row py-5 justify-content-center">
        <div class="col-md-12">
          <?php
            foreach($data['sanpham_ma'] as $key => $sp){
              ?>
                <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20" style="height: 400px; overflow: auto;">
                  <p>
                    <?php echo $sp['thongtin_sp'] ?>
                  </p>
                </div>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- đánh giá sản phẩm -->
  <div class="mb-5 danhgia">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-4">
            <p>
              <?php
                if($data['danhgia_ma_sp']){
                  $so_danhgia=0;
                  $sao_5 = 0;
                  $sao_4 = 0;
                  $sao_3 = 0;
                  $sao_2 = 0;
                  $sao_1 = 0;
                  $tb = 0;
                  foreach($data['danhgia_ma_sp'] as $key => $dg){
                    $so_danhgia++;
                    if($dg['sosao_dg'] == 5){
                      $sao_5++;
                    }else if($dg['sosao_dg'] == 4){
                      $sao_4++;
                    }else if($dg['sosao_dg'] == 3){
                      $sao_3++;
                    }else if($dg['sosao_dg'] == 2){
                      $sao_2++;
                    }else if($dg['sosao_dg'] == 1){
                      $sao_1++;
                    }
                  }
                  $tb = ceil((5*$sao_5 + 4*$sao_4 + 3*$sao_3 + 2*$sao_2 + $sao_1)/$so_danhgia);
                  ?>
                    <p class="text-center" style="margin-top: 30%;">
                        <span style="color:#FE8C23 ; font-weight: bold; font-size: 30px;"><?php echo $tb ?> &ensp; </span> 
                        <?php
                          for($i = 1; $i<=$tb; $i++){
                            ?>
                              <i class="fa-solid fa-star" style="color: #FE8C23; font-size: 30px;"></i>
                            <?php
                          }
                          if($tb<5){
                            for($i = 1; $i<=5-$tb; $i++){
                              ?>
                                <i class="fa-solid fa-star" style="font-size: 30px;"></i>
                              <?php
                            }
                          }
                        ?>
                        <br>
                        <?php echo $so_danhgia ?> đánh giá
                    </p>
                  <?php
                }else{
                  ?>
                    <p class="text-center" style="margin-top: 30%; ">
                        <span style="color:#FE8C23 ; font-weight: bold; font-size: 20px;">0</span> 
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                      <br>
                        0 đánh giá
                    </p>
                  <?php
                }
                
              ?>
            </p>
          </div>
          <div class="col-8">
            <?php
              if($data['danhgia_ma_sp']){
                $so_danhgia=0;
                $sao_5 = 0;
                $sao_4 = 0;
                $sao_3 = 0;
                $sao_2 = 0;
                $sao_1 = 0;
                foreach($data['danhgia_ma_sp'] as $key => $dg){
                  $so_danhgia++;
                  if($dg['sosao_dg'] == 5){
                    $sao_5++;
                  }else if($dg['sosao_dg'] == 4){
                    $sao_4++;
                  }else if($dg['sosao_dg'] == 3){
                    $sao_3++;
                  }else if($dg['sosao_dg'] == 2){
                    $sao_2++;
                  }else if($dg['sosao_dg'] == 1){
                    $sao_1++;
                  }
                }
                ?>
                  <div class="row">
                    <div class="col-1">
                      5 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="col-7">
                      <div class="progress" >
                        <div class="progress-bar bg-warning" role="progressbar" aria-label="Warning example" style="width: <?php echo ($sao_5/$so_danhgia)*100 .'%' ?>;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-4" style="color: blue; font-weight: bold;">
                      <?php echo ceil(($sao_5/$so_danhgia)*100) .'%' ?> (<?php echo $sao_5 ?> đánh giá)
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      4 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="col-7">
                      <div class="progress" >
                        <div class="progress-bar bg-warning" role="progressbar" aria-label="Warning example" style="width: <?php echo ($sao_4/$so_danhgia)*100 .'%' ?>;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-4" style="color: blue; font-weight: bold;">
                      <?php echo ceil(($sao_4/$so_danhgia)*100) .'%' ?> (<?php echo $sao_4 ?> đánh giá)
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      3 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="col-7">
                      <div class="progress" >
                        <div class="progress-bar bg-warning" role="progressbar" aria-label="Warning example" style="width: <?php echo ($sao_3/$so_danhgia)*100 .'%' ?>;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-4" style="color: blue; font-weight: bold;">
                    <?php echo ceil(($sao_3/$so_danhgia)*100) .'%' ?> (<?php echo $sao_3 ?> đánh giá)
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      2 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="col-7">
                      <div class="progress" >
                        <div class="progress-bar bg-danger" role="progressbar" aria-label="Warning example" style="width: <?php echo ($sao_2/$so_danhgia)*100 .'%' ?>;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-4" style="color: blue; font-weight: bold;">
                      <?php echo ceil(($sao_2/$so_danhgia)*100) .'%' ?> (<?php echo $sao_2 ?> đánh giá)
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      1 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="col-7">
                      <div class="progress" >
                        <div class="progress-bar bg-danger" role="progressbar" aria-label="Warning example" style="width: <?php echo ($sao_1/$so_danhgia)*100 .'%' ?>;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-4" style="color: blue; font-weight: bold;">
                      <?php echo ceil(($sao_1/$so_danhgia)*100) .'%' ?> (<?php echo $sao_1 ?> đánh giá)
                    </div>
                  </div>
                <?php
              }else{
                ?>
                  <div class="row">
                    <div class="col-1">
                      5 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="col-7">
                      <div class="progress" >
                        <div class="progress-bar bg-warning" role="progressbar" aria-label="Warning example" style="width: 0%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-4" style="color: blue; font-weight: bold;">
                      0% (0 đánh giá)
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      4 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="col-7">
                      <div class="progress" >
                        <div class="progress-bar bg-warning" role="progressbar" aria-label="Warning example" style=" width: 0%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-4" style="color: blue; font-weight: bold;">
                      0% (0 đánh giá)
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      3 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="col-7">
                      <div class="progress" >
                        <div class="progress-bar bg-warning" role="progressbar" aria-label="Warning example" style="width: 0%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-4" style="color: blue; font-weight: bold;">
                      0% (0 đánh giá)
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      2 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="col-7">
                      <div class="progress" >
                        <div class="progress-bar bg-warning" role="progressbar" aria-label="Warning example" style="width: 0%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-4" style="color: blue; font-weight: bold;">
                      0% (0 đánh giá)
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      1 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="col-7">
                      <div class="progress" >
                        <div class="progress-bar bg-warning" role="progressbar" aria-label="Warning example" style="width: 0%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-4" style="color: blue; font-weight: bold;">
                      0% (0 đánh giá)
                    </div>
                  </div>
                <?php
              }
              
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
        $n =0;
        if($data['danhgia_ma_sp']){
          foreach($data['danhgia_ma_sp'] as $key => $dg){
            ?>
              <div>
                <div style="font-weight: bold;">
                  <p><?php echo $dg['ten_k'] ?></p>
                  <?php
                    $n = $dg['sosao_dg'];
                    for($i=1; $i <= $n; $i++){
                      ?>
                        <i class="fa-solid fa-star" style="color: #FE8C23; font-size: 10px;"></i>
                      <?php
                    }
                    if($n < 5){
                      for($i=1; $i <= 5-$n; $i++){
                        ?>
                          <i class="fa-solid fa-star" style="color: gray; font-size: 10px;"></i>
                        <?php
                      }
                    }
                  ?>
                </div>
                <p class="mt-2"><?php echo $dg['noidung_dg'] ?></p>
                <p style="color: gray;"><?php echo $dg['thoigian_dg'] ?></p>
              </div>
            <?php
          }
        }else{
          ?>
            <p>Hiện sản phẩm chưa nhận được bài đánh giá nào</p>
          <?php
        }
      ?>
    </div>
  </div>
  <!--  -->
  <div class="row sanpham_tuongtu">
    <div class="alert alert-info" role="alert" style="text-align:center ; font-weight:bold ; font-size: 20px; color: #16511a;" >
      Sản phẩm tương tự
    </div>
    <?php
      foreach ($data['sanpham_tuongtu'] as $key => $sp){
        ?>
          <div class="sanpham_item col-xs-12 col-sm-6 col-md-2 mt-5 img-hover-zoom img-hover-zoom--brightness">
            <a href="<?php echo BASE_URL ?>maytinhdeban/chitiet_sanpham/<?php echo $sp['ma_sp'] ?>/<?php echo $sp['ma_th'] ?>/<?php echo $sp['ma_dm'] ?>">
              <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>" class="d-block w-100">
            </a>
            <p class="text-center mt-3 sanpham_item_title"><?php echo $sp['ten_sp'] ?></p>
            <?php
              foreach($data['count_sao'] as $key => $count_sao){
                if($sp['ma_sp'] == $count_sao['ma_sp']){
                  $tb= ceil($count_sao['tongsao']/$count_sao['so_dg']) 
                  ?>
                    <div>
                      <?php
                        for($i = 1; $i<=$tb; $i++){
                          ?>
                            <i class="fa-solid fa-star" style="color: #FE8C23;"></i>
                          <?php
                        }
                        if($tb<5){
                          for($i = 1; $i<=5-$tb; $i++){
                            ?>
                              <i class="fa-solid fa-star" style="color: gray;"></i>
                            <?php
                          }
                        }
                      ?>
                    </div>
                    
                    
                  <?php
                }
              }
            ?>
            <div class="row tex-center ms-2">
            <?php
              $ma_sp = $sp['ma_sp'];
              $con = mysqli_connect('localhost', 'root', '', 'nienluan');
              $result = mysqli_query($con, "SELECT * FROM `mau_sanpham` join `sanpham` on mau_sanpham.ma_sp = sanpham.ma_sp join `mau` on mau_sanpham.ma_m = mau.ma_m WHERE sanpham.ma_sp = '$ma_sp'");
              while ($row = mysqli_fetch_assoc($result)) {
                  $arr[$row['ma_m']]['ten_m'] = $row['ten_m'];
                  $arr[$row['ma_m']]['mau'] = $row['mau'];
                  ?>
                    <div class="col-2">
                      <span  style="border-radius:100% ; background-color: <?php echo $row['mau'] ?> ; color: <?php echo $row['mau'] ?>;">....</span>
                    </div>
                  <?php
              }
            ?>
            </div>
            <p class="fw-bold text-center mt-2 sanpham_gia"><?php echo number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>'  ?></p>
          </div>
        <?php
      }
    ?>
  </div>
  <div class="hoi_dap mt-5">
    <?php
      foreach ($data['sanpham_ma'] as $key => $sp){
        ?>
          <form action="<?php echo BASE_URL ?>hoi_dap/hoi_dap_insert" method="post">
            <div class="row">
              <div class="col-8">
                <input type="hidden" name="ma_sp" class="form-control" value="<?php echo $sp['ma_sp'] ?>">
                <input type="hidden" name="ghichu_hd" class="form-control" value="<?php echo $sp['ghichu_dm'] ?>">
                <input type="text" name="ten_k" class="form-control"  required minlength="5" placeholder="Họ và Tên">
                <p class="mt-3">Nội dung</p>
                <textarea class="form-control" name="noidung_hd" minlength="10" required rows="3"></textarea>
                <button type="submit" class="btn btn-primary mt-3 float-end" style="background-color: #16511a;"> <i class="fa-solid fa-paper-plane"></i>&ensp;Gửi</button>
              </div>
            </div>
          </form>
        <?php
      }
    ?>
    <hr style=" border: 2px solid blue; border-radius: 5px;">
    <div class="mt-5">
      <?php
        foreach($data['hoi_dap_list'] as $key => $hd){
          if($hd['status'] == 0 && $hd['parent'] == 0){
            ?>
              <div style="font-weight: bold;">
                <i class="fa-solid fa-user-large" style="font-size: 20px; color:#FE8C23 ;"></i>&ensp; <?php echo $hd['ten_k'] ?>
              </div>
              <p class="mt-2"><?php echo $hd['noidung_hd'] ?></p>
              <p style="color: gray;"><i class="fa-solid fa-clock"></i> <span style="color:gray ;"><?php echo $hd['thoigian_hd'] ?></span></p>
              <hr>
            <?php
          }
          foreach($data['hoi_dap_list1'] as $key => $hd1){
            if($hd1['parent'] == $hd['ma_hd'] && $hd1['status'] !=0){
              ?>
                <div class="alert alert-dark ms-5" role="alert">
                  <i class="fa-solid fa-user-large" style="font-size: 20px; color:#E51F22 ;"></i>&ensp; <b><?php echo $hd1['ten_nv'] ?></b> <br>
                  <?php echo $hd1['noidung_hd'] ?>
                  <p style="color: blue;" class="mt-2"><i class="fa-solid fa-clock"></i> <span style="color:gray ;"><?php echo $hd1['thoigian_hd'] ?></span></p>
                </div>
              <?php
            }
          }
        }
      ?>
    </div>
  </div>
</div>
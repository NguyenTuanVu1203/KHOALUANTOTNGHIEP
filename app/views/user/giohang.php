<div class="container">
    <div class="alert alert-info mt-4" role="alert" style="text-align: center; font-weight: bold; font-size: 20px;">
        GIỎ HÀNG
    </div>
    <!-- <h2>Giỏ hàng</h2> -->
    <?php
    if (isset($_SESSION['giohang'])){
      ?>
    <a href="<?php echo BASE_URL ?>index/index">
        <button type="button" class="btn btn-success" style="font-weight:bold ; font-size: 16px ;">Mua thêm sản phẩm
            khác</button>
    </a>
    <div class="mt-4">
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Gía</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Màu</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                foreach($_SESSION['giohang'] as $key => $gh){
                  $i++;
                  ?>
                <form action="<?php echo BASE_URL ?>giohang/giohang_update/<?php echo $gh['ma_sp'] ?>" method="POST">
                    <tr>
                        <th style="width: 5%;" scope="row"><?php echo $i ?></th>
                        <td style="width: 20%;">
                            <?php
                            foreach($data['sanpham'] as $key => $sp){
                              if($gh['ma_sp'] == $sp['ma_sp']){
                                echo $sp['ten_sp'];
                              }
                            }
                          ?>
                        </td>
                        <td style="width: 10%;">
                            <?php
                            foreach($data['sanpham'] as $key => $sp){
                              if($gh['ma_sp'] == $sp['ma_sp']){
                                ?>
                            <img src="<?php echo BASE_URL ?>public/uploads/sanpham/<?php echo $sp['hinh_sp'] ?>"
                                style="width: 60%;">
                            <?php
                              }
                            }
                          ?>
                        </td>
                        <td style="width: 10%;">
                            <?php
                            foreach($data['sanpham'] as $key => $sp){
                              if($gh['ma_sp'] == $sp['ma_sp']){
                                echo number_format($sp['gia_sp'], 0, ',', '.') . ' <sup>đ</sup>';
                              }
                            }
                          ?>
                        </td>
                        <td>
                            <input type="number" class="form-control" aria-label="Recipient's username"
                                aria-describedby="button-addon2" min="1" max="<?php echo $gh['soluong_sp'] ?>"
                                name="soluong_dat" value="<?php echo $gh['soluong_dat'] ?>">
                        </td>
                        <td style="width: 15%;">
                            <?php
                            foreach($data['mau'] as $key => $m){
                              if($gh['ma_m'] == $m['ma_m']){
                                // echo $m['ten_m'];
                                ?>
                            <span
                                style="border-radius:100% ; background-color: <?php echo $m['mau'] ?> ; color: <?php echo $m['mau'] ?>;">....</span>
                            <?php echo $m['ten_m'] ?>
                            <?php
                              }
                            }
                          ?>
                        </td>
                        <td style="width: 10%;">
                            <?php
                            foreach($data['sanpham'] as $key => $sp){
                              if($gh['ma_sp'] == $sp['ma_sp']){
                                echo number_format($sp['gia_sp'] * $gh['soluong_dat'], 0, ',', '.') . ' <sup>đ</sup>';
                              }
                            }
                          ?>
                        </td>
                        <td style="width: 20%;">
                            <a href="<?php echo BASE_URL ?>giohang/giohang_delete/<?php echo $gh['ma_sp'] ?>"
                                onclick="return confirm('Bạn có muốn xóa sản phẩm không?')">
                                <button type="button" class="btn btn-warning btn_xoa" name="xoa_giohang">
                                    <i class="fa-solid fa-trash-can"></i> Xoá
                                </button>
                            </a>
                            <button class="btn btn-success" name="update_giohang" type="submit" id="button-addon2"><i
                                    class="fa-solid fa-pen-to-square"></i> Cập nhật</button>
                        </td>
                    </tr>
                </form>
                <?php
                }
              ?>
                <tr>
                    <td colspan="2">
                        <a href="<?php echo BASE_URL ?>giohang/giohang_delete_all"
                            onclick="return confirm('Bạn có muốn xóa tất cả sản phẩm không?')">
                            <button type="button" class="btn btn-warning btn_xoa" name="xoa_giohang">
                                <i class="fa-solid fa-trash-can"></i>&emsp; Xoá tất cả
                            </button>
                        </a>
                    </td>
                    <td colspan="6">
                        <?php
                    $tong = 0;
                    foreach($_SESSION['giohang'] as $key => $gh){
                      foreach($data['sanpham'] as $key => $sp){
                        if($gh['ma_sp'] == $sp['ma_sp']){
                          $tong = $tong + ( $sp['gia_sp'] * $gh['soluong_dat'] );
                        }
                      }
                    }
                    ?>
                        <p class="text-end fw-bold">
                            Tạm tính:
                            <?php echo number_format($tong, 0, ',', '.') . ' <sup>đ</sup>'; ?>
                        </p>
                        <?php
                  ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <?php
                    $tong = 0;
                    foreach($_SESSION['giohang'] as $key => $gh){
                      foreach($data['sanpham'] as $key => $sp){
                        if($gh['ma_sp'] == $sp['ma_sp']){
                          $tong = $tong + ( $sp['gia_sp'] * $gh['soluong_dat'] );
                        }
                      }
                    }
                    if($tong<2000000){
                      ?>
                        <p class="text-end fw-bold">
                            Phí vận chuyển:
                            <?php echo number_format(30000, 0, ',', '.') . ' <sup>đ</sup>'; ?>
                        </p>
                        <?php
                    }else if($tong >=2000000){
                      ?>
                        <p class="text-end" style="color: #038018;">
                            Miễn phí vận chuyển
                        </p>
                        <?php
                    }
                  ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <?php
                    $tong = 0;
                    foreach($_SESSION['giohang'] as $key => $gh){
                      foreach($data['sanpham'] as $key => $sp){
                        if($gh['ma_sp'] == $sp['ma_sp']){
                          $tong = $tong + ( $sp['gia_sp'] * $gh['soluong_dat'] );
                        }
                      }
                    }
                    if($data['khuyenmai_hien']){
                      foreach($data['khuyenmai_hien'] as $key => $km){
                        if($tong >= $km['dieukien_km'] && $tong<2000000){
                          $tong = $tong + 30000 - (($tong*$km['phantram_km'])/100);
                          ?>
                        <p class="text-end fw-bold">
                            Tổng giá:
                            <?php echo number_format($tong, 0, ',', '.') . ' <sup>đ</sup>'; ?>
                        </p>
                        <?php
                        }else if($tong < $km['dieukien_km'] && $tong<2000000){
                          $tong = $tong + 30000;
                          ?>
                        <p class="text-end fw-bold">
                            Tổng giá:
                            <?php echo number_format($tong, 0, ',', '.') . ' <sup>đ</sup>'; ?>
                        </p>
                        <?php
                        }else if($tong >= $km['dieukien_km'] && $tong>2000000){
                          $tong = $tong - (($tong*$km['phantram_km'])/100);
                          ?>
                        <p class="text-end fw-bold">
                            Tổng giá:
                            <?php echo number_format($tong, 0, ',', '.') . ' <sup>đ</sup>'; ?>
                        </p>
                        <?php
                        }else if ($tong < $km['dieukien_km'] && $tong>2000000){
                          ?>
                        <p class="text-end fw-bold">
                            Tổng giá:
                            <?php echo number_format($tong, 0, ',', '.') . ' <sup>đ</sup>'; ?>
                        </p>
                        <?php
                        }else if($tong>2000000){
                          ?>
                        <p class="text-end fw-bold">
                            Tổng giá:
                            <?php echo number_format($tong, 0, ',', '.') . ' <sup>đ</sup>'; ?>
                        </p>
                        <?php
                        }else if($tong<2000000){
                          $tong = $tong + 30000;
                          ?>
                        <p class="text-end fw-bold">
                            Tổng giá:
                            <?php echo number_format($tong, 0, ',', '.') . ' <sup>đ</sup>'; ?>
                        </p>
                        <?php
                        }
                      }
                    }else{
                      if($tong > 2000000){
                        ?>
                        <p class="text-end fw-bold">
                            Tổng giá:
                            <?php echo number_format($tong, 0, ',', '.') . ' <sup>đ</sup>'; ?>
                        </p>
                        <?php
                      }else if($tong < 2000000){
                        $tong = $tong + 30000;
                        ?>
                        <p class="text-end fw-bold">
                            Tổng giá:
                            <?php echo number_format($tong, 0, ',', '.') . ' <sup>đ</sup>'; ?>
                        </p>
                        <?php
                      }
                    }
                  ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- khuyến mãi  -->
    <div class="">
        <div class="">
            <div class="plans">
                <div class="title" style="font-weight: bold;">Khuyến mãi</div>
                <?php
                $i=0;
                $tong =0;
                foreach($_SESSION['giohang'] as $key => $gh){
                  foreach($data['sanpham'] as $key => $sp){
                    if($gh['ma_sp'] == $sp['ma_sp']){
                      $tong = $tong + ( $sp['gia_sp'] * $gh['soluong_dat'] );
                    }
                  }
                }
                if($data['khuyenmai_hien']){
                  foreach($data['khuyenmai_hien'] as $key => $km){
                    $i++;
                    if($tong >= $km['dieukien_km']){
                      ?>
                <label class="plan basic-plan" for="<?php echo $i ?>">
                    <input type="radio" name="ma_km" id="<?php echo $i ?>" value="<?php echo $km['ma_km'] ?>" />
                    <div class="plan-content">
                        <img loading="lazy" src="<?php echo BASE_URL ?>public/img/logo/sale.png" alt="" />
                        <div class="plan-details">
                            <span><?php echo $km['ten_km'] ?></span>
                            <p>Đơn tối thiểu
                                <?php echo number_format($km['dieukien_km'], 0, ',', '.') . ' <sup>đ</sup>'.' được giảm '?><?php echo $km['phantram_km'].'%' ?>
                            </p>
                        </div>
                    </div>
                </label>
                <?php
                    }
                    
                  }
                }else{
                  ?>
                <p style="color: blue;">Hiện không có khuyến mãi</p>
                <?php
                }
                
              ?>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="mb-4">
        <form action="<?php echo BASE_URL ?>donhang/dathang" method="POST" autocomplete="off">
            <?php
              $tong = 0;
              foreach($_SESSION['giohang'] as $key => $gh){
                foreach($data['sanpham'] as $key => $sp){
                  if($gh['ma_sp'] == $sp['ma_sp']){
                    $tong = $tong + ( $sp['gia_sp'] * $gh['soluong_dat'] );
                  }
                }
              }
              if($data['khuyenmai_hien']){
                foreach($data['khuyenmai_hien'] as $key => $km){
                  if($tong >= $km['dieukien_km']){
                    ?>
            <input type="hidden" name="ma_km" value="<?php echo $km['ma_km'] ?>">
            <?php
                  }else if($tong < $km['dieukien_km']) {
                    ?>
            <input type="hidden" name="ma_km" value="0">
            <?php
                  }
                }
                foreach($data['khuyenmai_hien'] as $key => $km){
                  if($tong >= $km['dieukien_km'] && $tong<2000000){
                    $tong = $tong + 30000 - (($tong*$km['phantram_km'])/100);
                    ?>
            <input type="hidden" name="tonggia_dh" value="<?php echo $tong ?>">
            <?php
                  }else if($tong < $km['dieukien_km'] && $tong<2000000){
                    $tong = $tong + 30000;
                    ?>
            <input type="hidden" name="tonggia_dh" value="<?php echo $tong ?>">
            <?php
                  }else if($tong >= $km['dieukien_km'] && $tong>2000000){
                    $tong = $tong - (($tong*$km['phantram_km'])/100);
                    ?>
            <input type="hidden" name="tonggia_dh" value="<?php echo $tong ?>">
            <?php
                  }else if ($tong < $km['dieukien_km'] && $tong>2000000){
                    ?>
            <input type="hidden" name="tonggia_dh" value="<?php echo $tong ?>">
            <?php
                  }
                }
              }else{
                ?>
            <input type="hidden" name="ma_km" value="0">
            <?php
                if($tong>2000000){
                  ?>
            <input type="hidden" name="tonggia_dh" value="<?php echo $tong ?>">
            <?php
                }else if($tong<2000000){
                  $tong = $tong + 30000;
                  ?>
            <input type="hidden" name="tonggia_dh" value="<?php echo $tong ?>">
            <?php
                }
              }
              
            ?>
            <p class="fw-bold">THÔNG TIN KHÁCH HÀNG</p>
            <div class="row">
                <div class="col-4">
                    <input type="text" name="ten_k" class="form-control" placeholder="Họ tên" autofocus required
                        minlength="5" value="Lê Diểm Trinh">
                </div>
                <div class="col-4">
                    <input type="text" name="sdt_k" class="form-control" placeholder="Số Điện Thoại" required
                        pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" maxlength="10"
                        value="0374972984">
                </div>
                <div class="col-4">
                    <select name="gioitinh_k" class="form-select" style="height:34px ; font-size: 16px;"
                        aria-label="Default select example">
                        <option>Giới tính</option>
                        <option value="1">Nam</option>
                        <option value="2" selected>Nữ</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-8">
                    <input name="diachi_k" type="text" class="form-control" placeholder="Địa chỉ" required
                        minlength="10" value="Phú Lộc, Tam Bình, Vĩnh Long">
                </div>
                <div class="col-4">
                    <input name="matkhau_k" type="password" class="form-control" placeholder="Mật khẩu" required
                        value="lediemtrinh">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-warning btn_dathang p-3 ">ĐẶT HÀNG</button>
            </div>

        </form>
    </div>
    <?php
    }else{
      ?>
    <img src="<?php echo BASE_URL ?>public/img/logo/giohang_trong.png"
        style="display: block; margin-left: auto; margin-right: auto;">
    <?php
    }
  ?>

</div>
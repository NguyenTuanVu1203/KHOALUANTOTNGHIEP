<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>thongke/index">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Thông tin nhân viên
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên</th>
                        <th scope="col">Mã số</th>
                        <th scope="col">UserName</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Ngày vào</th>
                        <th scope="col">Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            foreach($data['nhanvien_ma'] as $key => $nv){
              ?>
                    <tr>
                        <th scope="row"><?php echo $nv['ten_nv'] ?></th>
                        <td><?php echo $nv['ma_nv'] ?></td>
                        <td><?php echo $nv['user_nv'] ?></td>
                        <td><?php echo $nv['sdt_nv'] ?></td>
                        <td><?php echo $nv['diachi_nv'] ?></td>
                        <td><?php echo $nv['ngayvao'] ?></td>
                        <td><?php echo $nv['level'] ?></td>
                    </tr>
                    <?php
            }
          ?>
                </tbody>
            </table>
        </div>

    </div>

</div>
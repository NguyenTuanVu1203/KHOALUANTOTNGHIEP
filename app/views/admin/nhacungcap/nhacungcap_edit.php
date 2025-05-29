<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>nhacungcap/nhacungcap">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin nhà cung cấp
        </div>
        <?php
      foreach ($data['nhacungcap_ma'] as $key => $ncc){
        ?>
        <form action="<?php echo BASE_URL ?>nhacungcap/nhacungcap_update/<?php echo $ncc['ma_ncc'] ?>" method="POST"
            autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_ncc"
                                value="<?php echo $ncc['ten_ncc'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Địa chỉ: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="diachi_ncc"
                                value="<?php echo $ncc['diachi_ncc'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Sô điện thoại: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required
                                pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" maxlength="10"
                                name="sdt_ncc" value="<?php echo $ncc['sdt_ncc'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scfope="row">Email: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required name="email_ncc"
                                value="<?php echo $ncc['email_ncc'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="update_ncc">
                                <i class="fas fa-edit"></i>
                                Cập nhật
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php
      }
    ?>
    </div>
</div>
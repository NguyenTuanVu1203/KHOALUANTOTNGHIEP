<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>mau/mau">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin màu
        </div>
        <?php
      foreach ($data['mau_ma'] as $key => $m){
        ?>
        <form action="<?php echo BASE_URL ?>mau/mau_update/<?php echo $m['ma_m'] ?>" method="POST" autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_m"
                                value="<?php echo $m['ten_m'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="title_table">Mã màu: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="mau"
                                value="<?php echo $m['mau'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="update_m">
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
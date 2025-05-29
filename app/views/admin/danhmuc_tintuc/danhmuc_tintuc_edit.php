<div id="wrapper">
    <div class="content-page card-box">
        <div class="alert alert-success title_page" role="alert">
            <a href="<?php echo BASE_URL ?>danhmuc_tintuc/danhmuc_tintuc">
                <button type="button" class="btn btn-warning">
                    <i class="fas fa-solid fa-caret-left"></i>&ensp;
                </button> &ensp;
            </a>
            Cập nhật thông tin danh mục
        </div>
        <?php
      foreach ($data['danhmuc_tintuc_ma'] as $key => $dmtt){
        ?>
        <form action="<?php echo BASE_URL ?>danhmuc_tintuc/danhmuc_tintuc_update/<?php echo $dmtt['ma_dmtt'] ?>"
            method="POST" autocomplete="off">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" class="title_table">Tên: </th>
                        <td class="was-validated">
                            <input type='text' class='form-control input_table' required autofocus name="ten_dmtt"
                                value="<?php echo $dmtt['ten_dmtt'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success font-weight-bold" name="update_dmtt">
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
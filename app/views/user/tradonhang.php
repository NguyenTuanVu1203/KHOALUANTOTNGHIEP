<div class="container tra_donhang">
    <div class="row">
        <div class="col-6">
            <img src="<?php echo BASE_URL ?>public/img/sanpham/1.jpg" class="center-block w-100" alt="">
        </div>
        <div class="col-6">
            <form action="<?php echo BASE_URL ?>index/lichsu_donhang" method="POST">
                <h3 class="text-center fw-bold">Tra cứu thông tin đơn hàng</h3>
                <input type="text" style="border-radius:15px ;" class="form-control mt-4"
                    placeholder="Nhập số điện thoại mua hàng" name="sdt_k" required value="0384972984">
                <input type="password" style="border-radius:15px ;" class="form-control mt-4"
                    placeholder="Nhập mật khẩu" name="matkhau_k" required value="codedoan.com">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mt-4">Tra cứu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="public/css/styledangnhapAdmin.css">
</head>

<body>
    <div class="login-box">
        <h2>Đăng nhập</h2>
        <form action="<?php echo BASE_URL ?>dangnhap/nhanvien_dangnhap" method="POST" autocomplete="off">
            <div class="user-box">
                <input type="text" name="user_nv" required="" autofocus value="admin">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="pass_nv" required="" value="123456">
                <label>Password</label>
            </div>
            <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button type="submit" class="btn_dangnhap" name="dangnhap">Đăng nhập</button>

            </a>
        </form>
    </div>
</body>

</html>
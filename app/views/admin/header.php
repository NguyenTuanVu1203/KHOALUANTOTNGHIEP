<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo BASE_URL ?>public/assets\images\favicon.ico">
    <!-- link icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  -->
    <!--  -->
    <!-- App css -->
    <link href="<?php echo BASE_URL ?>public/assets\css\bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet">
    <link href="<?php echo BASE_URL ?>public/assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL ?>public/assets\css\app.min.css" rel="stylesheet" type="text/css"
        id="app-stylesheet">
    <!-- link biểu đồ -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!--  -->
    <!-- link style css -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/styleAdmin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                        <i class="mdi mdi-settings-outline noti-icon"></i>
                    </a>
                </li>
            </ul>
            <!-- LOGO -->
            <div class="logo-box">
                <a href="<?php echo BASE_URL ?>admin/index" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="" alt="" height="26">
                    </span>
                    <span class="logo-sm">
                        <img src="<?php echo BASE_URL ?>public/assets\images\logo-sm.png" alt="" height="22">
                    </span>
                </a>
                <a href="<?php echo BASE_URL ?>admin/index" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="<?php echo BASE_URL ?>public/assets\images\logo-light.png" alt="" height="26">
                    </span>
                    <span class="logo-sm">
                        <img src="<?php echo BASE_URL ?>public/assets\images\logo-sm.png" alt="" height="22">
                    </span>
                </a>
            </div>
            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <!-- Vendor js -->
    <script src="../public/assets\js\vendor.min.js"></script>
    <script src="../public/assets\libs\morris-js\morris.min.js"></script>
    <script src="../public/assets\libs\raphael\raphael.min.js"></script>
    <script src="../public/assets\js\pages\dashboard.init.js"></script>
    <!-- App js -->
    <script src="../public/assets\js\app.min.js"></script>

</body>

</html>
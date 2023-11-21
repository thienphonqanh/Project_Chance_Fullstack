<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image" href="<?php echo _WEB_ROOT; ?>/public/client/assets/images/Logo-Chance.png">

        <title>Chance-Website tuyển dụng hàng đầu</title>

        <!-- CSS FILES -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" >

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/client/assets/css/base.css?ver=<?php echo rand(); ?>">

        <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/client/assets/css/main.css?ver=<?php echo rand(); ?>">

        <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/client/assets/css/responsive.css?ver=<?php echo rand(); ?>">
        
    </head>
    
    <body id="top">

        <!-- Thanh header -->
        <nav class="navbar p-1 navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="<?php echo _WEB_ROOT; ?>/trang-chu">
                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/logos/Logo-Chance.png" class="img-fluid logo-image">

                    <div class="d-flex flex-column">
                        <strong class="logo-text">Chance</strong>
                        <small class="logo-slogan">Online Job Portal</small>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-center ms-lg-5">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo _WEB_ROOT; ?>/trang-chu">Trang chủ</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo _WEB_ROOT; ?>/cam-nang">Cẩm nang</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo _WEB_ROOT; ?>/tim-viec-lam">Tìm việc làm</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo _WEB_ROOT; ?>/lien-he">Liên hệ</a>
                        </li>

                        <?php 
                            if (!isLogin()):                        
                        ?>
                            <li class="nav-item ms-lg-auto">
                                <a class="nav-link text-dark fw-normal" type="button" href="<?php echo _WEB_ROOT; ?>/dang-ky">Đăng ký</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link custom-btn btn" href="<?php echo _WEB_ROOT; ?>/dang-nhap">Đăng nhập</a>
                            </li>

                        <?php elseif (!isUser()): ?>

                            <li class="nav-item dropdown ms-lg-auto">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle m-2"></i> <?php echo Session::data('user_data')['fullname']; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo _WEB_ROOT; ?>/admin">Trang quản trị</a></li>
                                    <li><a class="dropdown-item" href="<?php echo _WEB_ROOT; ?>/dang-xuat">Đăng xuất</a></li>
                                </ul>
                            </li>

                        <?php else: ?>

                            <li class="nav-item dropdown ms-lg-auto">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle m-2"></i> <?php echo Session::data('user_data')['fullname']; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                                    <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                                    <li><a class="dropdown-item" href="<?php echo _WEB_ROOT; ?>/dang-xuat">Đăng xuất</a></li>
                                </ul>
                            </li>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
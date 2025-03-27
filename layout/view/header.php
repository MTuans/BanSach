<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/base.css">
    <link rel="stylesheet" href="public/css/main.css">
    <title>Document</title>
</head>

<body>

<header>
     <!-- MENU-START -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo bên trái -->
            <a class="navbar-brand" href="index.php?act=index"><img src="public/img/IMG_DA1/logo/Book Store Logo.png" alt="" class="small_img"></a>

            <!-- Nút Toggle cho thiết bị di động -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar nội dung -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Các mục ở giữa khi ở màn hình lớn -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=index">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=product">Sản Phẩm</a>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=about">Giới Thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=contact">Liên Hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=article">Bài Viết</a>
                    </li>
                </ul>

                <!-- Thanh tìm kiếm và các nút bên phải -->
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Thanh tìm kiếm -->
                    <?php
                    $idtimkiem = isset($_GET['idtimkiem']) ? $_GET['idtimkiem'] : '';
                    ?>
                    <!-- form tìm kiếm trong header hoặc trang chủ -->
                    <li class="nav-item me-2">
                        <form class="d-flex">
                        <input type="hidden" name="act" value="product">
                        <input class="form-control search-input" type="search" name="idtimkiem" placeholder="Tìm kiếm sách..." required>
                        <button type="submit" class="fa fa-search search-icon tim"></button>
                        </form>
                    </li>


                    <!-- Nút giỏ hàng -->
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary cart-button"> <a style="text-decoration: none; color: white;" href="index.php?act=cart"> Giỏ hàng</a><i class="fa-solid fa-cart-shopping"></i></button>
                    </li>
                    <!-- Tài khoản và các nút đăng nhập/đăng ký -->
                    <li class="nav-item dropdown ms-3">
                        <button onclick="window.location.href='index.php?act=acc';" class="btn btn-outline-secondary account-button dropdown-toggle" type="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                                echo isset($_SESSION['user']['username']) ?  $_SESSION['user']['username'] :"Tài Khoản";
                            ?>
                            <i class="fa-solid fa-user"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="accountDropdown">

                            <?php
                                echo isset($_SESSION['user']['username'])?  "":'<li><a class="dropdown-item" href="index.php?act=register">Đăng Ký</a></li>';
                            ?>
                            <?php
                                echo (isset($_SESSION['user']['username']) and ($_SESSION['vai_tro']==1))?  '<li><a class="dropdown-item" href="index.php?act=readmin">Đến Admin</a></li>':'';
                            ?>
                            <li><a class="dropdown-item"  href="index.php?act=<?php echo trim(isset($_SESSION['user']['username'])) ? 'logout' : 'login'; ?>">

                            <?php
                                echo isset($_SESSION['user']['username'])?  "Đăng Xuất":"Đăng Nhập";
                            ?>
                            </a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- MENU - END -->
</header>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Header Redesign</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    .navbar {
      background-color: white !important;
    }
    .navbar-nav .nav-link,
    .navbar-brand span {
      color: #D98C52 !important;
    }

    .navbar-nav .nav-link:hover {
      color: #fff !important;
    }
    .container{
    height: 8vh;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php?page=home">
          <span>AdminPanel</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href=""> <?php echo isset($_SESSION['user']['username']) ? $_SESSION['user']['username']:"";
      ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=logout"> <?php echo isset($_SESSION['user']['username']) ?"Chuyển lại trang web" : "";
?></a>
            </li>
            <li><a class="nav-link"  href="index.php?act=<?php echo trim(isset($_SESSION['user']['username'])) ? 'thoat' : ''; ?>">

                            <?php
                                echo isset($_SESSION['user']['username'])?  "Đăng Xuất":"";
                            ?>
                            </a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

   <div class="d-flex">
    <div class="sidebar text-white p-3" style="width: 250px; min-height: 100vh;">
      <ul class="nav flex-column mt-4">
        <li class="nav-item"><a href="index.php?page=home" class="nav-link text-white">Tổng quan</a></li>
        <li class="nav-item"><a href="index.php?page=book" class="nav-link text-white">Quản lý sách</a></li>
        <li class="nav-item"><a href="index.php?page=category" class="nav-link text-white">Quản lý thể loại</a></li>
        <li class="nav-item"><a href="index.php?page=author" class="nav-link text-white">Quản lý tác giả</a></li>
        <li class="nav-item"><a href="index.php?page=publishinghouse" class="nav-link text-white">Quản lý nhà xuất bản</a></li>
        <li class="nav-item"><a href="index.php?page=order" class="nav-link text-white">Quản lý đơn hàng</a></li>
        <li class="nav-item"><a href="index.php?page=users" class="nav-link text-white">Quản lý Người dùng</a></li>
      </ul>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

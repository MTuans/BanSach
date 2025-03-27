<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    .bg-dark {
      background-color: #D98C52 !important;
    }
    .main-container {
      max-width: 100%;
    }
    .sidebar {
      background-color: #D98C52 !important;
    }
    .nav-link {
      color: #fff !important;
      font-weight: bold;
    }
    .nav-link:hover {
      background-color: #B77D42 !important; /* Darker shade on hover */
    }
    .card-body {
      background-color: #F4F1ED;
      border-radius: 10px;
    }
    .card {
      border-radius: 10px;
      border: none;
    }
    .card-title {
      color: #D98C52;
      font-weight: bold;
    }
    .card-text {
      color: #D98C52;
      font-size: 1.5rem;
    }
    .chart-container {
      background-color: #fff;
      border-radius: 10px;
      padding: 1rem;
    }
    .chart-title {
      color: #D98C52;
      font-weight: bold;
    }
    h4 {
      color: #D98C52 !important;
    }
  </style>
</head>

<body>
    <div class="container-fluid p-4 main-container">
      <h4 class="mb-4">Welcome
        <?php
          echo isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : "";
        ?> !
      </h4>
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Số lượng sách đã bán</h5>
              <p class="card-text fs-4"><?=$sp[0]['so_luong_sach_sale']?></p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Doanh thu hôm nay</h5>
              <p class="card-text fs-4"><?=$dt_cur[0]['doanh_thu_hom_nay']*1000?> VNĐ</p>
            </div>
          </div>
        </div>
<div class="col-md-3 mb-3">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Doanh thu tuần</h5>
              <p class="card-text fs-4"><?=$dt_w[0]['doanh_thu_tuan']*1000?> VNĐ</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Doanh thu tháng</h5>
              <p class="card-text fs-4"><?=$dt_m[0]['doanh_thu_thang']*1000?> VNĐ</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="chart-container">
            <h5 class="chart-title">Số lượng sách đã bán</h5>
            <canvas id="salesChart"></canvas>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="chart-container">
            <h5 class="chart-title">Thể loại sách bán chạy</h5>
            <canvas id="categoryChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    //json_decode chuyển đổi mảng thành json để js có thể hiểu
    const salesData = <?= json_encode(array_column($sl_sach, 'so_luong_ban')) ?>;
    const daysOfWeek = ['Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'];

    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'line', 
        data: {
            labels: daysOfWeek,
            datasets: [{
                label: 'Số sách đã bán',
                data: salesData, 
                backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                borderColor: 'rgba(75, 192, 192, 1)', 
                borderWidth: 2,
                tension: 0.4 
            }]
        }
    });

 
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const categories = <?= json_encode(array_column($loai_sach, 'ten_theloai')) ?>;
    const sales = <?= json_encode(array_column($loai_sach, 'so_luong_ban')) ?>;
    
    console.log(categories);
    console.log(sales);
    
    
    new Chart(categoryCtx, {
    type: 'bar',
    data: {
        labels: categories, 
        datasets: [{
            label: 'Số lượng sách bán ra',
            data: sales,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 2
        }]
    }
});
 
      </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
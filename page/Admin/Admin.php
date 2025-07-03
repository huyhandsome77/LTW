<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="/ltw/assets/css/admin.css">
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>
   <?php
ob_start(); 
?>


  <div class="container-fluid py-4 px-5">
    <div class="row mb-4">
      <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
          <div class="card-body">
            <h5 class="card-title">Tổng sản phẩm</h5>
            <h3>124</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
          <div class="card-body">
            <h5 class="card-title">Đơn hàng hôm nay</h5>
            <h3>23</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
          <div class="card-body">
            <h5 class="card-title">Khách hàng mới</h5>
            <h3>5</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
          <div class="card-body">
            <h5 class="card-title">Doanh thu hôm nay</h5>
            <h3>5.200.000₫</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">Top sản phẩm bán chạy</div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">1. Mì Hảo Hảo - 150 lượt</li>
            <li class="list-group-item">2. Nước suối Lavie - 132 lượt</li>
            <li class="list-group-item">3. Bánh Oreo - 90 lượt</li>
            <li class="list-group-item">4. Cà phê G7 - 85 lượt</li>
            <li class="list-group-item">5. Sữa tươi TH True Milk - 80 lượt</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">Biểu đồ doanh thu 7 ngày gần nhất</div>
          <div class="card-body">
            <canvas id="revenueChart" height="150"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">Đơn hàng gần đây</div>
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>Mã đơn</th>
              <th>Khách hàng</th>
              <th>Ngày đặt</th>
              <th>Tổng tiền</th>
              <th>Trạng thái</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#DH1001</td>
              <td>Nguyễn Văn A</td>
              <td>28/06/2025</td>
              <td>520.000₫</td>
              <td><span class="badge bg-warning">Đang xử lý</span></td>
            </tr>
            <tr>
              <td>#DH1000</td>
              <td>Trần Thị B</td>
              <td>28/06/2025</td>
              <td>1.200.000₫</td>
              <td><span class="badge bg-success">Đã giao</span></td>
            </tr>
            <tr>
              <td>#DH0999</td>
              <td>Lê Văn C</td>
              <td>27/06/2025</td>
              <td>325.000₫</td>
              <td><span class="badge bg-danger">Đã hủy</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['22/6', '23/6', '24/6', '25/6', '26/6', '27/6', '28/6'],
        datasets: [{
          label: 'Doanh thu (VND)',
          data: [4200000, 3800000, 4600000, 5100000, 4800000, 5300000, 5200000],
          fill: true,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
  </script>


<?php
$pageContent = ob_get_clean(); 
include (__DIR__ . '/../../components/layout/layoutadmin.php'); 
?>

    
</body>
<html>
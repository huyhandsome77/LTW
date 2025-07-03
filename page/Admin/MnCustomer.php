<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng</title>
    
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <?php
   ob_start();
    ?>
<div class="customer-page">
  <div class="container">
    <div class="header d-flex justify-space-between align-items-center mb-3">
      <h2>Quản lý khách hàng</h2>
      <a href="#" class="btn-primary">+ Thêm khách hàng</a>
    </div>

    <div class="filter-bar d-flex justify-space-between align-items-center mb-3">
      <input type="text" class="search-box" placeholder="Tìm theo tên, email, SĐT...">
      <select class="filter-select">
        <option>Tất cả</option>
        <option>Hoạt động</option>
        <option>Bị khóa</option>
      </select>
    </div>

    <table class="table-customer">
      <thead>
        <tr>
          <th>#</th>
          <th>Họ tên</th>
          <th>Email</th>
          <th>Số điện thoại</th>
          <th>Trạng thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Nguyễn Văn A</td>
          <td>vana@gmail.com</td>
          <td>0901234567</td>
          <td><span class="badge active">Hoạt động</span></td>
          <td>
            <a href="#" class="btn-sm btn-warning">Sửa</a>
            <a href="#" class="btn-sm btn-danger">Xoá</a>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Trần Thị B</td>
          <td>tranb@gmail.com</td>
          <td>0911223344</td>
          <td><span class="badge inactive">Bị khóa</span></td>
          <td>
            <a href="#" class="btn-sm btn-warning">Sửa</a>
            <a href="#" class="btn-sm btn-danger">Xoá</a>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="pagination">
      <a href="#">«</a>
      <a href="#" class="active">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">»</a>
    </div>
  </div>
</div>
    <?php
   $pageContent = ob_get_clean();
    include(__DIR__ . '/../../components/layout/layoutadmin.php');
    ?>
</body>
<html>
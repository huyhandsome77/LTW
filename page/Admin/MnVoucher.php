<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khuyến mãi</title>
    <link rel="stylesheet" href="/ltw/assets/css/admin.css">
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
<div class="page-discount-management">
  <div class="header">
    <a href="#" class="btn-add" onclick="showAddForm()">+ Thêm mã giảm giá</a>
    <input type="text" class="search-box" placeholder="Tìm mã...">
  </div>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Mã Code</th>
        <th>Giá trị giảm</th>
        <th>Đơn tối thiểu</th>
        <th>Thời gian áp dụng</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody id="discountTableBody">
      <tr>
        <td>1</td>
        <td>SUMMER20</td>
        <td>20%</td>
        <td>200.000₫</td>
        <td>01/07 - 10/07</td>
        <td>
          <a href="#" class="btn-sm btn-warning">Sửa</a>
          <a href="#" class="btn-sm btn-danger">Xoá</a>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>FREESHIP</td>
        <td>30.000₫</td>
        <td>150.000₫</td>
        <td>05/07 - 20/07</td>
        <td>
          <a href="#" class="btn-sm btn-warning">Sửa</a>
          <a href="#" class="btn-sm btn-danger">Xoá</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<script>
  function showAddForm() {
    alert("Hiển thị form thêm mã giảm giá tại đây.");
  }

  // Bạn có thể gắn thêm xử lý phân biệt dạng giảm giá %
  // hoặc số tiền dựa vào pattern hoặc select-type nếu có form.
</script>
    <?php
   $pageContent = ob_get_clean();
    include(__DIR__ . '/../../components/layout/layoutadmin.php');
    ?>
</body>
<html>
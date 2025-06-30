<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | 5AE WebShop</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/manager.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
  <?php 
    include("../connect.php");
    include("include/left-menu.php");
    ?>
    <div id="main">
    <?php include("include/navbar.php"); ?>
  <div id="main-content">
      <h3><i class="fa-solid fa-receipt"></i> Danh sách đơn hàng</h3>

    <table id="bangDonHang">
      <thead>
        <tr>
          <th>Mã đơn hàng</th>
          <th>Tên sản phẩm</th>
          <th>Số lượng</th>
          <th>Ngày mua</th>
          <th>Tên khách hàng</th>
          <th>Trạng thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody id="order-table">
        <?php
      $sql = "SELECT 
            l.idDonHang, 
            MAX(l.ngayDat) AS ngayDat, 
            MAX(l.trangThai) AS trangThai, 
            MAX(u.fullName) AS tenKhachHang, 
            GROUP_CONCAT(DISTINCT s.tensanpham SEPARATOR ', ') AS tensanpham, 
            COUNT(*) AS soLuong
        FROM lichsudathang l
        JOIN user u ON l.idUser = u.idUser
        JOIN sanpham s ON l.idSanPham = s.idSanPham
        GROUP BY l.idDonHang";

$result = $link->query($sql);
      while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['idDonHang'] . "</td>";
    echo "<td>" . $row['tensanpham'] . "</td>";
    echo "<td>" . $row['soLuong'] . "</td>";
    echo "<td>" . $row['ngayDat'] . "</td>";
    echo "<td>" . $row['tenKhachHang'] . "</td>";
    echo "<td>" . $row['trangThai'] . "</td>";
    echo "<td>
        <form method='post' action='xuly/capnhattrangthai.php' style='display:inline'>
          <input type='hidden' name='idDonHang' value='" . $row['idDonHang'] . "'>
          <select name='trangThai' style='width: 150px;' onchange='this.form.submit()' class='status-dropdown'>
            <option" . ($row['trangThai'] == 'Chờ Xác Nhận' ? " selected" : "") . ">Chờ Xác Nhận</option>
            <option" . ($row['trangThai'] == 'Đã Xác Nhận' ? " selected" : "") . ">Đã Xác Nhận</option>
            <option" . ($row['trangThai'] == 'Đang Giao Hàng' ? " selected" : "") . ">Đang Giao Hàng</option>
            <option" . ($row['trangThai'] == 'Giao Hàng Thành Công' ? " selected" : "") . ">Giao Hàng Thành Công</option>
            <option" . ($row['trangThai'] == 'Đã Hủy' ? " selected" : "") . ">Đã Hủy</option>
          </select>
        </form>

      </td>";

    echo "</tr>";
}
?>
      </tbody>
      </body>


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
  <style>
    body { font-family: Arial; padding: 20px; background: #f5f5f5; }
    table { width: 100%; border-collapse: collapse; background: #fff; }
    th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
    input[type=number], input[type=date] { width: 90px; padding: 4px; }
    button { padding: 6px 10px; }
    h2 { margin-bottom: 20px; }
    form { display: inline; }
  </style>

  <?php

include("../connect.php");

// Xử lý cập nhật giảm giá
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = $_POST['idSanPham'];
  $giam = intval($_POST['giamGia']);
  $batdau = $_POST['ngayBatDau'];
  $ketthuc = $_POST['ngayKetThuc'];

  $stmt = $link->prepare("UPDATE sanpham SET giamGia = ?, ngayBatDau = ?, ngayKetThuc = ? WHERE idSanPham = ?");
  $stmt->bind_param("issi", $giam, $batdau, $ketthuc, $id);
  $stmt->execute();
  $stmt->close();
}

?>
<body>
  <h2>Quản lý giảm giá sản phẩm</h2>
  <table>
    <thead>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Giá gốc</th>
        <th>Giảm (%)</th>
        <th>Bắt đầu</th>
        <th>Kết thúc</th>
        <th>Thao tác</th>
        
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['tenSanPham']) ?></td>
        <td><?= number_format($row['gia']) ?>₫</td>
        <form method="POST">
          <td>
            <input type="hidden" name="idSanPham" value="<?= $row['idSanPham'] ?>">
            <input type="number" name="giamGia" value="<?= $row['giamGia'] ?>" min="0" max="100" />
          </td>
          <td><input type="date" name="ngayBatDau" value="<?= $row['ngayBatDau'] ?>"></td>
          <td><input type="date" name="ngayKetThuc" value="<?= $row['ngayKetThuc'] ?>"></td>
          <td><button type="submit">Cập nhật</button></td>
        </form>
      </tr>
      <?php; ?>
    </tbody>
  </table>
</body>
</html>


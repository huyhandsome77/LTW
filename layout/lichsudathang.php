<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | 5AE WebShop</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <style>
      h3 {
        margin-top : 10px;
        text-align: center;
        font-weight: bold;
        padding: 15px;
        background-color: #6c5ce7;
        color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }

    #lsdh {
        width: 100%;
        background-color: white;
        border-spacing: 0 5px;
    }

    #lsdh thead tr {
        background-color: #6c5ce7;
        color: white;
        font-weight: bold;
    }

    #lsdh th, #lsdh td {
        padding: 10px 12px;
        text-align: center; 
    }

    #lsdh tbody tr {
        background-color: #ffffff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        border-radius: 8px;
    }

    #lsdh tbody tr:hover {
        background-color: #f0f0ff;
    }

    .cancel-btn {
        padding: 8px 14px;
        background-color: #d63031;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .cancel-btn:hover {
        background-color: #e74c3c;
    }
    </style>
  </head>
  <body>
    <?php 
    include("../connect.php");
    include("include/left-menu.php");
    ?>
    <div id="main">
      <?php include("include/navbar.php"); ?>
      <div id="main-content">
      <h3>LỊCH SỬ ĐẶT HÀNG</h3>
      <table id="lsdh">
          <thead>
              <tr>
                  <th>STT</th>
                  <th>Mã đơn hàng</th>
                  <th>Tên sản phẩm</th>
                  <th>Ngày đặt hàng</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th>
              </tr>
          </thead>
          <tbody>
              <?php
              $idUser = $_SESSION['user']['idUser'];
              $sql = "
                  SELECT l.idDonHang, s.tenSanPham, l.ngayDat, l.trangThai
                  FROM lichsudathang l
                  JOIN sanpham s ON l.idSanPham = s.idSanPham
                  WHERE l.idUser = $idUser
                  ORDER BY l.ngayDat DESC
              ";
              $result = mysqli_query($link, $sql);
              $stt = 1;

              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $stt++ . "</td>";
                  echo "<td>" . htmlspecialchars($row['idDonHang']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['tenSanPham']) . "</td>";
                  echo "<td>" . date("d-m-Y", strtotime($row['ngayDat'])) . "</td>";
                  echo "<td>" . htmlspecialchars($row['trangThai']) . "</td>";

                  if ($row['trangThai'] == 'Chờ Xác Nhận') {
                      echo "<td><button class='cancel-btn' onclick=\"huyDon(" . $row['idDonHang'] . ")\">Hủy đơn hàng</button></td>";
                  } else {
                      echo "<td>—</td>";
                  }

                  echo "</tr>";
              }
              ?>
              </tbody>
      </table>
        <p style="margin-top: 1000px">
        </p>
      </div>
      <?php include("include/footer.php"); ?>
    </div>
    <script>
      $(document).ready(function () {
        $(".submenu").hide();
        $(".menu1").click(function (e) {
          e.preventDefault();
          const submenu = $(this).siblings(".submenu");
          submenu.slideToggle();
          $(this).find(".caret-icon").toggleClass("rotate");
        });
      });
      function huyDon(id) {
          if (confirm("Bạn có chắc muốn hủy đơn hàng #" + id + " không?")) {
            window.location.href = "xuly/huyDonHang.php?id=" + id;
          }
        }
    </script>
  </body>
</html>

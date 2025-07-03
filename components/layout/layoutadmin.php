<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header("Location: /ltw/components/layout/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="/ltw/assets/css/admin/admin.css">
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <div id="left-menu">
      <div id="logo">
        <a href="Admin.php"><img  src="../../assets/img/logo1.png" alt="logo" /></a>
      </div>
      <div id="menu">
        <div class="menu-item">
          <a href="Admin.php"><i class="fa-solid fa-house"></i> Home</a>
        </div>
        <div class="menu-item">
          <a href="MnProduct.php"><i class="fa-solid fa-box"></i> Quản lý Sản Phẩm</a>
        </div>
        <div class="menu-item">
        <a href="MnOrder.php"><i class="fa-solid fa-truck "></i> Quản lý Đơn hàng</a>
        </div>
        <div class="menu-item">
          <a href="MnCustomer.php"><i class="fa-solid fa-users"></i> Quản lý Khách hàng</a>
        </div>
        <div class="menu-item">
        <a href="MnContact.php"><i class="fa-solid fa-comment"></i>Phản hồi</a>
        </div>
        <div class="menu-item">
          <a href="MnVoucher.php"><i class="fa-solid fa-ticket"></i>Khuyến Mãi</a>
        </div>
        <div class="menu-item">
          <a href="MnReport.php"><i class="fa-solid fa-bug"></i>Báo Cáo</a>
        </div>
      </div>
    </div>
    <div id="main">
      <div id="navbar">
        <div id="search">
          <input type="text" placeholder="Nhập nội dung cần tìm kiếm..." />
          <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div
          id="profile"
          tabindex="0"
          aria-haspopup="true"
          aria-expanded="false"
          aria-label="User profile menu"
        >
          <div class="myprofile">
            <img src="../../assets/img/avt/received_150457054732021.jpg" alt="User avatar" />
            <div class="user-info">
              <p id="name">HaiConVit</p>
              <p id="role">Admin</p>
            </div>
          </div>
          <div id="profile-dropdown" role="menu" aria-hidden="true">
            <div class="header">
              <img src="../../assets/img/avt/received_150457054732021.jpg" alt="User avatar" />
              <div class="info">
                <p class="name">Lê Quang Thạnh</p>
                <p class="email">HaiConVit@gmail.com</p>
                <button type="button">Xem Profile</button>
              </div>
            </div>
            <ul>
              <li><a href="#" >Xem đơn đặt hàng</a></li>
              <li><a href="#" >Cài đặt tài khoản</a></li>
            <li><a href="#" id="logout-btn">Đăng xuất</a></li>

            </ul>
          </div>
        </div>
      </div>
      <div id="main-content">
        <?= $pageContent ?? '<p>Không có nội dung.</p>' ?>
      </div>
      <div id="footer">© 2025 5AE WebShop. All rights reserved.</div>
    </div>
    <script>
      $(document).ready(function () {
        const profile = $("#profile");
        const dropdown = $("#profile-dropdown");
        function closeDropdown() {
          dropdown.hide();
          profile.attr("aria-expanded", "false");
          dropdown.attr("aria-hidden", "true");
        }
        profile.on("click keydown", function (e) {
          if (
            e.type === "click" ||
            (e.type === "keydown" && (e.key === "Enter" || e.key === " "))
          ) {
            e.preventDefault();
            if (dropdown.is(":visible")) {
              closeDropdown();
            } else {
              dropdown.show();
              profile.attr("aria-expanded", "true");
              dropdown.attr("aria-hidden", "false");
            }
          }
        });
        $(document).on("click", function (e) {
          if (
            !profile.is(e.target) &&
            profile.has(e.target).length === 0 &&
            !dropdown.is(e.target) &&
            dropdown.has(e.target).length === 0
          ) {
            closeDropdown();
          }
        });
        $("#logout-btn").on("click", function (e) {
  e.preventDefault();
  window.location.href = "/ltw/components/layout/logout.php";
});

      });
    </script>
</body>
<html>
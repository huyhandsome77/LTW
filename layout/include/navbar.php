<div id="navbar">
  <div id="search">
    <input type="text" placeholder="Nhập nội dung cần tìm kiếm..." />
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
  </div>

  <?php if (isset($_SESSION['user'])): ?>
    <!-- Đã đăng nhập -->
    <div id="profile" tabindex="0" aria-haspopup="true" aria-expanded="false" aria-label="User profile menu">
      <div class="myprofile">
        <img src="../assets/img/avt/1.jpg" alt="User avatar" />
        <div class="user-info">
          <p id="name"><?= htmlspecialchars($_SESSION['user']['username']) ?></p>
          <p id="role"><?= htmlspecialchars($_SESSION['user']['role']) ?></p>
        </div>
      </div>
      <div id="profile-dropdown" role="menu" aria-hidden="true">
        <div class="header">
          <img src="../assets/img/avt/1.jpg" alt="User avatar" />
          <div class="info">
            <p class="name"><?= htmlspecialchars($_SESSION['user']['username']) ?></p>
            <p class="email"><?= htmlspecialchars($_SESSION['user']['email']) ?></p>
            <button type="button">Xem Profile</button>
          </div>
        </div>
        <ul>
          <li><a href="#">Xem đơn đặt hàng</a></li>
          <li><a href="thongtincanhan.php">Cài đặt tài khoản</a></li>
          <li><a href="../xuly/logout_xuly.php">Đăng xuất</a></li>
        </ul>
      </div>
    </div>
  <?php else: ?>
    <!-- Chưa đăng nhập -->
    <div style="margin-left: auto; display: flex; gap: 10px;">
      <a href="../login.php" style="padding: 8px 14px; background-color: #0D99FF; color: white; border-radius: 6px; text-decoration: none;">Đăng nhập</a>
      <a href="../signup.php" style="padding: 8px 14px; background-color: #5a5ad1; color: white; border-radius: 6px; text-decoration: none;">Đăng ký</a>
    </div>
  <?php endif; ?>
</div>

<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>5AE - Online WebShop</title>
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
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        font-family: "Roboto", sans-serif;
        background-color: #f0f0f0;
      }
      #left-menu {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background-color: #6c5ce7;
        color: white;
        overflow-y: auto;
        z-index: 999;
      }
      #logo {
        width: 100%;
        height: 100px;
        text-align: center;
        padding: 10px;
        margin-bottom: 10px;
      }
      #logo img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
      }
      #menu .menu-item {
        padding: 12px 20px;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px,
          rgba(0, 0, 0, 0.1) 0px 2px 4px 0px,
          rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
        margin: 3px 0;
      }
      #menu .menu-item:hover {
        background-color: #8e7ef1;
      }
      .menu-item a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        display: flex;
        align-items: center;
        gap: 10px;
      }
      .menu1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        font-size: 18px;
        gap: 10px;
      }
      .submenu {
        display: none;
        background-color: #5a4cd1;
        margin-left: 10px;
        margin-top: 5px;
        padding: 5px 0;
        border-radius: 10px;
      }
      .submenu-item {
        padding: 8px 16px;
        background-color: #7b6de3;
        margin: 5px 10px;
        border-radius: 6px;
        transition: background-color 0.3s;
      }
      .submenu-item a {
        color: #e6e6fa;
        text-decoration: none;
      }
      .submenu-item:hover {
        background-color: #8c7ff0;
      }
      .submenu-item:hover a {
        color: #fff;
      }
      .caret-icon {
        margin-left: auto;
        transition: transform 0.3s ease;
      }
      .rotate {
        transform: rotate(180deg);
      }
      #main {
        margin-left: 250px;
        padding: 5px 20px;
      }
      #navbar {
        height: 60px;
        background-color: #fff;
        margin-top: 5px;
        margin-bottom: 10px;
        border-bottom: 1px solid #ccc;
        padding: 5px 20px;
        display: flex;
        align-items: center;
        position: relative;
        z-index: 20;
      }
      #navbar #search input {
        padding: 10px 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        width: 250px;
        font-size: 15px;
      }
      #navbar #search button {
        padding: 10px 10px;
        border: 1px solid rgb(177, 177, 177);
        margin-left: 3px;
        color: black;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
      }
      #navbar #search button:hover {
        background-color: #666;
        color: white;
      }

      #main-content {
        background-color: #fff;
        padding: 5px 20px;
        min-height: 400px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        display : flex;
        flex-direction: row;
        gap: 24px;
      }

      #footer {
        margin-top: 20px;
        padding: 10px;
        text-align: center;
        background-color: #ddd;
      }

      #profile {
        display: flex;
        align-items: center;
        margin-left: auto;
        gap: 10px;
        position: relative;
        cursor: pointer;
      }
      .myprofile {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 0 5px;
        border-radius: 10px;
      }
      .myprofile img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 8px;
      }
      .user-info {
        display: flex;
        flex-direction: column;
      }
      #name {
        margin: 0;
        font-weight: bold;
      }
      #role {
        margin: 0;
        font-size: 0.9em;
        color: #666;
      }
      #profile-dropdown {
        display: none;
        position: absolute;
        top: 70px;
        right: 0;
        width: 280px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 8px 24px rgb(0 0 0 / 0.15);
        border: 1px solid #ddd;
        z-index: 30;
        font-family: "Roboto", sans-serif;
      }
      .myprofile:hover {
        background-color: #b3b3b3;
      }
      #profile-dropdown .header {
        display: flex;
        gap: 15px;
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
        align-items: center;
      }
      #profile-dropdown .header img {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        object-fit: cover;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 8px;
      }
      #profile-dropdown .header .info {
        flex-grow: 1;
      }
      #profile-dropdown .header .info p.name {
        font-weight: 600;
        color: #333;
        margin-bottom: 4px;
      }
      #profile-dropdown .header .info p.email {
        font-size: 0.9em;
        color: #666;
        margin-bottom: 8px;
      }
      #profile-dropdown .header .info button {
        background-color: #5a5ad1;
        color: white;
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      #profile-dropdown .header .info button:hover {
        background-color: #4a49b8;
      }
      #profile-dropdown ul {
        list-style: none;
        padding: 0;
        margin: 0;
      }
      #profile-dropdown ul li {
        border-top: 1px solid #eee;
      }
      #profile-dropdown ul li a {
        display: block;
        padding: 12px 20px;
        color: #333;
        text-decoration: none;
        font-size: 1rem;
        transition: background-color 0.2s ease;
      }
      #profile-dropdown ul li a:hover {
        background-color: #f5f5f5;
      }

      @media (max-width: 768px) {
        #left-menu {
          position: relative;
          width: 100%;
          height: auto;
        }
        #main {
          margin-left: 0;
        }
        #navbar {
          padding: 5px 10px;
        }
        #navbar #search input {
          width: 150px;
        }
        #profile-dropdown {
          width: 90vw;
          right: 5vw;
          top: 60px;
        }

      }

      .card {
      background-color: white;
      border-radius: 0.5rem;
      padding: 24px;
      box-shadow: rgba(0, 0, 0, 0.09) 0px 3px 12px;
      flex-shrink: 0;
      margin : 10px;
    }
    .left-card {
      width: 100%;
      max-width: 360px;
    }
    .right-card {
      width: 500px;
      flex-grow: 1;
    }
    .profile-img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      display: block;
      margin: 0 auto 12px auto;
      object-fit: cover;
    }
    .profile-name {
      font-weight: 600;
      font-size: 1.125rem;
      text-align: center;
      margin-bottom: 24px;
    }
    .info-group {
      margin-bottom: 24px;
    }
    .info-label {
      font-size: 0.75rem;
      color: #6b7280;
      margin-bottom: 4px;
    }
    .info-value {
      font-weight: 600;
      font-size: 1rem;
      word-break: break-word;
    }
    .divider {
      border-top: 1px solid #e5e7eb;
      margin-top: 16px;
    }
    .created-date {
      font-weight: 600;
      font-size: 1rem;
    }
    .btn {
      background-color: #6c5ce7;
      color: white;
      font-weight: 600;
      border: none;
      border-radius: 0.375rem;
      padding: 8px 16px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-size: 0.875rem;
      margin: 0 auto;
      max-width: 200px;
      transition: background-color 0.2s ease;
    }
    .btn:hover {
      background-color: #2563eb;
    }
    .btn i {
      font-style: normal;
      font-weight: 700;
      font-size: 1rem;
      display: inline-block;
      width: 16px;
      height: 16px;
      background: url('data:image/svg+xml;utf8,<svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M432 256c0 13.3-10.7 24-24 24H272v136c0 13.3-10.7 24-24 24s-24-10.7-24-24V280H40c-13.3 0-24-10.7-24-24s10.7-24 24-24h184V96c0-13.3 10.7-24 24-24s24 10.7 24 24v112h136c13.3 0 24 10.7 24 24z"/></svg>') no-repeat center;
      background-size: contain;
    }
    h3 {
      font-weight: 600;
      color: #6c5ce7;
      margin-bottom: 16px;
      font-size: 1.125rem;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }
    .label-changepass {
      font-size: 0.75rem;
      color: #6b7280;
      margin-bottom: 4px;
      display: block;
    }
    input[type="password"] {
      width: 100%;
      border: 1px solid #d1d5db;
      border-radius: 0.375rem;
      padding: 8px 12px;
      font-size: 0.875rem;
      outline-offset: 2px;
      transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }
    input[type="password"]:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 2px rgb(59 130 246 / 0.5);
    }
    button[type="submit"] {
      background-color: #6c5ce7;
      color: white;
      font-weight: 600;
      border: none;
      border-radius: 0.375rem;
      padding: 12px 0;
      cursor: pointer;
      font-size: 1rem;
      transition: background-color 0.2s ease;
      width: 100%;
    }
    button[type="submit"]:hover {
      background-color: #2563eb;
    }

    /* edit thong tin*/
    #edit-popup {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.4);
      z-index: 1000;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .popup-content {
      background-color: #fff;
      padding: 24px;
      border-radius: 12px;
      width: 90%;
      max-width: 420px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      display: flex;
      flex-direction: column;
      gap: 16px;
      animation: fadeIn 0.3s ease;
    }

    .popup-content h3 {
      font-size: 1.25rem;
      text-align: center;
      color: #6c5ce7;
    }

    .popup-content input[type="text"],
    .popup-content input[type="email"],
    .popup-content input[type="file"] {
      padding: 8px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
    }

    .popup-buttons {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      margin-top: 10px;
    }

    .popup-buttons button {
      padding: 8px 16px;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
    }

    .popup-buttons button[type="submit"] {
      background-color: #6c5ce7;
      color: white;
    }

    .popup-buttons button#close-popup {
      background-color: #ccc;
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
      <?php if (isset($_SESSION['thongbao'])): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
            icon: '<?= $_SESSION['thongbao']['type'] ?>',
            title: '<?= $_SESSION['thongbao']['title'] ?>',
            text: '<?= $_SESSION['thongbao']['message'] ?>'
            });
        </script>
        <?php unset($_SESSION['thongbao']); ?>
    <?php endif; ?>
      <div id="main-content">
      <?php
      $user = $_SESSION['user'];
      ?>
        <div class="card left-card">
        <!-- Ảnh đại diện -->
        <img
          src="<?php echo !empty($user['avatar']) ? "../".$user['avatar'] : '../assets/img/avt/default.jpg'; ?>"
          alt="Avatar"
          class="profile-img"
        />

        <!-- Tên người dùng -->
        <h2 class="profile-name"><?php echo htmlspecialchars($user['fullName'] ?? 'Chưa có tên'); ?></h2>

        <!-- Email -->
        <div class="info-group">
          <p class="info-label">Email</p>
          <p class="info-value"><?php echo htmlspecialchars($user['email']); ?></p>
          <div class="divider"></div>
        </div>

        <!-- Số điện thoại -->
        <div class="info-group">
          <p class="info-label">Phone</p>
          <p class="info-value"><?php echo !empty($user['phone']) ? htmlspecialchars($user['phone']) : 'Chưa cập nhật'; ?></p>
          <div class="divider"></div>
        </div>

        <!-- Tài khoản -->
        <div class="info-group">
          <p class="info-label">Tài khoản</p>
          <p class="info-value"><?php echo htmlspecialchars($user['username']); ?></p>
          <div class="divider"></div>
        </div>

        <!-- Địa chỉ -->
        <div class="info-group">
          <p class="info-label">Địa chỉ</p>
          <p class="info-value"><?php echo !empty($user['address']) ? htmlspecialchars($user['address']) : 'Chưa cập nhật'; ?></p>
          <div class="divider"></div>
        </div>

        <!-- Ngày tạo -->
        <div class="info-group">
          <p class="info-label">Ngày tạo</p>
          <p class="created-date"><?php echo htmlspecialchars($user['created_at'] ?? 'Không rõ'); ?></p>
        </div>

        <!-- Nút chỉnh sửa -->
        <button class="btn" type="button" id="edit-btn">
          <i class="fa fa-edit"></i> Chỉnh sửa thông tin
        </button>
      </div>

      <div class="card right-card">
        <h3>Đổi Mật Khẩu</h3>
        <form action="xuly/change_password.php" method="POST">
          <div>
            <label class="label-changepass" for="old-password">Mật khẩu cũ</label>
            <input type="password" id="old-password" name="old_password" required />
          </div>
          <div>
            <label class="label-changepass" for="new-password-1">Mật khẩu mới</label>
            <input type="password" id="new-password-1" name="new_password_1" required />
          </div>
          <div>
            <label class="label-changepass" for="new-password-2">Nhập lại mật khẩu mới</label>
            <input type="password" id="new-password-2" name="new_password_2" required />
          </div>
          <button type="submit">Đổi ngay</button>
        </form>
      </div>
      </div>
      
      <?php include("include/footer.php"); ?>
    </div>
    <div id="edit-popup" style="display: none;">
  <div class="popup-content">
    <h3>Chỉnh sửa thông tin cá nhân</h3>
    <form action="xuly/update_info.php" method="POST" enctype="multipart/form-data">
      
      <!-- Hiển thị ảnh đại diện hiện tại nếu có -->
      <label>Ảnh đại diện:</label>
      <?php if (!empty($_SESSION['user']['avatar'])): ?>
        <img src="<?php echo "../".$_SESSION['user']['avatar']; ?>" alt="Avatar" width="100" style="display:block;margin-bottom:10px;">
      <?php endif; ?>
      <input type="file" name="avatar" accept="image/*" />

      <label>Họ và tên:</label>
      <input type="text" name="name" value="<?php echo $_SESSION['user']['fullName']; ?>" required />

      <label>Email:</label>
      <input type="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" required />

      <label>Số điện thoại:</label>
      <input type="text" name="phone" value="<?php echo $_SESSION['user']['phone'] ?? ''; ?>" />

      <label>Địa chỉ:</label>
      <input type="text" name="address" value="<?php echo $_SESSION['user']['address'] ?? ''; ?>" />

      <div class="popup-buttons">
        <button type="submit">Lưu</button>
        <button type="button" id="close-popup">Hủy</button>
      </div>
    </form>
  </div>
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
        // chinh sua
        $(".btn:contains('Chỉnh sửa')").click(function () {
          $("#edit-popup").fadeIn();
        });

        $("#close-popup").click(function () {
          $("#edit-popup").fadeOut();
        });

        $("#edit-popup").click(function (e) {
          if ($(e.target).is("#edit-popup")) {
            $("#edit-popup").fadeOut();
          }
        });
      });
    </script>
          
  </body>
</html>

<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Signup | 5AE WebShop</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      background-image: url('assets/img/background-login.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    form {
      padding: 30px 40px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
      display: flex;
      flex-direction: column;
      gap: 15px;
      min-width: 320px;
      align-items: center;
    }

    form img {
      width: 100px;
      height: auto;
    }

    form h3 {
      margin: 10px 0;
    }

    .group-item {
      width: 100%;
      display: flex;
      flex-direction: column;
    }

    .group-item input {
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      margin-top: 5px;
      padding: 8px 20px;
      border-radius: 10px;
      background-color: #0D99FF;
      border: none;
      color: white;
    }

    button:hover {
      background-color: #007ad9;
      cursor: pointer;
      transform: scale(1.02);
      transition: 0.2s ease-in-out;
    }
  </style>
</head>
<body>
  <div id="form-signup">
    <form action="layout/xuly/signup_xuly.php" method="post">
      <img src="assets/img/logo1.png" alt="Logo">
      <h3>Trang Đăng Ký ✍️</h3>

      <div class="group-item">
        <label for="username">Username :</label>
        <input type="text" name="username" required>
      </div>

      <div class="group-item">
        <label for="email">Email :</label>
        <input type="email" name="email" required>
      </div>

      <div class="group-item">
        <label for="password">Password :</label>
        <input type="password" name="password" required>
      </div>

      <div class="group-item">
        <label for="confirm_password">Nhập lại Password :</label>
        <input type="password" name="confirm_password" required>
      </div>

      <button type="submit">Đăng Ký</button>
      <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </form>
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
  </div>
</body>
</html>

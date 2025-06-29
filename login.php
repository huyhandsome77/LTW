<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | 5AE WebShop</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
    body {
        margin: 0;
        height: 100vh; /* Chiều cao luôn bằng 100% viewport */
        background-image: url('assets/img/background-login.jpg');
        background-size: cover;           /* Phóng vừa đủ để phủ kín */
        background-repeat: no-repeat;     /* Không lặp lại ảnh */
        background-position: center;      /* Căn giữa ảnh */
        background-attachment: fixed;     /* Giữ cố định khi cuộn (nếu có) */
        display:flex;
        justify-content: center;
        align-items: center;
    }
    form {
    padding: 30px 40px;
    background-color: rgba(255, 255, 255, 0.9); /* nền trắng mờ */
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
    gap: 15px;
    min-width: 300px;
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
    button{
        margin-top:5px;
        padding : 8px 20px;
        border-radius:10px;
        background-color: #0D99FF;
        border:none;
        color:white;
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
    <div id="form-login">
        <form action="layout/xuly/login_xuly.php" method="post">
        <img src="assets/img/logo1.png" alt="Logo">    
        <h3>Trang Đăng Nhập ️🛒</h3>
        <div class="group-item">
            <label for="username">Username : </label>
            <input type="text" name="username" required>
        </div>
        <div class="group-item">
            <label for="password">Password : </label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Đăng nhập</button>
        <p>Bạn chưa có tài khoản ? <a href="signup.php">Đăng Kí</a></p>
        </form>
    </div>
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

</body>
</html>
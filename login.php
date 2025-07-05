<?php
session_start();
include("connect.php");

// ✅ Nếu đã đăng nhập (qua session) hoặc có cookie remember thì tự động chuyển hướng
if (isset($_SESSION['user']) || isset($_COOKIE['remember'])) {
    // Nếu chưa có session mà có cookie => tự đăng nhập
    if (!isset($_SESSION['user']) && isset($_COOKIE['remember'])) {
        $username = $_COOKIE['remember'];
        $stmt = $link->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($user = $result->fetch_assoc()) {
            $_SESSION['user'] = [
                'idUser' => $user['idUser'],
                'username' => $user['username'],
                'fullName' => $user['fullName'],
                'role' => $user['role'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'avatar' => $user['imgAvt'],
                'address' => $user['address'],
                'created_at' => $user['created_at'],
            ];
        }
    }
    if (isset($_SESSION['user'])) {
        switch ($_SESSION['user']['role']) {
            case 'Admin':
                header("Location: ../index.php");
                break;
            case 'Manager':
                header("Location: ../index.php");
                break;
            case 'User':
                header("Location: layout/index.php");
                break;
        }
        exit();
    }
}
?>
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
        height: 100vh; 
        background-image: url('assets/img/background-login.jpg');
        background-size: cover;           
        background-repeat: no-repeat;     
        background-position: center;      
        background-attachment: fixed;   
        display:flex;
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
    .checkbox-group {
    display: flex;
    align-items: center;
    gap: 7px;
    width: 100%;
    }
    .checkbox-group label {
    font-size: 14px;
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
        <div class="checkbox-group">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Ghi nhớ</label>
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
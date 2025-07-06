<?php
session_start();
require_once(__DIR__ . '/../../config/connectdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Tránh SQL Injection
    $escaped_username = mysqli_real_escape_string($link, $username);

    // Sửa chỗ này: dùng bảng `admin` thay vì `users`
    $query = "SELECT * FROM user WHERE username = '$escaped_username'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // So sánh mật khẩu đã mã hóa
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'] ?? 'Khách hàng'; // fallback nếu thiếu role

            header("Location: /ltw/page/Admin/Admin.php");
            exit;
        }
    }

    $_SESSION['login_error'] = "Tên đăng nhập hoặc mật khẩu không đúng.";
header("Location: /ltw/components/layout/login.php");
exit;
}
?>

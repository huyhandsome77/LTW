<?php
session_start();
include("../../connect.php");

// Kiểm tra dữ liệu đầu vào
if (empty($_POST['username']) || empty($_POST['password'])) {
    $_SESSION['thongbao'] = [
        'type' => 'error',
        'title' => 'Thiếu thông tin!',
        'message' => 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.'
    ];
    header("Location: ../../login.php");
    exit();
}

$username = trim($_POST['username']);
$password = $_POST['password'];

// Truy vấn người dùng theo username
$sql = "SELECT * FROM user WHERE username = ?";
$stmt = mysqli_prepare($link, $sql);
if (!$stmt) {
    die("Lỗi prepare: " . mysqli_error($link));
}

mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password'])) {
        // ✅ Đăng nhập thành công
        $_SESSION['user'] = [
            'idUser' => $row['idUser'],
            'username' => $row['username'],
            'role' => $row['role'],
            'email' => $row['email'],
            'phone' => $row['phone']
        ];
        header("Location: ../index.php");
        exit();
    } else {
        // ❌ Sai mật khẩu
        $_SESSION['thongbao'] = [
            'type' => 'error',
            'title' => 'Sai mật khẩu!',
            'message' => 'Vui lòng kiểm tra lại mật khẩu.'
        ];
        header("Location: ../../login.php");
        exit();
    }
} else {
    // ❌ Username không tồn tại
    $_SESSION['thongbao'] = [
        'type' => 'error',
        'title' => 'Tài khoản không tồn tại!',
        'message' => 'Vui lòng kiểm tra lại tên đăng nhập.'
    ];
    header("Location: ../../login.php");
    exit();
}
?>

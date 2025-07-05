<?php
session_start();
include("../../connect.php");

// Kiểm tra thanh toán thành công
if (isset($_GET['resultCode']) && $_GET['resultCode'] == '0') {
    // Kiểm tra session hợp lệ
    if (!isset($_SESSION['user']) || empty($_SESSION['cart'])) {
        $_SESSION['thongbao'] = [
            'type' => 'error',
            'title' => 'Thiếu thông tin!',
            'message' => 'Phiên làm việc đã hết hạn hoặc giỏ hàng trống. Không thể lưu đơn hàng.'
        ];
        header("Location: ../giohang.php");
        exit;
    }

    $idUser = $_SESSION['user']['idUser'];
    $ngayDat = date("Y-m-d H:i:s");

    // Lưu đơn hàng
    $sql = "INSERT INTO donhang (idUser, ngayDat, ptThanhToan) VALUES (?, ?, 'Momo')";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "is", $idUser, $ngayDat);
    mysqli_stmt_execute($stmt);
    $idDonHang = mysqli_insert_id($link);

    // Lưu chi tiết
    $sql_ct = "INSERT INTO chitietdonhang (idDonHang, idSanPham, soLuong, giaMua) VALUES (?, ?, ?, ?)";
    $stmt_ct = mysqli_prepare($link, $sql_ct);

    foreach ($_SESSION['cart'] as $item) {
        mysqli_stmt_bind_param($stmt_ct, "iiid", $idDonHang, $item['id'], $item['soluong'], $item['gia']);
        mysqli_stmt_execute($stmt_ct);
    }

    // Xóa giỏ hàng
    unset($_SESSION['cart']);

    // Thông báo thành công
    $_SESSION['thongbao'] = [
        'type' => 'success',
        'title' => 'Thanh toán MoMo thành công!',
        'message' => 'Đơn hàng đã được ghi nhận.'
    ];
} else {
    $_SESSION['thongbao'] = [
        'type' => 'error',
        'title' => 'Thanh toán thất bại!',
        'message' => 'Giao dịch qua MoMo không thành công.'
    ];
}

header("Location: ../thongbao.php");
exit;

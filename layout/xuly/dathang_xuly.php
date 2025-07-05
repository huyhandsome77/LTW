<?php
session_start();
include("../../connect.php");

if (isset($_POST['dathang']) && isset($_SESSION['user']) && !empty($_SESSION['cart'])) {
    $idUser = $_SESSION['user']['idUser'];
    $tongTien = $_POST['tongTien'];
    $ngayDat = date("Y-m-d H:i:s");

    // 1. Tạo đơn hàng mới
    $sqlDonHang = "INSERT INTO donhang (idUser, ngayDat) VALUES (?, ?)";
    $stmtDonHang = mysqli_prepare($link, $sqlDonHang);
    mysqli_stmt_bind_param($stmtDonHang, "is", $idUser, $ngayDat);
    mysqli_stmt_execute($stmtDonHang);
    $idDonHang = mysqli_insert_id($link);

    // 2. Lưu từng chi tiết đơn hàng kèm giá mua
    $sqlChiTiet = "INSERT INTO chitietdonhang (idDonHang, idSanPham, soLuong, giaMua) VALUES (?, ?, ?, ?)";
    $stmtChiTiet = mysqli_prepare($link, $sqlChiTiet);

    foreach ($_SESSION['cart'] as $item) {
        $idSP = $item['id'];
        $soLuong = $item['soluong'];
        $giaMua = $item['gia']; // đã bao gồm giảm giá nếu bạn xử lý từ trước

        mysqli_stmt_bind_param($stmtChiTiet, "iiid", $idDonHang, $idSP, $soLuong, $giaMua);
        mysqli_stmt_execute($stmtChiTiet);
    }

    // 3. Xóa giỏ hàng sau khi đặt
    unset($_SESSION['cart']);

    // 4. Gửi thông báo
    $_SESSION['thongbao'] = [
        'type' => 'success',
        'title' => 'Đặt hàng thành công!',
        'message' => 'Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ sớm liên hệ.'
    ];

    header("Location: ../giohang.php");
    exit;
} else {
    $_SESSION['thongbao'] = [
        'type' => 'error',
        'title' => 'Thất bại',
        'message' => 'Vui lòng đăng nhập và kiểm tra giỏ hàng!'
    ];
    header("Location: ../giohang.php");
    exit;
}

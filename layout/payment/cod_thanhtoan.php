<?php
session_start();
include("../../connect.php");

if (!isset($_SESSION['user']) || empty($_SESSION['cart'])) {
    header("Location: ../index.php");
    exit;
}

$idUser = $_SESSION['user']['idUser'];
$ngayDat = date("Y-m-d H:i:s");

// Lưu đơn hàng
$sql = "INSERT INTO donhang (idUser, ngayDat) VALUES (?, ?)";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "is", $idUser, $ngayDat);
mysqli_stmt_execute($stmt);
$idDonHang = mysqli_insert_id($link);

// Lưu chi tiết đơn hàng và cập nhật tồn kho
$sql_ct = "INSERT INTO chitietdonhang (idDonHang, idSanPham, soLuong, giaMua) VALUES (?, ?, ?, ?)";
$stmt_ct = mysqli_prepare($link, $sql_ct);

// Chuẩn bị câu lệnh cập nhật tồn kho
$sql_update_tonkho = "UPDATE sanpham SET tonKho = tonKho - ? WHERE idSanPham = ?";
$stmt_update = mysqli_prepare($link, $sql_update_tonkho);

foreach ($_SESSION['cart'] as $item) {
    $idSP = $item['id'];
    $soLuong = $item['soluong'];
    $giaMua = $item['gia'];

    // Lưu chi tiết đơn hàng
    mysqli_stmt_bind_param($stmt_ct, "iiid", $idDonHang, $idSP, $soLuong, $giaMua);
    mysqli_stmt_execute($stmt_ct);

    // Giảm tồn kho
    mysqli_stmt_bind_param($stmt_update, "ii", $soLuong, $idSP);
    mysqli_stmt_execute($stmt_update);
}

// Xóa giỏ hàng
unset($_SESSION['cart']);

// Gán thông báo vào session
$_SESSION['thongbao'] = [
    'type' => 'success',
    'title' => 'Đặt hàng thành công!',
    'message' => 'Bạn đã chọn thanh toán tiền mặt. Cảm ơn bạn!'
];

// Chuyển hướng đến trang hiển thị thông báo
header("Location: ../thongbao.php");
exit;

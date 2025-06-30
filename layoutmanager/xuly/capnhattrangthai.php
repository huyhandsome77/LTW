<?php
session_start();
include('../../connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idDonHang'], $_POST['trangThai'])) {
    $id = intval($_POST['idDonHang']);
    $trangThai = $_POST['trangThai'];

    $stmt = $link->prepare("UPDATE lichsudathang SET trangThai = ? WHERE idDonHang = ?");
    $stmt->bind_param("si", $trangThai, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = [
            'type' => 'success',
            'text' => "Đã cập nhật trạng thái đơn hàng DH$id thành công!"
        ];
    } else {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => "Lỗi: " . $stmt->error
        ];
    }

    header("Location: ../quanlydonhang.php");
    exit();
}

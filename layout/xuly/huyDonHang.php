<?php
session_start();
include("../../connect.php");

if (isset($_GET['id']) && isset($_SESSION['user']['idUser'])) {
    $id = intval($_GET['id']);
    $idUser = $_SESSION['user']['idUser'];

    $sql = "
        UPDATE lichsudathang 
        SET trangThai = 'Đã Hủy' 
        WHERE idDonHang = $id 
        AND idUser = $idUser 
        AND trangThai = 'Chờ Xác Nhận'
    ";
    mysqli_query($link, $sql);
}

header("Location: ../lichsudathang.php");
exit;
?>
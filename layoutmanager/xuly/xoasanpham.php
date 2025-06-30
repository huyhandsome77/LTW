<?php
include('../../connect.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);


    $link->query("DELETE FROM sanpham WHERE idSanPham = $id");
    echo "Xóa thành công";
} else {
    echo "Lỗi xóa sản phẩm.";
}
header("location:../quanlysanpham.php");
?>

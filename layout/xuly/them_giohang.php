<?php
session_start();

if (isset($_POST['idSanPham'], $_POST['tenSanPham'], $_POST['gia'], $_POST['hinhanh'], $_POST['soluong'])) {
    $id = $_POST['idSanPham'];
    $ten = $_POST['tenSanPham'];
    $gia = floatval($_POST['gia']);
    $img = $_POST['hinhanh'];
    $soluong = intval($_POST['soluong']);

    if ($soluong < 1) $soluong = 1;

    $sp = [
        'id' => $id,
        'ten' => $ten,
        'gia' => $gia,
        'hinhanh' => $img,
        'soluong' => $soluong
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['soluong'] += $soluong;
    } else {
        $_SESSION['cart'][$id] = $sp;
    }

    // Gán thông báo dạng mảng
    $_SESSION['thongbao'] = [
        'type' => 'success',
        'title' => 'Đã thêm vào giỏ!',
        'message' => "Đã thêm \"{$ten}\" vào giỏ hàng."
    ];

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    $_SESSION['thongbao'] = [
        'type' => 'error',
        'title' => 'Lỗi',
        'message' => 'Thiếu thông tin sản phẩm để thêm vào giỏ.'
    ];
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

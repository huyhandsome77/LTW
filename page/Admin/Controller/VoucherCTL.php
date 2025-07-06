<?php
require_once __DIR__ . '/../../../config/connectdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;
    $code = trim($_POST['code'] ?? '');
    $discount_type = $_POST['discount_type'] ?? 'number';
    $discount_value = isset($_POST['discount_value']) ? (float)$_POST['discount_value'] : 0;
    $min_order = (float)($_POST['min_order_value'] ?? 0);
    $start = $_POST['start_date'] ?? null;
    $end = $_POST['end_date'] ?? null;

    if (!in_array($discount_type, ['percent', 'number'])) {
        $discount_type = 'number';
    }

    if ($action === 'add') {
        $sql = "INSERT INTO DiscountCode (code, discount_type, discount_value, min_order_value, start_date, end_date)
            VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ssddss", $code, $discount_type, $discount_value, $min_order, $start, $end);
        mysqli_stmt_execute($stmt);
    } elseif ($action === 'edit' && $id) {
        $sql = "UPDATE DiscountCode SET code = ?, discount_type = ?, discount_value = ?, min_order_value = ?, start_date = ?, end_date = ?
            WHERE id = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ssddssi", $code, $discount_type, $discount_value, $min_order, $start, $end, $id);
        mysqli_stmt_execute($stmt);
    }

    header("Location: ../MnVoucher.php");
    exit;
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    mysqli_query($link, "DELETE FROM DiscountCode WHERE id = $id");
    header("Location: ../MnVoucher.php");
    exit;
}

header("Location: ../MnVoucher.php");
exit;

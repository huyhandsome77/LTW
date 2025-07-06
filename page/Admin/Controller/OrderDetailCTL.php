<?php
require_once __DIR__ . '/../../../connect.php';

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "Thiếu ID đơn hàng"]);
    exit;
}

$idDonHang = (int)$_GET['id'];
$data = [];

$sql = "SELECT sp.tenSanPham, ct.gia, ct.soLuong
        FROM chitietdonhang ct
        JOIN sanpham sp ON ct.idSanPham = sp.idSanPham
        WHERE ct.idDonHang = ?";
$stmt = mysqli_prepare($link, $sql);

if (!$stmt) {
    http_response_code(500);
    echo json_encode(["error" => "truy vấn thất bại"]);
    exit;
}

mysqli_stmt_bind_param($stmt, "i", $idDonHang);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    http_response_code(500);
    echo json_encode(["error" => "Không lấy được dữ liệu"]);
    exit;
}

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>

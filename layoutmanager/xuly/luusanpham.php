<?php
// Kết nối CSDL
include('../../connect.php'); // đảm bảo file này gán đúng biến $link

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $tenSanPham = trim($_POST['tenSanPham'] ?? '');
    $giaTien = floatval($_POST['giaTien'] ?? 0);
    $hinhAnhPath = '';

    // Kiểm tra dữ liệu bắt buộc
    if ($tenSanPham === '' || $giaTien <= 0) {
        die("Vui lòng nhập tên sản phẩm và giá hợp lệ.");
    }

    // Xử lý ảnh nếu có upload
    if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../assets/img/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // tạo thư mục nếu chưa có
        }

        $tmpName = $_FILES['hinhAnh']['tmp_name'];
        $fileName = basename($_FILES['hinhAnh']['name']);
        $fileName = time() . '_' . preg_replace('/\s+/', '_', $fileName); // tránh trùng tên
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($tmpName, $targetPath)) {
            $hinhAnhPath = 'assets/img/uploads/' . $fileName; // đường dẫn lưu trong DB
        } else {
            die("Không thể tải ảnh lên.");
        }
    } else {
        die("Bạn chưa chọn ảnh hoặc ảnh không hợp lệ.");
    }

    // Lưu vào database
    $stmt = $link->prepare("INSERT INTO sanpham (tenSanPham, gia, hinhanh) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $tenSanPham, $giaTien, $hinhAnhPath);

    if ($stmt->execute()) {
        echo "Sản phẩm đã được lưu thành công!";
        header("Location: ../quanlysanpham.php"); exit;
    } else {
        echo "Lỗi khi lưu sản phẩm: " . $link->error;
    }

    $stmt->close();
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>

<?php
include('../../connect.php'); // kết nối CSDL, đảm bảo biến $link tồn tại

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);
    $ten = trim($_POST['tenSanPham'] ?? '');
    $gia = floatval($_POST['giaTien'] ?? 0);
    $newImagePath = null;

    // Kiểm tra dữ liệu đầu vào
    if ($id <= 0 || $ten === '' || $gia <= 0) {
        die("Dữ liệu không hợp lệ.");
    }

    // Nếu có ảnh mới được chọn
    if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../assets/img/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Xóa ảnh cũ nếu có
        $oldImageQuery = $link->prepare("SELECT hinhanh FROM sanpham WHERE idSanPham = ?");
        $oldImageQuery->bind_param("i", $id);
        $oldImageQuery->execute();
        $result = $oldImageQuery->get_result();
        if ($row = $result->fetch_assoc()) {
            $oldPath = "../../assets/img/uploads" . $row['hinhanh'];
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
        $oldImageQuery->close();

        // Xử lý lưu ảnh mới
        $tmp = $_FILES['hinhAnh']['tmp_name'];
        $filename = time() . '_' . preg_replace('/\s+/', '_', basename($_FILES['hinhAnh']['name']));
        $target = $uploadDir . $filename;

        if (move_uploaded_file($tmp, $target)) {
            $newImagePath = 'assets/img/uploads/' . $filename;
        } else {
            die("Không thể lưu ảnh mới.");
        }
    }

    // Cập nhật vào database
    if ($newImagePath !== null) {
        $stmt = $link->prepare("UPDATE sanpham SET tenSanPham=?, gia=?, hinhanh=? WHERE idSanPham=?");
        $stmt->bind_param("sdsi", $ten, $gia, $newImagePath, $id);
    } else {
        $stmt = $link->prepare("UPDATE sanpham SET tenSanPham=?, gia=? WHERE idSanPham=?");
        $stmt->bind_param("sdi", $ten, $gia, $id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Cập nhật sản phẩm thành công!'); window.location.href='../quanlysanpham.php';</script>";
    } else {
        echo "Lỗi cập nhật: " . $link->error;
    }

    $stmt->close();
} else {
    echo "Yêu cầu không hợp lệ.";
}
header("location:../quanlysanpham.php");
?>

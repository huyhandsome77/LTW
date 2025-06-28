<?php


$action = $_POST["action"] ?? $_GET["action"] ?? "";


if ($action === "delete" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $stmt = $conn->prepare("DELETE FROM sanpham WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    exit;
}


if ($action === "get" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_assoc());
    exit;
}


if (($action === "add" || $action === "edit") && isset($_POST["tenSanPham"]) && isset($_POST["giaTien"])) {
    $ten = $_POST["tenSanPham"];
    $gia = $_POST["giaTien"];
    $id = $_POST["id"] ?? null;
    $hinhanh = "";


    if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] == 0) {
        $target_dir = "assets/img/uploads/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
        $file_name = time() . "_" . basename($_FILES["hinhAnh"]["name"]);
        $target_file = $target_dir . $file_name;
        if (move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $target_file)) {
            $hinhanh = $target_file;
        }
    }

    // Sửa
    if ($action === "edit" && $id) {
        if ($hinhanh) {
            $stmt = $conn->prepare("UPDATE sanpham SET tensanpham=?, gia=?, hinhanh=? WHERE id=?");
            $stmt->bind_param("sisi", $ten, $gia, $hinhanh, $id);
        } else {
            $stmt = $conn->prepare("UPDATE sanpham SET tensanpham=?, gia=? WHERE id=?");
            $stmt->bind_param("sii", $ten, $gia, $id);
        }
    } else {
        // Thêm mới
        $stmt = $conn->prepare("INSERT INTO sanpham (tensanpham, gia, hinhanh) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $ten, $gia, $hinhanh);
    }

    $stmt->execute();
    exit;
}


// $sql = "SELECT * FROM sanpham ORDER BY id DESC";
// $result = $conn->query($sql);
// $stt = 1;

// while ($row = $result->fetch_assoc()) {
//     echo "<tr>";
//     echo "<td>" . $stt++ . "</td>";
//     echo "<td>" . htmlspecialchars($row['tensanpham']) . "</td>";
//     echo "<td>" . number_format($row['gia']) . "₫</td>";
//     echo "<td><img src='" . htmlspecialchars($row['hinhanh']) . "' width='60' /></td>";
//     echo "<td>
//         <button class='sua-btn' data-id='{$row['id']}'>✏️ Sửa</button>
//         <button class='xoa-btn' data-id='{$row['id']}'>🗑️ Xóa</button>
//     </td>";
//     echo "</tr>";
// }

// $conn->close();
?>

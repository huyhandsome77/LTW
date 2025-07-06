<?php
session_start();

?>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quản lý sản phẩm | 5AE WebShop</title>
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="../assets/css/manager.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
  <style>
    .popup-overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 999;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .popup-content {
      background: #fff;
      padding: 20px;
      width: 350px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
    .popup-content label {
      display: block;
      margin-top: 10px;
    }
    .popup-content input,
    .popup-content select {
      width: 100%;
      padding: 6px;
      margin-top: 4px;
    }
    .popup-content button {
      margin: 5px;
      padding: 6px 12px;
    }
  </style>
</head>
<body>
<?php
include("../connect.php");
include("include/left-menu.php");
?>

<div id="main">
  <?php include("include/navbar.php"); ?>
  <div id="main-content">
    <h3>Quản lý sản phẩm</h3>

    <form id="productForm" method="post" action="xuly/luusanpham.php" enctype="multipart/form-data">
      <input type="hidden" id="productId" name="id" />

      <label for="tenSanPham">Tên sản phẩm:</label>
      <input type="text" id="tenSanPham" name="tenSanPham" required />

      <label for="giaTien">Giá tiền (VND):</label>
      <input type="number" id="giaTien" name="giaTien" required />

      <label for="loaiSanPham">Loại sản phẩm:</label>
      <select id="loaiSanPham" name="loaiSanPham" required>
        <option value="">-- Chọn loại --</option>
        <option value="Đồ Ăn">Đồ Ăn</option>
        <option value="Nước Uống">Nước Uống</option>
      </select>

      <label for="hinhanh" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
        <i class="fa-regular fa-image" style="font-size: 22px; color: #6c5ce7;"></i> Chọn ảnh sản phẩm
      </label>
      <input type="file" id="hinhanh" name="hinhAnh" accept="image/*" style="display: none;" />
      <span id="tenFileAnh" style="font-style: italic; font-size: 10px;"></span>

      <button type="submit" style="margin-top: 15px;">Lưu sản phẩm</button>
    </form>

    <h3 style="margin-top: 30px;">Danh sách sản phẩm</h3>
    <table id="bangSanPham">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên sản phẩm</th>
          <th>Giá</th>
          <th>Loại</th>
          <th>Hình ảnh</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody id="danhSachSanPham">
        <?php
        $sql = "SELECT * FROM sanpham ORDER BY idSanPham DESC";
        $result = $link->query($sql);
        $stt = 1;
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $stt++ . "</td>";
          echo "<td>" . htmlspecialchars($row['tenSanPham']) . "</td>";
          echo "<td>" . number_format($row['gia']) . "₫</td>";
          echo "<td>" . htmlspecialchars($row['loaiSanPham']) . "</td>";
          echo "<td><img src='../" . $row['hinhanh'] . "' width='60' /></td>";
          echo "<td>
                  <button 
                    class='sua-btn' 
                    onclick=\"openEditPopup(
                      '{$row['idSanPham']}', 
                      '" . htmlspecialchars($row['tenSanPham'], ENT_QUOTES) . "', 
                      '{$row['gia']}', 
                      '{$row['hinhanh']}', 
                      '" . htmlspecialchars($row['loaiSanPham'], ENT_QUOTES) . "'
                    )\">
                    ✏️ Sửa
                  </button>
                  <button 
                    class='xoa-btn' 
                    onclick=\"openXoaPopup('{$row['idSanPham']}')\">
                    🗑️ Xóa
                  </button>
                </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>

    <!-- FORM POPUP SỬA -->
    <div id="popupForm" class="popup-overlay" style="display: none;">
      <div class="popup-content">
        <h3>Sửa sản phẩm</h3>
        <form id="editProductForm" method="post" action="xuly/suasanpham.php" enctype="multipart/form-data">
          <input type="hidden" name="id" id="editProductId" />

          <label for="editTenSanPham">Tên sản phẩm:</label>
          <input type="text" name="tenSanPham" id="editTenSanPham" required />

          <label for="editGiaTien">Giá tiền (VND):</label>
          <input type="number" name="giaTien" id="editGiaTien" required />

          <label for="editLoaiSanPham">Loại sản phẩm:</label>
          <select name="loaiSanPham" id="editLoaiSanPham" required>
            <option value="Đồ Ăn">Đồ Ăn</option>
            <option value="Nước Uống">Nước Uống</option>
          </select>

          <label>Ảnh hiện tại:</label>
          <img id="editAnhPreview" src="" width="80" style="margin-bottom: 10px;" />

          <label for="editHinhAnh">Chọn ảnh mới (nếu thay):</label>
          <input type="file" name="hinhAnh" id="editHinhAnh" accept="image/*" />

          <div style="margin-top: 10px;">
            <button type="submit">Lưu thay đổi</button>
            <button type="button" onclick="closePopup()">Hủy</button>
          </div>
        </form>
      </div>
    </div>

    <!-- FORM POPUP XÓA -->
    <div id="popupXoa" class="popup-overlay" style="display: none;">
      <div class="popup-content">
        <h3>Xác nhận xóa</h3>
        <p>Bạn có chắc chắn muốn xóa sản phẩm này không?</p>
        <form id="formXoa" method="post" action="xuly/xoasanpham.php">
          <input type="hidden" name="id" id="xoaProductId" />
          <button type="submit" style="margin-top: 10px;">✅ Xóa</button>
          <button type="button" onclick="closeXoaPopup()">❌ Hủy</button>
        </form>
      </div>
    </div>
  </div>

  <?php include("include/footer.php"); ?>
</div>

<script>
  document.getElementById("hinhanh").addEventListener("change", function () {
    const fileName = this.files[0]?.name || "Chưa chọn ảnh";
    document.getElementById("tenFileAnh").innerText = fileName;
  });

  function openEditPopup(id, ten, gia, anh, loai) {
    document.getElementById("editProductId").value = id;
    document.getElementById("editTenSanPham").value = ten;
    document.getElementById("editGiaTien").value = gia;
    document.getElementById("editAnhPreview").src = "../" + anh;
    document.getElementById("editLoaiSanPham").value = loai;
    document.getElementById("popupForm").style.display = "flex";
  }

  function closePopup() {
    document.getElementById("popupForm").style.display = "none";
  }

  function openXoaPopup(id) {
    document.getElementById("xoaProductId").value = id;
    document.getElementById("popupXoa").style.display = "flex";
  }

  function closeXoaPopup() {
    document.getElementById("popupXoa").style.display = "none";
  }
</script>
<?php if (isset($_SESSION['thongbao'])): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: '<?= $_SESSION['thongbao']['type'] ?>',
            title: '<?= $_SESSION['thongbao']['title'] ?>',
            text: '<?= $_SESSION['thongbao']['message'] ?>'
        });
    </script>
    <?php unset($_SESSION['thongbao']); ?>
<?php endif; ?>

</body>
</html>

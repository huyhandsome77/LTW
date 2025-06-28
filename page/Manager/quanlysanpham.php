<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Quản lý sản phẩm</title>

</head>
<body>
  <?php
  $pageContent ='<h3>➕ Quản lý sản phẩm</h3>

      
      <form id="productForm" enctype="multipart/form-data">
        <input type="hidden" id="productId" name="id" />
        <label for="tensanpham">Tên sản phẩm:</label>
        <input type="text" id="tenSanPham" name="tenSanPham" required />

        <label for="gia">Giá tiền (VND):</label>
        <input type="number" id="giaTien" name="giaTien" required />

        <label for="hinhanh" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
          <i class="fa-regular fa-image" style="font-size: 22px; color: #6c5ce7;"></i> Chọn ảnh sản phẩm
        </label>
        <input type="file" id="hinhanh" name="hinhAnh" accept="image/*" style="display: none;" />
        <span id="tenFileAnh" style="font-style: italic; font-size: 10px;"></span>

        <button type="submit" style="margin-top :15px;">💾 Lưu sản phẩm</button>
      </form>

      <h3 style="margin-top: 30px;">📦 Danh sách sản phẩm</h3>
      <table id="bangSanPham">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody id="danhSachSanPham">
       
        </tbody>
      </table><h3>➕ Quản lý sản phẩm</h3>

      
      <form id="productForm" enctype="multipart/form-data">
        <input type="hidden" id="productId" name="id" />
        <label for="tensanpham">Tên sản phẩm:</label>
        <input type="text" id="tenSanPham" name="tenSanPham" required />

        <label for="gia">Giá tiền (VND):</label>
        <input type="number" id="giaTien" name="giaTien" required />

        <label for="hinhanh" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
          <i class="fa-regular fa-image" style="font-size: 22px; color: #6c5ce7;"></i> Chọn ảnh sản phẩm
        </label>
        <input type="file" id="hinhanh" name="hinhAnh" accept="image/*" style="display: none;" />
        <span id="tenFileAnh" style="font-style: italic; font-size: 10px;"></span>

        <button type="submit" style="margin-top :15px;">💾 Lưu sản phẩm</button>
      </form>

      <h3 style="margin-top: 30px;">📦 Danh sách sản phẩm</h3>
      <table id="bangSanPham">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody id="danhSachSanPham">
       
        </tbody>
      </table>';
      require_once(__DIR__ . '/../../components/layout/layoutmanager.php');
      require_once ('../../page/Manager/xulysanpham.php');
  ?>
</body>
</html>

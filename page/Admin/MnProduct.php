<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <?php
   ob_start();
    ?>
<div class="product-page">
  <div class="container">
    <div class="header">
      <a href="#" class="btn-primary">Thêm sản phẩm</a>
    </div>
    <div class="filter-bar">
    <input type="text" class="search-box" placeholder="Tìm kiếm sản phẩm...">
    <select class="filter-select" id="categoryFilter">
      <option value="all">Tất cả danh mục</option>
      <option value="1">Thực phẩm</option>
      <option value="2">Nước uống</option>
      <option value="3">Đồ dùng cá nhân</option>
    </select>
  </div>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Hình ảnh</th>
          <th>Tên sản phẩm</th>
          <th>Giá bán</th>
          <th>Tồn kho</th>
          <th>Danh mục </th>
          <th>Mô tả</th>
          <th>Trạng thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <tr data-category-id="2">
          <td>1</td>
          <td><img src="https://via.placeholder.com/60" class="table-img" /></td>
          <td>Mì Hảo Hảo tôm chua cay</td>
          <td>3.500₫</td>
          <td>250</td>
          <td>loại sản phẩm sẽ ở đây</td>
          <td>mô tả sản phẩm sẽ ở đây</td>
          <td><span class="badge bg-success">Đang bán</span></td>
          <td class="action-buttons">
            <a href="#" class="btn-sm btn-warning">Sửa</a>
            <a href="#" class="btn-sm btn-danger">Xoá</a>
          </td>
        </tr>
       
      </tbody>
    </table>
  </div>
<div class="pagination">
      <a href="#">«</a>
      <a href="#" class="active">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">»</a>
    </div>
  </div>
</div>
</div>
<script>
  const categoryFilter = document.getElementById("categoryFilter");
  categoryFilter.addEventListener("change", function () {
    const selected = this.value;
    document.querySelectorAll("tbody tr").forEach((row) => {
      const cat = row.getAttribute("data-category-id");
      if (selected === "all" || selected === cat) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });
</script>

   <?php
   $pageContent = ob_get_clean();
    include(__DIR__ . '/../../components/layout/layoutadmin.php');
    ?>
</body>
<html>
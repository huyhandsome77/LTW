<!-- quanlychitieu.html -->
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Quản lý chi tiêu</title>
  
</head>
<body>
  <?php
  $pageContent ='<div id="main-content">
      <h3><i class="fa-solid fa-wallet"></i> Quản lý chi tiêu</h3>
      <button onclick="showForm("add)">➕ Thêm chi tiêu</button>
      <button onclick="showForm("edit")">✏️ Sửa chi tiêu</button>
      <button onclick="showForm("delete")">🗑️ Xóa chi tiêu</button>

      <div id="product-form" style="display: none;">
        <h4 id="form-title"></h4>
        <form></form>
      </div>
    </div>
  

  <script>
    function showForm(action) {
      const form = $("#product-form");
      const formHtml = {
        add: `
          <label>Nội dung:</label><input type="text" name="desc" />
          <label>Số tiền:</label><input type="number" name="amount" />
          <label>Ngày:</label><input type="date" name="date" />
        `,
        edit: `
          <label>ID chi tiêu:</label><input type="text" name="id" />
          <label>Nội dung mới:</label><input type="text" name="desc" />
          <label>Số tiền mới:</label><input type="number" name="amount" />
        `,
        delete: `
          <label>ID chi tiêu:</label><input type="text" name="id" />
          <p style="color:red;">Bạn có chắc muốn xóa không?</p>
        `
      };
      form.show();
      $("#form-title").text(
        action === "add" ? "➕ Thêm chi tiêu" :
        action === "edit" ? "✏️ Sửa chi tiêu" :
        "🗑️ Xóa chi tiêu"
      );
      $("form").html(formHtml[action] + "<button type="submit">" +
        (action === "add" ? "Thêm mới" : action === "edit" ? "Cập nhật" : "Xóa") +
        "</button>");
    }

    $("#profile").click(function () {
      $("#profile-dropdown").toggle();
    });
  </script>';
      require_once(__DIR__ . "/../../components/layout/layoutmanager.php");
   
  
  ?>

    
</body>
</html>
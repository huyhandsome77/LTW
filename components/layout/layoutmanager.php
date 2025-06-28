<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Quản lý sản phẩm</title>
  <link rel="stylesheet" href="../../assets/css/manager.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <?php
    require_once(__DIR__ . '/../../config/connect.php');
    ?>
  <div id="left-menu">
    <div id="logo">
      <img src="../../assets/img/logo1.png" alt="logo" />
    </div>
    <div id="menu">
      <div class="menu-item"><a href="quanlysanpham.php"><i class="fa-solid fa-boxes-stacked"></i> Quản lý sản phẩm</a></div>
      <div class="menu-item"><a href="quanlychitieu.php"><i class="fa-solid fa-wallet"></i> Quản lý chi tiêu</a></div>
      <div class="menu-item"><a href="quanlydonhang.php"><i class="fa-solid fa-receipt"></i> Quản lý đơn hàng</a></div>
    </div>
  </div>

  <div id="main">
    <div id="navbar">
      <div id="search">
        <input type="text" placeholder="Tìm sản phẩm..." />
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
      <div id="profile">
        <div class="myprofile">
          <img src="../../assets/img/avt/1.jpg" />
          <div class="user-info">
            <p id="name">Nguyen Phuoc Thinh</p>
            <p id="role">Quản trị viên</p>
          </div>
        </div>
        <div id="profile-dropdown">
          <div class="header">
            <img src="../../assets/img/avt/1.jpg" />
            <div class="info">
              <p class="name">Nguyen Phuoc Thinh</p>
              <button>Xem Profile</button>
            </div>
          </div>
          <ul>
            <li><a href="#">Xem đơn đặt hàng</a></li>
            <li><a href="#">Cài đặt tài khoản</a></li>
            <li><a href="/LTW/components/logout.php" id="logout-btn">Đăng xuất</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div id="content">
    <?= $pageContent ?? '<p>Không có nội dung.</p>' ?>
    </div>

    <script>
      $(document).ready(function () {
        loadDanhSach();

      
        $("#hinhanh").on("change", function () {
          const fileName = this.files[0]?.name || "";
          $("#tenFileAnh").text(fileName);
        });

   
        $("#productForm").on("submit", function (e) {
          e.preventDefault();

          const formData = new FormData(this);
          const id = $("#productId").val();

          formData.append("action", id ? "edit" : "add");
          if (id) formData.append("id", id);

          $.ajax({
            url: "xulysanpham.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
              loadDanhSach();
              $("#productForm")[0].reset();
              $("#tenFileAnh").text("");
              $("#productId").val("");
            },
            error: function () {
              alert("❌ Lỗi khi gửi form.");
            }
          }); 
        });

      
        $(document).on("click", ".xoa-btn", function () {
          const id = $(this).data("id");
          if (confirm("Bạn có chắc muốn xóa sản phẩm này?")) {
            $.post("xulysanpham.php", { action: "delete", id: id }, function () {
              loadDanhSach();
            });
          }
        });

       
        $(document).on("click", ".sua-btn", function () {
          const id = $(this).data("id");

          $.post("xulysanpham.php", { action: "get", id: id }, function (data) {
            const sp = JSON.parse(data);
            $("#tenSanPham").val(sp.tensanpham);
            $("#giaTien").val(sp.gia);
            $("#productId").val(sp.id);
            $("#tenFileAnh").text("");
            $("#hinhanh").val("");
          });
        });
      });
      $(document).ready(function () {
        const profile = $("#profile");
        const dropdown = $("#profile-dropdown");
        function closeDropdown() {
          dropdown.hide();
          profile.attr("aria-expanded", "false");
          dropdown.attr("aria-hidden", "true");
        }
        profile.on("click keydown", function (e) {
          if (
            e.type === "click" ||
            (e.type === "keydown" && (e.key === "Enter" || e.key === " "))
          ) {
            e.preventDefault();
            if (dropdown.is(":visible")) {
              closeDropdown();
            } else {
              dropdown.show();
              profile.attr("aria-expanded", "true");
              dropdown.attr("aria-hidden", "false");
            }
          }
        });
        $(document).on("click", function (e) {
          if (
            !profile.is(e.target) &&
            profile.has(e.target).length === 0 &&
            !dropdown.is(e.target) &&
            dropdown.has(e.target).length === 0
          ) {
            closeDropdown();
          }
        });
        $("#logout-btn").on("click", function (e) {
  e.preventDefault();
  window.location.href = "../../components/logout.php";
});

      });
      function loadDanhSach() {
        $("#danhSachSanPham").load("xulysanpham.php");
      }
    </script>
</body>
</html>

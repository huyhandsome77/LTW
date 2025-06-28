<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Quản lý đơn hàng</title>
 
</head>
<body>
  <?php
  $pageContent ='<div id="main-content">
      <h3><i class="fa-solid fa-receipt"></i> Danh sách đơn hàng</h3>

      <table>
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Số lượng</th>
            <th>Ngày mua</th>
            <th>Tên khách hàng</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody id="order-table">
          <tr>
            <td>DH001</td>
            <td>3</td>
            <td>2025-06-27</td>
            <td>Nguyễn Văn A</td>
            <td>
              <button onclick="editOrder("DH001")">✏️</button>
              <button onclick="deleteOrder("  DH001")">🗑️</button>
            </td>
          </tr>
          <tr>
            <td>DH002</td>
            <td>1</td>
            <td>2025-06-25</td>
            <td>Trần Thị B</td>
            <td>
              <button onclick="editOrder("DH002")">✏️</button>
              <button onclick="deleteOrder("DH002")">🗑️</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function editOrder(orderId) {
      alert("Chức năng chỉnh sửa đơn hàng: " + orderId + " (sẽ kết nối CSDL sau)");
    }

    function deleteOrder(orderId) {
      if (confirm("Bạn có chắc muốn xóa đơn hàng " + orderId + "?")) {
        alert("Đã xóa đơn hàng: " + orderId);
        // Sau này thêm logic xóa trong database
      }
    }

    function searchOrder() {
      const keyword = $("#searchInput").val().toLowerCase();
      $("#order-table tr").each(function () {
        const rowText = $(this).text().toLowerCase();
        $(this).toggle(rowText.indexOf(keyword) > -1);
      });
    }
    });
  </script>';
  require_once(__DIR__ . '/../../components/layout/layoutmanager.php');
      
  ?>  

    
</body>
</html>

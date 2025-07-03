<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đơn hàng</title>
    <link rel="stylesheet" href="/ltw/assets/css/admin.css">
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
<div class="order-page">
  <div class="header">
    <h2>Quản lý đơn hàng</h2>
  </div>

  <div class="filter-bar">
    <input type="text" class="search-box" placeholder="Tìm kiếm theo mã đơn / tên khách hàng">
  </div>
<select class="filter-select" id="statusFilter">
      <option value="all">Tất cả trạng thái</option>
      <option value="processing">Đang xử lý</option>
      <option value="shipped">Đã giao</option>
      <option value="cancelled">Đã huỷ</option>
    </select>
  <table class="table-order">
    <thead>
      <tr>
        <th>#</th>
        <th>Mã đơn hàng</th>
        <th>Khách hàng</th>
        <th>Ngày tạo</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Chi tiết</th>
      </tr>
    </thead>
    <tbody>
      <tr data-order-id="ORD001">
        <td>1</td>
        <td>ORD001</td>
        <td>Nguyễn Văn A</td>
        <td>01/07/2025</td>
        <td>205.000₫</td>
        <td><span class="badge status-processing">Đang xử lý</span></td>
        <td><button class="btn-sm btn-detail" onclick="showDetails('ORD001')">Xem</button></td>
      </tr>
      <tr data-order-id="ORD002">
        <td>2</td>
        <td>ORD002</td>
        <td>Trần Thị B</td>
        <td>02/07/2025</td>
        <td>110.000₫</td>
        <td><span class="badge status-shipped">Đã giao</span></td>
        <td><button class="btn-sm btn-detail" onclick="showDetails('ORD002')">Xem</button></td>
      </tr>
    </tbody>
  </table>

  <div class="order-detail-box" id="orderDetailBox">
    <h3>Chi tiết đơn hàng <span id="orderIdLabel"></span></h3>
    <table class="table-order-detail">
      <thead>
        <tr>
          <th>Sản phẩm</th>
          <th>Đơn giá</th>
          <th>Số lượng</th>
          <th>Thành tiền</th>
        </tr>
      </thead>
      <tbody id="orderDetailContent">
      </tbody>
    </table>
    <p class="total-label">Tổng cộng: <span id="orderTotal">0₫</span></p>
  </div>
</div>
<!-- giả lập đặt hàng -->
 <script>
  const dummyData = {
    ORD001: [
      { name: "Mì Hảo Hảo", price: 3500, quantity: 10 },
      { name: "Nước Lavie 500ml", price: 5000, quantity: 20 },
      { name: "Khăn giấy BlessYou", price: 7000, quantity: 10 },
    ],
    ORD002: [
      { name: "Bánh Oreo", price: 9000, quantity: 5 },
      { name: "Trà Xanh 0 độ", price: 6000, quantity: 10 },
    ]
  };

  function showDetails(orderId) {
    const list = dummyData[orderId] || [];
    const tbody = document.getElementById("orderDetailContent");
    const orderTotal = document.getElementById("orderTotal");
    let total = 0;
    tbody.innerHTML = "";

    list.forEach(item => {
      const sub = item.price * item.quantity;
      total += sub;
      const tr = `<tr>
        <td>${item.name}</td>
        <td>${item.price.toLocaleString()}₫</td>
        <td>${item.quantity}</td>
        <td>${sub.toLocaleString()}₫</td>
      </tr>`;
      tbody.innerHTML += tr;
    });

    document.getElementById("orderIdLabel").innerText = orderId;
    orderTotal.innerText = total.toLocaleString() + "₫";
    document.getElementById("orderDetailBox").style.display = "block";
  }
</script>
<!-- ---------------- -->
    <?php
   $pageContent = ob_get_clean();
    include(__DIR__ . '/../../components/layout/layoutadmin.php');
    ?>
</body>
<html>
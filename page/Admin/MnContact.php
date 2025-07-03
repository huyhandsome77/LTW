<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang hỗ trợ</title>
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <style>
      #main-content {
    padding: 0px 0px 0px 20px !important;
      }
    </style>
</head>
<body>
    <?php
   ob_start();
    ?>
<div class="page-feedback-chat">
  <div class="sidebar">
    <h3>Khách hàng</h3>
    <input type="text" class="search-input" placeholder="Tìm kiếm...">
    <div class="customer-item active" onclick="loadChat(1, 'Nguyễn Văn A')">Nguyễn Văn A</div>
    <div class="customer-item" onclick="loadChat(2, 'Trần Thị B')">Trần Thị B</div>
  </div>

  <div class="chat-area">
    <div class="chat-header" id="chatHeader">Nguyễn Văn A</div>
    <div class="chat-box" id="chatBox">

      <div class="chat-message customer">Giao hàng hơi chậm</div>
      <div class="chat-message admin">Cảm ơn bạn, bên mình sẽ cải thiện!</div>
    </div>
    
    <div class="chat-input">
      <textarea id="adminReply" placeholder="Nhập phản hồi..."></textarea>
      <button onclick="sendFeedbackReply()">Gửi</button>
    </div>
  </div>
</div>
<script>
  let currentCustomerId = 1;

  function loadChat(customerId, customerName) {
    currentCustomerId = customerId;
    document.getElementById("chatHeader").innerText =customerName;
    document.getElementById("chatBox").innerHTML = `
      <div class="chat-message customer">Giao hàng hơi chậm</div>
      <div class="chat-message admin">Cảm ơn bạn, bên mình sẽ cải thiện!</div>
    `;
  }

  function sendFeedbackReply() {
    const reply = document.getElementById("adminReply").value.trim();
    if (reply === "") {
      alert("Vui lòng nhập nội dung.");
      return;
    }
    const chatBox = document.getElementById("chatBox");
    const msg = document.createElement("div");
    msg.className = "chat-message admin";
    msg.textContent = reply;
    chatBox.appendChild(msg);

    document.getElementById("adminReply").value = "";
    chatBox.scrollTop = chatBox.scrollHeight;
  }
</script>

    <?php
   $pageContent = ob_get_clean();
    include(__DIR__ . '/../../components/layout/layoutadmin.php');
    ?>
    
</body>
<html>
<?php session_start(); ?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | 5AE WebShop</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <style>

      /* Suggestions styles */
      .suggestions {
        display: flex;
        flex-wrap: nowrap;
        gap: 16px;
        margin: 20px -8px 0 -8px;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }
      .suggestion-item {
        flex: 0 0 calc((100% / 6) - 13.33px);
        box-sizing: border-box;
        padding: 0 8px;
        min-width: 150px;
      }
      .card {
        border: 1px solid #ddd;
        border-radius: 6px;
        overflow: hidden;
        background-color: #fafafa;
        box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);
        display: flex;
        flex-direction: column;
        height: 100%;
      }
      .card img {
        width: 100%;
        height: auto;
        object-fit: cover;
        display: block;
        border-bottom: 1px solid #ddd;
      }
      .card p {
        margin: 12px 0;
        text-align: center;
        font-size: 1rem;
        color: #333;
        flex-grow: 1;
        padding: 0 8px 12px;
      }
      /* Hide scrollbar for WebKit browsers */
      .suggestions::-webkit-scrollbar {
        display: none;
      }
      /* Hide scrollbar for IE, Edge and Firefox */
      .suggestions {
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
      }
      @media (max-width: 768px) {
        #left-menu {
          position: relative;
          width: 100%;
          height: auto;
        }
        #main {
          margin-left: 0;
        }
        #navbar {
          padding: 5px 10px;
        }
        #navbar #search input {
          width: 150px;
        }
        #profile-dropdown {
          width: 90vw;
          right: 5vw;
          top: 60px;
        }
        .suggestion-item {
          flex: 0 0 calc((100% / 3) - 10.66px);
          min-width: 150px;
        }
      }
      @media (max-width: 480px) {
        .suggestion-item {
          flex: 0 0 calc((100% / 2) - 8px);
          min-width: 150px;
        }
      }
      .banner-row {
        display: flex;
        gap: 20px;
        margin: 30px 10px;
        flex-wrap: wrap;
      }
      
      .banner-col {
        flex: 1 1 45%;
      }
      
      .banner-card img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 16px;
        display: block;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      }
      
      /* form lienhe */
      #lienhe-layout{
        display:flex;
        justify-self: center;
        gap : 30px;
        margin:15px 0;
      }
      .contact-form {
          font-family: 'Arial', sans-serif; 
          background: white;
          padding: 60px 60px;
          border-radius: 12px;
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
          width: 550px;
      }

      .contact-form h2 {
          margin-bottom: 10px;
          color: #333;
      }

      .contact-form p {
          font-size: 0.95em;
          color: #666;
          margin-bottom: 25px;
      }

      .form-group {
          display: flex;
          flex-direction: column;
          margin-bottom: 15px;
      }

      .form-group label {
          margin-bottom: 6px;
          font-weight: 600;
          color: #333;
      }

      .form-group input,
      .form-group textarea {
          padding: 10px 12px;
          font-size: 15px;
          border: 1px solid #ccc;
          border-radius: 6px;
          outline: none;
          transition: border-color 0.3s ease;
      }

      .form-group input:focus,
      .form-group textarea:focus {
          border-color: #007bff;
      }

      button[type="submit"] {
          background-color: #6c5ce7;
          color: white;
          padding: 12px 18px;
          font-size: 15px;
          font-weight: bold;
          border: none;
          border-radius: 6px;
          cursor: pointer;
          transition: background-color 0.3s ease;
      }

      button[type="submit"]:hover {
          background-color: #330099;
          color : #FF0000;
      }

      .div-info {
          font-family: 'Arial', sans-serif; 
          background: white;
          padding: 60px 60px;
          border-radius: 12px;
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
          width: 550px;
          height: 626.2px;
      }
      .div-info h3{
        text-align : center;
        padding: 10px 0;
      }
      .group-tt{
        display:flex;
        justify-self: center;
        gap:5px;
        margin : 7px 0;
      }
      .group-tt i{
        font-size:20px;
      }
      .group-tt p{
        font-size:18px;
      }
      .group-svg{
        display:flex;
        gap : 20px;
        justify-self: center;
        margin-top : 25px;
      }
      .group-svg img{
        width: 50px;
        height : 50px;
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
      <div id="lienhe-layout">
      <div class="contact-container">
        <form class="contact-form" action="xuly/submit_LienHe.php" method="post">
          <h2>Liên hệ với chúng tôi</h2>
          <p>Nếu bạn có câu hỏi hay cần hỗ trợ, vui lòng điền vào form bên dưới.</p>

          <div class="form-group">
            <label for="hoTen">Họ và tên</label>
            <input type="text" id="hoTen" name="hoTen" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
          </div>

          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" required pattern="0[0-9]{9}">
          </div>

          <div class="form-group">
            <label for="noiDung">Nội dung</label>
            <textarea id="noiDung" name="noiDung" placeholder="Nhập nội dung cần hỗ trợ..." rows="4" required></textarea>
          </div>

          <button type="submit">Gửi liên hệ</button>
        </form>
        <?php if (isset($_SESSION['thongbao'])): ?>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
            Swal.fire({
              icon: '<?= $_SESSION['thongbao']['type'] ?>',
              title: '<?= $_SESSION['thongbao']['title'] ?>',
              text: '<?= $_SESSION['thongbao']['message'] ?>',
              confirmButtonText: 'OK'
            });
          </script>
          <?php unset($_SESSION['thongbao']); ?>
        <?php endif; ?>

        </div>
        <div class="div-info">
          <img src="../assets/img/logo1.png" alt="Logo Webshop">
          <h3>FIVE FRIENDS | ONLINE WEBSHOP</h3>
          <div class="group-tt">
          <i class="fa-solid fa-location-dot"></i>
          <p>Số 02 Võ Oanh</p>
          </div>
          <div class="group-tt">
          <i class="fa-solid fa-phone"></i>
          <p>038.66.99.723</p>
          </div>
          <div class="group-tt">
          <i class="fa-duotone fa-solid fa-envelope"></i>
          <p>admin@fivefriend.webshop</p>
          </div>
          <div class="group-svg">
            <img src="../assets/img/svg/facebook.svg" alt="">
            <img src="../assets/img/svg/instagram.svg" alt="">
            <img src="../assets/img/svg/tiktok.svg" alt="">
            <img src="../assets/img/svg/youtube.svg" alt="">
          </div>
        </div>
        </div>
      </div>
      <?php include("include/footer.php"); ?>
    </div>
    <script>
      $(document).ready(function () {
        $(".submenu").hide();
        $(".menu1").click(function (e) {
          e.preventDefault();
          const submenu = $(this).siblings(".submenu");
          submenu.slideToggle();
          $(this).find(".caret-icon").toggleClass("rotate");
        });
        
      });
    </script>
  </body>
</html>

<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>5AE - Online WebShop</title>
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
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        font-family: "Roboto", sans-serif;
        background-color: #f0f0f0;
      }
      #left-menu {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background-color: #6c5ce7;
        color: white;
        overflow-y: auto;
        z-index: 999;
      }
      #logo {
        width: 100%;
        height: 100px;
        text-align: center;
        padding: 10px;
        margin-bottom: 10px;
      }
      #logo img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
      }
      #menu .menu-item {
        padding: 12px 20px;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px,
          rgba(0, 0, 0, 0.1) 0px 2px 4px 0px,
          rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
        margin: 3px 0;
      }
      #menu .menu-item:hover {
        background-color: #8e7ef1;
      }
      .menu-item a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        display: flex;
        align-items: center;
        gap: 10px;
      }
      .menu1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        font-size: 18px;
        gap: 10px;
      }
      .submenu {
        display: none;
        background-color: #5a4cd1;
        margin-left: 10px;
        margin-top: 5px;
        padding: 5px 0;
        border-radius: 10px;
      }
      .submenu-item {
        padding: 8px 16px;
        background-color: #7b6de3;
        margin: 5px 10px;
        border-radius: 6px;
        transition: background-color 0.3s;
      }
      .submenu-item a {
        color: #e6e6fa;
        text-decoration: none;
      }
      .submenu-item:hover {
        background-color: #8c7ff0;
      }
      .submenu-item:hover a {
        color: #fff;
      }
      .caret-icon {
        margin-left: auto;
        transition: transform 0.3s ease;
      }
      .rotate {
        transform: rotate(180deg);
      }
      #main {
        margin-left: 250px;
        padding: 5px 20px;
      }
      #navbar {
        height: 60px;
        background-color: #fff;
        margin-top: 5px;
        margin-bottom: 10px;
        border-bottom: 1px solid #ccc;
        padding: 5px 20px;
        display: flex;
        align-items: center;
        position: relative;
        z-index: 20;
      }
      #navbar #search input {
        padding: 10px 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        width: 250px;
        font-size: 15px;
      }
      #navbar #search button {
        padding: 10px 10px;
        border: 1px solid rgb(177, 177, 177);
        margin-left: 3px;
        color: black;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
      }
      #navbar #search button:hover {
        background-color: #666;
        color: white;
      }

      #main-content {
        background-color: #fff;
        padding: 5px 20px;
        min-height: 400px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      }

      #footer {
        margin-top: 20px;
        padding: 10px;
        text-align: center;
        background-color: #ddd;
      }

      #profile {
        display: flex;
        align-items: center;
        margin-left: auto;
        gap: 10px;
        position: relative;
        cursor: pointer;
      }
      .myprofile {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 0 5px;
        border-radius: 10px;
      }
      .myprofile img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 8px;
      }
      .user-info {
        display: flex;
        flex-direction: column;
      }
      #name {
        margin: 0;
        font-weight: bold;
      }
      #role {
        margin: 0;
        font-size: 0.9em;
        color: #666;
      }
      #profile-dropdown {
        display: none;
        position: absolute;
        top: 70px;
        right: 0;
        width: 280px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 8px 24px rgb(0 0 0 / 0.15);
        border: 1px solid #ddd;
        z-index: 30;
        font-family: "Roboto", sans-serif;
      }
      .myprofile:hover {
        background-color: #b3b3b3;
      }
      #profile-dropdown .header {
        display: flex;
        gap: 15px;
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
        align-items: center;
      }
      #profile-dropdown .header img {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        object-fit: cover;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 8px;
      }
      #profile-dropdown .header .info {
        flex-grow: 1;
      }
      #profile-dropdown .header .info p.name {
        font-weight: 600;
        color: #333;
        margin-bottom: 4px;
      }
      #profile-dropdown .header .info p.email {
        font-size: 0.9em;
        color: #666;
        margin-bottom: 8px;
      }
      #profile-dropdown .header .info button {
        background-color: #5a5ad1;
        color: white;
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      #profile-dropdown .header .info button:hover {
        background-color: #4a49b8;
      }
      #profile-dropdown ul {
        list-style: none;
        padding: 0;
        margin: 0;
      }
      #profile-dropdown ul li {
        border-top: 1px solid #eee;
      }
      #profile-dropdown ul li a {
        display: block;
        padding: 12px 20px;
        color: #333;
        text-decoration: none;
        font-size: 1rem;
        transition: background-color 0.2s ease;
      }
      #profile-dropdown ul li a:hover {
        background-color: #f5f5f5;
      }

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
          position: relative;
          z-index: 10;
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
    </style>
  </head>
  <body>
    <?php 
    include("../connect.php");
    include("include/left-menu.php");
    ?>
    <div id="main">
      <?php include("include/navbar.php"); 
      ?>
      <div id="main-content">
        <div class="banner-row">
          <div class="banner-col">
            <div class="banner-card">
              <img src="../assets/img/goiychoban/1.jpg" alt="Banner 1" />
            </div>
          </div>
          <div class="banner-col">
            <div class="banner-card">
              <img src="../assets/img/goiychoban/2.jpg" alt="Banner 2" />
            </div>
          </div>
        </div>
        <h4>Gợi ý cho bạn</h4>
        <div class="suggestions">
          <div class="suggestion-item">
            <div class="card">
              <img
                src="../assets/img/goiychoban/gy1.webp"
                alt="Món Ngon Đề Xuất banner image"
              />
              <p>Món Ngon Đề Xuất</p>
            </div>
          </div>
          <div class="suggestion-item">
            <div class="card">
              <img
                src="../assets/img/goiychoban/gy2.webp"
                alt="Lễ Hội Trà Mùa Hè banner image"
              />
              <p>Lễ Hội Trà Mùa Hè</p>
            </div>
          </div>
          <div class="suggestion-item">
            <div class="card">
              <img
                src="../assets/img/goiychoban/gy3.webp"
                alt="Lễ Hội Trái Cây banner image"
              />
              <p>Lễ Hội Trái Cây</p>
            </div>
          </div>
          <div class="suggestion-item">
            <div class="card">
              <img
                src="../assets/img/goiychoban/gy4.webp"
                alt="Mì Gà Siu Cay banner image"
              />
              <p>Mì Gà Siu Cay</p>
            </div>
          </div>
          <div class="suggestion-item">
            <div class="card">
              <img
                src="../assets/img/goiychoban/gy5.webp"
                alt="Mua Là Có Quà banner image"
              />
              <p>Mua Là Có Quà</p>
            </div>
          </div>
          <div class="suggestion-item">
            <div class="card">
              <img
                src="../assets/img/goiychoban/gy6.webp"
                alt="Toastie - Sandwich banner image"
              />
              <p>Toastie - Sandwich</p>
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

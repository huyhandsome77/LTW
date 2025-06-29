<?php
session_start();
?>
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
            margin-left: 250px;
        }
        #navbar {
        position: fixed;
        top: 0;
        left: 250px; /* vì menu trái có width 250px */
        right: 0;
        height: 60px;
        background-color: #fff;
        border-bottom: 1px solid #ccc;
        padding: 5px 20px;
        display: flex;
        align-items: center;
        z-index: 1000;
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
      .section-title h3 {
        margin-top:90px;
        font-size: 1.7rem;
        font-weight: bold;
        letter-spacing: 0.5px;
        margin: 20px 0 10px 10px;
        text-align: center;
        }

    .flash-sale-section {
        margin: 0 15px;
        }

    .flash-sale-section h5 {
        font-size: 1.3rem;
        font-weight: bold;
        letter-spacing: 0.5px;
        margin-bottom: 16px;
        }

    .combo-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        }

    .product-card {
        flex: 1 1 calc(20% - 16px); 
        max-width: calc(20% - 16px);
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
        }

    .product-card img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 6px;
        }

    .product-info {
        margin-top: 10px;
        }

    .product-info .description {
        font-size: 0.9rem;
        margin-bottom: 5px;
        }

    .product-info hr {
        margin: 5px 0;
        border-color: #ccc;
        }

    .product-info .price {
        font-size: 1.3rem;
        text-align: center;
        font-weight: bold;
        letter-spacing: 0.5px;
        margin-top: 8px;
        }

    .product-info .delivery {
        color: green;
        text-align: center;
        font-size: 0.95rem;
        }

    .product-info .delivery i {
        font-size: 20px;
        margin-left: 6px;
        cursor: pointer;
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
      <div class="section-title">
      <h3>ĐỒ ĂN</h3>
        </div>
        <div class="flash-sale-section">
        <h5>Flash sale</h5>

        <div class="combo-grid">
            <!-- Combo 1 -->
            <div class="product-card">
            <img src="../assets/img/combo/cb1.webp" alt="Combo 1">
            <div class="product-info">
                <p class="description">Combo Sandwich Nướng và Trà Sữa Size M (tùy chọn)</p>
                <hr />
                <p class="price">40,000 đ</p>
                <hr />
                <p class="delivery">
                Giao nhanh 24h
                <a href="#"><i class="fas fa-plus-square"></i></a>
                </p>
            </div>
            </div>

            <!-- Combo 2 -->
            <div class="product-card">
            <img src="../assets/img/combo/cb1.webp" alt="Combo 2">
            <div class="product-info">
                <p class="description">Combo Cơm Gà Chiên và Nước Ngọt</p>
                <hr />
                <p class="price">45,000 đ</p>
                <hr />
                <p class="delivery">
                Giao nhanh 24h
                <a href="#"><i class="fas fa-plus-square"></i></a>
                </p>
            </div>
            </div>

            <!-- Combo 3 -->
            <div class="product-card">
            <img src="../assets/img/combo/cb1.webp" alt="Combo 3">
            <div class="product-info">
                <p class="description">Combo Mì Ý và Pepsi lon</p>
                <hr />
                <p class="price">42,000 đ</p>
                <hr />
                <p class="delivery">
                Giao nhanh 24h
                <a href="#"><i class="fas fa-plus-square"></i></a>
                </p>
            </div>
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

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

      .section-title h3 {
        margin-top:90px;
        font-size: 1.7rem;
        font-weight: bold;
        letter-spacing: 0.5px;
        margin: 20px 0 10px 10px;
        text-align: center;
        }

    .nuoc-uong-section {
        margin: 0 15px;
        }

    .nuoc-uong-section h5 {
        font-size: 1.3rem;
        font-weight: bold;
        letter-spacing: 0.5px;
        margin-bottom: 16px;
        }

    .nuoc-uong-grid {
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
      <h3>NƯỚNG UỐNG</h3>
        </div>
        <div class="nuoc-uong-section">
        <h5>Nước Uống</h5>

        <?php
        $sql = "SELECT * FROM sanpham WHERE loaiSanPham = 'Nước Uống'";
        $result = mysqli_query($link, $sql);
        ?>

        <div class="nuoc-uong-grid">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
          <div class="product-card">
            <img src="../<?php echo htmlspecialchars($row['hinhanh']); ?>" alt="<?php echo htmlspecialchars($row['tenSanPham']); ?>">
            <div class="product-info">
              <p class="description"><?php echo htmlspecialchars($row['tenSanPham']); ?></p>
              <hr />
              <p class="price"><?php echo number_format($row['gia'], 0, ',', '.') . " đ"; ?></p>
              <hr />
              <p class="delivery">
                Giao nhanh 24h
                <a href="them_giohang.php?idSanPham=<?php echo $row['idSanPham']; ?>"><i class="fas fa-plus-square"></i></a>
              </p>
            </div>
          </div>
        <?php } ?>
        </div>

        </div>
        <p style="margin-top: 1000px">
        </p>
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

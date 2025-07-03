<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo Cáo</title>
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
<h1 align="center"><i>Trang này hiện đang trong giai đoạn phát triển, mọi người thông cảm Dev đang<br><p style="font-size:40px; margin-top:30px;"> bị <p style="font-size:100px; color: red; margin-top: 15px;">lườiii</p></i></h1>
    <?php
   $pageContent = ob_get_clean();
    include(__DIR__ . '/../../components/layout/layoutadmin.php');
    ?>
    
</body>
<html>
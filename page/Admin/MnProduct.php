<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <link rel="stylesheet" href="/projectwebbanhang/Src/assets/css/admin.css">
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <?php
    require_once(__DIR__ . '/../../config/connectdb.php');
    $pageContent = '
    <br>
     <h1>Quản Lý Sản Phẩm</h1>
    <p>Trang này sẽ hiển thị danh sách các sản phẩm và cho phép bạn quản lý chúng.</p>
    <p>Hiện tại, trang này chưa được triển khai đầy đủ. Vui lòng quay lại sau để xem các cập nhật mới nhất.</p>
    <p>Cảm ơn bạn đã sử dụng hệ thống quản lý của chúng tôi!</p>
    <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email hoặc điện thoại.</p>
    <ul>
        <li>Email: <a href="mailto:HaiConVit@gmail.com"> HaiConVit@gmail.com</a>
        <li>Điện thoại: <a href="tel:+84987654321">+84 987 654 321</a></li>
        <li>Địa chỉ: Số 123, Đường ABC, Quận XYZ, Thành phố Hồ Chí Minh</li>
    </ul>
    ';
   include (__DIR__ . '/../../components/layout/layoutadmin.php');
    ?>
   
</body>
<html>
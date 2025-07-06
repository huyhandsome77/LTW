<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Đăng nhập</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 40px;
      background-color: #f4f6f8;
    }
    form {
      max-width: 400px;
      margin: 0 auto;
      padding: 30px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
    }
    label {
      display: block;
      margin-top: 10px;
    }
    input {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      border: none;
      color: white;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
    .login_error {
      color: red;
      text-align: center;
    }
  </style>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: /ltw/page/Admin/Admin.php");
    exit;
}

?>

<h1>Đăng nhập</h1>
<form action="/ltw/components/layout/login_process.php" method="post">
  <label for="username">Tên đăng nhập:</label>
  <input type="text" id="username" name="username" required>

  <label for="password">Mật khẩu:</label>
  <input type="password" id="password" name="password" required>
<?php
if (isset($_SESSION['login_error'])) {
    echo "<p style='color:red;'>" . $_SESSION['login_error'] . "</p>";
    unset($_SESSION['login_error']); 
}
?>
  <button type="submit">Đăng nhập</button>
</form>

</body>
</html>

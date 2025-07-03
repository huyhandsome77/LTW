<!DOCTPYE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng nhập</title>
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
        <form action="/ltw/components/layout/login.php" method="post">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Đăng nhập</button>
        </form>
        <?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $testUsername = "admin";
    $testPassword = "123";
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($username === $testUsername && $password === $testPassword) {
        $_SESSION['username'] = $username;

        header("Location: /ltw/page/Admin/Admin.php");
        exit;
    } else {
        echo "<p style='color:red;'>Tên đăng nhập hoặc mật khẩu không đúng.</p>";
    }
}
?>


    </body>
</html>
<!-- <?php
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     require_once(__DIR__ . '/../../config/connectdb.php');
        //     $username = $_POST['username'];
        //     $password = $_POST['password'];

        //     $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        //     $stmt->bind_param("ss", $username, $password);
        //     $stmt->execute();
        //     $result = $stmt->get_result();

        //     if ($result->num_rows > 0) {
        //         $_SESSION['username'] = $username;
        //         header("Location: /projectwebbanhang/Src/page/Admin/Admin.php");
        //         exit;
        //     } else {
        //         echo "<p style='color:red;'>Tên đăng nhập hoặc mật khẩu không đúng.</p>";
        //     }
        // }
        ?> -->
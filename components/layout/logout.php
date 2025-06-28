<?php
        session_start();
       $_SESSION = [];
        session_unset();
        session_destroy();
        header("Location: /projectwebbanhang/Src/components/layout/login.php");
        exit;
        ?>
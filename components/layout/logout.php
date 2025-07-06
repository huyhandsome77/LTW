<?php
        session_start();
       $_SESSION = [];
        session_unset();
        session_destroy();
        header("location: /ltw/components/layout/login.php");
        exit;
        ?>
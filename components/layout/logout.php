<?php
        session_start();
       $_SESSION = [];
        session_unset();
        session_destroy();
        header("/ltw/components/layout/login.php");
        exit;
        ?>
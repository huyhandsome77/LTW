<?php
    $link=mysqli_connect("localhost","root","Anhhuy1711@") or die("Không thể kết nối được vui lòng thử lại");
    mysqli_select_db($link,"laptrinhweb") or die("Không tồn tại DB này");
?>
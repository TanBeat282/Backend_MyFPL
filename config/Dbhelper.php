<?php
    $conn = new mysqli('localhost', 'id21113318_root', 'Ngoctan@17349', 'id21113318_uses');

    if ($conn->connect_error) {
        echo("Kết nối thất bại: " + $conn->connect_error);
    }
?>

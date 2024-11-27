<?php
$servername = 'localhost:3066';
$username = 'root';
$password = '';
$database = 'phongtrodb';

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Lỗi kết nối thát bại: " . $conn->connect_error);
}

?>
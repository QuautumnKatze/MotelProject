<?php
$servername = 'localhost:3306';
$username = 'root';
$password = '1234';
$database = 'phongtrodb';

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Lỗi kết nối thát bại: " . $conn->connect_error);
}

?>
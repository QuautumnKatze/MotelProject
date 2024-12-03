<?php

$servername = 'localhost:3306';
$username = 'root';
$password = '1234';
$database = 'phongtrodb';


$conn = mysqli_connect($severname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại" . $connec->connect_error);
}
?>
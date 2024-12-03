<?php
$severname = "localhost:3066";
$username = "root";
$password = "";
$dbname = "phongtrodb";

$conn = mysqli_connect($severname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại" . $connec->connect_error);
    
}
?>
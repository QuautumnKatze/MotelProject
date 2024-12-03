<?php
// $servername = "localhost:3066";
// $username = "root";
// $password = "";
// $database = "phongtrodb";

$servername = "localhost:3306";
$username = "root";
$password = "1234";
$database = "phongtrodb";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại" . $connec->connect_error);

}
?>
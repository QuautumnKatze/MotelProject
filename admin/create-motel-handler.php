<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $title = $_POST['title'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $images = $_POST['images'];
    $phone = $_POST['phone'];
    $area = $_POST['area'];
    $category_id = $_POST['category_id'];
    $district_id = $_POST['district_id'];
    $description = $_POST['description'];
    $uid = $_POST['user_id'];

    $sql = "INSERT INTO `motels`( `title`, `description`, `price`, `area`, `count_view`, `address`, `latlng`, `images`, `user_id`, `category_id`, `district_id`, `ultilities`, `phone`, `approve`) 
    VALUES ('$title','$description','$price','$area','0','$address','aaaaa','$images','$uid','$category_id','$district_id','1','$phone','1')";
    if ($result = $conn->query($sql) == TRUE) {
        header("Location: list-motel.php?status=success-add");
        exit();
    } else {
        header("Location: list-motel.php?status=error-add");
        exit();
    }
}

?>
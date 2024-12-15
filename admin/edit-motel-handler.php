<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $id = $_POST['id'];
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


    $sql = "UPDATE motels SET title = '$title', user_id = '$uid', price = '$price', address = '$address', images = '$images', phone = '$phone', area = '$area' , category_id = '$category_id', district_id = '$district_id', `description` = '$description' WHERE id = '$id'";
    if ($result = $conn->query($sql) == TRUE) {
        header("Location: list-motel.php?status=success");
        exit();
    } else {
        header("Location: list-motel.php?status=error");
        exit();
    }
}
?>
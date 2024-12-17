<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $id = $_POST['id'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $avatar = $_POST['avatar'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET username = '$username', name = '$name', password = '$password', email = '$email', phone = '$phone', avatar = '$avatar', role = '$role' WHERE id = '$id'";
    if ($result = $conn->query($sql) == TRUE) {
        header("Location: list-user.php?status=success");
        exit();
    } else {
        header("Location: list-user.php?status=error");
        exit();
    }
}
?>
<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $avatar = $_POST['avatar'];
    $role = $_POST['role'];

    $sql = "INSERT INTO `users`( `username`, `name`, `password`, `email`, `phone`, `avatar`, `role`) 
    VALUES ('$username','$name','$password','$email','$phone','$avatar','$role')";
    if ($result = $conn->query($sql) == TRUE) {
        header("Location: list-user.php?status=success-add");
        exit();
    } else {
        header("Location: list-user.php?status=error-add");
        exit();
    }
}

?>
<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $avatar = $_POST['avatar'];

    $sql = "UPDATE `users` SET `name`='$name',`username`='$username',`email`='$email',`phone`='$phone',`avatar`='$avatar' WHERE username = '$username'";
    if ($result = $conn->query($sql) === TRUE) {
        header("Location: ../profile.php?status=success");
        exit();
    } else {
        header("Location: ../profile.php?status=error");
        exit();
    }
}

?>
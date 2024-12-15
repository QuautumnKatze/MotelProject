<?php
include '../config.php'; // Include file kết nối database

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Lấy id từ query string

    $sql = "UPDATE motels SET approve = 1 WHERE id = '$id'";

    if ($result = $conn->query($sql) == TRUE) {
        header("Location: list-motel.php?status=success-del");
        exit();
    } else {
        header("Location: list-motel.php?status=error-del");
        exit();
    }
}
?>
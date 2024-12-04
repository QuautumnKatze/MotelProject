<?php
include 'config.php'; // Include file kết nối database

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Lấy id từ query string

    $sql = "DELETE FROM motels WHERE id = '$id'";

    if ($result = $conn->query($sql) == TRUE) {
        header("Location: my-motel.php?status=success-del");
        exit();
    } else {
        header("Location: my-motel.php?status=error-del");
        exit();
    }
}
?>
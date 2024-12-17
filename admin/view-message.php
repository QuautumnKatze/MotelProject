<?php include 'head.php' ?>
<?php
include '../config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM messages WHERE id = '$id' Limit 1";
    $result = $conn->query($sql);
    $message = $result->fetch_assoc();
}
?>

<!-- Content wrapper -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Chi tiết tin nhắn</h2>
    <div class="card">
        <div class="card-header">
            <strong>Thông tin tin nhắn</strong>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> <?php echo $message['id']; ?></p>
            <p><strong>Email người gửi:</strong> <?php echo htmlspecialchars($message['email']); ?></p>
            <p><strong>Ngày gửi:</strong> <?php echo date("H:i d/m/Y", strtotime($message['created_at'])); ?></p>
            <p><strong>Nội dung:</strong></p>
            <p><?php echo nl2br(htmlspecialchars($message['message'])); ?></p>
        </div>
        <div class="card-footer text-center">
            <a href="list-messages.php" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
</div>
<!-- Content wrapper -->
<?php include 'foot.php' ?>
</body>

</html>
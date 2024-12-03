<?php include('menu.php'); ?>
<?php

// Kiểm tra biến GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $motel_id = intval($_GET['id']);

    // Truy vấn tìm bản ghi dựa trên id
    $query = "SELECT * FROM motels WHERE id = $motel_id";
    $result = $conn->query($query);

    // Kiểm tra kết quả truy vấn
    if ($result && $result->num_rows > 0) {
        // Lấy dữ liệu phòng trọ
        $motel = $result->fetch_assoc();
    } else {
        $error_message = "Không tồn tại Motel.";
    }
} else {
    $error_message = "ID phòng trọ không hợp lệ.";
}
?>


<div class="container mt-5">
    <?php if (isset($error_message)): ?>
        <!-- Hiển thị thông báo lỗi -->
        <div class="alert alert-danger">
            <?php echo $error_message; ?>
        </div>
    <?php else: ?>
        <!-- Hiển thị thông tin chi tiết của phòng trọ -->
        <div class="card">
            <img src="<?php echo $motel['images']; ?>" class="card-img-top" width="max" alt="Motel Image">
            <div class="card-body">
                <h5 class="card-title"><?php echo $motel['title']; ?></h5>
                <p class="card-text">
                    <strong>Địa chỉ:</strong> <?php echo $motel['address']; ?><br>
                    <strong>Giá thuê:</strong> <?php echo number_format($motel['price']); ?> VND<br>
                </p>
                <div class="container m-3">
                    <?php echo $motel['description']; ?>
                </div>
                <a href="index.php" class="btn btn-primary">Quay lại danh sách</a>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php include('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
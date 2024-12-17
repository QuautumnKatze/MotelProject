<?php
include 'menu.php';
?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Liên hệ với chúng tôi</h2>
    <form action="backend/contact-handler.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email của bạn</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Nội dung tin nhắn</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi tin nhắn</button>
    </form>
</div>

<?php include 'footer.php'; ?>
<?php
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    echo "<script>
        $(document).ready(function() {";
    if ($status == 'success') {
        echo "toastr.success('Gửi tin thành công!');";
    } elseif ($status == 'error') {
        echo "toastr.error('Gửi tin thất bại!');";
    }
    echo "});
        </script>";
}
?>
</body>

</html>
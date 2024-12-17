<?php include 'head.php' ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="fw-bold py-3 mb-4">Quản lý tài khoản</h4>
            </div>
            <div class="col-lg-6 d-flex flex-row-reverse">
                <button class="btn">
                    <a class="btn btn-primary" href="create-user.php">Thêm mới</a>
                </button>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Danh sách tài khoản</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thời gian</th>
                            <th>Từ email</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        include '../config.php';
                        $sql = "SELECT id, email, message, DATE_FORMAT(created_at, '%H:%i %d/%m/%Y') AS formatted_date FROM messages";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['formatted_date']}</td>
                                <td>{$row['email']}</td>";
                                echo '</td>
                                <td>
                                <a class="btn btn-primary" href="view-message.php?id=' . $row['id'] . '">Xem</a>
                                </td>
                              </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/ Striped Rows -->
<!-- Content wrapper -->
<?php include 'foot.php' ?>
<script>
    function confirmReset(id) {
        if (confirm("Bạn có chắc chắn muốn reset mật khẩu người dùng này thành 12345 không?")) {
            window.location.href = 'reset-password.php?id=' + id;
        }
    }
</script>
<?php
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    echo "
<script>
    document.addEventListener('DOMContentLoaded', function () {
        switch ('$status') {
            case 'success':
                toastr.success('Cập nhật thành công!');
                break;
            case 'error':
                toastr.error('Cập nhật thất bại!');
                break;
            case 'success-del':
                toastr.success('Thao tác thành công!');
                break;
            case 'error-del':
                toastr.error('Thao tác thất bại!');
                break;
            case 'success-add':
                toastr.success('Thêm thành công!');
                break;
            case 'error-add':
                toastr.error('Thêm thất bại!');
                break;
        }
    });
</script>";
}
?>
</body>

</html>
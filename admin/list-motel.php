<?php include 'head.php' ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="fw-bold py-3 mb-4">Quản lý phòng trọ</h4>
            </div>
            <div class="col-lg-6 d-flex flex-row-reverse">
                <button class="btn">
                    <a class="btn btn-primary" href="create-motel.php">Thêm mới</a>
                </button>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Danh sách phòng trọ</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hình ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Địa chỉ</th>
                            <th>Chủ trọ</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        include '../config.php';
                        $sql = "SELECT motels.*, users.id AS userid, users.name AS owner_name, users.phone, users.avatar FROM motels JOIN users ON motels.user_id = users.id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                <td>{$row['id']}</td>
                                <td><img src='../{$row['images']}' alt='Room Image' width='100'></td>
                                <td>{$row['title']}</td>
                                <td>{$row['address']}</td>
                                <td>
                                    <ul class='list-unstyled users-list m-0 avatar-group d-flex align-items-center'>
                                        <li data-bs-toggle='tooltip' data-popup='tooltip-custom' data-bs-placement='top'
                                            class='avatar avatar-xs pull-up' title='{$row['owner_name']}'>
                                            <img src='../{$row['avatar']}' class='rounded-circle' />
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                ";
                                if ($row['approve'] == 0) {
                                    echo '<i class="text-danger bx bx-x-circle me-1"></i>';
                                } elseif ($row['approve'] == 1) {
                                    echo '<i class="text-success bx bx-check-circle me-1"></i>';
                                }

                                echo "</td>
                                <td>
                                 <div class='dropdown'>
                                    <button type='button' class='btn p-0 dropdown-toggle hide-arrow'
                                        data-bs-toggle='dropdown'>
                                        <i class='bx bx-dots-vertical-rounded'></i>
                                    </button>
                                    <div class='dropdown-menu'>
                                        <a class='dropdown-item' href='edit-motel.php?id={$row['id']}'><i
                                                class='bx bx-edit-alt me-1'></i>
                                            Sửa</a>";
                                if ($row['approve'] == 0) {
                                    echo "<a class='dropdown-item' href='unhide-motel.php?id={$row['id']}'><i
                                                class='bx bx-low-vision me-1'></i>
                                            Ẩn</a>";
                                } elseif ($row['approve'] == 1) {
                                    echo "<a class='dropdown-item' href='hide-motel.php?id={$row['id']}'><i
                                                class='bx bx-low-vision me-1'></i>
                                            Ẩn</a>";
                                }

                                echo "</div>
                                </div>
                                </td>
                              </tr>";
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
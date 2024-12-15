<?php
include 'menu.php';
?>
<?php
include 'config.php';
$sql = "SELECT * from motels where approve = 1";
$motel = $conn->query($sql);
?>
<style>
    .card {
        height: 450px;
        /* Chiều cao cố định */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card img {
        height: 250px;
        /* Cố định chiều cao cho ảnh */
        object-fit: cover;
        /* Cắt ảnh nếu cần để phù hợp */
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex-grow: 1;
        /* Tự động kéo dài để lấp đầy khoảng trống */
    }

    .card-title,
    .card-text {
        margin: 0;
        overflow: hidden;
        /* Ẩn nội dung tràn */
        text-overflow: ellipsis;
        /* Thêm dấu "..." nếu nội dung quá dài */
        white-space: nowrap;
        /* Hiển thị một dòng */
    }
</style>

<div class="container mt-5">
    <h2 class="text-center">Danh sách phòng trọ</h2>
    <div class="row">
        <?php
        if ($motel->num_rows > 0) {
            while ($row = $motel->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">
                <div class="card">
                    <img src="' . $row['images'] . '" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['title'] . '</h5>
                        <p class="card-text"> Giá: ' . number_format($row['price']) . '<sup>đ</sup>/tháng</p>
                        <p class="card-text"> Địa chỉ: ' . $row['address'] . '</p>
                        <a href="motel-detail.php?id=' . $row['id'] . '" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>';
            }
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>

</html>
<?php
include 'config.php';
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    $sql = "SELECT * from users where username = '$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

$sql = "SELECT * from motels";
$motel = $conn->query($sql);


?>
<?php
include 'menu.php';
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
    <h2 class="text-center">Product List</h2>
    <div class="row">
        <?php
        if ($motel->num_rows > 0) {
            while ($row = $motel->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">
                <div class="card">
                    <img src="' . $row['images'] . '" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">Description of Product 1.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>';
            }
        }
        ?>
    </div>



    <?php include 'footer.php'; ?>
    </body>

    </html>
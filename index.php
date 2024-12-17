<?php
include 'menu.php';
?>
<?php
include 'config.php';
$sql = "SELECT * from motels where approve = 1";
$motel = $conn->query($sql);
// Lấy tham số từ thanh tìm kiếm
$search_title = isset($_GET['title']) ? $_GET['title'] : '';
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : 999999999;
$min_area = isset($_GET['min_area']) ? $_GET['min_area'] : 0;
$max_area = isset($_GET['max_area']) ? $_GET['max_area'] : 999999999;

// Phân trang
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 9; // Số lượng tối đa mỗi trang
$offset = ($page - 1) * $limit;
$search_title_wildcard = "%" . $search_title . "%";
// Truy vấn tìm kiếm và phân trang
$sql = "SELECT * FROM motels 
        WHERE approve = 1 
        AND title LIKE '$search_title_wildcard' 
        AND price BETWEEN $min_price AND $max_price
        AND area BETWEEN $min_area AND $max_area
        LIMIT $offset, $limit";
$motel = $conn->query($sql);

// Đếm tổng số kết quả
$count_sql = "SELECT COUNT(*) AS total FROM motels 
        WHERE approve = 1 
        AND title LIKE '$search_title_wildcard' 
        AND price BETWEEN $min_price AND $max_price
        AND area BETWEEN $min_area AND $max_area";
$count = $conn->query($count_sql);
$total_rows = $count->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $limit);
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
    <form method="GET" class="mb-4 p-4 shadow-sm bg-light rounded">
        <div class="row g-3">
            <!-- Tìm kiếm tên phòng trọ -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="title" class="form-label">Tên phòng trọ</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tên phòng trọ"
                        value="<?php echo htmlspecialchars($search_title); ?>">
                </div>
            </div>
            <!-- Giá thấp nhất -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="min_price" class="form-label">Giá thấp nhất</label>
                    <input type="number" name="min_price" id="min_price" class="form-control" placeholder="0"
                        value="<?php echo htmlspecialchars($min_price); ?>">
                </div>
            </div>
            <!-- Giá cao nhất -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="max_price" class="form-label">Giá cao nhất</label>
                    <input type="number" name="max_price" id="max_price" class="form-control"
                        placeholder="Không giới hạn" value="<?php echo htmlspecialchars($max_price); ?>">
                </div>
            </div>
            <!-- Diện tích thấp nhất -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="min_area" class="form-label">Diện tích thấp nhất (m²)</label>
                    <input type="number" name="min_area" id="min_area" class="form-control" placeholder="0"
                        value="<?php echo htmlspecialchars($min_area); ?>">
                </div>
            </div>
            <!-- Diện tích cao nhất -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="max_area" class="form-label">Diện tích cao nhất (m²)</label>
                    <input type="number" name="max_area" id="max_area" class="form-control" placeholder="Không giới hạn"
                        value="<?php echo htmlspecialchars($max_area); ?>">
                </div>
            </div>
        </div>

        <!-- Nút Tìm kiếm -->
        <div class="row mt-3">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Tìm kiếm</button>
            </div>
        </div>
    </form>

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
    <nav>
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                    <a class="page-link"
                        href="?title=<?php echo urlencode($search_title); ?>&min_price=<?php echo $min_price; ?>&max_price=<?php echo $max_price; ?>&min_area=<?php echo $min_area; ?>&max_area=<?php echo $max_area; ?>&page=<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<?php include 'footer.php'; ?>
</body>

</html>
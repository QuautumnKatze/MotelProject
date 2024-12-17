<?php include 'head.php' ?>
<?php
include '../config.php';

// Truy vấn top 5 phòng trọ có lượt xem nhiều nhất trong lịch sử
$sql_all_time = "SELECT * FROM motels ORDER BY count_view DESC LIMIT 5";
$result_all_time = $conn->query($sql_all_time);

// Truy vấn top 5 phòng trọ có lượt xem nhiều nhất trong 1 tháng vừa qua
$last_month = date('Y-m-d', strtotime('-1 month')); // Lấy ngày 1 tháng trước
$sql_last_month = "SELECT * FROM motels WHERE created_at >= '$last_month' ORDER BY count_view DESC LIMIT 5";
$result_last_month = $conn->query($sql_last_month);
?>
<!-- Content wrapper -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Thống kê phòng trọ theo lượt xem</h2>

    <!-- Top 5 phòng trọ có lượt xem nhiều nhất trong lịch sử -->
    <h4>Top 5 phòng trọ có lượt xem nhiều nhất trong lịch sử</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên phòng trọ</th>
                <th>Lượt xem</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_all_time->num_rows > 0) {
                while ($row = $result_all_time->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row['id'] . '</td>
                            <td>' . htmlspecialchars($row['title']) . '</td>
                            <td>' . $row['count_view'] . '</td>
                            <td>
                                <a class="btn btn-primary" href="../motel-detail.php?id=' . $row['id'] . '">Xem</a>
                            </td>
                        </tr>';
                }
            } else {
                echo '<tr><td colspan="3">Không có dữ liệu.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <!-- Top 5 phòng trọ có lượt xem nhiều nhất trong 1 tháng vừa qua -->
    <h4>Top 5 phòng trọ có lượt xem nhiều nhất được đăng trong 1 tháng vừa qua</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên phòng trọ</th>
                <th>Lượt xem</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_last_month->num_rows > 0) {
                while ($row = $result_last_month->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row['id'] . '</td>
                            <td>' . htmlspecialchars($row['title']) . '</td>
                            <td>' . $row['count_view'] . '</td>
                            <td>
                                <a class="btn btn-primary" href="../motel-detail.php?id=' . $row['id'] . '">Xem</a>
                            </td>
                        </tr>';
                }
            } else {
                echo '<tr><td colspan="3">Không có dữ liệu.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Content wrapper -->
<?php include 'foot.php' ?>
</body>

</html>
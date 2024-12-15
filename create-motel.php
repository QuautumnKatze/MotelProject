<?php include 'menu.php' ?>
<?php
include 'config.php';
$sql = "SELECT * from categories";
$cate = $conn->query($sql);
$sql = "SELECT * from districts";
$district = $conn->query($sql);
?>

<!-- Form sửa -->
<div class="container mt-3">
    <form method="POST" action="backend/create-motel.php">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Thông tin phòng trọ</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <div>
                                <img src="image/avatar-default.jpg" class="d-block rounded" height="350"
                                    id="uploadedImage" />
                            </div>
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Tải lên ảnh mới</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                        <div>
                            <input type="text" class="form-control mt-2" id="fileName" name="images" value=""
                                placeholder="No file selected" readonly />
                        </div>
                        <!-- <div class="mt-2 mb-3">
                            <label for="largeInput" class="form-label">ID</label>
                            <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="ID"
                                name="id" readonly />
                        </div> -->
                        <div class="mt-2 mb-3">
                            <label for="largeInput" class="form-label">Tên phòng trọ</label>
                            <input id="largeInput" class="form-control form-control-lg" type="text"
                                placeholder="Tên phòng trọ" name="title" />
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="largeInput" class="form-label">Giá phòng trọ</label>
                            <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="Giá"
                                name="price" />
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="largeInput" class="form-label">Diện tích</label>
                            <input id="largeInput" class="form-control form-control-lg" type="text"
                                placeholder="Diện tích phòng: m2" name="area" />
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="largeInput" class="form-label">SĐT chủ trọ</label>
                            <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="SDT"
                                name="phone" />
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="largeInput" class="form-label">Địa chỉ trọ</label>
                            <input id="largeInput" class="form-control form-control-lg" type="text"
                                placeholder="Địa chỉ" name="address" />
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="largeSelect" class="form-label">Danh mục</label>
                            <select id="largeSelect" name="category_id" class="form-select form-select-lg">
                                <?php
                                if ($cate->num_rows > 0) {
                                    while ($row = $cate->fetch_assoc()) {
                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                    }
                                } else {
                                    echo '<option value=""0">N/A</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="largeSelect" class="form-label">Khu vực</label>
                            <select id="largeSelect" name="district_id" class="form-select form-select-lg">
                                <?php
                                if ($district->num_rows > 0) {
                                    while ($row = $district->fetch_assoc()) {
                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                    }
                                } else {
                                    echo '<option value=""0">N/A</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label class="form-label">Mô tả phòng trọ</label>
                            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div>
                                <button type="submit" class="btn btn-primary m-3">Lưu</button>
                                <button type="button" class="btn btn-danger m-3"><a class="text-white"
                                        href="my-motel.php">Hủy</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<?php include 'footer.php' ?>
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        height: 200,
        // filebrowserUploadUrl: "upload.php", // Đường dẫn xử lý upload ảnh (nếu cần)
        filebrowserUploadMethod: "form"
    });

    $(document).ready(function () {
        $('#upload').on('change', function (event) {
            const input = event.target; // Lấy thẻ input
            const file = input.files[0]; // Lấy file đầu tiên được chọn

            if (file) {
                // Hiển thị tên file trong input
                $('#fileName').val("image/motel/" + file.name);

                // Hiển thị ảnh vừa tải lên
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#uploadedImage').attr('src', e.target.result); // Thay đổi src của thẻ img
                };
                reader.readAsDataURL(file); // Đọc file dưới dạng URL
            } else {
                // Reset nếu không chọn file
                $('#fileName').val("No file selected");
                // $('#uploadedAvatar').attr('src', "<php echo $user['avatar']?>"); // Trả về ảnh mặc định
            }
        });
    });
</script>
</body>

</html>
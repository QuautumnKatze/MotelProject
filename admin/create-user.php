<?php include 'head.php' ?>
<?php
include '../config.php';
?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="fw-bold py-3 mb-4">Thêm tải khoản</h4>
            </div>
        </div>
        <div class="container mt-3">
            <form method="POST" action="create-user-handler.php">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Thông tin tài khoản</h5>
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <div>
                                        <img src="../image/avatar-default.jpg" class="d-block rounded" height="350"
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
                                    <input type="text" class="form-control mt-2" id="fileName" name="avatar" value=""
                                        placeholder="No file selected" readonly />
                                </div>
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">Tên tải khoản</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        placeholder="Tên tài khoản" name="username" required />
                                </div>
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">Tên người dùng</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        placeholder="Tên người dùng" name="name" required />
                                </div>
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">Mật khẩu</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="password"
                                        placeholder="Mật khẩu" name="password" required />
                                </div>
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">Email</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="email"
                                        placeholder="Email" name="email" required />
                                </div>
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">SDT</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        placeholder="SDT" name="phone" required />
                                </div>
                                <div class="mt-2 mb-3">
                                    <label for="largeSelect" class="form-label">Phân loại</label>
                                    <select id="largeSelect" name="role" class="form-select form-select-lg">
                                        <option value="1">Người dùng</option>
                                        <option value="0">Quản trị viên</option>
                                    </select>
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


    </div>
</div>
<!-- Content wrapper -->
<?php include 'foot.php' ?>
<script>
    $(document).ready(function () {
        $('#upload').on('change', function (event) {
            const input = event.target; // Lấy thẻ input
            const file = input.files[0]; // Lấy file đầu tiên được chọn

            if (file) {
                // Hiển thị tên file trong input
                $('#fileName').val("image/" + file.name);

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
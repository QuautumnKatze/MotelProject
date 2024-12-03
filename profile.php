<?php include 'menu.php'; ?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                            Thông tin tài khoản</a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Thông tin tài khoản</h5>
                    <!-- Account -->
                    <form id="formAccountSettings" action="backend/change-profile.php" method="POST">
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="<?php echo $user['avatar'] ?>" alt="user-avatar" class="d-block rounded"
                                    height="100" width="100" id="uploadedAvatar" />
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
                                <input type="text" class="form-control mt-2" id="fileName" name="avatar"
                                    value="<?php echo $user['avatar'] ?>" placeholder="No file selected" readonly />
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">User ID</label>
                                    <input class="form-control" type="text" name="id" value="<?php echo $user['id'] ?>"
                                        readonly />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Tên</label>
                                    <input class="form-control" type="text" name="name" value="<?php echo $user['name'] ?>"
                                        autofocus />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">Tên tài khoản</label>
                                    <input class="form-control" type="text" name="username"
                                        value="<?php echo $user['username'] ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="<?php echo $user['email'] ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Số điện thoại</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="phoneNumber" name="phone" class="form-control"
                                            value="<?php echo $user['phone'] ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                    <!-- /Account -->
                </div>
                <div class="card">
                    <h5 class="card-header">Đổi mật khẩu</h5>
                    <div class="card-body">
                      <form id="formAccountDeactivation" action="backend/change-password.php" method="post">
                        <div class="form-check mb-3">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="phoneNumber">Nhập mật khẩu cũ</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="phoneNumber" name="passwordOld" class="form-control"/>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="phoneNumber">Nhập mật khẩu mới</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="phoneNumber" name="passwordNew" class="form-control"/>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="phoneNumber">Xác nhận lại mật khẩu mới</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="phoneNumber" name="passwordConfirm" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Đổi mật khẩu</button>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
<?php include 'footer.php'; ?>
<?php
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    echo "<script>
        $(document).ready(function() {";
    if ($status == 'success') {
        echo "toastr.success('Cập nhật thông tin thành công!');";
    } elseif ($status == 'error') {
        echo "toastr.error('Cập nhật thông tin thất bại!');";
    } elseif ($status == 'error-old') {
        echo "toastr.error('Mật khẩu cũ không đúng!');";
    } elseif ($status == 'error-confirm') {
        echo "toastr.error('Mật khẩu mới và xác nhận không khớp!');";
    } elseif ($status == 'success-pass') {
        echo "toastr.success('Đổi mật khẩu thành công!');";
    } elseif ($status == 'error-passs') {
        echo "toastr.error('Có lỗi xảy ra. Vui lòng thử lại sau!');";
    }
    echo "});
        </script>";
}
?>
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
                    $('#uploadedAvatar').attr('src', e.target.result); // Thay đổi src của thẻ img
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
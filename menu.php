<?php
include('config.php');
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    $sql = "SELECT * from users where username = '$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="assets/js/config.js"></script>
</head>

<body>
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
                <a class="dropdown-item" href="index.php">
                    <i class="bx bx-home me-2"></i>
                    <span class="align-middle">Trang chủ</span>
                </a>
            </div>
            <div class="navbar-nav align-items-center">
                <a class="dropdown-item" href="admin/index.php">
                    <i class="bx bx-diamond me-2"></i>
                    <span class="align-middle">Trang quản trị</span>
                </a>
            </div>

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <?php
                if (isset($_COOKIE['username'])) {
                    echo '<li class="nav-item lh-1 me-3">
                    <a class="dropdown-item" href="my-motel.php">
                        <i class="bx bx-bed me-2"></i>
                        <span class="align-middle">Quản lý phòng trọ</span>
                    </a>
                </li>';
                    echo '<li class="nav-item lh-1 me-3">
                    <a class="dropdown-item" href="create-motel.php">
                        <i class="bx bx-book me-2"></i>
                        <span class="align-middle">Đăng phòng trọ</span>
                    </a>
                </li>';
                }
                ?>
                <li class="nav-item lh-1 me-3">
                    <a class="dropdown-item" href="contact.php">
                        <i class="bx bxs-contact me-2"></i>
                        <span class="align-middle">Liên hệ</span>
                    </a>
                </li>

                <?php
                if (isset($_COOKIE['username'])) {
                    echo '                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="' . $user['avatar'] . '" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="' . $user['avatar'] . '" alt
                                                class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">' . $user['name'] . '</span>
                                        <small class="text-muted">Admin</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="profile.php?">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">Trang cá nhân</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="setting.php">
                                <i class="bx bx-cog me-2"></i>
                                <span class="align-middle">Settings</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="backend/logout.php">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Đăng xuất</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ User -->';
                } else {
                    echo '<li class="nav-item align-items-center flex-row ms-auto">
                    <a class="dropdown-item" href="login.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Đăng nhập</span>
                    </a>
                </li>';
                }
                ?>



            </ul>
        </div>
    </nav>
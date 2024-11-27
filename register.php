<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-dark">
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-white">

                    <div class="px-5 ms-xl-4 my-3">
                        <a class="text-decoration-none text-white me-2" href="index.php">
                            <img src="image/logo.png" height="30" loading="lazy" /> MotelNine
                        </a>
                    </div>

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form action="registerAuth.php" method="post" style="width: 23rem;">

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng Ký</h3>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" name="username" id="form2Example18"
                                    class="form-control form-control-lg" placeholder="Tên tài khoản" required />
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" name="email" id="form2Example18"
                                    class="form-control form-control-lg" placeholder="Email" required />
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" name="name" id="form2Example18" class="form-control form-control-lg"
                                    placeholder="Họ tên" required />
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" name="phone" id="form2Example18" class="form-control form-control-lg"
                                    placeholder="Số điện thoại" required />
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" name="password" id="form2Example28"
                                    class="form-control form-control-lg" placeholder="Mật khẩu" required />
                            </div>

                            <div class="pt-1 mb-4">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block"
                                    type="button">Đăng Ký</button>
                            </div>

                            <p>Đã có tài khoản? <a href="login.php" class="link-info">Đăng nhập</a></p>

                        </form>

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="image/register.jpg" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
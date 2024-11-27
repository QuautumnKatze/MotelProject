<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="index.php">
            <img src="image/logo.png" height="16" alt="MDB Logo" loading="lazy" style="margin-top: -1px;" /> MotelNine
        </a>

        <!-- Toggle button -->
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarButtonsExample"
            aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
            </ul>
            <!-- Left links -->

            <div class="d-flex align-items-center">
                <?php
                if (isset($_COOKIE['username'])) {
                    echo '<button type="button" class="btn btn-primary me-3">
                            <a class="text-white text-decoration-none" href="logout.php">Đăng xuất</a>
                        </button>';
                } else {
                    echo ' <button type="button" class="btn btn-primary me-3">
                    <a class="text-white text-decoration-none" href="login.php">Đăng nhập</a>
                </button>';
                }
                ?>
            </div>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
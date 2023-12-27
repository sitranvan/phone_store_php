<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="<?= pathAdmin('assets/img/logo.png') ?>" alt="">
            <span class="d-none d-lg-block ms-2">STVAdmin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img class="avatar border-0" style="border-radius: 50%; object-fit: cover; " width="100%" height="100%" src="<?= !isset($avatar) ? pathCommon('assets/img/avatar.jpg') : getImage($avatar) ?>" alt="">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= $fullname ?? '' ?></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= $fullname ?? '' ?></h6>
                        <span>Admin</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= route('thong-tin-ca-nhan') ?>">
                            <i class="ri-share-box-line"></i>
                            <span>Ghé thăm trang người dùng</span>
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= route('dang-xuat') ?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Đăng Xuất</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
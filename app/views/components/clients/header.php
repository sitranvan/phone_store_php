<nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary header">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav align-items-center flex-wrap me-lg-5 mb-2 mb-lg-0">
            <a class="navbar-brand fs-2 fw-bold text-primary fst-italic" href="<?= route('') ?>">
                STV
                <i class="ri-smartphone-line text-secondary"></i>
            </a>
        </ul>
        <ul class="d-lg-flex d-md-none align-items-center gap-4 list-unstyled m-0 p-0 nav-item">
            <li>
                <a class="text-decoration-none text-secondary" href="<?= route('') ?>">
                    <i class="ri-home-line"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a class="text-decoration-none text-secondary" href="">
                    <i class="ri-contacts-line"></i>
                    Liên hệ
                </a>
            </li>

        </ul>
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between" id="navbarSupportedContent">
            <form action="<?= route('') ?>" id="searchForm" class="d-flex flex-grow-1 ms-lg-5 position-relative mt-3 mb-0 mt-lg-0 " role="search" style="flex-basis: 50%;">
                <div class="position-absolute top-50 translate-middle-y text-secondary" style="padding: 0 20px;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <input style="padding-right: 100px;" name="search" class="form-control py-2 ps-5 w-100 text-secondary fs-6" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                <button class="btn border-start position-absolute end-0 h-100 text-primary" type="submit" onclick="updateSearchParams()">
                    Tìm kiếm
                </button>
            </form>
            <ul class="navbar-nav ms-lg-5 mb-2 mb-lg-0 gap-lg-3 ">
                <?php if (!empty(App\Classes\Login::loginUser())) : ?>
                    <li class="nav-item account">
                        <div class="dropdown d-flex align-items-center ">
                            <div class="dropdown-toggle fullname fw-500 d-flex align-items-center gap-1" data-bs-toggle="dropdown" aria-expanded="false">
                                <div style="width: 30px; height:30px; border-radius: 50%" class="">
                                    <img class="avatar border-0" style="border-radius: 50%; object-fit: cover; " width="100%" height="100%" src="<?= !isset($avatar) ? pathCommon('assets/img/avatar.jpg') : getImage($avatar) ?>" alt="">
                                </div>
                                <?= $fullname ?>
                            </div>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item text-secondary" href="<?= route('thong-tin-ca-nhan') ?>">
                                        <i class="ri-profile-line"></i>
                                        Thông tin cá nhân
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-secondary" href="<?= route('don-hang-cua-toi') ?>">
                                        <i class="ri-rocket-2-line"></i>
                                        Đơn hàng của tôi
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-secondary" href="<?= route('thay-doi-mat-khau') ?>">
                                        <i class="ri-exchange-line"></i>
                                        Đổi mật khẩu
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-secondary" href="<?= route('dang-xuat') ?>">
                                        <i class="ri-logout-box-r-line"></i>
                                        Đăng xuất
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <div class="accordion d-lg-none" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Tài khoản
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body ">
                                    <p>
                                        <a class="text-decoration-none text-secondary" href="<?= route('thong-tin-ca-nhan') ?>">Thông tin</a>
                                    </p>
                                    <p>
                                        <a class="text-decoration-none text-secondary" href="<?= route('don-hang-cua-toi') ?>">Đơn hàng của tôi</a>
                                    </p>
                                    <p>
                                        <a class="text-decoration-none text-secondary" href="<?= route('thay-doi-mat-khau') ?>">Đổi mật khẩu</a>
                                    </p>

                                    <p>
                                        <a class="text-decoration-none text-secondary" href="<?= route('dang-xuat') ?>">Đăng xuất</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 fs-4" href="<?= route('dang-nhap') ?>">
                            <img src="https://salt.tikicdn.com/ts/upload/07/d5/94/d7b6a3bd7d57d37ef6e437aa0de4821b.png" alt="" width="24" height="24">
                            <span class="fs-6 text-secondary">Tài khoản</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (!empty(App\Classes\Login::loginUser())) : ?>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link text-primary fs-4 d-flex align-items-center gap-1" href="<?= route('gio-hang') ?>">
                            <div class="position-relative">
                                <img src="https://salt.tikicdn.com/ts/upload/51/e2/92/8ca7e2cc5ede8c09e34d1beb50267f4f.png" alt="" width="24" height="24">
                            </div>
                            <span class="fs-6 text-secondary mt-1"> Giỏ hàng</span>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>
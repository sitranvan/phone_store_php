<nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary header">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav align-items-center flex-wrap me-lg-5 mb-2 mb-lg-0">
            <a class="navbar-brand" href="#">
                <img src="https://salt.tikicdn.com/ts/upload/e4/49/6c/270be9859abd5f5ec5071da65fab0a94.png" alt="" width="57" height="40" class="mb-lg-1">
            </a>
        </ul>
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between" id="navbarSupportedContent">
            <form id="searchForm" class="d-flex flex-grow-1 ms-lg-5 position-relative mt-3 mb-0 mt-lg-0 " role="search" style="flex-basis: 50%;">
                <div class="position-absolute top-50 translate-middle-y text-secondary" style="padding: 0 20px;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <input style="padding-right: 100px;" name="search" class="form-control py-2 ps-5 w-100 text-secondary fs-6" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                <button class="btn border-start position-absolute end-0 h-100 text-primary" type="button" onclick="updateSearchParams()">
                    Tìm kiếm
                </button>
            </form>
            <ul class="navbar-nav ms-lg-5 mb-2 mb-lg-0 gap-lg-3 ">
                <?php if (!empty(App\Classes\Login::loginUser())) : ?>
                    <li class="nav-item account">
                        <div class="dropdown d-flex align-items-center ">
                            <div class="dropdown-toggle fullname fw-500" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $fullname ?>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Thông tin</a></li>
                                <li><a class="dropdown-item" href="<?= route('thay-doi-mat-khau') ?>">Đổi mật khẩu</a></li>
                                <li><a class="dropdown-item" href="<?= route('dang-xuat') ?>">Đăng xuất</a></li>
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
                                        <a class="text-decoration-none text-secondary" href="">Thông tin</a>
                                    </p>
                                    <p>
                                        <a class="text-decoration-none text-secondary" href="">Đổi mật khẩu</a>
                                    </p>
                                    <p>
                                        <a class="text-decoration-none text-secondary" href="">Đăng xuất</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link  fs-4" href="<?= route('dang-nhap') ?>">
                            <img src="https://salt.tikicdn.com/ts/upload/07/d5/94/d7b6a3bd7d57d37ef6e437aa0de4821b.png" alt="" width="24" height="24">
                            <span class="fs-6 text-secondary">Tài khoản</span>
                        </a>
                    </li>


                <?php endif ?>

                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link text-primary fs-4 d-flex align-items-center gap-1" href="<?= route('gio-hang') ?>">
                        <div class="position-relative">
                            <img src="https://salt.tikicdn.com/ts/upload/51/e2/92/8ca7e2cc5ede8c09e34d1beb50267f4f.png" alt="" width="24" height="24">
                            <!-- <span class="quantity cart-quantity">0</span> -->
                        </div>
                        <span class="fs-6 text-secondary mt-1"> Giỏ hàng</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
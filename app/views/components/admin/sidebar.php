<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <!-- Class active collapsed -->
            <a class="nav-link <?= _PATH_INFO == 'admin' ? 'active' : 'collapsed' ?>" href="<?= route('admin') ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li class="nav-item ">
            <a class="nav-link collapsed" data-bs-target="#forms-nav-product" data-bs-toggle="collapse" href="#" aria-expanded="false">
                <i class="bi bi-journal-text"></i><span>Quản lý sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav-product" class="nav-content collapsed" data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a href="<?= route('admin/san-pham') ?>" class="<?= _PATH_INFO == 'admin/san-pham' ? 'active' : '' ?>">
                        <i class="bi bi-circle"></i><span>Danh sách</span>
                    </a>
                </li>
                <li>
                    <a href="<?= route('admin/them-san-pham') ?>" class="<?= _PATH_INFO == 'admin/them-san-pham' ? 'active' : '' ?>">
                        <i class="bi bi-circle"></i><span>Thêm sản phẩm</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item ">
            <a class="nav-link collapsed" data-bs-target="#forms-nav-category" data-bs-toggle="collapse" href="#" aria-expanded="false">
                <i class="bi bi-journal-text"></i><span>Quản lý danh mục</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav-category" class="nav-content collapsed" data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a href="<?= route('admin/danh-muc') ?>" class="<?= _PATH_INFO == 'admin/danh-muc' ? 'active' : '' ?>">
                        <i class="bi bi-circle"></i><span>Danh sách</span>
                    </a>
                </li>
                <li>
                    <a href="<?= route('admin/them-danh-muc') ?>" class="<?= _PATH_INFO == 'admin/them-danh-muc' ? 'active' : '' ?>">
                        <i class="bi bi-circle"></i><span>Thêm danh mục</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item ">
            <a class="nav-link collapsed" data-bs-target="#forms-nav-brand" data-bs-toggle="collapse" href="#" aria-expanded="false">
                <i class="bi bi-journal-text"></i><span>Quản lý thương hiệu</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav-brand" class="nav-content collapsed" data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a href="<?= route('admin/thuong-hieu') ?>" class="<?= _PATH_INFO == 'admin/thuong-hieu' ? 'active' : '' ?>">
                        <i class="bi bi-circle"></i><span>Danh sách</span>
                    </a>
                </li>
                <li>
                    <a href="<?= route('admin/them-thuong-hieu') ?>" class="<?= _PATH_INFO == 'admin/them-thuong-hieu' ? 'active' : '' ?>">
                        <i class="bi bi-circle"></i><span>Thêm thương hiệu</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class='bx bx-cog'></i>
                <span>Setting</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class='bx bx-log-out'></i>
                <span>Logout</span>
            </a>
        </li>


        </li>

    </ul>

</aside>
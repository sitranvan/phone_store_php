<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <!-- Class active collapsed -->
            <a class="nav-link <?= _PATH_INFO == 'admin' ? 'active' : 'collapsed' ?>" href="<?= route('admin') ?>">
                <i class="bi bi-grid"></i>
                <span>Tổng quan</span>
            </a>
        </li>

        <li class="nav-heading">QUẢN LÝ</li>

        <li class="nav-item ">
            <a class="nav-link <?= _PATH_INFO == 'admin/san-pham' ? 'active' : 'collapsed' ?>" href="<?= route('admin/san-pham') ?>">
                <i class="fa-brands fa-product-hunt"></i>
                <span>Sản phẩm</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= _PATH_INFO == 'admin/danh-muc' ? 'active' : 'collapsed' ?>" href="<?= route('admin/danh-muc') ?>">
                <i class="fa-solid fa-list"></i>
                <span>Loại điện thoại</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  <?= _PATH_INFO == 'admin/thuong-hieu' ? 'active' : 'collapsed' ?>" href="<?= route('admin/thuong-hieu') ?>">
                <i class="fa-brands fa-bandcamp"></i>
                <span>Thương hiệu</span>
            </a>
        </li>
    </ul>

</aside>
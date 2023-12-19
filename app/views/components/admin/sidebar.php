<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <!-- Class active collapsed -->
            <a class="nav-link <?= _PATH_INFO == 'admin' ? 'active' : 'collapsed' ?>" href="<?= route('admin') ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">QUẢN LÝ</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= route('admin/san-pham') ?>">
                <i class="bi bi-person"></i>
                <span>Sản phẩm</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= route('admin/danh-muc') ?>">
                <i class="bi bi-person"></i>
                <span>Loại sản phẩm</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= route('admin/thuong-hieu') ?>">
                <i class="bi bi-person"></i>
                <span>Thương hiệu</span>
            </a>
        </li>
    </ul>

</aside>
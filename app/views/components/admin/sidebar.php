<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


        <li class="nav-heading">QUẢN LÝ</li>


        <li class="nav-item ">
            <a class="nav-link <?= _PATH_INFO == 'admin/nguoi-dung' ? 'active' : 'collapsed' ?>" href="<?= route('admin/nguoi-dung') ?>">
                <i class="ri-user-follow-line "></i>
                <span class="mt-1">Người dùng</span>
            </a>
        </li>

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
<main>
    <div class="d-flex align-items-center justify-content-between">
        <h2>Danh sách thương hiệu</h2>
        <a class="btn btn-success" href="<?= route('admin/them-thuong-hieu') ?>">
            Tạo thương hiệu
            <i class='bx bx-plus fs-6'></i>
        </a>
    </div>

    <form action="" method="GET">
        <div class="mt-3 row">
            <div class="col-lg-7 col-md-12 d-flex align-items-center gap-2">
                <input value="<?= $allQuery['search'] ?? '' ?>" name="search" placeholder="Nhập thương hiệu cần tìm..." type="text" class="form-control">
                <button class="btn btn-primary flex-shrink-0 px-4">Tìm kiếm</button>
            </div>
        </div>
    </form>

    <table class="table align-middle mt-3">
        <thead style="height: 60px;" class="align-middle">
            <tr class="">
                <th width="15%">STT</th>
                <th width="40%">Tên thương hiệu</th>
                <th width="20%">Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($allBrand)) :

                foreach ($allBrand as $key => $brand) :
            ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $brand['name'] ?></td>
                        <td><?= $brand['created_at'] ?></td>
                        <td>
                            <a onclick="confirmDelete(event, <?= $brand['id'] ?>)" class="btn btn-sm btn-danger confirm-delete-<?= $brand['id'] ?>" href="<?= route('admin/xoa-thuong-hieu/' . $brand['id']) ?>">
                                <i class='bx bxs-trash-alt'></i>
                                Xóa
                            </a>

                            <a class="btn btn-sm btn-success" href="<?= route('admin/sua-thuong-hieu/' . $brand['id']) ?>">
                                <i class='bx bx-edit'></i>
                                Sửa
                            </a>
                        </td>
                    </tr>
                <?php endforeach;
            else : ?>
                <tr class="text-center">
                    <td class="py-4 " colspan="7">Chưa có sản phẩm nào</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($page > 1) : ?>
                    <li class="page-item">
                        <a class="page-link link-item" href="<?= route('admin/danh-muc?' . $queryString . '&page=' . ($page - 1)) ?>">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    </li>
                <?php endif ?>
                <?php for ($index = $startPage; $index <= $endPage; $index++) : ?>
                    <li class="page-item" aria-current="page">
                        <a class="page-link link-item  <?= $index == $page ? 'active' : false ?>" href="<?= route('admin/danh-muc?' . $queryString . '&page=' . $index) ?>"><?= $index ?></a>
                    </li>
                <?php endfor ?>
                <?php if ($page < $totalPage) : ?>
                    <li class="page-item">
                        <a class="page-link link-item" href="<?= route('admin/danh-muc?' . $queryString . '&page=' . ($page + 1)) ?>">
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</main>
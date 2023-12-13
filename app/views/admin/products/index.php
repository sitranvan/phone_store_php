<main>
    <div class="d-flex align-items-center justify-content-between">
        <h2>Danh sách sản phẩm</h2>
        <a class="btn btn-success" href="<?= route('admin/them-san-pham') ?>">
            Tạo sản phẩm
            <i class='bx bx-plus fs-6'></i>
        </a>
    </div>

    <form method="GET" action="">
        <div class="row d-flex align-items-center mt-5">
            <div class="col-2">
                <label class="form-label" for="">Tìm kiếm sản phẩm</label>
                <input name="search" class="form-control" type="text" placeholder="Tìm kiếm...">
            </div>
            <div class="col-2">
                <label class="form-label" for="">Theo trạng thái</label>
                <select class="form-select" name="active" id="">
                    <option value="all">Tất cả</option>
                    <option <?= isset($allQuery['active']) && $allQuery['active'] == 0 ? 'selected' : false ?> value="0">Chưa kích hoạt</option>
                    <option <?= isset($allQuery['active']) && $allQuery['active'] == 1 ? 'selected' : false ?> value="1">Đã kích hoạt</option>
                </select>
            </div>
            <div class="col-2">
                <label class="form-label" for="">Theo danh mục</label>
                <select class="form-select" name="category" id="">
                    <option value="all">Tất cả</option>
                    <?php foreach ($allCategory as $category) : ?>
                        <option <?= isset($allQuery['category']) && $allQuery['category'] == $category['id'] ? 'selected' : false ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-2">
                <label class="form-label" for="">Theo thương hiệu</label>
                <select class="form-select" name="brand" id="">
                    <option value="">Tất cả</option>
                    <?php foreach ($allBrand as $brand) : ?>
                        <option <?= isset($allQuery['brand']) && $allQuery['brand'] == $brand['id'] ? 'selected' : false ?> value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                    <?php endforeach ?>
                </select>

            </div>
            <div class="col-2">
                <label class="form-label" for="">Sắp xếp theo</label>
                <select class="form-select" name="sort" id="">
                    <option <?= isset($allQuery['sort']) && $allQuery['sort'] == 'desc' ? 'selected' : false ?> value="desc">Mới nhất</option>
                    <option <?= isset($allQuery['sort']) && $allQuery['sort'] == 'asc' ? 'selected' : false ?> value="asc">Cũ nhất</option>
                </select>
            </div>
            <div class="col-2 d-flex flex-column">
                <label class="form-label" for="">&nbsp</label>
                <button class="btn btn-primary">Lọc sản phẩm</button>
            </div>
        </div>
    </form>

    <table class="table align-middle mt-3">
        <thead style="height: 60px;" class="align-middle">
            <tr class="">
                <th width="5%">STT</th>
                <th width="28%">Tên sản phẩm</th>
                <th width="10%">Hình ảnh</th>
                <th width="13%">Giá gốc</th>
                <th width="13%">Giá khuyến mãi</th>
                <th width="15%">Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($allProduct)) :

                foreach ($allProduct as $key => $product) :
            ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $product['name'] ?></td>
                        <td>
                            <img width="60" height="60" src="<?= getImage($product['photo']) ?>" alt="<?= $product['name'] ?>">
                        </td>
                        <td><?= number_format($product['price']) . 'đ' ?></td>
                        <td><?= $product['price_promotion'] ? number_format($product['price_promotion']) . 'đ' : 'Chưa khuyến mãi' ?></td>
                        <td>
                            <?php if ($product['active'] == 0) : ?>
                                <button class="btn btn-sm btn-warning">Chưa kích hoạt</button>
                            <?php else : ?>
                                <button class="btn btn-sm btn-success">Đã kích hoạt</button>
                            <?php endif ?>
                        </td>
                        <td>
                            <a onclick="confirmDelete(event, <?= $product['id'] ?>)" class="btn btn-sm btn-danger confirm-delete-<?= $product['id'] ?>" href="<?= route('admin/xoa-san-pham/' . $product['id']) ?>">
                                <i class='bx bxs-trash-alt'></i>
                                Xóa
                            </a>

                            <a class="btn btn-sm btn-success" href="<?= route('admin/sua-san-pham/' . $product['id']) ?>">
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
                        <a class="page-link link-item" href="<?= route('admin/san-pham?' . $queryString . '&page=' . ($page - 1)) ?>">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    </li>
                <?php endif ?>
                <?php for ($index = $startPage; $index <= $endPage; $index++) : ?>
                    <li class="page-item" aria-current="page">
                        <a class="page-link link-item  <?= $index == $page ? 'active' : false ?>" href="<?= route('admin/san-pham?' . $queryString . '&page=' . $index) ?>"><?= $index ?></a>
                    </li>
                <?php endfor ?>
                <?php if ($page < $totalPage) : ?>
                    <li class="page-item">
                        <a class="page-link link-item" href="<?= route('admin/san-pham?' . $queryString . '&page=' . ($page + 1)) ?>">
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</main>
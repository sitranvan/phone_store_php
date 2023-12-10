<main>
    <h2>Danh sách sản phẩm</h2>
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
                            <a onclick="confirmDelete(event)" class="btn btn-sm btn-danger confirm-delete" href="<?= route('admin/xoa-san-pham/' . $product['id']) ?>">
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

            <?php endif ?>
        </tbody>
    </table>
</main>
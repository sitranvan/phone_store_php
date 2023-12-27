<main>
    <div class="d-flex align-items-center justify-content-between">
        <h2>Danh sách đơn hàng</h2>

    </div>

    <form action="" method="GET">
        <div class="mt-3 row">
            <div class="col-lg-7 col-md-12 d-flex align-items-center gap-2">
                <input value="<?= $allQuery['search'] ?? '' ?>" name="search" placeholder="Nhập mã đơn hàng cần tìm..." type="text" class="form-control">
                <button class="btn btn-primary flex-shrink-0 px-4">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <table class="table mt-4">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th width="10%">Mã đơn hàng</th>
                <th>Người đặt hàng</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Tổng đơn</th>
                <th width="20%">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orders)) :
                foreach ($orders as $key => $order) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $order['order_code'] ?></td>
                        <td><?= $order['fullname'] ?></td>
                        <td><?= App\Classes\Helpers::formatDate($order['order_date']) ?></td>
                        <td>
                            <?= tagStatusOrder($order['order_status']) ?>
                        </td>
                        <td><?= number_format($order['total']) . 'đ' ?></td>
                        <td class="d-flex align-items-center gap-3">
                            <a class="btn btn-outline-danger btn-sm" href="<?= route('admin/chi-tiet-don-hang/' . $order['order_id']) ?>">Chi tiết</a>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-success dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Cập nhật đơn hàng
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?= route('admin/xac-nhan-don-hang/' . $order['order_id']) ?>">Xác nhận đơn hàng</a></li>
                                    <li><a class="dropdown-item" href="<?= route('admin/dang-giao-hang/' . $order['order_id']) ?>">Đang giao hàng</a></li>
                                    <li><a class="dropdown-item" href="<?= route('admin/da-giao-hang/' . $order['order_id']) ?>">Đã giao hàng</a></li>
                                    <li><a class="dropdown-item" href="<?= route('admin/huy-don-hang/' . $order['order_id']) ?>">Hủy đơn hàng</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;
            else : ?>
                <tr class="text-center">
                    <td class="py-4" colspan="7">Chưa có đơn hàng nào</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>

</main>
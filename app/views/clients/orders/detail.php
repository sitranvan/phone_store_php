<section>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= route('') ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
        </ol>
    </nav>
    <div class="mt-5">
        <h4 class="text-secondary text-center mb-5 text-uppercase">
            Chi tiết đơn hàng
            <i class="ri-space-ship-line"></i>
        </h4>

        <div class="row">
            <div class="col-lg-3 col-md-12">
                <ul class="d-flex flex-column gap-3 text-secondary list-unstyled">
                    <li>
                        <i class="ri-barcode-line"></i>
                        Mã đơn hàng: <?= $order['order_code'] ?>
                    </li>
                    <li>
                        <i class="ri-calendar-check-line"></i>
                        Ngày đặt hàng: <?= App\Classes\Helpers::formatDate($order['order_date']) ?>
                    </li>
                    <li>
                        <i class="ri-message-2-line"></i>
                        Lời nhắn: <?= !empty($order['note']) ? $order['note'] : 'Không có lời nhắn' ?>
                    </li>
                    <?php if (!empty($order['cancel_date'])) : ?>
                        <li>
                            <i class="ri-calendar-close-line"></i>
                            Ngày hủy: <?= App\Classes\Helpers::formatDate($order['cancel_date']) ?>
                        </li>
                        <li>
                            <i class="ri-chat-delete-line"></i>
                            Lý do hủy: <?= !empty($order['reason']) ? $order['reason'] : 'Không có lý do' ?>
                        </li>
                    <?php endif ?>
                    <li>
                        <button class="btn btn-outline-danger">Tổng đơn: <?= number_format($order['total']) . 'đ' ?></button>
                    </li>

                </ul>
            </div>
            <div class="col-lg-9 col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">STT</th>
                            <th with="35%">Sản phẩm đã đặt</th>
                            <th width="10%">Số lượng</th>
                            <th>Giá</th>
                            <th width="15%">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allProductOrder as $key => $productOrder) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $productOrder['product_name'] ?></td>
                                <td><?= $productOrder['quantity'] ?></td>
                                <td><?= number_format($productOrder['price']) ?></td>
                                <td>
                                    <a href="<?= route('chi-tiet/' . $productOrder['product_id']) ?>" class="btn btn-sm btn-primary">Chi tiết sản phẩm</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</section>
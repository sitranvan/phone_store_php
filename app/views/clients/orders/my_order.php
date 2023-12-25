<section>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= route('') ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đơn hàng của tôi</li>
        </ol>
    </nav>
    <div class="mt-5">
        <h4 class="text-secondary text-center mb-5 text-uppercase">
            Đơn hàng của tôi
            <i class="ri-space-ship-line"></i>
        </h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="10%">STT</th>
                    <th width="20%">Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th width="20%">Trạng thái</th>
                    <th>Tổng đơn</th>
                    <th width="15%">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($orders)) :
                    foreach ($orders as $key => $order) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td>
                                <button class="btn btn-sm btn-outline-success"><?= $order['order_code'] ?></button>
                            </td>
                            <td><?= App\Classes\Helpers::formatDate($order['order_date']) ?></td>
                            <td><?= tagStatusOrder($order['status']) ?></td>
                            <td><?= number_format($order['total']) . 'đ' ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?= route('chi-tiet-don-hang/' . $order['id']) ?>">Chi tiết</a>

                                <?php if ($order['status'] != 4) : ?>
                                    <button data-bs-toggle="modal" data-bs-target="#exampleModal<?= $key ?>" class="btn btn-sm btn-danger">Hủy đơn</button>
                                <?php endif ?>
                                <!-- Modal -->
                                <form method="POST" action="huy-don-hang">
                                    <div class="modal fade" id="exampleModal<?= $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $key ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận hủy đơn hàng</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="form-label" for="">Lý do hủy đơn hàng</label>
                                                        <textarea class="form-control" name="reason" id="" cols="30" rows="4"></textarea>
                                                        <input name="orderId" hidden value="<?= $order['id'] ?>" type="text">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr class="text-center">
                        <td colspan="6" class="py-4">Chưa có đơn hàng nào</td>
                    </tr>
                <?php endif ?>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
</section>
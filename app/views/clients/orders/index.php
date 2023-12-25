<main>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= route('') ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thông Tin Đặt Hàng</li>
        </ol>
    </nav>
    <div class="w-100 d-flex justify-content-center">
        <div id="order" class="w-50">
            <h3 class="my-5 text-center text-secondary">Thông Tin Đặt Hàng
                <i class="fa-regular fa-pen-to-square"></i>
            </h3>

            <form method="POST" action="<?= route('submit-create-order') ?>">
                <div class="">
                    <div class="form-group">
                        <label class="form-label" for="">Họ tên</label>
                        <input readonly name="fullname" value="<?= $profile['fullname'] ?>" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Email</label>
                        <input readonly name="fullname" value="<?= $profile['email'] ?>" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Số điện thoại</label>
                        <input readonly name="phone" value="<?= $profile['phone'] ?>" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="">Địa chỉ</label>
                        <textarea readonly class="form-control" name="note" id="" cols="20" rows="3"><?= $address ?></textarea>
                    </div>
                    <div class="my-2 text-end"><a class="btn btn-sm btn-outline-danger" href="<?= route('thong-tin-ca-nhan') ?>">Thay đổi thông tin</a></div>
                    <div class="form-group">
                        <label class="form-label" for="">Lời nhắn cho shop</label>
                        <textarea class="form-control" name="note" id="" cols="20" rows="3"></textarea>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary mt-5 px-4 py-2">Xác nhận thông tin</button>
                </div>
            </form>
        </div>
    </div>
</main>
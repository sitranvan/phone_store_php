<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Xác Thực Tài Khoản</h5>
                                <p class="text-center small">Vui lòng kiểm tra email để lấy mã OTP, nếu chưa nhận được hoặc mã đã hết hạn vui lòng nhấn vào nút Gửi Lại Mã!</p>
                                <?= alert($msg, $msg_type) ?>
                            </div>

                            <form method="POST" action="<?= route('submit-verify') ?>">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <input name="otp" type="text" class="form-control border-dark-subtle" placeholder="Nhập mã OTP" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        <button class="btn btn-secondary" type="submit">Gửi Lại Mã</button>
                                    </div>
                                </div>
                                <div class="col-12 pt-3 d-flex align-items-center justify-content-between">
                                    <a class="text-decoration-none" href="">
                                        <i class="ri-home-smile-line"></i>
                                        Trang Chủ
                                    </a>
                                    <input name="id" value="<?= $userId ?>" type="hidden">
                                    <button class="btn btn-primary w-50">Xác Nhận</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Đặt Lại Mật Khẩu</h5>
                                <p class="text-center small">Vui lòng nhập mật khẩu mới để hoàn tất quá trình khôi phục mật khẩu.</p>
                                <?= alert($msg, $msg_type) ?>
                            </div>

                            <form action="<?= route('submit-reset-password') ?>" method="POST" class="row g-3 needs-validation">

                                <div class="col-12">
                                    <label for="password" class="form-label">Mật Khẩu Mới</label>
                                    <input type="password" name="password" class="form-control <?= isInvalid($errors, 'password') ?>" id="password">
                                    <div class="invalid-feedback"><?= getMessageError($errors, 'password') ?></div>
                                </div>

                                <div class="col-12">
                                    <label for="confirm_password" class="form-label">Xác Nhận Mật Khẩu Mới</label>
                                    <input type="password" name="confirm_password" class="form-control <?= isInvalid($errors, 'confirm_password') ?>" id="confirm_password">
                                    <div class="invalid-feedback"><?= getMessageError($errors, 'confirm_password') ?></div>
                                </div>


                                <div class="col-12 disable">
                                    <input value="<?= $forgotToken ?? '' ?>" type="hidden" name="token">
                                    <button class="btn btn-primary w-100" type="submit">Xác nhận</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
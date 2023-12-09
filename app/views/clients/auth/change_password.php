<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Thay Đổi Mật Khẩu</h5>
                                <p class="text-center small">Vui lòng nhập khẩu cũ và mật khẩu mới</p>
                                <?= alert($msg, $msg_type) ?>
                            </div>

                            <form method="POST" action="<?= route('submit-change-password') ?>" class="row g-3 needs-validation form-submit">



                                <div class="col-12">
                                    <label for="old_password" class="form-label">Mật Khẩu Cũ</label>
                                    <input type="password" name="old_password" class="form-control <?= isInvalid($errors, 'old_password') ?>" id="old_password">
                                    <div class="invalid-feedback"><?= getMessageError($errors, 'old_password') ?></div>
                                </div>
                                <div class="col-12">
                                    <label for="new_password" class="form-label">Mật Khẩu Mới</label>
                                    <input type="password" name="new_password" class="form-control <?= isInvalid($errors, 'new_password') ?>" id="new_password">
                                    <div class="invalid-feedback"><?= getMessageError($errors, 'new_password') ?></div>
                                </div>
                                <div class="col-12">
                                    <label for="confirm_new_password" class="form-label">Xác Nhận Mật Khẩu Mới</label>
                                    <input type="password" name="confirm_new_password" class="form-control <?= isInvalid($errors, 'confirm_new_password') ?>" id="confirm_new_password">
                                    <div class="invalid-feedback"><?= getMessageError($errors, 'confirm_new_password') ?></div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 btn-submit" type="submit">Xác nhận</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Quay về <a href="<?= route('') ?>">trang chủ</a></p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
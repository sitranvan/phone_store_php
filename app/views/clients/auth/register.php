<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Đăng Ký Tài Khoản</h5>
                                <p class="text-center small">Nhập thông tin cá nhân của bạn để đăng ký tài khoản</p>
                                <?= alert($msg, $msg_type) ?>
                            </div>

                            <form action="<?= route('submit-register') ?>" method="POST" class="row g-3 needs-validation">
                                <div class="col-12">
                                    <label for="fullname" class="form-label">Họ Và Tên</label>
                                    <input value="<?= old($old, 'fullname') ?>" type="text" name="fullname" class="form-control <?= isInvalid($errors, 'fullname') ?>" id="fullname">
                                    <div class="invalid-feedback"><?= getMessageError($errors, 'fullname') ?></div>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input value="<?= old($old, 'email') ?>" type="text" name="email" class="form-control <?= isInvalid($errors, 'email') ?>" id="email">
                                        <div class="invalid-feedback"><?= getMessageError($errors, 'email') ?></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Mật Khẩu</label>
                                    <input type="password" name="password" class="form-control <?= isInvalid($errors, 'password') ?>" id="password">
                                    <div class="invalid-feedback"><?= getMessageError($errors, 'password') ?></div>
                                </div>

                                <div class="col-12">
                                    <label for="confirm_password" class="form-label">Xác Nhận Mật Khẩu</label>
                                    <input type="password" name="confirm_password" class="form-control <?= isInvalid($errors, 'confirm_password') ?>" id="confirm_password">
                                    <div class="invalid-feedback"><?= getMessageError($errors, 'confirm_password') ?></div>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input check-terms" name="terms" type="checkbox" value="" id="acceptTerms">
                                        <label class="form-check-label" for="acceptTerms">Tôi đồng ý với các <a href="#">điều khoản và điều kiện</a></label>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                    </div>
                                </div>
                                <div class="col-12 disable">
                                    <button class="btn btn-primary w-100 btn-register" disabled type="submit">Đăng Ký Tài Khoản</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Bạn đã có tài khoản? <a href="<?= route('dang-nhap') ?>">Đăng nhập</a></p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
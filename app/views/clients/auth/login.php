<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Đăng Nhập Tài Khoản</h5>
                                <p class="text-center small">Nhập email và mật khẩu để đăng nhập</p>
                                <?= alert($msg, $msg_type) ?>
                            </div>

                            <form method="POST" action="<?= route('submit-login') ?>" class="row g-3 needs-validation form-submit">

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
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Ghi nhớ đăng nhập</label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a href="<?= route('quen-mat-khau') ?>" class="text-decoration-none">
                                                <i class="fa-solid fa-key"></i>
                                                Quên mật khẩu?
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 btn-submit" type="submit">Đăng nhập</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Bạn chưa có tài khoản? <a href="<?= route('dang-ky') ?>">Đăng ký tài khoản</a></p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
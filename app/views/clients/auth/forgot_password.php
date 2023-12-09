<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Quên Mật Khẩu</h5>
                                <p class="text-center small">Vui lòng cung cấp email của bạn để chúng tôi tiến hành hổ trợ bạn đặt lại mật khẩu.</p>
                            </div>

                            <form method="POST" action="<?= route('submit-forgot-password') ?>" class="row g-3 needs-validation form-submit">

                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input value="<?= old($old, 'email') ?>" type="text" name="email" class="form-control <?= isInvalid($errors, 'email') ?>" id="email">
                                        <div class="invalid-feedback"><?= getMessageError($errors, 'email') ?></div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 btn-submit" type="submit">Gửi yêu cầu</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Hoặc <a href="<?= route('dang-nhap') ?>">Đăng nhập ngay</a></p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
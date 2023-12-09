<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Gửi Lại Yêu Cầu</h5>
                                <p class="text-center small">Nếu bạn chưa nhận được email hổ trợ đặt lại mật khẩu bạn có thể gửi lại yêu cầu đến email
                                    <strong class="text-success"><?= $email ?? '' ?></strong>
                                </p>
                                <?= alert($msg, $msg_type) ?>
                            </div>

                            <form method="POST" action="<?= route('submit-resend-forgot-password') ?>" class="row g-3 needs-validation form-submit">

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 btn-submit" type="submit">Gửi lại yêu cầu</button>
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
<main>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= route('') ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
        </ol>
    </nav>
    <div class="">
        <h3 class="my-5 text-center text-secondary">Thông Tin Cá Nhân
            <i class="fa-regular fa-pen-to-square"></i>
        </h3>
        <?= alert($msg, $msg_type) ?>
        <form method="POST" action="<?= route('submit-update-profile') ?>" enctype="multipart/form-data">
            <div class="grid row">
                <div class="grid col-md-6 col-sm-12 ">
                    <div class="form-group">
                        <label class="form-label" for="">Họ tên</label>
                        <input name="fullname" value="<?= $profile['fullname'] ?>" class="form-control  <?= isInvalid($errors, 'fullname') ?>" type="text">

                        <div class="invalid-feedback"><?= getMessageError($errors, 'fullname') ?></div>

                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Email</label>
                        <input value="<?= $profile['email'] ?>" readonly disabled class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Tỉnh thành phố</label>
                        <input name="city" value="<?= $profile['city'] ?>" class="form-control  <?= isInvalid($errors, 'city') ?>" type="text">

                        <div class="invalid-feedback"><?= getMessageError($errors, 'city') ?></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Quận huyện</label>
                        <input name="district" value="<?= $profile['district'] ?>" class="form-control  <?= isInvalid($errors, 'district') ?>" type="text">

                        <div class="invalid-feedback"><?= getMessageError($errors, 'district') ?></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Phường xã</label>
                        <input name="village" value="<?= $profile['village'] ?>" class="form-control  <?= isInvalid($errors, 'village') ?>" type="text">
                        <div class="invalid-feedback"><?= getMessageError($errors, 'village') ?></div>

                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Số điện thoại</label>
                        <input name="phone" value="<?= $profile['phone'] ?>" class="form-control  <?= isInvalid($errors, 'phone') ?>" type="text">

                        <div class="invalid-feedback"><?= getMessageError($errors, 'phone') ?></div>
                    </div>
                </div>
                <div class="grid col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label" for="">Mô tả địa chỉ</label>
                        <textarea class="form-control  <?= isInvalid($errors, 'description') ?>" name="description" id="" cols="20" rows="4"><?= $profile['description'] ?></textarea>
                        <div class="invalid-feedback"><?= getMessageError($errors, 'description') ?></div>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-center flex-column">

                        <div style="width: 150px; height: 150px; border-radius: 50%" class=" border-5 bg-black text-center mt-5 border-0">
                            <img class="avatar border-0" style="border-radius: 50%; object-fit: cover; " width="100%" height="100%" src="<?= !isset($profile['avatar']) ? pathCommon('assets/img/avatar.jpg') : getImage($profile['avatar']) ?>" alt="">
                        </div>
                        <input hidden name="avatar" id="upload-avatar" type="file">
                        <label for="upload-avatar" class="btn btn-outline-success mt-4 px-4 py-2">Chọn ảnh</label>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary mt-5 px-4 py-2">Lưu thông tin</button>
            </div>
        </form>

    </div>
</main>
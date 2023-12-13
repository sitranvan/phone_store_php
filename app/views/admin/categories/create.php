<h2>Thêm danh mục</h2>
<?= alert($msg, $msg_type) ?>
<form method="POST" action="<?= route('admin/submit-add-category') ?>">
    <div class="row">
        <div class="col-lg-6 col-md-12 d-flex flex-column gap-3">
            <div class="form-group">
                <label class="form-label" for="">Tên danh mục</label>
                <input value="<?= old($old, 'name')  ?>" name="name" type="text" class="form-control <?= isInvalid($errors, 'name') ?>">
                <div class="invalid-feedback"><?= getMessageError($errors, 'name') ?></div>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary px-4">Tạo danh mục</button>
        </div>
</form>

<?php

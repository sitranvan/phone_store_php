<h2>Thêm sản phẩm</h2>
<?= alert($msg, $msg_type) ?>
<form method="POST" action="<?= route('admin/submit-add-product') ?>" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6 col-md-12 d-flex flex-column gap-3">
            <div class="form-group">
                <label class="form-label" for="">Tên sản phẩm</label>
                <input value="<?= old($old, 'name') ?>" name="name" type="text" class="form-control <?= isInvalid($errors, 'name') ?>">
                <div class="invalid-feedback"><?= getMessageError($errors, 'name') ?></div>
            </div>
            <div class="form-group">
                <label class="form-label" for="">Giá gốc</label>
                <input value="<?= old($old, 'price') ?>" name="price" type="text" class="form-control <?= isInvalid($errors, 'price') ?>">
                <div class="invalid-feedback"><?= getMessageError($errors, 'price') ?></div>

            </div>
            <div class="form-group">
                <label class="form-label" for="">Giá khuyến mãi</label>
                <input name="price_promotion" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Hình ảnh</label>
                <div class="custom-file-input">
                    <input name="photo" type="file" id="fileInput" class="form-control input-file <?= isInvalid($errors, 'price') ?>  accept=" image/*">
                    <label for="fileInput" id="fileInputLabel">
                        <span id="fileSelectedText">Choose a file</span>
                        <img id="selectedImage" src="#" alt="Selected Image">
                    </label>
                    <div class="invalid-feedback"><?= getMessageError($errors, 'photo') ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 d-flex flex-column gap-3">
            <div class="form-group">
                <label class="form-label" for="categories">Danh mục</label>
                <select class="form-select" name="category_id" id="">

                    <?php foreach ($allCategory as $key => $category) : ?>
                        <option <?= (isset($old['category_id']) && $old['category_id']) == $category['id'] ? 'selected' : '' ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="brands">Thương hiệu</label>
                <select class="form-select" name="brand_id" id="">
                    <?php foreach ($allBrand as $key => $brand) : ?>
                        <option <?= (isset($old['brand_id']) && $old['brand_id']) == $brand['id'] ? 'selected' : '' ?> value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="Danh mục">Trạng thái</label>
                <select class="form-select" name="active" id="">
                    <option <?= (isset($old['active']) && $old['active']) == 0 ? 'selected' : '' ?> value="0">Chưa kích hoạt</option>
                    <option <?= (isset($old['active']) && $old['active']) == 1 ? 'selected' : '' ?> value="1">Kích hoạt</option>
                </select>
            </div>
        </div>
    </div>
    <div class="from-group mt-3">
        <label class="form-label" for="">Mô tả sản phẩm</label>
        <textarea name="description" id="editor" rows="10" cols="80">
                Mô tả...
        </textarea>
        <script>
            CKEDITOR.replace("description", {
                // C:\xampp\htdocs\phone_store_php_Si\public\admin\assets\vendor\ckfinder
                filebrowserBrowseUrl: "/phone_store_php_Si/public/admin/assets/vendor/ckfinder/ckfinder.html",
                filebrowserUploadUrl: "ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
            });
        </script>
    </div>
    <div class="mt-4">
        <button class="btn btn-primary px-4">Thêm sản phẩm</button>

    </div>
</form>

<?php

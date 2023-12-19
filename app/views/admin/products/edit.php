<h2>Sửa sản phẩm</h2>
<?= alert($msg, $msg_type) ?>
<form method="POST" action="<?= route('admin/submit-edit-product') ?>" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6 col-md-12 d-flex flex-column gap-3">
            <div class="form-group">
                <label class="form-label" for="">Tên sản phẩm</label>
                <input value="<?= $product['product_name'] ?? old($old, 'name') ?>" name="name" type="text" class="form-control <?= isInvalid($errors, 'name') ?>">
                <div class="invalid-feedback"><?= getMessageError($errors, 'name') ?></div>
            </div>
            <div class="form-group">
                <label class="form-label" for="">Giá gốc</label>
                <input value="<?= $product['price'] ?? old($old, 'price')  ?>" name="price" type="text" class="form-control <?= isInvalid($errors, 'price') ?>">
                <div class="invalid-feedback"><?= getMessageError($errors, 'price') ?></div>

            </div>
            <div class="form-group">
                <label class="form-label" for="">Giá khuyến mãi</label>
                <input value="<?= $product['price_promotion'] ?? old($old, 'price_promotion') ?>" name="price_promotion" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Hình ảnh</label>
                <div class="custom-file-input">
                    <input name="photo" type="file" id="fileInput" class="input-file form-control <?= isInvalid($errors, 'photo') ?>" accept="image/*">
                    <label for="fileInput" id="fileInputLabel">
                        <span id="fileSelectedText">Choose a file</span>
                        <img width="150" id="selectedImage" src="" alt="Selected Image">
                        <?php if (!empty($product['photo'])) : ?>
                            <img id="review-edit" width="150" src="<?= getImage($product['photo']) ?>" alt="<?= $product['name'] ?>">
                        <?php endif ?>
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
                        <option <?= ($product['category_id'] == $category['id']) || (isset($old) && $old['category_id'] == $category['id']) ? 'selected' : false ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="brands">Thương hiệu</label>
                <select class="form-select" name="brand_id" id="">
                    <?php foreach ($allBrand as $key => $brand) : ?>
                        <option <?= ($product['brand_id'] == $brand['id']) || (isset($old) && $old['brand_id'] == $brand['id']) ? 'selected' : false ?> value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="Danh mục">Trạng thái</label>
                <select class="form-select" name="active" id="">
                    <option <?= ($product['active'] == 0 || isset($old) && $old['active'] == 0) ? 'selected' : false ?> value="0">Chưa kích hoạt</option>
                    <option <?= ($product['active'] == 1 || isset($old) && $old['active'] == 1) ? 'selected' : false ?> value="1">Đã kích hoạt</option>
                </select>
            </div>
        </div>
    </div>
    <div class="from-group mt-3">
        <label class="form-label" for="">Mô tả sản phẩm</label>
        <textarea name="description" id="editor" rows="10" cols="80">
               <?= $product['description'] ?>
        </textarea>
        <script>
            CKEDITOR.replace("description", {
                filebrowserBrowseUrl: "/phone_store_php_Si/public/admin/assets/vendor/ckfinder/ckfinder.html",
                filebrowserUploadUrl: "/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
            });
        </script>
    </div>
    <div class="mt-4">
        <button class="btn btn-primary px-4">Thêm sản phẩm</button>

    </div>
</form>
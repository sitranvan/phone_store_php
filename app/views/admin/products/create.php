<h2>Thêm sản phẩm</h2>
<?= alert($msg, $msg_type) ?>
<form method="POST" action="<?= route('admin/submit-add-product') ?>" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6 col-md-12 d-flex flex-column gap-3">
            <div class="form-group">
                <label class="form-label" for="">Tên sản phẩm</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Giá gốc</label>
                <input name="price" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Giá khuyến mãi</label>
                <input name="price_promotion" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Hình ảnh</label>
                <div class="custom-file-input">
                    <input name="photo" type="file" id="fileInput" class="input-file" accept="image/*">
                    <label for="fileInput" id="fileInputLabel">
                        <span id="fileSelectedText">Choose a file</span>
                        <img id="selectedImage" src="#" alt="Selected Image">
                    </label>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 d-flex flex-column gap-3">
            <div class="form-group">
                <label class="form-label" for="categories">Danh mục</label>
                <select class="form-select" name="category_id" id="">
                    <?php foreach ($allCategory as $key => $category) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="brands">Thương hiệu</label>
                <select class="form-select" name="brand_id" id="">
                    <?php foreach ($allBrand as $key => $brand) : ?>
                        <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="Danh mục">Trạng thái</label>
                <select class="form-select" name="active" id="">
                    <option value="0">Chưa kích hoạt</option>
                    <option value="1">Kích hoạt</option>
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
                filebrowserBrowseUrl: "ckfinder/ckfinder.html",
                filebrowserUploadUrl: "ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
            });
        </script>
    </div>
    <div class="mt-4">
        <button class="btn btn-primary px-4">Thêm sản phẩm</button>

    </div>
</form>
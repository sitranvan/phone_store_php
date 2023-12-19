<div class="container-lg w-100">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= route('') ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $product['product_name'] ?></li>
        </ol>
    </nav>
    <div class="row mt-5">
        <div class="col-lg-4 bg-white pb-5 pt-2 rounded-start-2">
            <div class="">
                <img src="<?= getImage($product['product_photo']) ?>" alt="" class="w-100 h-100 object-fit-cover">
            </div>
        </div>
        <div class="col-lg-6 bg-white py-4 pb-5">
            <div class="px-3 d-flex flex-column justify-content-between h-100">
                <div class="">
                    <p class="text-secondary fs-3">
                        <?= $product['product_name'] ?>
                    </p>
                    <div class="d-flex align-items-baseline gap-2 px-2">
                        <p class="text-danger fs-4"><?= number_format($product['product_price']) ?>đ</p>
                        <?php if ($product['product_price_promotion']) : ?>
                            <p class="text-decoration-line-through"><?= number_format($product['product_price_promotion']) ?>đ</p>
                        <?php endif ?>
                    </div>
                    <div class="text-secondary border p-3 rounded-2 bg-body-tertiary">
                        <span class="d-flex gap-2 align-items-center">
                            <i class="fa-solid fa-list-ul"></i>
                            Danh mục: <?= $product['category_name'] ?></span>
                        <p class="d-flex gap-2 align-items-center mt-1">
                            <i class="fa-regular fa-copyright"></i>
                            Thương hiệu: <?= $product['brand_name'] ?>
                        </p>
                    </div>

                </div>

                <div class="border-top text-secondary">
                    <p class="mt-4">Số lượng</p>
                    <div class="text-secondary increase-quantity">
                        <span><i class="fa-solid fa-plus"></i></span>
                        <span>1</span>
                        <span><i class="fa-solid fa-minus"></i></span>
                    </div>
                </div>
                <!-- index.html -->
                <a href="<?= route('them-gio-hang/' . $product['product_id']) ?>" class="btn btn-primary mt-4 py-2 w-50 mx-auto">Thêm vào giỏ hàng</a>

            </div>
        </div>
        <div class="col-lg-2 rounded-end-3 bg-white">
            <div class="commits">
                <div class="commit">
                    <img width="32" height="32" src="https://salt.tikicdn.com/ts/upload/2c/48/44/720434869e103b03aaaf1a104d91ad25.png" alt="commit">
                    <span>Mở hộp
                        <br>
                        kiểm tra
                        <br>
                        nhận hàng
                    </span>
                </div>
                <div class="commit">
                    <img width="32" height="32" src="https://salt.tikicdn.com/ts/upload/4b/a1/23/1606089d5423e5cba05e3820ad39708e.png" alt="commit">
                    <span>Hoàn tiền
                        <br>
                        <b>111%</b>
                        <br>
                        nếu hàng giả
                    </span>
                </div>
                <div class="commit">
                    <img width="32" height="32" src="https://salt.tikicdn.com/ts/upload/63/75/6a/144ada409519d72e2978ad2c61bc02a7.png" alt="commit">
                    <span>Đôi trả trong
                        <br>
                        <b>7 ngày</b>
                        <br>
                        nếu sp lỗi
                    </span>
                </div>
            </div>
        </div>

        <div class="">
            <h4 class="text-uppercase my-5 text-secondary">Mô tả sản phẩm</h4>
            <?= htmlspecialchars_decode($product['product_description']) ?>
        </div>
    </div>
</div>
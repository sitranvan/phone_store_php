<div class="container">
    <div class=" mt-lg-3 home">
        <!-- Aside -->
        <div class="bg-white rounded-2 py-3 px-2 aside position-relative d-none d-lg-block home-aside">
            <h2 class="ps-3 fs-6 text-uppercase fw-bold">Loại điện thoại</h2>
            <ul class="list-group list-group-flush px-1 category-list">
                <?php foreach ($allCategory as $category) : ?>
                    <li class="">
                        <a class="text-decoration-none text-cus fs-7 <?= isset($allQuery['category']) && $allQuery['category'] == $category['id'] ? 'text-danger' : '' ?> " href="javascript:void(0);" onclick="updateParams('category', <?= $category['id'] ?>)">
                            <i class="fa-solid fa-caret-right"></i>
                            <?= $category['name'] ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
            <div style="width: 70%;height: 1px; background-color: #d2d2d2;" class="my-4"></div>
            <h2 class="ps-3 fs-6 text-uppercase fw-bold">Thương hiệu</h2>
            <ul class="list-group list-group-flush px-1 category-list">
                <?php foreach ($allBrand as $brand) : ?>
                    <li class="">
                        <a class="text-decoration-none text-cus fs-7 <?= isset($allQuery['brand']) && $allQuery['brand'] == $brand['id'] ? 'text-danger' : '' ?> " href="javascript:void(0);" onclick="updateParams('brand', <?= $brand['id'] ?>)">
                            <i class="fa-solid fa-caret-right"></i>
                            <?= $brand['name'] ?>
                        </a>
                    </li>
                <?php endforeach ?>

                <button class="btn btn-outline-primary btn-sm mt-4 btn-clear">Xóa bộ lọc</button>


            </ul>


        </div>
        <!-- Product -->
        <div class="mt-3 mt-lg-0  home-product">
            <!-- Slider -->
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-4">
                    <div class="carousel-item" data-bs-interval="5000">
                        <img height="360" src="https://i.pinimg.com/originals/cd/1c/7c/cd1c7cbd61e5f596d2d59ae2ea7b3d9c.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img height="360" src="https://img.freepik.com/premium-psd/horizontal-website-banne_451189-110.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img height="360" src="https://img.freepik.com/premium-vector/mockup-3d-podium-stage-with-smartphone-design-template_534957-2.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- Filter -->
            <ul class="nav nav-pills mt-3 d-flex align-items-center filter">
                <li class="nav-item filter-icon">
                    <span class="nav-link bg-success text-white d-flex align-items-center gap-2" aria-current="page" href="#">Lọc SP
                        <i class="fa-solid fa-filter"></i>
                    </span>
                </li>

                <li class="nav-item ms-4 filter-price">
                    <select class="form-select" id="sortByDropdown" onchange="updateSortBy(this.value)">
                        <option value="all" selected>Theo giá</option>
                        <option <?= isset($allQuery['priceSort']) && $allQuery['priceSort'] == 'asc' ? 'selected' : '' ?> value="asc">Từ thấp đến cao</option>
                        <option <?= isset($allQuery['priceSort']) && $allQuery['priceSort'] == 'desc' ? 'selected' : '' ?> value="desc">Từ cao đến thấp</option>
                    </select>
                </li>
                <!-- Category mobile -->
                <li class="nav-item dropdown d-lg-none">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Theo danh mục</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">Điện thoại</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Laptop</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Tai nghe phụ kiện</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Đồng hồ</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Máy ảnh</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- List product -->
            <div class="product-row">

                <?php if (!empty($allProduct)) :
                    foreach ($allProduct as $product) : ?>
                        <a href="<?= route('chi-tiet/' . $product['product_id']) ?>" class=" product-col">
                            <div class="product-img">
                                <img src="<?= getImage($product['photo']) ?>" alt="<?= $product['product_name'] ?>">
                            </div>
                            <div class="product-content">
                                <h3 style="height: 45px;" class="product-name"><?= $product['product_name'] ?></h3>

                                <div class="d-flex align-items-center gap-1">
                                    <p class="product-price fs-6 fw-normal"><?= number_format($product['price']) ?>₫</p>
                                    <?php if ($product['price_promotion']) : ?>
                                        <p style="font-size: 12px;" class="product-price text-decoration-line-through text-secondary mt-2 fw-normal"><?= number_format($product['price_promotion']) ?>₫</p>
                                    <?php endif ?>
                                </div>
                                <span class="product-brand">Thương hiệu: <?= $product['brand_name'] ?></span>
                            </div>

                        </a>
                    <?php endforeach;
                else : ?>
                    <div class="d-flex flex-column align-items-center justify-content-center w-100">
                        <img width="150" height="150" src="https://cdn-icons-png.flaticon.com/512/5400/5400905.png" alt="">
                        <div class="fs-6 fw-600 text-secondary text-uppercase">Chưa có sản phẩm nào</div>
                    </div>

                <?php endif ?>
            </div>
            <!-- LoadMore -->
            <div class="mt-5 d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);" aria-label="Previous" onclick="updateParams('page', <?= $page - 1 ?>)" <?= $page > 1 ? '' : 'style="pointer-events: none; cursor: default;"' ?>>
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <?php for ($index = $startPage; $index <= $endPage; $index++) : ?>
                            <li class="page-item" aria-current="page">
                                <a class="page-link <?= $index == $page ? 'active' : '' ?>" href="javascript:void(0);" onclick="updateParams('page', <?= $index ?>)"><?= $index ?></a>
                            </li>
                        <?php endfor ?>

                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);" aria-label="Next" onclick="updateParams('page', <?= $page + 1 ?>)" <?= $page < $totalPage ? '' : 'style="pointer-events: none; cursor: default;"' ?>>
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
        </div>
    </div>
</div>
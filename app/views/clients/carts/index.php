<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= route('') ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
        </ol>
    </nav>
    <section class="pt-4 pb-5">
        <div class="container-lg w-100">
            <div class="row w-100 cart">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="display-5 mb-2 text-center">Giỏ hàng</h3>
                    <p class="mb-5 text-center">
                        <i class="text-info font-weight-bold"><?= isset($cartProducts) ? count($cartProducts) : '0' ?></i> sản phẩm
                    </p>
                    <?php if (isset($cartProducts)) : ?>
                        <table id="shoppingCart" class="table table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:60%">Sản phẩm</th>
                                    <th style="width:12%">Giá</th>
                                    <th style="width:10%; white-space: nowrap;">Số lượng</th>
                                    <th style="width:16%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($cartProducts)) :
                                    foreach ($cartProducts as $product) :  ?>

                                        <tr>
                                            <td data-th="Product">
                                                <div class="row cart-item">
                                                    <div class="col-md-2 text-left">
                                                        <img width="80" height="80" src="<?= getImage($product['photo']) ?>" alt="" class="rounded mb-2">
                                                    </div>
                                                    <div class="col-md-10 text-left mt-sm-2">
                                                        <h5 class="fw-normal"><?= $product['name'] ?></h4>
                                                            <p class="fs-7">Thương hiệu: <?= $product['brand_name'] ?> </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="20%" data-th="Price">
                                                <p class="text-secondary fs-5"><?= number_format($product['price']) . 'đ' ?></p>
                                            </td>
                                            <td data-th="Quantity">
                                                <input type="number" class="form-control  text-center" value="1">
                                            </td>
                                            <td class="actions" data-th="">
                                                <div class="text-right">

                                                    <button class="btn btn-white border text-bg-dange bg-white btn-md mb-2" style="height: 37.5px;">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </button>
                                                </div>
                                            </td>

                                        </tr>

                                    <?php endforeach;
                                else :  ?>
                                    <h2>Giỏ hàng trống</h2>
                                <?php endif ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-secondary my-2 text-uppercase">Tổng: <?= number_format($total) . 'đ' ?></h5>


                                    <div style="height: 0.1px; background-color:#d2d2d2;" class="w-100  my-4"></div>

                                    <button class="btn btn-success w-100">Thanh toán</button>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img height="250" src="https://img.freepik.com/premium-vector/shopping-cart-with-cross-mark-wireless-paymant-icon-shopping-bag-failure-paymant-sign-online-shopping-vector_662353-912.jpg" alt="">
                            <a href="<?= route('') ?>" class="mt-3 btn btn-primary">Tiếp tục mua sắm</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
    </section>
</div>
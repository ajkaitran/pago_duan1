<div class="content">
    <section class="path">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <i class="fa-duotone fa-house-chimney me-3"></i><a class="p__hover" href="#">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="product__page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-1 order-lg-0">
                    <div class="sidebar">
                        <div class="sidebar__title">
                            <h4 class="h4__white">DANH MỤC SẢN PHẨM</h4>
                        </div>
                        <div class="sidebar__menu">
                            <ul>
                                <?php
                                foreach ($categories as $cate) {
                                ?>
                                    <li>
                                        <div class="border__dashed p__hover">
                                            <a class="p__hover" href="?controller=home&action=ProductCategory&Id=<?= $cate['parent']['Id'] ?>"><?= $cate['parent']['Name'] ?></a>
                                            <?php echo !empty($cate['children']) ? '<i class="fa-regular fa-caret-down dropdown"></i>' : ""; ?>
                                        </div>
                                        <ul class="dropdown__menu ps-2">

                                            <?php
                                            foreach ($cate['children'] as $key => $child) :
                                            ?>
                                                <li class="border__solid">
                                                    <a class="p__hover" href="?controller=home&action=ProductCategory&Id=<?php echo $child['Id'] ?>"><?php echo $child['Name'] ?></a>
                                                </li>
                                            <?php
                                            endforeach;
                                            ?>
                                        </ul>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-0 order-lg-1">
                    <div class="product__detail">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 ">
                                <div class="slide__images">
                                    <?php
                                    $imageNames = explode(',', $productDetail['Image']);
                                    foreach ($imageNames as $imageName) {
                                    ?>
                                        <div>
                                            <img src="./public/uploads/AnhSanPham/<?= $imageName ?>" alt="">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="slide__images__nav">
                                    <?php
                                    $imageNames = explode(',', $productDetail['Image']);
                                    foreach ($imageNames as $imageName) {
                                    ?>
                                        <div>
                                            <img src="./public/uploads/AnhSanPham/<?= $imageName ?>" alt="">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <h3><?= $productDetail['Name'] ?></h3>
                                <div class="d-flex" style="gap:20px">
                                    <h3 class="new__price my-4">
                                        <?= number_format($productDetail['PriceSale'], 0, ',', '.') ?>đ</h3>
                                    <del class="old__price my-4"><?= number_format($productDetail['Price'], 0, ',', '.') ?>đ</del>
                                </div>
                                <div>
                                    <p>
                                        <?= $productDetail['Des'] ?>
                                    </p>
                                </div>
                                <form action="?controller=ShoppingCart&action=add_to_cart" method="post" class="row">
                                    <input class="input-quantity btn btn-light" id="input-quantity" type="text" name="quantity" value="1" min="1" max="100">
                                    <input type="hidden" name="id" value="<?= $productDetail['Id'] ?>">
                                    <div class="col-12">
                                        <button class="button__orange" type="submit"><i class="fa-regular fa-bag-shopping"></i>THÊM VÀO GIỎ HÀNG</button>
                                    </div>
                                </form>
                            </div>
                            <div class="co-12">
                                <div class="tabs" id="tabs">
                                    <ul>
                                        <li><a href="#tabs-1">Mô tả</a></li>
                                        <li><a href="#tabs-2">Bình luận</a></li>
                                    </ul>
                                    <div class="tab" id="tabs-1">
                                        <div class="content">
                                            <?= $productDetail['Content'] ?>
                                        </div>
                                    </div>
                                    <div class="tab" id="tabs-2">
                                        <div class="content">
                                            <?php if ($checkOrder != null && $checkComment == 0) : ?>
                                                <form action="?controller=home&action=Comment" method="post">
                                                    <input type="hidden" name="userId" value="<?= $userId ?>">
                                                    <input type="hidden" name="productId" value="<?= $productDetail['Id'] ?>">
                                                    <input type="hidden" name="orderId" value="<?= $checkOrder['id'] ?>">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Nội dung</label>
                                                        <input type="text" class="form-control" name="content" placeholder="Nhập nội dung đánh giá">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-3">Đánh giá</button>
                                                </form>
                                            <?php else : ?>
                                                <p class="text-danger">Vui lòng mua hàng để được đánh giá sản phẩm này!</p>
                                            <?php endif; ?>
                                            <div class="mt-5">
                                                <?php foreach ($comment as $key => $value) : ?>
                                                    <div class="card mb-3">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= $value['fullname'] ?></h5>
                                                            <p class="card-text">
                                                                <?= $value['Content'] ?>
                                                                <?php if ((isset($_SESSION['auth']['member']['id']) && $value['UserId'] == $_SESSION['auth']['member']['id']) || isset($_SESSION['auth']['admin'])) : ?>
                                                            <div class="btn-group">
                                                                <a href="?controller=home&action=edit_cmt&id=<?= $value['Id'] ?>" data-fancybox="" data-type="ajax" class="btn btn-success">Sửa</a>
                                                                <a href="?controller=home&action=delete_cmt&id=<?= $value['Id'] ?>&product_id=<?= $value['ProductId'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá?')">Xoá</a>
                                                            </div>
                                                        <?php endif; ?>
                                                        </p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="sidebar my-3">
                                <div class="sidebar__title">
                                    <h4 class="h4__white">SẢN PHẨM LIÊN QUAN</h4>
                                </div>
                                <div class="slide__related__products py-3">
                                    <?php
                                    foreach ($products as $key => $item) {
                                    ?>
                                        <div class="box__favorite__product">
                                            <a href="?controller=home&action=ProductDetail&Id=<?= $item['Id'] ?>">
                                                <img src="./public/uploads/AnhSanPham/<?= $item['Image'] ?>" alt="">
                                                <p class="p__hover"><?= $item['Name'] ?></p>
                                                <div class="price">
                                                    <h5 class="new__price"><?= number_format($item['PriceSale']) ?>VND
                                                    </h5>
                                                    <del class="old__price p__hover"><?= number_format($item['Price']) ?>VND</del>
                                                </div>
                                            </a>
                                            <div class="add__to__cart" onclick="QuickCart(id)"><i class="fa-regular fa-bag-shopping fs-5"></i>Thêm vào giỏ hàng</div>
                                            <div class="floating__box__product">
                                                <div class="box__product">
                                                    <a asp-action="ProductView" asp-controller="Home" asp-route-id="@item.Id" data-fancybox="" data-type="ajax" class="item-product">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="box__product">
                                                    <a href="javascript:;" onclick="AddToWishlist('@item.Id')"><i class="fa-regular fa-heart"></i></a>
                                                </div>
                                                <div class="box__product">
                                                    <a href="javascript:;" onclick="AddToCollation('@item.Id')"><i class="fa-solid fa-code-compare fa-rotate-90"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
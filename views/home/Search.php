<div class="content">
    <section class="path">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa-duotone fa-house-chimney me-3"></i><a class="p__hover" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="product__page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-1 order-lg-0 ">
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
                                            <a class="p__hover" href="#"><?= $cate['parent']['Name'] ?></a>
                                            <?php
                                            if (!empty($cate['children'])) {
                                                echo '<i class="fa-regular fa-caret-down dropdown"></i>';
                                            }
                                            ?>
                                        </div>
                                        <ul class="dropdown__menu ps-2">
                                            <?php

                                            foreach ($cate['children'] as $key => $value) :
                                            ?>
                                                <li class="border__solid">
                                                    <a class="p__hover" href="#"><?= $value['Name'] ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar__title">
                            <h4 class="h4__white">TÌM THEO GIÁ</h4>
                        </div>
                        <div class="sidebar__range__slider">
                            <input type="text" class="js-range-slider" id="priceRange" name="my_range" value="" />
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar__title">
                            <h4 class="h4__white">SẢN PHẨM HOT</h4>
                        </div>
                        <div class="slide__favorite__product__sidebar py-3">
                            <?php
                            foreach ($listProduct as $key => $item) {
                            ?>
                                <div class="box__favorite__product">
                                    <a href="?controller=home&action=ProductDetail">
                                        <img src="./public/uploads/AnhSanPham/<?= $item['Image'] ?>" alt="">
                                        <p class="p__hover"><?= $item['Name'] ?></p>
                                        <div class="price">
                                            <h5 class="new__price"><?= number_format($item['PriceSale']) ?>VND</h5>
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
                <div class="col-lg-9 order-0 order-lg-1 ">
                    <div class="product__list">
                        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 g-3">
                        <?php
                            foreach ($listProduct as $key => $item) {
                            ?>
                                <div class="col">
                                    <div class="box__favorite__product">
                                        <a href="?controller=home&action=ProductDetail">
                                            <img src="./public/uploads/AnhSanPham/<?= $item['Image'] ?>" alt="">
                                            <p class="p__hover"><?= $item['Name'] ?></p>
                                            <div class="price">
                                                <h5 class="new__price"><?= number_format($item['PriceSale']) ?>VND</h5>
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
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
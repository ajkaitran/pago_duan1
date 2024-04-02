<div class="content">
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="banner__left d-lg-block col-lg-5">
                    <div class="img">
                        <img src="./public/images/get-image-v3.png" alt="">
                    </div>
                    <div class="text">
                        <h2>Đặt in ấn phẩm và hình ảnh từ xa tiện lợi hơn qua Pago.vn</h2>
                        <div class="search p-0 bg-white">
                            <div class="search__form">
                                <input type="text" placeholder="Nhập từ khóa...">
                                <button type="button">
                                    <i class="fa-solid fa-magnifying-glass px-4" style="color: #ffffff;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner__right col-lg-7 col-md-12">
                    <div class="slide__banner">
                        <img src="./public/images/banner-1.png" alt="">
                        <img src="./public/images/banner-2.png" alt="">
                        <img src="./public/images/banner-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="service__list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title__pink">
                        <img src="./public/images/get-image-v3 (3).png" alt="">
                        <h3>BẠN CẦN IN SẢN PHẨM GÌ?</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="slide__service text-center">
                        <?php
                        foreach ($categoryProduct as $key => $cate) {
                        ?>
                            <a href="?controller=home&action=ProductCategory&Id=<?= $cate['Id'] ?>" class="box__service">
                                <img src="./public/uploads/AnhDanhMuc/<?= $cate['Image'] ?>" alt="">
                                <p class="p__hover"><?= $cate['Name'] ?></p>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="slide__list">
                        <img src="./public/images/asset 22.jpeg" alt="">
                        <img src="./public/images/asset 23.png" alt="">
                        <img src="./public/images/asset 24.png" alt="">
                        <img src="./public/images/asset 25.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="new__service">
        <div class="container">
            <div class="title__orange">
                <img src="./public/images/get-image-v3 (4).png" alt="">
                <h3>CÁC DỊCH VỤ MỚI</h3>
            </div>
            <div class="slide__new__service">
                <?php
                for ($i = 1; $i < 7; $i++) {
                ?>
                    <a href="#" class="box__new__service">
                        <img src="./public/images/dich-vu-<?= $i ?>.jpg" alt="">
                        <p class="p__hover">In sản phẩm</p>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <section class="favorite__product">
        <div class="container">
            <div class="title__orange">
                <img src="./public/images/get-image-v3 (4).png" alt="">
                <h3>SẢN PHẨM ĐƯỢC QUAN TÂM NHIỀU</h3>
            </div>
            <div class="slide__favorite__product py-3">
                <?php
                foreach ($listSp as $key => $item) {
                ?>
                    <div class="box__favorite__product">
                        <a href="?controller=home&action=ProductDetail&Id=<?= $item['Id'] ?>">
                            <img src="./public/uploads/AnhSanPham/<?= $item['Image'] ?>" alt="">
                            <p class="p__hover"><?= $item['Name']?></p>
                            <div class="price">
                                <h5 class="new__price"><?= number_format($item['PriceSale'])?>VND</h5>
                                <del class="old__price p__hover"><?= number_format($item['Price'])?>VND</del>
                            </div>
                        </a>
                        <form action="?controller=ShoppingCart&action=add_to_cart" method="post">
                            <input type="hidden" name="id" value="<?= $item['Id'] ?>">
                            <button type="submit" class="add__to__cart"><i class="fa-regular fa-bag-shopping fs-5"></i>Thêm vào giỏ hàng</button>
                        </form>
                        <div class="floating__box__product">
                            <div class="box__product">
                                <a asp-action="ProductView" asp-controller="Home" asp-route-id="@item.Id" data-fancybox="" data-type="ajax" class="item-product">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                            </div>
                            <div class="box__product">
                                <a href="javascript:;" onclick=""><i class="fa-regular fa-heart"></i></a>
                            </div>
                            <div class="box__product">
                                <a href="javascript:;" onclick=""><i class="fa-solid fa-code-compare fa-rotate-90"></i></a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <section class="hot__buy">
        <div class="container">
            <div class="title__orange">
                <img src="./public/images/get-image-v3 (3).png" alt="">
                <h3>COMBO ĐƯỢC MUA NHIỀU</h3>
            </div>
            <div class="combo__product">
                <div class="row">
                    <?php
                    for ($i = 1; $i < 10; $i++) {
                    ?>
                        <div class="col-lg-4 col-md-3 col-sm-6 my-3 ">
                            <div class="product">
                                <a href="#">
                                    <img src="./public/images/Nhan-gian-<?= $i ?>.jpeg" alt="">
                                    <div class="texts">
                                        <p class="p__hover">Combo</p>
                                        <div class="price">
                                            <h5 class="new__price">159.000VND</h5>
                                            <del class="old__price p__hover">200.000VND</del>
                                        </div>
                                    </div>
                                </a>
                                <div class="floating__box__product">
                                    <div class="box__product">
                                        <a onclick="QuickCart(id)"><i class="fa-regular fa-bag-shopping"></i></a>
                                    </div>
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
    </section>
        <!-- <section class="service__pago">
            <div class="container">
                <div class="img__service">
                    <img src="./public/images/bg-service.jpg" alt="">
                    <div class="title__orange">
                        <img src="./public/images/get-image-v3 (3).png" alt="">
                        <h3>DỊCH VỤ TẠI PAGO</h3>
                    </div>
                </div>
                <button type="button" class="btn btn-dark"><img src="./public/images/icon-btn-dv.png" alt="">Dịch vụ in ấn</button>
                <button type="button" class="btn btn-dark"><img src="./public/images/icon-btn-dv.png" alt="">Dịch vụ thiết kế</button>
            </div>
        </section> -->
    <section class="product__accessory">
        <div class="container">
            <div class="title__pink">
                <img src="./public/images/get-image-v3 (3).png" alt="">
                <h3>SẢN PHẨM VÀ PHỤ KIỆN</h3>
            </div>
            <div class="tabs" id="tabs">
                <ul>
                    <li><a href="#tabs-1">Ấn phẩm bao bì</a></li>
                    <li><a href="#tabs-2">Ấn phẩm tiếp thị</a></li>
                    <li><a href="#tabs-3">Ấn phẩm ấn phẩm văn phòng</a></li>
                    <li><a href="#tabs-4">Nhãn dán</a></li>
                </ul>
                <div class="tab" id="tabs-1">
                    <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 g-3 py-3">
                        <?php
                        for ($i = 1; $i < 10; $i++) {
                        ?>
                            <div class="col">
                                <div class="box__favorite__product">
                                    <a asp-action="ProductDetails" href="#">
                                        <img src="./public/images/Tui-giay-0<?= $i ?>.jpg" alt="">
                                        <p class="p__hover">Túi giấy</p>
                                        <div class="price">
                                            <h5 class="new__price">200.000VND</h5>
                                            <del class="old__price p__hover">250.000VND</del>
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
                <div class="tab" id="tabs-2">
                    <div class="alert alert-success" role="alert">
                        Không có dữ liệu!
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
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
                                <li>
                                    <div class="border__dashed p__hover">
                                        <a class="p__hover" href="#">Ấn phẩm bao bì</a>
                                        <i class="fa-regular fa-caret-down dropdown"></i>
                                    </div>
                                    <ul class="dropdown__menu ps-2">
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Nhãn dán</a>
                                        </li>
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Túi giấy</a>
                                        </li>
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Hộp giấy</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="border__dashed p__hover">
                                        <a class="p__hover" href="#">Ấn phẩm tiếp thị</a>
                                        <i class="fa-regular fa-caret-down dropdown"></i>
                                    </div>
                                    <ul class="dropdown__menu ps-2">
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Catalogue</a>
                                        </li>
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Tờ rơi</a>
                                        </li>
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Poster</a>
                                        </li>
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Tờ gấp</a>
                                        </li>
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Vé</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="border__dashed p__hover">
                                        <a class="p__hover" href="#">Ấn phẩm văn phòng</a>
                                        <i class="fa-regular fa-caret-down dropdown"></i>
                                    </div>
                                    <ul class="dropdown__menu ps-2">
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Bìa đựng hồ sơ</a>
                                        </li>
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Bao thư</a>
                                        </li>
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Danh thiếp</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar__title">
                            <h4 class="h4__white">SẢN PHẨM HOT</h4>
                        </div>
                        <div class="slide__favorite__product__sidebar py-3">
                            <?php
                            for ($i = 1; $i < 8; $i++) {
                            ?>
                                <div class="box__favorite__product">
                                    <a href="?controller=home&action=ProductDetail">
                                        <img src="./public/images/Poster-<?= $i ?>.jpg" alt="">
                                        <p class="p__hover">Poster</p>
                                        <div class="price">
                                            <h5 class="new__price">69.000VND</h5>
                                            <del class="old__price p__hover">100.000VND</del>
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
                <div class="col-lg-9 order-0 order-lg-1">
                    <div class="product__detail">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 ">
                                <div class="slide__images">
                                    <?php
                                    for ($i = 1; $i < 6; $i++) {
                                    ?>
                                        <div>
                                            <img src="./public/images/Poster-<?= $i ?>.jpg" alt="">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="slide__images__nav">
                                    <?php
                                    for ($i = 1; $i < 6; $i++) {
                                    ?>
                                        <div>
                                            <img src="./public/images/Poster-<?= $i ?>.jpg" alt="">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <h3>Nhãn dán</h3>
                                <h3 class="new__price my-4">59.000VND</h3>
                                <del class="old__price my-4">100.000VND</del>
                                <div>
                                    <p>
                                        - Màu sắc: nhiều màu - Số mặt in: 1 mặt - Chất Liệu Bạt Hiflex - Kỹ thuật in: In KTS *Lưu ý: Quý khách
                                        vui lòng ghi rõ mục đích sử dụng để chúng tôi in ấn chính xác *
                                    </p>
                                </div>
                                <form id="detailForm">
                                    <div class="my-2">
                                        <label>Đường cắt xé :</label> <br />
                                        <input type="radio" class="input__radio__hidden" id="cutlines-@item.Id" name="cutlines" value="có" />
                                        <label class="label__check__red" for="cutlines-@item.Id">Có</label>
                                        <input type="radio" class="input__radio__hidden" id="cutlines-@item.Id" name="cutlines" value="không" />
                                        <label class="label__check__red" for="cutlines-@item.Id">không</label>
                                    </div>
                                    <input class="input-quantity btn btn-light" id="input-quantity" type="text" name="quantity" value="1" min="1" max="100">
                                    <input type="hidden" name="productId" value="@Model.Product.Id" />
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="button__orange" type="submit"><i class="fa-regular fa-bag-shopping"></i>THÊM VÀO GIỎ HÀNG</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="button__blue"><i class="fa-regular fa-heart"></i>YÊU THÍCH</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="button__blue"><i class="fa-solid fa-code-compare fa-rotate-90"></i>SO SÁNH</button>
                                        </div>
                                    </div>
                                    <p>Gọi cho chúng tôi để được tư vấn <strong class="p__red" title="1900 9477">1900 9477</strong> </p>
                                    <hr>
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
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, velit quod rerum mollitia suscipit est. Esse quas corrupti repellat, alias harum, enim tempore nostrum, eum adipisci aperiam in. Nesciunt, magni.
                                        </div>
                                    </div>
                                    <div class="tab" id="tabs-2"> </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="sidebar my-3">
                                    <div class="sidebar__title">
                                        <h4 class="h4__white">SẢN PHẨM LIÊN QUAN</h4>
                                    </div>
                                    <div class="slide__related__products">
                                        <?php
                                        for ($i = 1; $i < 6; $i++) {
                                        ?>
                                            <div class="box__favorite__product">
                                                <a href="?controller=home&action=ProductDetail">
                                                    <img src="./public/images/Poster-<?= $i ?>.jpg" alt="">
                                                    <p class="p__hover">Poster</p>
                                                    <div class="price">
                                                        <h5 class="new__price">69.000VND</h5>
                                                        <del class="old__price p__hover">100.000VND</del>
                                                    </div>
                                                </a>
                                                <div class="add__to__cart" onclick="QuickCart(Id)"><i class="fa-regular fa-bag-shopping fs-5"></i>Thêm vào giỏ hàng</div>
                                                <div class="floating__box__product">
                                                    <div class="box__product">
                                                        <a asp-action="ProductView" asp-controller="Home" asp-route-id="@item.Id" class="item-product">
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
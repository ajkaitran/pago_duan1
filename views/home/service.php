<div class="content">
    <section class="path">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa-duotone fa-house-chimney me-3"></i><a class="p__hover" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dịch vụ</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="service__page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-1 order-lg-0">
                    <div class="sidebar">
                        <div class="sidebar__title">
                            <h4 class="h4__white">DANH MỤC DỊCH VỤ</h4>
                        </div>
                        <div class="sidebar__menu">
                            <ul>
                                <li>
                                    <div class="border__dashed p__hover">
                                        <a class="p__hover" asp-action="ServiceChildren" asp-route-url="dich-vu-in-an">Dịch vụ in ấn</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="border__dashed p__hover">
                                        <a class="p__hover" asp-action="ServiceChildren" asp-route-url="dich-vu-thiet-ke">Dịch vụ thiết kế</a>
                                    </div>
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
                                    <a href="#">
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
                    <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
                    <?php
                    for ($i = 1; $i < 7; $i++) {
                    ?>
                    <div class="col">
                        <div class="box__new__service">
                            <a asp-action="ServiceDetails" asp-controller="Home" asp-route-id="@item.Id">
                                <img src="./public/images/dich-vu-<?= $i ?>.jpg" alt="">
                                <p class="p__hover">Dịch vụ</p>
                            </a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
</div>
</section>
</div>
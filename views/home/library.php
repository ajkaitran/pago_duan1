<div class="content">
    <section class="path">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa-duotone fa-house-chimney me-3"></i><a class="p__hover" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item" aria-current="page">Thư viện</li>
                    <li class="breadcrumb-item active" aria-current="page">Thư viện ảnh</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="news__page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                <div class="sidebar">
                        <div class="sidebar__title">
                            <h4 class="h4__white">DANH MỤC THƯ VIỆN</h4>
                        </div>
                        <div class="sidebar__menu">
                            <ul>
                                <li>
                                    <div class="border__dashed p__hover">
                                        <a class="p__hover" href="#">Thư viện ảnh</a>
                                        <i class="fa-regular fa-caret-down dropdown"></i>
                                    </div>
                                    <ul class="dropdown__menu ps-2">
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Ảnh làm việc</a>
                                        </li>
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Sản phẩm mẫu</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="border__dashed p__hover">
                                        <a class="p__hover" href="#">thư viện video</a>
                                        <i class="fa-regular fa-caret-down dropdown"></i>
                                    </div>
                                    <ul class="dropdown__menu ps-2">
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Mẹo hay dùng</a>
                                        </li>
                                        <li class="border__solid">
                                            <a class="p__hover" href="#">Thiết kế và in ấn</a>
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
                <div class="col-lg-9">
                    <div class="row row-cols-4">
                        <?php
                        for ($i = 1; $i < 8; $i++) {
                        ?>
                            <div class="col">
                                <div class="library">
                                    <a href="#" class="library__image">
                                        <img src="./public/images/Anh-album-<?= $i ?>.jpg" alt="">
                                        <div class="icon__img">
                                            <i class="fa-regular fa-image fs-1"></i>
                                        </div>
                                    </a>
                                    <div class="title__library">
                                        <a href="#">Ảnh</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        for ($i = 1; $i < 10; $i++) {
                        ?>
                            <div class="col">
                                <div class="library">
                                    <a href="#" class="library__image">
                                        <img src="./public/images/Anh-video-<?= $i ?>.jpg" alt="">
                                        <div class="icon__img">
                                            <i class="fa-regular fa-circle-play fs-1"></i>
                                        </div>
                                    </a>
                                    <div class="title__library">
                                        <a href="#">Video</a>
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
    </section>
</div>
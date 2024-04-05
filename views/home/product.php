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
                                            <a class="p__hover" href="?controller=home&action=ProductCategory&Id=<?= $cate['Id'] ?>"><?= $cate['Name'] ?></a>
                                            <i class="fa-regular fa-caret-down dropdown"></i>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-0 order-lg-1 ">
                    <div class="display__product">
                        <div class="row">
                            <div class="col-lg-12 col-md-7 col-sm-12">
                                <label>Hiển thị</label>
                                <select class="form-control mt-2" name="Sort" onchange="window.location.href='?controller=home&action=product&Sort='+this.value">
                                    <option value="">Mặc định</option>
                                    <option <?= 1 == $Sort ? "selected" : null ?> value="1">Sắp xếp theo tên (A-Z)</option>
                                    <option <?= 2 == $Sort ? "selected" : null ?> value="2">Sắp xếp theo tên (Z-A)</option>
                                    <option <?= 3 == $Sort ? "selected" : null ?> value="3">Sắp xếp theo giá (Nhỏ-Lớn)</option>
                                    <option <?= 4 == $Sort ? "selected" : null ?> value="4">Sắp xếp theo giá (Lớn-Nhỏ)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="product__list">
                        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 g-3">
                            <?php
                            foreach ($listProduct as $key => $item) {
                            ?>
                                <div class="col">
                                    <div class="box__favorite__product">
                                        <a href="?controller=home&action=ProductDetail&Id=<?= $item['Id'] ?>">
                                            <img src="./public/uploads/AnhSanPham/<?= $item['Image'] ?>" alt="">
                                            <p class="p__hover"><?= $item['Name'] ?></p>
                                            <div class="price d-flex" style="gap:10px">
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
                                                <a href="javascript:;"><i class="fa-regular fa-heart"></i></a>
                                            </div>
                                            <div class="box__product">
                                                <a href="javascript:;"><i class="fa-solid fa-code-compare fa-rotate-90"></i></a>
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
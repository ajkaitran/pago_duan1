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
                                foreach ($categoryProduct as $key => $cate) {
                                ?>
                                    <li>
                                        <div class="border__dashed p__hover">
                                            <a class="p__hover" href="#"><?= $cate['Name']?></a>
                                            <i class="fa-regular fa-caret-down dropdown"></i>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                                <!-- <li>
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
                                </li> -->
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
                            <h4 class="h4__white">PHIÊN BẢN SẢN PHẨM</h4>
                        </div>
                        <div class="sidebar__checkbox">
                            <div class="form__group">
                                <label>Đường cắt xé</label>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-btn" type="checkbox" name="cutline" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">Có</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-btn" type="checkbox" name="cutline" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">Không</p>
                                    </label>
                                </div>
                            </div>
                            <div class="form__group">
                                <label>Cán màn</label>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-lamination" type="checkbox" name="lamination" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">Không</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-lamination" type="checkbox" name="lamination" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">Màn bóng 1 mặt</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-lamination" type="checkbox" name="lamination" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">Màn bóng 2 mặt</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-lamination" type="checkbox" name="lamination" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">Màn mờ 2 mặt</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-lamination" type="checkbox" name="lamination" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">Màn mờ 1 mặt</p>
                                    </label>
                                </div>
                            </div>
                            <div class="form__group">
                                <label>Kích thước</label>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-printsize" type="checkbox" name="printsize" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">H1 (Ngang 3 cao 9 hông 3)</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-printsize" type="checkbox" name="printsize" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">H2 (Ngang 10 cao 8 hông 3)</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-printsize" type="checkbox" name="printsize" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">H1 (Ngang 15 cao 5 hông 10)</p>
                                    </label>
                                </div>
                            </div>
                            <div class="form__group">
                                <label>Hình thức in</label>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-printedform" type="checkbox" name="printedform" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">In 2 mặt</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-printedform" type="checkbox" name="printedform" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">In 1 mặt</p>
                                    </label>
                                </div>
                            </div>
                            <div class="form__group">
                                <label>Loại giấy</label>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-papertype" type="checkbox" name="papertype" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">S00 250gsm</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-papertype" type="checkbox" name="papertype" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">N05 250gsm</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-papertype" type="checkbox" name="papertype" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">K12 250gsm</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-papertype" type="checkbox" name="papertype" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">K04 250gsm</p>
                                    </label>
                                </div>
                            </div>
                            <div class="form__group">
                                <label>Keo dán nắp</label>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-glue" type="checkbox" name="glue" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">Có</p>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden checkbox-btn checkbox-glue" type="checkbox" name="glue" value="@item.Id" />
                                        <span class="checkbox__symbol">
                                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px" viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 14l8 7L24 7"></path>
                                            </svg>
                                        </span>
                                        <p class="checkbox__textwrapper">Không</p>
                                    </label>
                                </div>
                            </div>
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
                    <div class="display__product">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label>Hiển thị</label>
                                <select>
                                    <option>Mặc định</option>
                                    <option>12</option>
                                    <option>24</option>
                                    <option>36</option>
                                    <option>48</option>
                                    <option>60</option>
                                </select>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <label>Sắp xếp</label>
                                <select>
                                    <option>Mặc định</option>
                                    <option>Sấp xếp theo tên (A-Z)</option>
                                    <option>Sấp xếp theo tên (Z-A</option>
                                    <option>Sấp xếp theo giá (Nhỏ-Lớn)</option>
                                    <option>Sấp xếp theo giá (Lớn-Nhỏ)</option>
                                    <option>Sấp xếp theo khuyến mãi (Có-Không)</option>
                                    <option>Sấp xếp theo khuyến mãi (Không-Có)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="product__list">
                        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2 g-3">
                            <?php
                            for ($i = 1; $i < 12; $i++) {
                            ?>
                                <div class="col">
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
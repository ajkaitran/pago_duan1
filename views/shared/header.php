<header>
    <div class="header_web d-lg-block">
        <div class="row">
            <!-- <div class="top__header col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="left col-lg-6">
                            <div class="phone">
                                <div class="box__icons"><i class="fa-thin fa-phone" style="color: #ffffff;"></i></div>
                                <a class="text" href="#" title="1900 9477">1900 9477</a>
                            </div>
                            <div class="location">
                                <div class="box__icons">
                                    <i class="fa-thin fa-location-dot" style="color: #ffffff;"></i>
                                </div>
                                <div class="text">196 Nguyễn Đình Chiểu, P.Võ Thị Sáu, Q.3, TP.HCM</div>
                            </div>
                        </div>
                        <div class="right col-lg-6">
                            <div class="right__text"><a class="text" href="#">Chương trình khuyến mãi</a></div>
                            <div class="right__text"><a class="text" href="#">Chính sách đảm bảo</a></div>
                            <div class="right__img">
                                <a href="#"><img src="./public/images/vn.svg" alt="VN_flag"></a>
                                <a href="#"><img src="./public/images/us.svg" alt="US_flag"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="bot__header col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="logo_header col-lg-2">
                            <a href="/pago_duan1/">
                                <img src="./public/images/logo_pago.png" alt="logo_papo">
                            </a>
                        </div>
                        <div class="search col-lg-5">
                            <div class="search__form">
                                <input type="text" placeholder="Nhập từ khóa...">
                                <button type="button">
                                    <i class="fa-solid fa-magnifying-glass px-4" style="color: #ffffff;"></i>
                                </button>
                            </div>
                        </div>
                        <div class="select col-lg-5">
                            <ul class="nav nav__bot">
                                <li>
                                    <a href="#">
                                        <i class="fa-regular fa-star fs-3"></i>
                                        <span>Về Pago</span>
                                    </a>
                                </li>
                                <li class="badges">
                                    <a asp-action="Index" asp-controller="ShoppingCart">
                                        <i class="fa-regular fa-bag-shopping fs-3"></i>
                                        <span>Giỏ hàng</span>
                                        <span class="badges__icons">0</span>
                                    </a>
                                    <div class="badges__drop">
                                        <div class="drop_detail">
                                            <div class="drop__top">
                                                <!-- @if (Model.CartItems.Any())
                                                {
                                                @foreach (var item in Model.CartItems)
                                                {
                                                <div class="product product_shopping__drop" data-itemId="@item.RecordId">
                                                    <button type="button" class="product_item__close" onclick="RemoveFromCartDrop('@item.RecordId')"><i class="fa-solid fa-xmark"></i></button>
                                                    <a class="product_row" asp-action="ProductDetails" asp-controller="Home" asp-route-id="@item.Product.Id">
                                                        <img src="@Url.Content($" /contents/AnhSanPham/{item.Product.GetAvatar()}")" />
                                                        <div class="texts">
                                                            <p class="p__hover">@item.Product.Name</p>
                                                            <div class="price">
                                                                <h5 class="new__price">@Html.DisplayFor(a => item.Product.NewPrice)</h5>
                                                                <del class="old__price p__hover">@Html.DisplayFor(a => item.Product.OldPrice)</del>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                }
                                                }
                                                else
                                                {
                                                <span>Không có thông tin cho loại dữ liệu này</span>
                                                } -->
                                                <span>Không có thông tin cho loại dữ liệu này</span>
                                            </div>
                                            <div class="drop__bot">
                                                <span>Tổng tiền:</span>
                                                <span><b class="shopping-cart-total">0</b>đ</span>
                                            </div>
                                        </div>
                                        <div class="drop__button">
                                            <button type="button" class="btn btn-dark"><a class="text-white" href="#">GIỎ HÀNG </a></button>
                                            <button type="button" class="btn btn-dark"><a class="text-white" href="#">THANH TOÁN</a></button>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-regular fa-file-lines fs-3"></i>
                                        <span>Hướng dẫn</span>
                                    </a>
                                </li>
                                <li class="user">
                                    <a href="#">
                                        <i class="fa-regular fa-user fs-3"></i>
                                        <span>Tài khoản</span>
                                    </a>
                                    <div class="user__drop">
                                        <ul class="nav">
                                            <?php
                                                if (isset($_SESSION['user'])):
                                            ?>
                                                <li class="nav-item"><a class="nav-link" href="?controller=member&action=index">Quản lý tài khoản</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">So sánh</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Yêu thích</a></li>
                                                <li class="nav-item"><a class="nav-link" href="?controller=member&action=logout">Đăng xuất</a></li>
                                            <?php
                                                else:
                                            ?>
                                                <li class="nav-item"><a class="nav-link" href="?controller=member&action=login">Đăng nhập</a></li>
                                                <li class="nav-item"><a class="nav-link" href="?controller=member&action=register">Đăng ký</a></li>
                                            <?php
                                                endif;
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav__header col-lg-12">
                <div class="container">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/pago_duan1/">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=Home&action=introduce">GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=Home&action=product">SẢN PHẨM <i class="fa-solid fa-angle-down"></i></a>
                            <div class="nav__drop">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Ấn phẩm bao bì <i class="fa-solid fa-caret-right"></i></a>
                                        <div class="nav_drop__children">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Nhãn dán</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Túi giấy</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Hộp giấy</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Ấn phẩm tiếp thị <i class="fa-solid fa-caret-right"></i></a>
                                        <div class="nav_drop__children">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Nhãn dán</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Túi giấy</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Hộp giấy</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=Home&action=service">DỊCH VỤ <i class="fa-solid fa-angle-down"></i></a>
                            <div class="nav__drop">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Dịch vụ in ấn</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Dịch vụ thiết kế</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=Home&action=article">TIN TỨC <i class="fa-solid fa-angle-down"></i></a>
                            <div class="nav__drop">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Tin thị trường</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Tin vắn</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=Home&action=library"> THƯ VIỆN <i class="fa-solid fa-angle-down"></i></a>
                            <div class="nav__drop">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            Thư viện ảnh <i class="fa-solid fa-caret-right"></i>
                                        </a>
                                        <div class="nav_drop__children">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Ảnh làm việc</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Sản phẩm mẫu</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            Thư viện Video <i class="fa-solid fa-caret-right"></i>
                                        </a>
                                        <div class="nav_drop__children">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Mẹo hay dùng</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Thiết kế và in ấn</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" asp-action="Contact" asp-controller="Home">LIÊN HỆ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn " href="#">
                                <i class="fa-light fa-file" style="color: #ffffff;"></i>
                                Yêu cầu báo giá
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="section_breadcrumb py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a asp-action="Index" asp-controller="Home"><i class="fa-solid fa-house me-2"></i>Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
            </ol>
        </nav>
    </div>
</section>
<section class="page_checkout">
    <div asp-validation-summary="ModelOnly" class="text-danger"></div>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="page_checkout__header">Thanh toán</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="page_checkout__topic">
                    <span class="page_checkout__topic-icon">
                        <img src="./public/images/location.png" />
                    </span>
                    <h3 class="page_checkout__topic-name">
                        Thông tin khách hàng
                    </h3>
                </div>
                <div class="page_checkout__wrapper">
                    <div class="page_checkout__row page_checkout__customer">
                        <div class="w-50 page_checkout__col">
                            <h6 class="page_checkout__customer-title">Người mua hàng</h6>
                            <div class="form-group mb-3">
                                <input class="form-control customer-fullname" asp-for="CustomerInfo.FullName" type="text" placeholder="Họ và tên" />
                                <span asp-validation-for="CustomerInfo.FullName" class="text-danger"></span>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" asp-for="CustomerInfo.Email" type="email" placeholder="Email" />
                                <span asp-validation-for="CustomerInfo.Email" class="text-danger"></span>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control customer-phone" type="text" asp-for="CustomerInfo.PhoneNumber" placeholder="Điện thoại" />
                                <span asp-validation-for="CustomerInfo.PhoneNumber" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="w-50 page_checkout__col">
                            <h6 class="page_checkout__customer-title">Người người nhận hàng</h6>
                            <div class="form-group mb-3">
                                <input class="form-control receiver-fullname" type="text" asp-for="ReceiverInfo.FullName" placeholder="Họ và tên" />
                                <span asp-validation-for="ReceiverInfo.FullName" class="text-danger"></span>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control receiver-phone" type="text" asp-for="ReceiverInfo.PhoneNumber" placeholder="Điện thoại" />
                                <span asp-validation-for="ReceiverInfo.PhoneNumber" class="text-danger"></span>
                            </div>
                            <a href="javascript:;" onclick="CopyInfoCustomer()"><i class="fa-sharp fa-solid fa-files me-2"></i>Sử dụng thông tin người mua hàng</a>
                        </div>
                    </div>
                    <div class="page_checkout__row page_checkout__checked my-3">
                        <p>* Bạn có muốn nhận hàng trực tiếp tại shop ?</p>
                        <div class="checkbox-wrapper-14">
                            <label class="switch" for="checkboxAtStore">
                                <input name="checkboxAtStore" value="1" type="checkbox" id="checkboxAtStore" class="switch" />
                                <div class="slider round"></div>
                            </label>
                        </div>
                    </div>
                    <div class="page_checkout__row page_checkout__customer" id="customerAddress">
                        <div class="w-50 page_checkout__col">
                            <h6 class="page_checkout__customer-title">Địa chỉ nhận hàng</h6>
                            <div class="form-group mb-3">
                                <input class="form-control" asp-for="CustomerInfo.Address" type="text" placeholder="Địa chỉ" />
                                <span asp-validation-for="CustomerInfo.Address" class="text-danger"></span>
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-select customer-city-multiple" asp-for="CityId">
                                    <option value="">---Chọn tỉnh/thành---</option>
                                    @foreach(var item in Model.ListCitys){
                                    <option value="@item.Id">@item.Name</option>
                                    }
                                </select>
                                <span asp-validation-for="CityId" class="text-danger"></span>
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-select customer-district-multiple" asp-for="DistrictId">
                                    <option value="">---Chọn quận/huyện---</option>
                                </select>
                                <span asp-validation-for="DistrictId" class="text-danger"></span>
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-select border rounded text-center text-secondary px-2 customer-wards-multiple" asp-for="WardId">
                                    <option value="">---Chọn phường/xã---</option>
                                </select>
                                <span asp-validation-for="WardId" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="w-50 page_checkout__col">
                            <h6 class="page_checkout__customer-title">Hình thức giao hàng</h6>
                            <div class="alert alert-warning" role="alert">
                                Vui lòng chọn địa chỉ giao hàng
                            </div>
                        </div>
                    </div>
                    <div class="page_checkout__store" id="storeAddress">
                        <div class="form-floating mt-3">
                            <div class="alert alert-info" role="alert">
                                Địa chỉ của hàng: <b>@Model.AddressStore</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page_checkout__topic">
                    <span class="page_checkout__topic-icon">
                        <img src="./public/images/money.png" />
                    </span>
                    <h3 class="page_checkout__topic-name">
                        Hình thức thanh toán
                    </h3>
                </div>
                <div class="page_checkout__wrapper payment_type">
                    <div class="page_checkout__row">
                        <div class="w-50 page_checkout__col">
                            <div class="payment_type__item">
                                <div class="checkbox-wrapper-18">
                                    <div class="round">
                                        <input asp-for="PaymentTypeId" value="" type="radio" checked="" />
                                        <label for="payment-type-@item.Id"></label>
                                    </div>
                                </div>
                                <label for="" class="payment_type__label" style="background-color: #2abf9c;">
                                    <span class="icon" style="background-color: #2abf9c;">
                                        <img src="./public/images/payment-1.png" />
                                    </span>
                                    <b class="name">Thanh toán khi nhận hàng</b>
                                </label>
                            </div>
                            <div class="payment_type__item">
                                <div class="checkbox-wrapper-18">
                                    <div class="round">
                                        <input asp-for="PaymentTypeId" value="" type="radio" checked="" />
                                        <label for="payment-type-@item.Id"></label>
                                    </div>
                                </div>
                                <label for="" class="payment_type__label" style="background-color: #ff9700;">
                                    <span class="icon" style="background-color: #ff9700;">
                                        <img src="./public/images/payment-2.png" />
                                    </span>
                                    <b class="name">Thanh toán tại công ty</b>
                                </label>
                            </div>
                        </div>
                        <div class="w-50 page_checkout__col">
                            <div class="payment_type__item label-online">
                                <label class="payment_type__label" style="background-color: #3199d8;">
                                    <span class="icon">
                                        <img src="./public/images/paypal_732096.png" />
                                    </span>
                                    <b class="name">Thanh toán toán trực tuyến</b>
                                </label>

                                <ul class="payment_type__list-online">
                                    <li>
                                        <div class="header">
                                            <div class="round">
                                                <input asp-for="PaymentTypeId" value="@item.Id" type="radio" id="payment-type-@item.Id" />
                                                <label for="checkbox-18"></label>
                                            </div>
                                            <label for="payment-type-@item.Id" class="label">
                                                <span class="image">
                                                    <img src="./public/images/zalopay-paymenttype.svg" />
                                                </span>
                                                <b class="name">
                                                    Thanh toán ZaloPay
                                                </b>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="header">
                                            <div class="round">
                                                <input asp-for="PaymentTypeId" value="@item.Id" type="radio" id="payment-type-@item.Id" />
                                                <label for="checkbox-18"></label>
                                            </div>
                                            <label for="payment-type-@item.Id" class="label">
                                                <span class="image">
                                                    <img src="./public/images/payment-4.png" />
                                                </span>
                                                <b class="name">
                                                Thanh toán chuyển khoản
                                                </b>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="header">
                                            <div class="round">
                                                <input asp-for="PaymentTypeId" value="@item.Id" type="radio" id="payment-type-@item.Id" />
                                                <label for="checkbox-18"></label>
                                            </div>
                                            <label for="payment-type-@item.Id" class="label">
                                                <span class="image">
                                                    <img src="./public/images/payment-5.png" />
                                                </span>
                                                <b class="name">
                                                Thanh toán qua ví Momo
                                                </b>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page_checkout__topic">
                    <span class="page_checkout__topic-icon">
                        <img src="./public/images/shopping-cart.png" />
                    </span>
                    <h3 class="page_checkout__topic-name">
                        Thông tin đơn hàng
                    </h3>
                    <a asp-action="Index" asp-controller="ShoppingCart" class="page_checkout__topic-link">
                        Sửa
                    </a>
                </div>
                <div class="page_checkout__wrapper page_checkout__order">
                    <ul class="page_checkout__list-order">
                        <?php
                        for ($i = 1; $i < 5; $i++) {
                        ?>
                        <li class="page_checkout__order-detail order-detail">
                            <a asp-action="ProductDetails" asp-controller="Home" asp-route-slug="@item.Product.Slug" class="order-detail__img">
                                <img src="./public/images/Nhan-gian-<?= $i ?>.jpeg" alt="">
                            </a>
                            <a asp-action="ProductDetails" asp-controller="Home" asp-route-slug="@item.Product.Slug" class="order-detail__name">
                                Nhãn dán
                            </a>
                            <p class="order-detail__info">
                                <span class="quantity">1x</span>
                                <span class="money"><strong>59.000</strong>VND</span>
                            </p>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>

                    <ul class="page_checkout__payment list-group">
                        <li class="payment-item list-group-item">
                            <p class="payment-label">
                                Tạm tính
                            </p>
                            <span class="payment-number">
                                <strong>500.000</strong>VND
                            </span>
                        </li>
                        <li class="payment-item list-group-item">
                            <p class="payment-label">
                                Phí vận chuyển
                            </p>
                            <span class="payment-number">
                                30.000VND
                            </span>
                        </li>
                        <li class="payment-item list-group-item fw-bold">
                            <p class="payment-label">
                                Thành tiền
                            </p>
                            <span class="payment-number">
                                530.000VND
                            </span>
                        </li>
                    </ul>

                    <textarea class="page_checkout__note form-control mb-3" asp-for="Order.Customer.Note" placeholder="Ghi chú"></textarea>

                    <button type="submit" class="btn btn-block page_checkout__submit-link">
                        Thanh toán
                    </button>
                </div>
            </div>
        </div>
    </div>
    }
</section>
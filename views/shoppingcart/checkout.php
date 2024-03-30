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
<form action="?controller=ShoppingCart&action=checkout_order" method="post" class="page_checkout">
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
                        <div class="w-100 page_checkout__col">
                            <h6 class="page_checkout__customer-title">Thông tin mua hàng</h6>
                            <div class="form-group mb-3">
                                <input class="form-control customer-fullname" name="fullname" type="text" placeholder="Họ và tên" />
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="email" name="email" placeholder="Email" />
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control customer-phone" name="phone_number" type="text" placeholder="Điện thoại" />
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control receiver-fullname" name="address" type="text" placeholder="Địa chỉ nhận hàng" />
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
                            <?php foreach($payments as $key => $value): ?>
                                <div class="payment_type__item">
                                    <div class="checkbox-wrapper-18">
                                        <div class="round">
                                            <input id="payment-type-<?= $key ?>" name="payment" value="<?= $key ?>" type="radio" />
                                            <label for="payment-type-<?= $key ?>"></label>
                                        </div>
                                    </div>
                                    <label for="payment-type-<?= $key ?>" class="payment_type__label" style="background-color: #2abf9c;">
                                        <span class="icon" style="background-color: #2abf9c;">
                                            <img src="./public/images/payment-1.png" />
                                        </span>
                                        <b class="name"><?= $value ?></b>
                                    </label>
                                </div>
                            <?php endforeach; ?>
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
                        <?php foreach($cart['buy'] as $key => $value): ?>
                        <li class="page_checkout__order-detail order-detail">
                            <a class="order-detail__img">
                                <img src="./public/uploads/AnhSanPham/<?= isset($value['image']) ? $value['image'] : null ?>" alt="">
                            </a>
                            <a class="order-detail__name">
                                <?= isset($value['name']) ? $value['name'] : null ?>
                            </a>
                            <p class="order-detail__info">
                                <span class="quantity"><?= isset($value['quantity']) ? $value['quantity'] : 0 ?></span>
                                <span class="money"><strong><?= number_format(isset($value['total_price']) ? $value['total_price'] : 0) ?></strong>VND</span>
                            </p>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <ul class="page_checkout__payment list-group">
                        <li class="payment-item list-group-item">
                            <p class="payment-label">
                                Tạm tính
                            </p>
                            <span class="payment-number">
                                <strong><?= number_format(isset($cart['info']['total']) ? $cart['info']['total'] : 0) ?></strong>VND
                            </span>
                        </li>
                        <li class="payment-item list-group-item">
                            <p class="payment-label">
                                Phí vận chuyển
                            </p>
                            <span class="payment-number">
                                <?= number_format(isset($ship_fee) ? $ship_fee : 0) ?>VND
                            </span>
                        </li>
                        <li class="payment-item list-group-item fw-bold">
                            <p class="payment-label">
                                Thành tiền
                            </p>
                            <span class="payment-number">
                                <?= number_format($cart['info']['total'] + $ship_fee ?? 0) ?>VND
                            </span>
                        </li>
                    </ul>
                    <button name="checkout" type="submit" class="btn btn-block page_checkout__submit-link">
                        Thanh toán
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
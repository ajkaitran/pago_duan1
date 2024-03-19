<section class="section_breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a asp-action="Index" asp-controller="Home"><i class="fa-solid fa-house me-2"></i>Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </nav>
    </div>
</section>

<section class="page_cart">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="page_cart__title">
                    Giỏ hàng
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table_cart table">
                    <tbody>
                        <?php
                        for ($i = 1; $i < 5; $i++) {
                        ?>
                            <tr class="table_cart__item">
                                <th scope="row" style="width: 130px;" data-itemId="@item.RecordId">
                                    <a class="table_cart__image" href="#">
                                        <img src="./public/images/Nhan-gian-<?= $i ?>.jpeg" alt="">
                                    </a>
                                </th>
                                <td style="min-width: 250px;">
                                    <a class="table_cart__name" href="#">
                                        Nhãn dán
                                    </a>
                                </td>
                                <td style="width: 200px;">
                                    <ul class="table_cart__info">
                                        <li class="table_cart__row-info">
                                            <span class="table_cart__lable-info">Đơn giá:</span>
                                            <p class="table_cart__content-info unit-price">
                                                500.000 VND
                                            </p>
                                        </li>
                                        <li class="table_cart__row-info">
                                            <span class="table_cart__lable-info">Số lượng:</span>
                                            <input class="input-quantity btn btn-light" type="text" name="quantity" value="" min="1" max="100">
                                        </li>
                                        <li class="table_cart__row-info">
                                            <span class="table_cart__lable-info">Thành tiền:</span>
                                            <p class="table_cart__content-info into-money">
                                                <strong class="item-cart-total">500.000</strong> VND
                                            </p>
                                        </li>
                                    </ul>
                                </td>
                                <td style="width: 200px;">
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button onclick="RemoveFromCart('@item.RecordId')" type="button" class="btn table_cart__btn-trash-item">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- <p class="alert alert-success my-4">
                    Không có thông tin cho loại dữ liệu này
                </p> -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page_cart__footer">
                    <div class="page_cart__total mb-4">
                        <span>Tổng tiền:</span>
                        <span><b class="shopping-cart-total">100.000.000</b> VND</span>
                    </div>
                    <div class="page_cart__group-btn">
                        <a asp-action="Index" asp-controller="Home" class="btn">
                            Xem thêm sản phẩm
                        </a>
                        <a class="btn" href="?controller=shoppingcard&action=checkout">
                            Thanh toán
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
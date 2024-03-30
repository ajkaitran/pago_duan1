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
    <form action="?controller=ShoppingCart&action=update_shoppingcart" method="post">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="page_cart__title">
                        Giỏ hàng
                    </h1>
                </div>
            </div>
            <?php if(!empty($cart)): ?>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table_cart table">
                            <tbody>
                                <?php foreach($cart['buy'] as $key => $value): ?>
                                    <tr class="table_cart__item">
                                        <th scope="row" style="width: 130px;">
                                            <input type="hidden" name="id[]" value="<?= isset($key) ? $key : 0 ?>" />
                                            <a class="table_cart__image" href="#">
                                                <img src="./public/uploads/AnhSanPham/<?= isset($value['image']) ? $value['image'] : null ?>" alt="">
                                            </a>
                                        </th>
                                        <td style="min-width: 250px;">
                                            <a class="table_cart__name" href="#">
                                                <?= isset($value['name']) ? $value['name'] : null ?>
                                            </a>
                                        </td>
                                        <td style="width: 200px;">
                                            <ul class="table_cart__info">
                                                <li class="table_cart__row-info">
                                                    <span class="table_cart__lable-info">Đơn giá:</span>
                                                    <p class="table_cart__content-info unit-price">
                                                        <?= number_format(isset($value['price']) ? $value['price'] : 0) ?> VNĐ
                                                    </p>
                                                </li>
                                                <li class="table_cart__row-info">
                                                    <span class="table_cart__lable-info">Số lượng:</span>
                                                    <input class="input-quantity btn btn-light" type="text" name="quantity[<?= isset($key) ? $key : 0 ?>]" value="<?= isset($value['quantity']) ? $value['quantity'] : 0 ?>" min="1" max="100">
                                                </li>
                                                <li class="table_cart__row-info">
                                                    <span class="table_cart__lable-info">Thành tiền:</span>
                                                    <p class="table_cart__content-info into-money">
                                                        <strong class="item-cart-total"><?= number_format(isset($value['total_price']) ? $value['total_price'] : 0) ?></strong> VND
                                                    </p>
                                                </li>
                                            </ul>
                                        </td>
                                        <td style="width: 200px;">
                                            <div class="d-flex justify-content-end align-items-center">
                                                <a href="?controller=ShoppingCart&action=remove_cart&id=<?= $value['id'] ?>" class="btn table_cart__btn-trash-item">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
                                <span><b class="shopping-cart-total"><?= number_format(isset($cart['info']['total']) ? $cart['info']['total'] : 0) ?></b> VND</span>
                            </div>
                            <div class="page_cart__group-btn">
                                <button type="submit" name="update_cart" class="btn">
                                    Cập nhật giỏ hàng
                                </button>
                                <a class="btn" href="?controller=shoppingcart&action=checkout">
                                    Thanh toán
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(empty($cart)): ?>
                <div class="alert alert-primary" role="alert">
                Giỏ hàng trống, hãy tiếp tục mua sắm <a href="?controller=home&action=index" class="alert-link">tại đây</a>.
                </div>
            <?php endif; ?>
        </div>
    </form>
</section>
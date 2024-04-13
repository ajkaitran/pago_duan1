<section class="path">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <i class="fa-duotone fa-house-chimney me-3"></i><a class="p__hover" href="#">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Thông tin thành viên</li>
            </ol>
        </nav>
    </div>
</section>

<section class="page_member" >
    <div class="container py-5">
        <div class="row" id="memberTabs">
            <div class="col-lg-4">
                <div class="page_member__nav">
                    <div class="page_member__represent">
                        <div class="page_member__avartar ">
                            <img src="~/img/no-picture.png" />
                        </div>
                        <div class="page_member__info">
                            <h5 class="page_member__info-name m-0"><?= $_SESSION['auth']['member']['FullName'] ?></h5>
                            <!-- <a href="#" class="page_member__info-link">Chỉnh sửa tài khoản</a> -->
                        </div>
                    </div>
            
                    <ul class="page_member__list-tabs mt-4">
                        <li>
                            <h3 class="page_member__category">
                                Quản lý giao dịch
                            </h3>
                        </li>
                        <li class="ps-3">
                            <a href="#member-tabs-1">
                                <div class="member-icon">
                                    <i class="fa-sharp fa-solid fa-file ms-1"></i>
                                </div>
                                Lịch sử mua hàng
                            </a>
                        </li>
                        
                        <li>
                            <h3 class="page_member__category mt-2">
                                Quản lý tài khoản
                            </h3>
                        </li>
                        <li class="ps-3">
                            <a href="#member-tabs-4">
                                <div class="member-icon">
                                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                </div>
                                Thông tin tài khoản
                            </a>
                        </li>
                        <!-- <li class="ps-3">
                            <a href="#member-tabs-5">
                                <div class="member-icon">
                                    <i class="fa-sharp fa-solid fa-key"></i>
                                </div>
                                Đổi mật khẩu
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="member-tabs-1">
                    <h1 class="page_member__title-tab mb-4 border-bottom">
                        Lịch sử mua hàng
                    </h1>
                    <table class="table table-secondary table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Thông tin mua hàng</th>
                                <th scope="col">Tổng giá trị</th>
                                <th scope="col" style="width: 160px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                foreach($orders as $key => $value): 
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td>
                                        <ul>
                                            <li><b>Họ tên: </b><?= isset($value['fullname']) ? $value['fullname'] : null ?></li>
                                            <li><b>Email: </b><?= isset($value['email']) ? $value['email'] : null ?></li>
                                            <li><b>Số điện thoại: </b><?= isset($value['phone_number']) ? $value['phone_number'] : null ?></li>
                                            <li><b>Địa chỉ nhận hàng: </b><?= isset($value['address']) ? $value['address'] : null ?></li>
                                            <li><b>Trạng thái: </b><?= $status[$value['status']] ?></li>
                                            <li><b>Hình thức thanh toán: </b><?= $payments[$value['payment']] ?></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <b><?= number_format(isset($value['total_amount']) ? $value['total_amount'] : 0) ?> VNĐ</b>
                                    </td>
                                    <td>
                                        <a data-fancybox="" data-type="ajax" href="?controller=Member&action=order_details&id=<?= isset($value['order_id']) ? $value['order_id'] : null ?>" class="btn btn-primary mr-1">Xem chi tiết</a>
                                    </td>
                                </tr>
                            <?php 
                                endforeach; 
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <div id="member-tabs-4">
                    <h1 class="page_member__title-tab mb-4 border-bottom">
                        Thông tin tài khoản
                    </h1>
                    <form class="page_member__form">
                        <div class="row mb-3">
                            <label for="username" class="col-sm-3 col-form-label">Tên truy cập:</label>
                            <div class="col-sm-9">
                                <div class="form-required">
                                    <input type="text" class="form-control" id="username" value="<?= $_SESSION['auth']['member']['Username'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <div class="form-required">
                                    <input type="email" class="form-control" id="email" value="<?= $_SESSION['auth']['member']['Email'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fullname" class="col-sm-3 col-form-label">Họ và tên:</label>
                            <div class="col-sm-9">
                                <div class="form-required">
                                    <input type="text" class="form-control" id="fullname" value="<?= $_SESSION['auth']['member']['FullName'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-3 col-form-label">Điện thoại:</label>
                            <div class="col-sm-9">
                                <div class="form-required">
                                    <input type="text" class="form-control" id="phone" value="<?= $_SESSION['auth']['member']['PhoneNumber'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="mb-3 row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="button_member form-link btn-effect-1">Lưu thông tin</button>
                            </div>
                        </div> -->
                    </form>
                </div>
                <!-- <div id="member-tabs-5">
                    <h1 class="page_member__title-tab mb-4 border-bottom">
                        Đặt lại mật khẩu
                    </h1>
                    <form asp-action="MemberResetPassword" asp-controller="Member" class="page_member__form" id="form-reset-password">
                        <div class="row mb-3">
                            <label for="old-password" class="col-sm-3 col-form-label">Mật khẩu cũ:</label>
                            <div class="col-sm-9">
                                <div class="form-required">
                                    <input type="password" asp-for="OldPassword" placeholder="******" class="form-required form-control" id="old-password">
                                    <span asp-validation-for="OldPassword" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="new-password" class="col-sm-3 col-form-label">Mật khẩu mới:</label>
                            <div class="col-sm-9">
                                <div class="form-required">
                                    <input type="password" asp-for="Password" placeholder="******" class="form-required form-control" id="new-password">
                                    <span asp-validation-for="Password" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="confirm-new-password" class="col-sm-3 col-form-label">Xác nhận mật khẩu:</label>
                            <div class="col-sm-9">
                                <div class="form-required">
                                    <input type="password" asp-for="ConfirmPassword" placeholder="******" class="form-required form-control" id="confirm-new-password">
                                    <span asp-validation-for="ConfirmPassword" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="button_member form-link btn-effect-1">Đổi mật khẩu</button>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</section>
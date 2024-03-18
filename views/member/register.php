<div class="content">
    <section class="path">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <i class="fa-duotone fa-house-chimney me-3"></i><a class="p__hover"
                                                                           href="#">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Đăng Ký</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="register__page">
        <div class="container">
            <div class="form">
                <h4 class="p__orange"><span class="border__bot__orange">ĐĂNG KÝ</span></h4>
                <form method="post" action="?controller=member&action=register_store">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input">
                                <p class="p__red">*</p>
                                <input name="FullName" type="text" placeholder="Họ và tên">
                            </div>
                            <div class="input">
                                <p class="p__red">*</p>
                                <input name="PhoneNumber" placeholder="Điện Thoại">
                            </div>
                            <div class="input">
                                <p class="p__red">*</p>
                                <input name="Email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input">
                                <p class="p__red">*</p>
                                <input name="Username" placeholder="Tên truy cập">
                            </div>
                            <div class="input">
                                <p class="p__red">*</p>
                                <input name="Password" placeholder="Mật khẩu">
                            </div>
                            <div class="input">
                                <p class="p__red">*</p>
                                <input name="ConfirmPassword" placeholder="Xác nhận mật khẩu">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="button">
                                <button type="submit" class="btn"><i class="fa-solid fa-user-plus"></i> Đăng ký</button>
                                <button type="reset" class="btn"><i class="fa-solid fa-arrows-rotate"></i> LÀM LẠI</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
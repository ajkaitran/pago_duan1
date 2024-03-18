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
                <form method="post" asp-action="Register2" asp-controller="Member">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input">
                                <p class="p__red">*</p>
                                <input asp-for="FullName" type="text" placeholder="Họ và tên">
                            </div>
                            <span asp-validation-for="FullName" class="p__red"></span>
                            <div class="input">
                                <p class="p__red">*</p>
                                <input asp-for="Phone" placeholder="Điện Thoại">
                            </div>
                            <span asp-validation-for="Phone" class="p__red"></span>
                            <div class="input">
                                <p class="p__red">*</p>
                                <input asp-for="Address" placeholder="Địa chỉ">
                            </div>
                            <span asp-validation-for="Address" class="p__red"></span>
                            <div class="input">
                                <p class="p__red">*</p>
                                <input asp-for="Email" placeholder="Email">
                            </div>
                            <span asp-validation-for="Email" class="p__red"></span>
                        </div>
                        <div class="col-lg-6">
                            <div class="input">
                                <p class="p__red">*</p>
                                <input asp-for="User" placeholder="Tên truy cập">
                            </div>
                            <span asp-validation-for="User" class="p__red"></span>
                            <div class="input">
                                <p class="p__red">*</p>
                                <input asp-for="Password" placeholder="Mật khẩu">
                            </div>
                            <span asp-validation-for="Password" class="p__red"></span>
                            <div class="input">
                                <p class="p__red">*</p>
                                <input asp-for="ConfirmPassword" placeholder="Xác nhận mật khẩu">
                            </div>
                            <span asp-validation-for="ConfirmPassword" class="p__red"></span>
                            <div class="input">
                                <p class="p__red">*</p>
                                <input class="code-retype" asp-for="Code" type="text" placeholder="Mã bảo mật">
                                <input class="code-input" id="code" readonly>
                                <button class="code-change" type="button" id="generate-code">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </button>
                            </div>
                            <span asp-validation-for="Code" class="p__red"></span>
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
<div class="content">
    <section class="path">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa-duotone fa-house-chimney me-3"></i><a class="p__hover"
                            href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quên mật khẩu</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="login__page">
        <div class="container">
            <div class="form">
                <h4 class="p__orange"><span class="border__bot__orange">QUÊN MẬT KHẨU</span></h4>
                <form method="post" asp-action="" asp-controller="">
                    <div class="input">
                        <p class="p__red">*</p>
                        <input asp-for="Email" placeholder="Email">
                    </div>
                    <span asp-validation-for="Email" class="p__red"></span>
                    <div class="input">
                        <p class="p__red">*</p>
                        <input class="code-retype" asp-for="Code" type="text" placeholder="Mã bảo mật">
                        <input class="code-input" id="code" readonly>
                        <button class="code-change" type="button" id="generate-code">
                            <i class="fa-solid fa-arrows-rotate"></i>
                        </button>
                    </div>
                    <span asp-validation-for="Code" class="p__red"></span>
                    <div class="button">
                        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-paper-plane"></i> GỬI ĐI</button>
                    </div>
                </form>
                <ul>
                    <li><a asp-action="Register" asp-controller="Home" class="p__hover ps-5">Đăng ký</a></li>
                    <span>|</span>
                    <li><a asp-action="Login" asp-controller="Home" class="p__hover">Đăng Nhập</a></li>
                </ul>
            </div>
        </div>
    </section>
</div>
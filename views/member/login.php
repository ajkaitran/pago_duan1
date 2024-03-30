<section class="path">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <i class="fa-duotone fa-house-chimney me-3"></i><a class="p__hover" href="#">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Đăng Nhập</li>
            </ol>
        </nav>
    </div>
</section>
<section class="login__page">
    <div class="container">
        <div class="form">
            <h4 class="p__orange"><span class="border__bot__orange">ĐĂNG NHẬP</span></h4>
            <form action="?controller=member&action=login" method="post">
                <div class="input">
                    <p class="p__red">*</p>
                    <input type="text" name="Username" placeholder="Tên truy cập">
                </div>
                <div class="input">
                    <p class="p__red">*</p>
                    <input type="password" name="Password" placeholder="Mật khẩu">
                </div>
                <div class="button">
                    <button type="submit" name="login" class="btn"><i class="fa-solid fa-user"></i> Đăng nhập</button>
                    <button type="reset" class="btn"><i class="fa-solid fa-arrows-rotate"></i> LÀM LẠI</button>
                </div>
            </form>
            <ul>
                <li><a href="?controller=member&action=register" class="p__hover">Đăng ký</a></li>
            </ul>
        </div>
    </div>
</section>
</div>
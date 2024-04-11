<h2 class="title_page">
   Thêm tài khoản
</h2>
<div class="box_content">
    <form action="?controller=admin&action=AddUser_Form" method="POST" class="row">
        <div class="col-12">
        <div class="form-group d-flex">
                <label for="" class="form_ext">Tên đăng nhập</label>
                <input type="text" name="Username"  class="input-text form-control">
            </div>
            <div class="form-group d-flex">
                <label for="" class="form_ext">Họ và tên</label>
                <input type="text" name="FullName"  class="input-text form-control">
            </div>
            <div class="form-group d-flex">
                <label for="" class="form_ext">Email</label>
                <input  name="Email" type="email"  class="input-text form-control">
            </div>
            <div class="form-group d-flex">
                <label for="" class="form_ext">Số điện thoại</label>
                <input type="text" name="PhoneNumber" class="input-text form-control">
            </div>
            <div class="form-group d-flex">
                <label for="" class="form_ext">Mật khẩu</label>
                <input name="Password" type="password" class="input-text form-control">
            </div>
            <div class="form-group">
                    <button class="btn btn-success" style="margin-left: 175px;" name="them">Thêm mới</button>
                </div>
        </div>
    </form>
</div>
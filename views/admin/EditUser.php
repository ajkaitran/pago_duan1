<h2 class="title_page">
   Thêm tài khoản
</h2>
<div class="box_content">
    <form action="?controller=admin&action=UpdateUser" method="POST" class="row">
        <div class="col-12">
        <input type="hidden" name="id" value="<?= $user['Id'] ?>" /> 
        <div class="form-group d-flex">
                <label for="" class="form_ext">Tên đăng nhập</label>
                <input type="text" name="Username"  class="input-text form-control" value="<?= $user['Username'] ?>">
            </div>
            <div class="form-group d-flex">
                <label for="" class="form_ext">Họ và tên</label>
                <input type="text" name="FullName"  class="input-text form-control" value="<?= $user['FullName'] ?>">
            </div>
            <div class="form-group d-flex">
                <label for="" class="form_ext">Email</label>
                <input  name="Email" type="email"  class="input-text form-control" value="<?= $user['Email'] ?>">
            </div>
            <div class="form-group d-flex">
                <label for="" class="form_ext">Số điện thoại</label>
                <input type="text" name="PhoneNumber" class="input-text form-control" value="<?= $user['PhoneNumber'] ?>" >
            </div>
            <div class="form-group d-flex">
                <label for="" class="form_ext">Mật khẩu</label>
                <input name="Password" type="password" class="input-text form-control" placeholder="Bỏ trống nếu không đổi mật khẩu" >
            </div>
            <div class="form-group">
                    <button class="btn btn-success" style="margin-left: 175px;" name="update">Cập nhật</button>
                </div>
        </div>
    </form>
</div>
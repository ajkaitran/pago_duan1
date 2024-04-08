<div class="box_content">
    <form method="post" action="?controller=admin&action=register_admin">
        <div class="row ">
            <div class="col-6 mx-auto">
                <div class="form-group d-flex">
                    <label for="" class="form_ext">Tên đăng nhập</label>
                    <input type="text" class="input-text form-control w-75" name="Username">
                </div>
                <div class="form-group d-flex">
                    <label for="" class="form_ext">Mật khẩu</label>
                    <input type="text" class="input-text form-control w-75" name="Password">
                </div>
                <div class="form-group d-flex">
                    <label for="" class="form_ext" name="Active">Trạng thái</label>
                    <input type="checkbox">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Thêm mới</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="right-column">
    <div class="formcontent">
        <div class="content p-3">
            <table class="table table-strped mt-4">
                <thead class="thead">
                    <tr>
                        <th scope="col">Tên đăng nhập</th>
                        <th scope="col">Hoạt động</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
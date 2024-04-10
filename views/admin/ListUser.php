<h2 class="title_page">
    Danh sách tài khoản
</h2>
<div class="right-column">
    <div class="formcontent">
        <div class="content p-3">
            <form action="" 
                class="d-none d-sm-inline-block form-inline mr-auto  my-2 my-md-0 mw-100 navbar-search">
                <div class="d-flex">
                    <input name="controller" value="Admin" type="hidden">
                    <input name="action" value="ListUser" type="hidden">
                    <input type="text"  name="keyword" class="form-control bg-light border-0 small"
                        placeholder="Tìm kiếm" aria-label="Search" aria-describedby="basic-addon2">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </form>
            <table class="table table-strped mt-5 ">
                <thead>
                    <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Tên đăng nhập</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="">
                    <div>
                        <?php
                            $stt = 1;
                            foreach ($users as $value) {
                        ?>
                        <tr>
                            <th scope="row"><?= $stt ?></th>
                            <td><?= $value['Username'] ?></td>
                            <td><?= $value['FullName'] ?></td>
                            <td><?= $value['PhoneNumber'] ?></td>
                            <td><?= $value['Email'] ?></td>
                            <td><a href="?controller=Admin&action=EditUser" class="btn btn-primary">Sửa</a>
                        </tr>
                        <?php
                                $stt++;
                            }
                        ?>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
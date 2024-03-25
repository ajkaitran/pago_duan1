<h2 class="title_page">
    Danh sách danh mục
</h2>
<div class="right-column">
    <div class="formcontent">
        <div class="listname">
            <div class="icons">
                <a href="?controller=Admin&action=CategoryProduct">
                    <i class="fa-light fa-circle-plus"></i>
                    <span>Thêm danh mục</span>
                </a>
            </div>
        </div>
        <div class="content p-3">
            <table class="table table-strped mt-4">
                <thead class="thead">
                    <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Image</th>
                        <th scope="col">Slug</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 1;
                    foreach ($listDm as $value) {
                    ?>
                        <tr>
                            <th scope="row"><?= $stt?></th>
                            <td><?= $value['Name'] ?></td>
                            <td><img src="./public/uploads/AnhDanhMuc/<?= $value['Image'] ?>" alt="" style="width: 80px; height: 80px" ></td>
                            <td><?= $value['Slug'] ?></td>
                            <td><a href="?controller=Admin&action=UpdateCategoryProduct&id=<?= $value['Id'] ?>" class="btn btn-primary">Sua</a>  <a href="?controller=Admin&action=DeleteCategoryProduct&id=<?= $value['Id'] ?>" class="btn btn-danger">Xoa</a></td>
                        </tr>
                    <?php
                    $stt++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
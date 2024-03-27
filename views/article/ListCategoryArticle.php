<h2 class="title_page">
    Danh sách danh mục bài viết
</h2>
<div class="right-column">
    <div class="formcontent">
        <div class="listname">
            <div class="icons">
                <a href="?controller=Admin&action=CategoryArticle">
                    <i class="fa-light fa-circle-plus"></i>
                    <span>Thêm danh mục bài viết</span>
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
                    <?php foreach ($listDm as $key => $value) {
                        
                     ?>
                    <tr>
                        <th scope="row"><?= $value['Id'] ?></th>
                        <td><?= $value['Title'] ?></td>
                        <td><img src="./public/uploads/AnhDMBaiViet/<?= $value['Image'] ?>" style="width: 100px; height: 100px;" alt="ảnh logo"></td>
                        <td><?= $value['Slug'] ?></td>
                        <td><a href="?controller=admin&action=UpdateCategoryArticle&id=<?= $value['Id'] ?>" class="btn btn-warning">Sua</a> | <a href="?controller=admin&action=DeleteCategoryArticle&id=<?= $value['Id'] ?>" class="btn btn-danger">Xoa</a>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
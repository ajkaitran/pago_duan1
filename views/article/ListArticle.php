<h2 class="title_page">
    Danh sách bài viết
</h2>
<div class="right-column">
    <div class="formcontent">
        <div class="listname">
            <div class="icons">
                <a href="?controller=Admin&action=Article">
                    <i class="fa-light fa-circle-plus mr-1"></i>
                    <span>Thêm bài viết</span>
                </a>
            </div>
        </div>
        <div class="content p-3">
            <table class="table table-strped mt-5 ">
                <thead>
                    <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Tên bài viết</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php foreach ($listAr as $key => $value) {
                      
                    ?>
                    <tr>
                        <td scope="col"><?= $value['Id'] ?></td>
                        <td scope="col"><?= $value['Title'] ?></td>
                        <td scope="col"><img src="./public/uploads/AnhBaiViet/<?= $value['Image'] ?>" alt="" width="100px" height="100px"></td>
                        <td scope="col"><a href="?controller=admin&action=UpdateArticle&id=<?= $value['Id'] ?>" class="btn btn-warning">Sua</a> | <a href="?controller=admin&action=DeleteArticle&id=<?= $value['Id'] ?>" class="btn btn-danger">Xoa</a></td>
                    </tr>
                    <?php 
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
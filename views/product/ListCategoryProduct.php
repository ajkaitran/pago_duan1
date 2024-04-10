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
        <form action="" 
                class="mt-3 d-none d-sm-inline-block form-inline mr-auto  my-2 my-md-0 mw-100 navbar-search">
                <div class="d-flex">
                    <input name="controller" value="Admin" type="hidden">
                    <input name="action" value="ListCategoryProduct" type="hidden">
                    <input type="text"  name="keyword" class="form-control bg-light border-0 small"
                        placeholder="Tìm kiếm" aria-label="Search" aria-describedby="basic-addon2">
                    
                        <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </form>
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
                            <th scope="row"><?= $stt ?></th>
                            <td><?= $value['Name'] ?></td>
                            <td>
                                <?php if (!empty($value['Image'])) : ?>
                                    <img src="./public/uploads/AnhDanhMuc/<?= $value['Image'] ?>" alt="" style="width: 80px; height: 80px">
                                <?php else : ?>
                                    NO IMAGES
                                <?php endif; ?>
                            </td>
                            <td><?= $value['Slug'] ?></td>
                            <td>
                                <a href="?controller=Admin&action=UpdateCategoryProduct&id=<?= $value['Id'] ?>" class="btn btn-primary">Sua</a> 
                                <a href="?controller=Admin&action=DeleteCategoryProduct&id=<?= $value['Id'] ?>" class="btn btn-danger">Xoa</a>
                            </td>
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
<h2 class="title_page">
    Danh sách sản phẩm
</h2>
<div class="right-column">
    <div class="formcontent">
        <div class="listname">
            <div class="icons">
                <a href="?controller=Admin&action=Product">
                    <i class="fa-light fa-circle-plus mr-1"></i>
                    <span>Thêm sản phẩm</span>
                </a>
            </div>
        </div>
        <div class="content p-3">
            <table class="table table-strped mt-5 ">
                <thead>
                    <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá cả</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="">
                    <div>
                        <?php
                        foreach ($listSp as $key => $value) {
                        $imageNames = explode(',', $value['Image']);
                        ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $value['ten_danhmuc'] ?></td>
                                <td><img src="./public/uploads/AnhSanPham/<?= $imageNames[0] ?>" alt="" style="width: 100px; height: 100px"></td>
                                <td><a href="?controller=admin&action=ProductDetail&Id=<?= $value['Id'] ?>"><?= $value['Name'] ?></a></td>
                                <td>
                                    <h5><?= number_format($value['PriceSale']) ?>VND</h5>
                                    <del><?= number_format($value['Price']) ?>VND</del>
                                </td>
                                <td>
                                    <a href="?controller=Admin&action=UpdateProduct&id=<?= $value['Id'] ?>" class="btn btn-primary">Sua</a> 
                                    <a href="?controller=Admin&action=DeleteProduct&id=<?= $value['Id'] ?>" class="btn btn-danger">Xoa</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
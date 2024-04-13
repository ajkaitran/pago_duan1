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
            <form action=""
                class="mt-3 d-none d-sm-inline-block form-inline mr-auto  my-2 my-md-0 mw-100 navbar-search">
                <div class="d-flex">
                    <input name="controller" value="Admin" type="hidden">
                    <input name="action" value="ListProduct" type="hidden">
                    <input type="text" name="keyword" class="form-control bg-light border-0 small"
                        placeholder="Tìm kiếm" aria-label="Search" aria-describedby="basic-addon2">
                    <select class="bg-light border-1 small" name="CatId">
                        <option value="">Danh mục sản phẩm</option>
                        <?php
                        foreach($listCat as $item){
                         ?>
                        <option value="<?= $item['Id'] ?>"><?= $item['Name'] ?></option>
                        <?php 
                            }
                         ?>
                    </select>
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </form>

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
                            <td><img src="./public/uploads/AnhSanPham/<?= $imageNames[0] ?>" alt=""
                                    style="width: 100px; height: 100px"></td>
                            <td><a
                                    href="?controller=admin&action=ProductDetail&Id=<?= $value['Id'] ?>"><?= $value['Name'] ?></a>
                            </td>
                            <td>
                                <?php if (isset($value['PriceSale']) && !empty($value['PriceSale'])): ?>
                                    <h5><?= number_format($value['PriceSale']) ?>VND</h5>
                                <?php elseif (isset($value['Price']) && !empty($value['Price'])): ?>
                                    <h5><?= number_format($value['Price']) ?>VND</h5>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="?controller=Admin&action=UpdateProduct&id=<?= $value['Id'] ?>"
                                    class="btn btn-primary">Sửa</a>
                                <!-- <a href="?controller=Admin&action=DeleteProduct&id=<?= $value['Id'] ?>"
                                    class="btn btn-danger">Xoa</a> -->
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
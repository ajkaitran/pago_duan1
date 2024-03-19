<h2 class="title_page">
    Danh sách sản phẩm
</h2>
<div class="row right-column">
    <div class="formcontent">
        <div class="listname">
            <div class="icons">
                <a href="http://localhost/pago_duan1/?controller=Admin&action=Product">
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
                        <th scope="col">Mã sản phẩm</th>
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
                                
                            
                        ?>
                        <tr>
                            <th scope="row"><?= $key ?></th>
                            <td><?= $value['id_sp'] ?></td>
                            <td><?= $value['ten_danhmuc'] ?></td>
                            <td><?= $value['img'] ?></td>
                            <td><?= $value['name_sp'] ?></td>
                            <td><?= $value['gia_sp'] ?></td>
                            <td><a href="?controller=Admin&action=UpdateProduct&id=<?= $value['id_sp'] ?>"
                                class="btn btn-warning">Sua</a> | <a
                                href="?controller=Admin&action=DeleteProduct&id=<?= $value['id_sp'] ?>"
                                class="btn btn-danger">Xoa</a></td>
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
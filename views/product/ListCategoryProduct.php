
<div class="row right-column">
  <div class="row headertitle">
    <h1>DANH SÁCH DANH MỤC SẢN PHẨM</h1>
  </div>

  <div class="formcontent">
    <div class="listname">
      <div class="icons">
        <a href="http://localhost/pago_duan1/?controller=Admin&action=CategoryProduct">
          <i class="fa-light fa-circle-plus"></i>
          <span>Danh sách danh mục sản phẩm</span>
        </a>
      </div>
    </div>
    <div class="content">
        <div class="row formtable">
          <table class="table table-strped">
            <thead class="thead">
              <tr>
                <th scope="col">Stt</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Ảnh danh mục</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list_product">
              <?php 
                foreach($listDm as $value) {

              ?>
                <tr>
                    <th scope="row"><?= $value['id_dm'] ?></th>
                    <td><?= $value['ten_dm'] ?></td>
                    <td><?= $value['img'] ?></td>
                    <td><a href="?controller=Admin&action=UpdateCategoryProduct&id=<?= $value['id_dm'] ?>" class="btn btn-warning">Sua</a> | <a href="?controller=Admin&action=DeleteCategoryProduct&id=<?= $value['id_dm'] ?>" class="btn btn-danger">Xoa</a></td>
                </tr>
              <?php 
                  
                }
              ?>
            </tbody>
          </table>
        </div>
    </div>

  </div>
</div>

</div>
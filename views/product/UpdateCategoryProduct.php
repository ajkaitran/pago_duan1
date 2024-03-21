
<div class="row right-column">
        <div class="row headertitle">
            <h1>SUA DANH MỤC SẢN PHẨM</h1>
        </div>

        <div class="formcontent">
            <div class="listname">
                <div class="icons">
                    <a href="?controller=Admin&action=ListCategoryProduct">
                        <i class="fa-duotone fa-list"></i>
                        <span>Danh sách danh mục sản phẩm</span>
                    </a>
                </div>
            </div>

            <form class="form" action="?controller=admin&action=EditCategoryProduct" method="post">
                <div class="danhmuc danhmuc2">
                    Mã danh mục:
                    <input type="hidden" name="id" value="<?= $danhmuc['Id'] ?>">
                </div>
                <div class="danhmuc danhmuc2">
                    Tên danh mục:
                    <input type="text" name="tendm" value="<?= $danhmuc['Name'] ?>">
                </div>
                <div class="danhmuc danhmuc2">
                    Slug:
                    <input type="text" name="slug" value="<?= $danhmuc['Slug'] ?>">
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Nội dung</label>
                    </div>
                    <div class="col-10">
                        <textarea class="input-text form-control" name="desc" id="editor" cols="30" rows="10">
                        <?= $danhmuc['Des'] ?>
                        </textarea>
                    </div>
                </div>
                <div class="danh mucdanhmuc4">
                    <input type="submit" name="sua" value="SUA">
                </div>
            </form>
        </div>
        <div class="fromfooter">
        </div>
    </div>
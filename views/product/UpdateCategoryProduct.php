
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
                    <input type="text" name="ma" value="<?= $danhmuc['id_dm'] ?>">
                </div>
                <div class="danhmuc danhmuc2">
                    Tên danh mục:
                    <input type="text" name="tendm" value="<?= $danhmuc['ten_dm'] ?>">
                </div>
                <div class="danhmuc danhmuc3">
                    Ảnh danh mục:
                    <input type="file" name="img" id="upload">
                </div>
                <input type="hidden" name="imgOld" value="<?= $danhmuc['img'] ?>">
                <div class="danh mucdanhmuc4">
                    <input type="submit" name="sua" value="SUA">
                </div>
            </form>
        </div>
        <div class="fromfooter">
        </div>
    </div>
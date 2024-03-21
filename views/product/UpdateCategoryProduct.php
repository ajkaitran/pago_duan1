
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

            <form class="form" action="?controller=admin&action=EditCategoryProduct" method="post" enctype="multipart/form-data">
                <div class="danhmuc danhmuc2">
                    Mã danh mục:
                    <input type="hidden" name="id" value="<?= $danhmuc['Id'] ?>">
                </div>
                <div class="danhmuc danhmuc2">
                    Tên danh mục:
                    <input type="text" name="tendm" value="<?= $danhmuc['Name'] ?>">
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Hình ảnh</label>
                    </div>
                    <div class="col-10">
                        <div class="w-100">
                            <label class="form__container" id="upload-container">Choose or Drag & Drop Files
                                <input class="form__file" id="upload-files" type="file" accept="image/*" multiple="multiple" name="img" />
                            </label>
                            <div class="form__files-container" id="files-list-container"></div>
                        </div>
                    </div>
                </div>
                <div class="danhmuc danhmuc2">
                    Slug:
                    <input type="text" name="slug" value="<?= $danhmuc['Slug'] ?>">
                </div>
                <input type="hidden" name="imgOld" value="<?= $danhmuc['Image'] ?>">
                <div class="danh mucdanhmuc4">
                    <input type="submit" name="sua" value="SUA">
                </div>
            </form>
        </div>
        <div class="fromfooter">
        </div>
    </div>
<h2 class="title_page">
    Sửa danh mục sản phẩm
</h2>
<div class="box_content">
    <form action="?controller=Admin&action=EditCategoryProduct" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="listname" style="margin-top:-60px;">
                <div class="icons" style="margin-left:-25px;">
                    <a href="?controller=Admin&action=ListCategoryProduct">
                        <i class="fa-light fa-circle-plus mr-1"></i>
                        <span>Danh sách danh mục</span>
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group d-flex">
                    <label for="" class="form_ext">Danh mục cha</label>
                    <select name="dm" id="" class="form-control">
                        <option value="">Chọn danh mục</option>
                        <?= showCategories($ProductCategory) ?>
                    </select>
                </div>
                <div class="form-group d-flex">
                    <label for="" class="form_ext">Tên danh mục</label>
                    <input type="text" class="input-text form-control" value="<?= $danhmuc['Name'] ?>" name="tendm">
                </div>
                <div class="form-group d-flex">
                    <label for="" class="form_ext">Hình ảnh</label>
                    <div class="w-100">
                        <label class="form__container" id="upload-container">Choose or Drag & Drop Files
                            <input class="form__file" id="upload-files" type="file" accept="image/*" multiple="multiple" name="img" />
                        </label>
                        <div class="form__files-container" id="files-list-container">
                            <div class="form__image-container js-remove-image" data-index="0">
                                <img class="form__image" src="./public/uploads/AnhDanhMuc/<?= $danhmuc['Image'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $danhmuc['Id'] ?>">
                <div class="form-group d-flex">
                    <label for="" class="form_ext">Slug</label>
                    <input type="text" class="input-text form-control" name="slug" value="<?= $danhmuc['Slug'] ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" value="SUA" style="margin-left: 175px;" name="sua">Cập nhật</button>
                </div>
            </div>
        </div>
</div>
</form>



<!-- <div class="row right-column">
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
    </div> -->
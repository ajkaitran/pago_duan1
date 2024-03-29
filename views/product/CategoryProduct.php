<h2 class="title_page">
    Thêm danh mục sản phẩm
</h2>
<div class="box_content">
    <form action="?controller=Admin&action=AddCategoryProduct" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="listname" style="margin-top:-60px;">
                <div class="icons" style="margin-left:-25px;">
                    <a href="?controller=Admin&action=ListCategoryProduct">
                        <i class="fa-thin fa-list"></i>
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
                    <!-- <select name="ParentCategoryId" id="" class="form-control">
                        <option value="">Chọn danh mục</option>
                        <?php foreach ($ProductCategory as $key => $value) { ?>
                            <option value="<?= $value['Id'] ?>"><?= $value['Name'] ?></option>
                        <?php } ?>
                    </select> -->
                </div>
                <div class="form-group d-flex">
                    <label for="" class="form_ext">Tên danh mục</label>
                    <input type="text" class="input-text form-control" name="tendm">
                </div>
                <div class="form-group d-flex">
                    <label for="" class="form_ext">Hình ảnh</label>
                    <div class="w-100">
                        <label class="form__container" id="upload-container">Choose or Drag & Drop Files
                            <input class="form__file" id="upload-files" type="file" accept="image/*" multiple="multiple" name="img" />
                        </label>
                        <div class="form__files-container" id="files-list-container"></div>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <label for="" class="form_ext">Slug</label>
                    <input type="text" class="input-text form-control" name="slug">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" style="margin-left: 175px;" name="them">Thêm mới</button>
                </div>
            </div>
        </div>
</div>
</form>
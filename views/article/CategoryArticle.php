<h2 class="title_page">
    Thêm danh mục bài viết
</h2>
<div class="box_content">
    <form action="?controller=Admin&action=AddCategoryArticle" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <div class="form-group d-flex">
                <label for="" class="form_ext">Title</label>
                <input type="text" class="input-text form-control" name="title">
            </div>
            <div class="form-group d-flex">
                <label for="" class="form_ext">Des</label>
                <input type="text" class="input-text form-control" name="desc">
            </div>
            <div class="form-group d-flex">
                <label for="" class="form_ext">Hình ảnh</label>
                <div class="w-100">
                    <label class="form__container" id="upload-container">Choose or Drag & Drop Files
                        <input class="form__file" id="upload-files" type="file" accept="image/*" multiple="multiple"
                            name="img" />
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
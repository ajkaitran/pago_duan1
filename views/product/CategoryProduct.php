<h2 class="title_page">
    Thêm danh mục
</h2>
<div class="box_content">
    <div class="row">
        <div class="col-8">
            <form action="?controller=admin&action=AddCategoryProduct" method="POST" enctype="multipart/form-data">
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Tên danh mục</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="input-text form-control" name="tendm">
                    </div>
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
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Slug</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="input-text form-control" name="slug">
                    </div>
                </div>
                
                <div class="form-group d-flex">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button class="btn btn-success" name="them">Them</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
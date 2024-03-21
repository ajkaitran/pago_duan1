<h2 class="title_page">
    Thêm mới sản phẩm
</h2>
<div class="box_content">
    <div class="row">
        <div class="col-8">
            <form action="?controller=admin&action=AddProduct" method="post" enctype="multipart/form-data">
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Tên sản phẩm</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="ten" class="input-text form-control">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Giá gốc</label>
                    </div>
                    <div class="col-10">
                        <input type="number" name="gia" class="input-text form-control">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Giá giảm giá</label>
                    </div>
                    <div class="col-10">
                        <input type="number" name="giasale" class="input-text form-control">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Đường dẫn</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="slug" class="input-text form-control">
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
                        <label for="" class="label_form">Nội dung</label>
                    </div>
                    <div class="col-10">
                        <textarea class="input-text form-control" name="desc" id="editor" cols="30" rows="10">

                        </textarea>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button class="btn btn-success" name="them">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4">
            <div class="form-group d-flex">
                <div class="col-4">
                    <label for="" class="label_form">Danh mục cha</label>
                </div>
                <div class="col-8">
                    <select name="dm" id="" class="form-control">
                        <option>Chọn danh mục</option>
                        <?php foreach ($listDm as $key => $value) { ?>
                            <option value="<?= $value['Id'] ?>"><?= $value['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group d-flex">
                <div class="col-4">
                    <label for="" class="label_form" style="margin-right: 45px;">Trạng thái</label>
                </div>
                <div class="col-8">
                    <input type="checkbox">
                </div>
            </div>
        </div>
    </div>
</div>
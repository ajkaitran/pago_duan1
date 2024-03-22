<h2 class="title_page">
    Sửa bài viết
</h2>
<div class="box_content">
    <form action="?controller=Admin&action=EditArticle" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8">
            <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Chon danh muc</label>
                    </div>
                    <div class="col-10">
                        <select name="dm" id="" class="form-control">
                            <option>Chọn danh mục</option>
                            <?php foreach ($listDm as $key => $value) { ?>
                                <option <?= $value['Id'] == $articles['ArticleCategoryId'] ? "selected" : "" ?> value="<?= $value['Id'] ?>"><?= $value['Title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>


                </div>
            <div class="form-group d-flex">
                <label for="" class="label_form">Tên bài viết</label>
                <input type="text" class="input-text form-control" name="title" value="<?= $articles['Title'] ?>">
            </div>
            <div class="form-group d-flex">
                <label for="" class="label_form">Hình ảnh</label>
                <div class="w-100">
                    <label class="form__container" id="upload-container">Choose or Drag & Drop Files
                        <input class="form__file" id="upload-files" name="img" type="file" accept="image/*" multiple="multiple" />
                    </label>
                    <div class="form__files-container" id="files-list-container"></div>
                </div>
            </div>
            <div class="form-group d-flex">
                <label for="" class="label_form">Nội dung</label>
                <textarea class="input-text form-control" name="content" id="editor" cols="30" rows="10">
                <?= $articles['Content'] ?>
                </textarea>
            </div>
            <input type="hidden" name="id" value="<?= $articles['Id'] ?>">
            <input type="hidden" name="imgOld" value="<?= $articles['Image'] ?>">
            <!-- <div class="form-group d-flex">
                <button class="btn btn-success offset-2" style="margin-left: 128px;" name="sua">Sửa</button>

            </div> -->
        </div>
        <div class="col-4">
            <div class="form-group d-flex">
                <label for="" class="label_form" style="margin-right: 45px;">Trạng thái</label>
                <input type="checkbox"  name="active" value="1" checked>
            </div>
        </div>
        <div class="form-group d-flex">
                <button class="btn btn-success offset-2" style="margin-left: 128px;" name="sua">Sửa</button>

            </div>
    </div>
    </form>
</div>
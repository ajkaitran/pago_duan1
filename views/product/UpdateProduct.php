<h2 class="title_page">
    Sửa sản phẩm
</h2>
<div class="box_content">
    <div class="row">
        <!-- <div class="listname" style="margin-top:-60px;">
            <div class="icons" style="margin-left:-25px;">
            <a href="?controller=Admin&action=ListCategoryProduct">
                <i class="fa-thin fa-list"></i>
                    <span>Danh sách danh mục</span>
                </a>
        </div> -->
        <div class="col-8">
            <form action="?controller=admin&action=EditProduct" method="post" enctype="multipart/form-data">
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Chon danh muc</label>
                    </div>
                    <div class="col-10">
                        <select name="dm" id="" class="form-control">
                            <option>Chọn danh mục</option>
                            <?php foreach ($listDm as $key => $value) { ?>
                            <option <?= ($value['Id'] == $product['ProductCategoryId'] ? 'selected' : "") ?>
                                value="<?= $value['Id'] ?>"><?= $value['Name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Tên sản phẩm</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="ten" class="input-text form-control" value="<?= $product['Name'] ?>">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Giá gốc</label>
                    </div>
                    <div class="col-10">
                        <input type="number" name="gia" class="input-text form-control"
                            value="<?= $product['Price'] ?>">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Giá giảm giá</label>
                    </div>
                    <div class="col-10">
                        <input type="number" name="giasale" class="input-text form-control"
                            value="<?= $product['PriceSale'] ?>">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Đường dẫn</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="slug" class="input-text form-control" value="<?= $product['Slug'] ?>">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Hình ảnh</label>
                    </div>
                    <div class="col-10">
                        <div class="w-100">
                            <label class="form__container" id="upload-container">Choose or Drag & Drop Files
                                <input class="form__file" id="upload-files" type="file" accept="image/*"
                                    multiple="multiple" name="img[]" />
                            </label>
                            <div class="form__files-container" id="files-list-container">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="imgOld" value="<?= $product['Image'] ?>">
                <input type="hidden" name="id" value="<?= $product['Id'] ?>">
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Nội dung</label>
                    </div>
                    <div class="col-10">
                        <textarea class="input-text form-control" name="desc" id="editor" cols="30" rows="10">
                       <?= $product['Des'] ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button class="btn btn-success" name="sua">Sửa</button>
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
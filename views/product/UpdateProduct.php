
<h2 class="title_page">
    Sửa sản phẩm
</h2>
<div class="box_content">
    <div class="row">
        <div class="col-8">
            <form action="?controller=admin&action=EditProduct" method="post">
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Danh mục cha</label>
                    </div>
                    <div class="col-10">
                        <select name="dm" id="" class="form-control">
                            <option>Chọn danh mục</option>
                            <?php foreach ($listDm as $key => $value) { ?>
                                <option <?= ($value['Id'] == $product['ProductCategoryId'] ? 'selected' : '') ?> value="<?= $value['Id'] ?>"><?= $value['Name'] ?></option>

                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Tên</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="ten" class="input-text form-control" value="<?= $product['Name'] ?>">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Gia</label>
                    </div>
                    <div class="col-10">
                        <input type="number" name="gia" class="input-text form-control" value="<?= $product['Price'] ?>">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Gia Sale</label>
                    </div>
                    <div class="col-10">
                        <input type="number" name="giasale" class="input-text form-control" value="<?= $product['PriceSale'] ?>">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Slug</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="slug" class="input-text form-control" value="<?= $product['Slug'] ?>">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">Active</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="active" class="input-text form-control" value="<?= $product['Active'] ?>">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-2">
                        <label for="" class="label_form">CreatedAt</label>
                    </div>
                    <div class="col-10">
                        <input type="datetime-local" name="date" class="input-text form-control">
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
                        <?= $product['Des'] ?>
                        </textarea>
                    </div>
                </div>
                
                <input type="hidden" name="imgOld" value="<?= $product['Image'] ?>">
                <input type="hidden" name="id" value="<?= $product['Id'] ?>">
                <div class="form-group d-flex">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button class="btn btn-success" name="sua">Sửa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
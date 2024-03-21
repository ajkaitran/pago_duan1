<h2 class="title_page">
    Thêm danh mục
</h2>
<div class="box_content">
    <div class="row">
        <div class="col-8">
            <form action="?controller=admin&action=AddCategoryProduct" method="POST">
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
                        <label for="" class="label_form">Slug</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="input-text form-control" name="slug">
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
                        <button class="btn btn-success" name="them">Them</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
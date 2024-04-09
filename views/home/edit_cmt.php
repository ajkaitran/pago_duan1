<form action="?controller=home&action=update_cmt" method="post" style="width: 500px;">
    <input type="hidden" name="id" value="<?= $cmt['Id'] ?>" />
    <input type="hidden" name="product_id" value="<?= $cmt['ProductId'] ?>" />
    <div class="form-group mb-3">
        <label for="cmt" class="form-label">Bình luận</label>
        <input class="form-control" id="cmt" name="content" value="<?= $cmt['Content'] ?>" />
    </div>
    <button type="submit" class="btn btn-primary">
        Cập nhật
    </button>
</form>
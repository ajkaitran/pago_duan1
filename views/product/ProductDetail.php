<div class="product__detail">
    <div class="row">
        <div class="col-md-5 ">
            <div class="slide__images">
                <?php
                $imageNames = explode(',', $productDetail['Image']);
                foreach ($imageNames as $imageName) {
                ?>
                    <div>
                        <img src="./public/uploads/AnhSanPham/<?= $imageName ?>" alt="">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-7">
            <h3><?= $productDetail['Name'] ?></h3>
            <div class="d-flex" style="gap:20px">
                <h3 class="new__price">
                    <?= number_format($productDetail['PriceSale'], 0, ',', '.') ?>đ</h3>
                <del class="old__price"><?= number_format($productDetail['Price'], 0, ',', '.') ?>đ</del>
            </div>
            <div class="text-gray">
                Ngày thêm:
                <?= $productDetail['CreatedAt'] ?>
            </div>
            <div class="alert alert-secondary">
                <?= $productDetail['Des'] ?>
            </div>
            <div style="height: 150px; overflow: auto;">
                <?= $productDetail['Content'] ?>
            </div>
        </div>
    </div>
</div>
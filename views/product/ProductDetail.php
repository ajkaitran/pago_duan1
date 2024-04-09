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

            <div class="slide__images__nav">
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
                <h3 class="new__price my-4">
                    <?= number_format($productDetail['PriceSale'], 0, ',', '.') ?>đ</h3>
                <del class="old__price my-4"><?= number_format($productDetail['Price'], 0, ',', '.') ?>đ</del>
            </div>
            <div>
                <p>
                    <?= $productDetail['Des'] ?>
                </p>
            </div>
        </div>
    </div>
</div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body ">
                <div class="px-4 py-5">
                    <h3 class="text-uppercase">Đơn hàng số #<?= isset($order['order_id']) ? $order['order_id'] : null ?></h3>
                    
                    <?php foreach($order_items as $item): ?>
                        <div class="mb-3">
                            <div class="media">
                                <img src="./public/uploads/AnhSanPham/<?= isset($item['Image']) ? $item['Image'] : null ?>" class="mr-3" alt="" style="width: 100px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><?= isset($item['Name']) ? $item['Name'] : null ?></h5>
                                    <p><?= isset($item['quantity']) ? $item['quantity'] : 0 ?> x <?= number_format(isset($item['price']) ? $item['price'] : 0) ?> VNĐ</p>
                                </div>
                            </div>
                            <hr class="new1">
                        </div>
                    <?php endforeach; ?>

                    <div class="d-flex justify-content-between">
                        <span class="font-weight-bold">Tạm tính(SL: <?= isset($total_quantity) ? $total_quantity : 0 ?>)</span>
                        <span class="text-muted"><?= number_format(isset($order['total_amount']) ? $order['total_amount'] : 0) ?> VNĐ</span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <small>Phí vận chuyển</small>
                        <small><?= number_format(isset($ship_fee) ? $ship_fee : 0) ?> VNĐ</small>
                    </div>
                    
                    <h5 class="d-flex justify-content-between mt-3">
                        <span class="font-weight-bold">Tổng tiền</span>
                        <span class="font-weight-bold theme-color"><?= number_format($order['total_amount'] + $ship_fee) ?> VNĐ</span>
                    </h5>  

                    <div class="text-center mt-5">
                        <a href="?controller=Admin&action=list_order" class="btn btn-primary">Quay lại danh sách</a>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
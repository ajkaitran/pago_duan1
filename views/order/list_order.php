<div class="bg-light p-5">
<h1 class="mb-5">Quản lý đơn hàng</h1>
<table class="table table-dark table-striped">
<thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Thông tin mua hàng</th>
    <th scope="col">Trạng thái</th>
    <th scope="col" style="width: 300px;">Hoạt động</th>
    </tr>
</thead>
<tbody>
    <?php 
        $i = 1;
        foreach($orders as $key => $value): 
    ?>
        <tr>
            <th scope="row"><?= $i++ ?></th>
            <td>
                <ul>
                    <li><b>Họ tên: </b><?= isset($value['fullname']) ? $value['fullname'] : null ?></li>
                    <li><b>Email: </b><?= isset($value['email']) ? $value['email'] : null ?></li>
                    <li><b>Số điện thoại: </b><?= isset($value['phone_number']) ? $value['phone_number'] : null ?></li>
                    <li><b>Địa chỉ nhận hàng: </b><?= isset($value['address']) ? $value['address'] : null ?></li>
                    <li><b>Hình thức thanh toán: </b><?= $payments[$value['payment']] ?></li>
                </ul>
            </td>
            <td>
                <select class="form-control" onchange="$(`[name='status']`).val($(this).val());">
                    <?php foreach($status as $keyS => $valueS): ?>
                        <option <?= $keyS == $value['status'] ? "selected" : null ?> value="<?= $keyS ?>"><?= $valueS ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td class="d-flex align-items-center">
                <form class="mr-1" action="?controller=Admin&action=update_order" method="post">
                    <input type="hidden" name="order_id" value="<?= isset($value['order_id']) ? $value['order_id'] : null ?>" />
                    <input type="hidden" name="status" value="<?= isset($value['status']) ? $value['status'] : null ?>" />
                    <button name="update_order" type="submit" class="btn btn-success">Cập nhật</button>
                </form>
                <a href="?controller=Admin&action=order_details&id=<?= isset($value['order_id']) ? $value['order_id'] : null ?>" class="btn btn-primary mr-1">Xem chi tiết</a>
                <a href="?controller=Admin&action=remove_order&id=<?= isset($value['order_id']) ? $value['order_id'] : null ?>" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
    <?php 
        endforeach; 
    ?>
</tbody>
</table>
</div>
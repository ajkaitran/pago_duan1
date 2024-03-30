<h2 class="title_page">
    Danh sách bình luận
</h2>
<div class="right-column">
    <div class="formcontent">
        <div class="content p-3">
            <table class="table table-strped mt-5 ">
                <thead>
                    <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Nội dung bình luận</th>
                        <th scope="col">Thời gian bình luận</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="">
                    <div>
                    <?php
                        foreach ($listComment as $key => $value) {
                        ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $value['Content'] ?></td>
                                <td><?= $value['CreatedAt'] ?></td>
                                <td><a href="?controller=Admin&action=DeleteComment&id=<?= $value['Id'] ?>" class="btn btn-danger">Xóa </a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
<main>
    <div class="d-flex align-items-center justify-content-between">
        <h2>Danh sách người dùng</h2>

    </div>
    <form action="" method="GET">
        <div class="mt-3 row">
            <div class="col-lg-7 col-md-12 d-flex align-items-center gap-2">
                <input value="<?= $allQuery['search'] ?? '' ?>" name="search" placeholder="Nhập người dùng cần tìm..." type="text" class="form-control">
                <button class="btn btn-primary flex-shrink-0 px-4">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <table class="table mt-4">
        <thead>
            <tr>
                <th width="8%">STT</th>
                <th width="20%">Họ tên</th>
                <th>Ảnh đại diện</th>
                <th width="20%">Email</th>
                <th>Trạng thái</th>
                <th width="20%">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allUser as $key => $user) :  ?>

                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $user['fullname'] ?></td>
                    <td>
                        <img class="avatar border-0" style="border-radius: 50%; object-fit: cover; " width="40" height="40" src="<?= !isset($user['avatar']) ? pathCommon('assets/img/avatar.jpg') : getImage($user['avatar']) ?>" alt="">
                    </td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <?php if ($user['status'] == 0) : ?>
                            <button class="btn btn-sm btn-success">Hoạt động</button>
                        <?php else : ?>
                            <button class="btn btn-sm btn-warning">Vô hiệu hóa</button>
                        <?php endif ?>
                    </td>
                    <td>
                        <a class="btn btn-sm  <?= $user['status'] == 0 ? 'btn-warning' : 'btn-primary' ?> " href="<?= route('admin/vo-hieu-hoa-nguoi-dung/' . $user['id']) ?>">
                            <i class="ri-spam-3-line"></i>
                            <?= $user['status'] == 0 ? 'Vô hiệu hóa' : 'Mở vô hiệu hóa' ?>
                        </a>
                        <a onclick="confirmDelete(event, <?= $user['id'] ?>)" class="btn btn-sm btn-danger confirm-delete-<?= $user['id'] ?>" href="<?= route('admin/xoa-tai-khoan-nguoi-dung/' . $user['id']) ?>">
                            <i class='bx bxs-trash-alt'></i>
                            Xóa tài khoản
                        </a>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>


</main>
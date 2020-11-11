<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col col-md-12 mt-2">
    <!-- add data user -->
    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addData">
        Add Data User
    </button>
    <!-- Modal add data user -->
    <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_data _user" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="employee_id">Employee ID</label>
                            <input type="text" name="employee_id" id="employee_id" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">--- Select Role ---</option>
                                <option value="1">1 - Admin</option>
                                <option value="2">2 - User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">--- Select Status ---</option>
                                <option value="0">0 - Tidak Aktif</option>
                                <option value="1">1 - Aktif</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Data User</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col col-md-12 mt-4">
    <!-- show data -->
    <table class="table table-hover table-bordered" id="data_user">
        <thead>
            <tr>
                <th class="text-center" scope="col">Nomor</th>
                <th scope="col">Employee ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($user as $u) { ?>
                <tr>
                    <td width="10px" class="text-center"><?= $i; ?></td>
                    <td><?= $u['employee_id']; ?></td>
                    <td><?= $u['name']; ?></td>
                    <td><?= $u['email']; ?></td>
                    <td><?= $u['role_id']; ?></td>
                    <td><?= $u['status']; ?></td>
                    <td width="10px">
                        <button type="button" class="btn btn-info btn-sm ml-2 edit_data_user" data-toggle="modal" data-target="#edit_user<?= $i; ?>">
                            Edit
                        </button>
                        <!-- Modal edit data user -->
                        <div class="modal fade" id="edit_user<?= $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit_data_user" method="post">
                                            <?= csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="edit_password">Password</label>
                                                <input type="password" name="password" id="edit_password" class="form-control" autocomplete="off" value="<?= $u['password']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_role_id">Role</label>
                                                <select name="role_id" id="edit_role_id" class="form-control">
                                                    <option value="">--- Select Role ---</option>
                                                    <option value="1">1 - Admin</option>
                                                    <option value="2">2 - User</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_status"></label>
                                                <select name="status" id="edit_status" class="form-control">
                                                    <option value="">--- select Status --</option>
                                                    <option value="0">0 - Tidak Aktif</option>
                                                    <option value="1">1 - Aktif</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info">Edit Data User</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php }; ?>

        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>
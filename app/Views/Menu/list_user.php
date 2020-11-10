<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col col-md-3 mt-2">
    <div class="form-group">
        <input type="text" class="form-control" name="search" id="search" placeholder="Search Data User" autocomplete="off">
    </div>
</div>
<div class="col col-md-12">
    <table class="table table-hover table-bordered">
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
        <tbody id="list_user">
            <!-- list User -->
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>
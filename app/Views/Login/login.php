<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="card modal-sm ml-auto mr-auto">
        <div class="card-body">
            <div class="modal-header text-center">
                <h3 class="ml-auto mr-auto"><strong>Please Login</strong></h3>
            </div>
            <form id="login" method="post">
                <?= csrf_field(); ?>
                <div class="form-group mt-3">
                    <label for="id">ID Employee / Email</label>
                    <input type="text" class="form-control not-found-id" id="id" name="id" value="<?= old('id'); ?>" />
                    <small id="not-found-id" class="error_id invalid-feedback"></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control not-found-password" id="password" name="password" />
                    <small id="not-found-password" class="error_password invalid-feedback"></small>
                </div>
                <button type="submit" class="btn btn-success button mt-2"><strong>Login</strong></button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
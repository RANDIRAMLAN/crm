<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-3">
    <?php if (session()->getFlashdata('msg')) { ?>
        <div class="alert alert-info text-center" role="alert">
            <?= session()->getFlashdata('msg'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }; ?>
    <form action="/Import/import_data_postal_code" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <h3><strong class="text-success">Import Postal Code</strong></h3>
            <label for="import_postal_code"><strong>Select File</strong></label>
            <br>
            <input type="file" id="import_postal_code" name="import_postal_code" class="<?= ($validation->hasError('import_postal_code')) ? 'is-invalid' : ''; ?>">
            <button type="submit" class="btn btn-success btn-sm">Import</button>
            <br>
            <small class="invalid-feedback"><?= $validation->getError('import_postal_code'); ?></small>
        </div>
    </form>
    <hr>
</div>
<?= $this->endSection(); ?>
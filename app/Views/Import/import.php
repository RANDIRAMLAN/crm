<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="/css/crm.css">

    <title><?= $title; ?></title>
</head>

<body>
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
    <script type="text/javascript" src="/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="/js/ajax.js"></script>
</body>

</html>
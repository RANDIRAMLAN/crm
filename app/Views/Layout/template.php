<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/crm.css">

    <title><?= $judul; ?></title>
</head>

<body>
    <?= $this->include('Layout/navbar'); ?>
    <?= $this->renderSection('content'); ?>

    <script type="text/javascript" src="/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
</body>

</html>
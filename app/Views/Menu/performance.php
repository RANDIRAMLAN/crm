<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">Pending</th>
                <th scope="col">Progress</th>
                <th scope="col">Done</th>
                <th scope="col">Submit</th>
                <th scope="col">Total</th>
                <th colspan="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td><?= $pending; ?></td>
                <td><?= $progress; ?></td>
                <td><?= $done; ?></td>
                <td><?= $submit; ?></td>
                <td><?= $total; ?></td>
                <td>
                    <button class="btn btn-outline-success btn-sm">Export</button></caption>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>
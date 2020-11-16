<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col col-md-12 mt-4">
    <div class="row">
        <div class="col col-md-10">
            <!-- add data user -->
            <a href="" type="button" class="btn btn-success btn-sm">
                Add Complaint
            </a>
        </div>
        <div class="col col-md-2">
            <?= csrf_field(); ?>
            <form action="post">
                <div class="form-group">
                    <input type="text" class="form-control btn-sm" name="search" id="search_data_complaint" autocomplete="off" placeholder="Search Data Complaint">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col col-md-12 mt-n2">
    <!-- show data -->
    <table class="table table-hover table-bordered" id="data_complaint">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th scope="col">Complaint</th>
                <th scope="col">Complaint Description</th>
                <th scope="col">To</th>
                <th scope="col">Status</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="list_complaint">
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>
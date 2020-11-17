<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col col-md-12 mt-4">
    <div class="row">
        <div class="col col-md-10">
            <!-- search data comolint -->
            <a href="/Complaint/add_data_complaint" type="button" class="btn btn-success btn-sm">
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
                <th scope="col">Company</th>
                <th scope="col">Complaint</th>
                <th scope="col">To</th>
                <th scope="col">Status</th>
                <th colspan="3" class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="list_complaint">
        </tbody>
    </table>
    <!-- edit data complaint -->
    <div class="modal fade" id="editScreenComplaint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Screen Complaint</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit_screen_complaint" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="screen_complaint">Screen Complaint</label>
                            <input type="hidden" name="id" id="id">
                            <input type="file" class="form-control-file" name="screen_complaint" id="screen_complaint">
                            <small class="error_screen_complaint invalid-feedback"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn_screen_complaint">Upload Screen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal for information -->
    <div class="modal fade" id="information_screen_complaint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body ml-auto mr-auto">
                    <strong>
                        <p id="msg_screen_complaint"></p>
                    </strong>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
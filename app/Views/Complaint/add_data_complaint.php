<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col col-md-12 mt-2">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="text-center mt-4">
                    <h5 class="modal-title"><strong>Add Data Complaint</strong></h5>
                </div>
                <form id="add_data_complaint" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" name="company" id="company" class="form-control ">
                            <small class=" error_company invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" autocomplete="off">
                            <small class="error_phone_number invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" autocomplete="off">
                            <small class="error_email invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="complaint">Complaint</label>
                            <input type="text" name="complaint" id="complaint" class="form-control" autocomplete="off">
                            <small class="error_complaint invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="complaint_desc">Complaint Description</label>
                            <textarea name="complaint_desc" id="complaint_desc" cols="30" rows="10" class="form-control" autocomplete="off"></textarea>
                            <small class="error_complaint_desc invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="to_do">To</label>
                            <input type="text" name="to_do" id="to_do" class="form-control">
                            <small class="error_to_do invalid-feedback"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save Data Complaint</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal for information -->
    <div class="modal fade" id="information_complaint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body ml-auto mr-auto">
                    <strong>
                        <p id="msg_complaint" class="text-center"></p>
                    </strong>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
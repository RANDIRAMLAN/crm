<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col col-md-12 mt-2">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="text-center mt-4">
                    <h5 class="modal-title"><strong>Edit Data Complaint</strong></h5>
                </div>
                <form id="edit_data_complaint" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="edit_id" value="<?= $complaint['id']; ?>">
                            <label for="edit_company">Company</label>
                            <input type="text" name="company" id="edit_company" class="form-control " disabled value="<?= $complaint['company']; ?>">
                            <small class=" error_edit_company invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="edit_phone_number" class="form-control" autocomplete="off" disabled value="<?= $complaint['phone_number']; ?>">
                            <small class="error_edit_phone_number invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="text" name="email" id="edit_email" class="form-control" autocomplete="off" disabled value="<?= $complaint['email']; ?>">
                            <small class="error_edit_email invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_complaint">Complaint</label>
                            <input type="text" name="complaint" id="edit_complaint" class="form-control" autocomplete="off" disabled value="<?= $complaint['complaint']; ?>">
                            <small class="error_edit_complaint invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_complaint_desc">Complaint Description</label>
                            <textarea name="complaint_desc" id="edit_complaint_desc" cols="30" rows="10" class="form-control" autocomplete="off" disabled><?= $complaint['complaint_desc']; ?></textarea>
                            <small class="error_edit_complaint_desc invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_status">Status</label>
                            <select name="status" id="edit_status" class="custom-select">
                                <option value="">Select Status Data</option>
                                <option value="Pending">Pending</option>
                                <option value="Progress">Progress</option>
                                <option value="Done">Done</option>
                                <option value="Submit">Submit</option>
                                <option value="Close">Close</option>
                            </select>
                            <small class="error_edit_status invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_to_do">To</label>
                            <input type="text" name="to_do" id="edit_to_do" class="form-control" disabled value="<?= $complaint['to_do']; ?>">
                            <small class="error_edit_to_do invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_solution">Solution</label>
                            <textarea name="solution" id="edit_solution" cols="30" rows="10" class="form-control"><?= $complaint['solution']; ?></textarea>
                            <small class="error_edit_solution invalid-feedback"></small>
                        </div>
                        <!-- Button modal screen error -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#screenComplaint">
                            Screen Complaint
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#screenFix">
                            Screen Fix
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Edit Data Complaint</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal show screen Error -->
    <div class="modal fade" id="screenComplaint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Screen Complaint
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ml-auto mr-auto">
                    <div class="card">
                        <img src="/img/Complaint/<?= $complaint['screen_complaint']; ?>" class="card-img-top" alt="" />
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal show screen fix -->
    <div class="modal fade" id="screenFix" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Screen Fix
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ml-auto mr-auto">
                    <div class="card">
                        <img src="/img/Complaint/<?= $complaint['screen_fix']; ?>" class="card-img-top" alt="" />
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal for information -->
    <div class="modal fade" id="information_edit_data_complaint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body ml-auto mr-auto">
                    <strong>
                        <p id="msg_edit_data_complaint" class="text-center"></p>
                    </strong>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
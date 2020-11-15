<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col col-md-12 mt-2">
    <!-- add data user -->
    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addDataCustomer">
        Add Data Customer
    </button>
    <!-- Modal add data user -->
    <div class="modal fade" id="addDataCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_data_customer" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" name="company" id="company" class="form-control" autocomplete="off" value="<?= old('company'); ?>">
                            <small class="error_company invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="owner">Owner</label>
                            <input type="text" name="owner" id="owner" class="form-control" autocomplete="off" value="<?= old('owner'); ?>">
                            <small class="error_owner invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" autocomplete="off" value="<?= old('phone_number'); ?>">
                            <small class="error_phone_number invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" autocomplete="off" value="<?= old('email'); ?>">
                            <small class="error_email invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" cols="30" rows="3" class="form-control"><?= old('address'); ?></textarea>
                            <small class="error_address invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select name="country" id="country" class="custom-select">
                                <option value="<?= old('country'); ?>"><?= (old('country')) ? old('country') : 'Select Country'; ?></option>
                                <?php foreach ($country as $co) { ?>
                                    <option value="<?= $co['country']; ?>"><?= $co['country']; ?></option>
                                <?php }; ?>
                            </select>
                            <small class="error_country invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="province">Province</label>
                            <select name="province" id="province" class="custom-select">
                                <option value="<?= old('province'); ?>"><?= (old('province')) ? old('province') : 'Select Province'; ?></option>
                            </select>
                            <small class="error_province invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" id="city" class="custom-select">
                                <option value="<?= old('city'); ?>"><?= (old('city')) ? old('city') : 'Select City'; ?></option>
                            </select>
                            <small class="error_city invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="district">District</label>
                            <select name="district" id="district" class="custom-select">
                                <option value="<?= old('district'); ?>"><?= (old('district')) ? old('district') : 'Select district'; ?></option>
                            </select>
                            <small class="error_district invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="sub_district">Sub District</label>
                            <select name="sub_district" id="sub_district" class="custom-select">
                                <option value="<?= old('sub_district'); ?>"><?= (old('sub_district')) ? old('sub_district') : 'Select Sub District'; ?></option>
                            </select>
                            <small class="error_sub_district invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <select name="postal_code" id="postal_code" class="custom-select">
                                <option value="<?= old('postal_code'); ?>"><?= (old('postal_code')) ? old('postal_code') : 'Select Postal Code'; ?></option>
                            </select>
                            <small class="error_postal_code invalid-feedback"></small>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Data Customer</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col col-md-12 mt-4">
    <!-- show data -->
    <table class="table table-hover table-bordered table-responsive" id="data_customer">
        <thead>
            <tr>
                <th class="text-center" scope="col">Nomor</th>
                <th scope="col">Company</th>
                <th scope="col">Owner</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Country</th>
                <th scope="col">Province</th>
                <th scope="col">City</th>
                <th scope="col">District</th>
                <th scope="col">Sub District</th>
                <th scope="col">Postal Code</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="list_customer">
            <?php $i = 1; ?>
            <?php foreach ($customer as $c) { ?>
                <tr>
                    <td width="10px" class="text-center"><?= $i; ?></td>
                    <td><?= $c['company']; ?></td>
                    <td><?= $c['owner']; ?></td>
                    <td><?= $c['phone_number']; ?></td>
                    <td><?= $c['email']; ?></td>
                    <td><?= $c['address']; ?></td>
                    <td><?= $c['country']; ?></td>
                    <td><?= $c['province']; ?></td>
                    <td><?= $c['city']; ?></td>
                    <td><?= $c['district']; ?></td>
                    <td><?= $c['sub_district']; ?></td>
                    <td><?= $c['postal_code']; ?></td>
                    <td class="text-center" width="10px">
                        <a href="javascript:void(0)" class="btn btn-info btn-sm edit_data_customer" data-id="<?= $c['id']; ?>" data-company=" <?= $c['company']; ?>" data-owner="<?= $c['owner']; ?>" data-phone_number="<?= $c['phone_number']; ?>" data-email="<?= $c['email']; ?>" data-address="<?= $c['address']; ?>" data-country="<?= $c['country']; ?>" data-province="<?= $c['province']; ?>" data-city="<?= $c['city']; ?>" data-district="<?= $c['district']; ?>" data-sub_district="<?= $c['sub_district']; ?>" data-postal_code="<?= $c['postal_code']; ?>">
                            Edit
                        </a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php }; ?>

        </tbody>
    </table>
    <!-- Modal edit data user -->
    <div class="modal fade" id="editDataCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_data_customer" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" id="edit_id" name="id">
                        <input type="hidden" id="old_country" name="old_country">
                        <input type="hidden" name="old_province" id="old_province">
                        <input type="hidden" name="old_city" id="old_city">
                        <input type="hidden" name="old_district" id="old_district">
                        <input type="hidden" name="old_sub_district" id="old_sub_district">
                        <input type="hidden" name="old_postal_code" id="old_postal_code">
                        <div class="form-group">
                            <label for="edit_company">Company</label>
                            <input type="text" name="company" id="edit_company" class="form-control" autocomplete="off" value="<?= old('company'); ?>">
                            <small class="error_edit_company invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_owner">Owner</label>
                            <input type="text" name="owner" id="edit_owner" class="form-control" autocomplete="off" value="<?= old('owner'); ?>">
                            <small class="error_edit_owner invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="edit_phone_number" class="form-control" autocomplete="off" value="<?= old('phone_number'); ?>">
                            <small class="error_edit_phone_number invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="email" name="email" id="edit_email" class="form-control" autocomplete="off" value="<?= old('email'); ?>">
                            <small class="error_edit_email invalid-feedback"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_address">Address</label>
                            <textarea name="address" id="edit_address" cols="30" rows="3" class="form-control"><?= old('address'); ?></textarea>
                            <small class="error_edit_address invalid-feedback"></small>
                        </div>
                        <!-- hide or show -->
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div id="headingOne">
                                    <h3 class="mb-0">
                                        <button class="btn btn-block text-left text-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Detail
                                        </button>
                                    </h3>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="edit_country">Country</label>
                                            <select name="country" id="edit_country" class="custom-select">
                                                <option value="<?= old('country'); ?>"><?= (old('country')) ? old('country') : 'Select Country'; ?></option>
                                                <?php foreach ($country as $co) { ?>
                                                    <option value="<?= $co['country']; ?>"><?= $co['country']; ?></option>
                                                <?php }; ?>
                                            </select>
                                            <small class="error_edit_country invalid-feedback"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_province">Province</label>
                                            <select name="province" id="edit_province" class="custom-select">
                                                <option value="<?= old('province'); ?>"><?= (old('province')) ? old('province') : 'Select Province'; ?></option>
                                            </select>
                                            <small class="error_edit_province invalid-feedback"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_city">City</label>
                                            <select name="city" id="edit_city" class="custom-select">
                                                <option value="<?= old('city'); ?>"><?= (old('city')) ? old('city') : 'Select City'; ?></option>
                                            </select>
                                            <small class="error_edit_city invalid-feedback"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_district">District</label>
                                            <select name="district" id="edit_district" class="custom-select">
                                                <option value="<?= old('district'); ?>"><?= (old('district')) ? old('district') : 'Select district'; ?></option>
                                            </select>
                                            <small class="error_edit_district invalid-feedback"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_sub_district">Sub District</label>
                                            <select name="sub_district" id="edit_sub_district" class="custom-select">
                                                <option value="<?= old('sub_district'); ?>"><?= (old('sub_district')) ? old('sub_district') : 'Select Sub District'; ?></option>
                                            </select>
                                            <small class="error_edit_sub_district invalid-feedback"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_postal_code">Postal Code</label>
                                            <select name="postal_code" id="edit_postal_code" class="custom-select">
                                                <option value="<?= old('postal_code'); ?>"><?= (old('postal_code')) ? old('postal_code') : 'Select Postal Code'; ?></option>
                                            </select>
                                            <small class="error_edit_postal_code invalid-feedback"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Edit Data Customer</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal for information -->
    <div class="modal fade" id="information_customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body ml-auto mr-auto">
                    <strong>
                        <p id="msg_customer"></p>
                    </strong>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
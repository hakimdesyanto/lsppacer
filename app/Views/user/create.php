<?= $this->extend('layouts/Container.php'); ?>
<?= $this->section('content'); ?>
<div class="card border-top border-0 border-4 border-success">
    <div class="card-body">
        <div class="border p-4 rounded">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-success"></i>
                </div>
                <h5 class="mb-0 text-success">ADD USER</h5>

            </div>
            <hr />

            <?php if ($pesan != '') { ?>
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Gagal!</h6>
                            <div class="text-white"><?= $pesan ?></div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <form class="form-horizontal" action="/user/insert" method="post" autocomplete="off">
                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Full Name</label>
                    <div class="col-sm-3">
                        <input type="text" name="full_name" id="full_name" class="form-control<?= ($validation->hasError('full_name')) ? ' is-invalid' : ''; ?>" value="<?= old('full_name'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('full_name'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Birth Place</label>
                    <div class="col-sm-3">
                        <input type="text" name="birth_place" id="birth_place" class="form-control<?= ($validation->hasError('birth_place')) ? ' is-invalid' : ''; ?>" value="<?= old('birth_place'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('birth_place'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Birth Date</label>
                    <div class="col-sm-3">
                        <input type="date" name="birth_date" id="birth_date" class="form-control<?= ($validation->hasError('birth_date')) ? ' is-invalid' : ''; ?>" value="<?= old('birth_date'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('birth_date'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Gender</label>
                    <div class="col-sm-3">
                        <select id="gender" name="gender" class="form-control<?= ($validation->hasError('gender')) ? ' is-invalid' : ''; ?>" value="<?= old('gender'); ?>">
                            <option value="">Please Select</option>
                            <option value="1">Man</option>
                            <option value="2">Woman</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('gender'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Address</label>
                    <div class="col-sm-3">
                        <textarea name="address" id="address" class="form-control<?= ($validation->hasError('address')) ? ' is-invalid' : ''; ?>" value="<?= old('address'); ?>"></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('address'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">Province</label>
                    <div class="col-md-3">
                        <select class="single-select" id="province_id" name="province_id" class="form-control<?= ($validation->hasError('province_id')) ? ' is-invalid' : ''; ?>" value="<?= old('province_id'); ?>">
                            <?= $province; ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('province_id'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">District</label>
                    <div class="col-md-3">
                        <select class="single-select" id="district_id" name="district_id" class="form-control<?= ($validation->hasError('district_id')) ? ' is-invalid' : ''; ?>" value="<?= old('district_id'); ?>">
                            <?= $district; ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('district_id'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">Sub District</label>
                    <div class="col-md-3">
                        <select class="single-select" id="subdistrict_id" name="subdistrict_id" class="form-control<?= ($validation->hasError('subdistrict_id')) ? ' is-invalid' : ''; ?>" value="<?= old('subdistrict_id'); ?>">
                            <?= $district; ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('subdistrict_id'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">Village</label>
                    <div class="col-md-3">
                        <select class="single-select" id="village_id" name="village_id" class="form-control<?= ($validation->hasError('village_id')) ? ' is-invalid' : ''; ?>" value="<?= old('village_id'); ?>">
                            <?= $district; ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('village_id'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Email</label>
                    <div class="col-sm-3">
                        <input type="email" name="email" id="email" class="form-control<?= ($validation->hasError('email')) ? ' is-invalid' : ''; ?>" value="<?= old('email'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Mobile Phone</label>
                    <div class="col-sm-3">
                        <input type="text" name="mobile_phone" id="mobile_phone" class="form-control<?= ($validation->hasError('mobile_phone')) ? ' is-invalid' : ''; ?>" value="<?= old('mobile_phone'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('mobile_phone'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Phone</label>
                    <div class="col-sm-3">
                        <input type="text" name="phone" id="phone" class="form-control<?= ($validation->hasError('phone')) ? ' is-invalid' : ''; ?>" value="<?= old('phone'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('phone'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">User Type</label>
                    <div class="col-md-3">
                        <select id="user_type_id" name="user_type_id" class="form-control<?= ($validation->hasError('user_type_id')) ? ' is-invalid' : ''; ?>" value="<?= old('user_type_id'); ?>">
                            <?= $user_type; ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('user_type_id'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">ID Card Number</label>
                    <div class="col-sm-3">
                        <input type="text" name="idcard_number" id="idcard_number" class="form-control<?= ($validation->hasError('idcard_number')) ? ' is-invalid' : ''; ?>" value="<?= old('idcard_number'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('idcard_number'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Doc ID Card Path</label>
                    <div class="col-sm-3">
                        <input type="text" name="doc_idcard_path" id="doc_idcard_path" class="form-control<?= ($validation->hasError('doc_idcard_path')) ? ' is-invalid' : ''; ?>" value="<?= old('doc_idcard_path'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('doc_idcard_path'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">User Name</label>
                    <div class="col-sm-3">
                        <input type="text" name="user_name" id="user_name" class="form-control<?= ($validation->hasError('user_name')) ? ' is-invalid' : ''; ?>" value="<?= old('user_name'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('user_name'); ?></div>
                    </div>

                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">User Password</label>
                    <div class="col-sm-3">
                        <input type="password" name="user_password" id="user_password" class="form-control<?= ($validation->hasError('user_password')) ? ' is-invalid' : ''; ?>" value="<?= old('user_password'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('user_password'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Confirm Password</label>
                    <div class="col-sm-3">
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control<?= ($validation->hasError('confirm_password')) ? ' is-invalid' : ''; ?>" value="<?= old('confirm_password'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('confirm_password'); ?></div>
                    </div>
                </div>

                <!-- <div class="row mb-3">
                <label class="col-sm-2 control-label"></label>
                <label class="col-sm-3 control-label text-danger" style="width:200px;text-align:left">*)Wajib diisi</label>
            </div> -->
                <hr>
                <label class="col-sm-2 control-label"></label>
                <button type="submit" class="col-sm-1 btn btn-success">Save</button>
                <a href="/user" class="col-sm-1 btn btn-warning">Cancel</a>
            </form>

            <!-- coba 
            <div class="dd" id="menu">
                <ol class="dd-list">
                    <li class="dd-item dd3-item" data-id="1">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">Home</div>
                    </li>
                    <li class="dd-item dd3-item" data-id="839952">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">Accounting</div>
                        <ol class="dd-list">
                            <li class="dd-item dd3-item" data-id="394609">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">GL Account Setup</div>
                            </li>
                            <li class="dd-item dd3-item" data-id="618763">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">Template Tabel Laporan</div>
                                <ol class="dd-list">
                                    <li class="dd-item dd3-item" data-id="745725">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">OJK & Inhouse</div>
                                    </li>
                                </ol>
                            </li>
                            <li class="dd-item dd3-item" data-id="459633">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">Proses</div>
                                <ol class="dd-list">
                                    <li class="dd-item dd3-item" data-id="798616">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">Trial Balance</div>
                                    </li>
                                    <li class="dd-item dd3-item" data-id="328688">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">OJK & Inhouse</div>
                                    </li>
                                </ol>
                            </li>
                            <li class="dd-item dd3-item" data-id="617076">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">Laporan</div>
                                <ol class="dd-list">
                                    <li class="dd-item dd3-item" data-id="314519">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">Tial Balance</div>
                                    </li>
                                    <li class="dd-item dd3-item" data-id="954684">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">OJK & Inhouse</div>
                                    </li>
                                </ol>
                            </li>
                            <li class="dd-item dd3-item" data-id="818290">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">Upload Data Anggaran</div>
                            </li>
                            <li class="dd-item dd3-item" data-id="365784">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">Set Up Report</div>
                            </li>
                            <li class="dd-item dd3-item" data-id="543293">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">Kontrol Data Laporan Keuangan</div>
                            </li>
                        </ol>
                    </li>
                    <li class="dd-item dd3-item" data-id="2">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">Settings</div>
                        <ol class="dd-list">
                            <li class="dd-item dd3-item" data-id="5">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">Menu Setup</div>
                            </li>
                            <li class="dd-item dd3-item" data-id="3">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">User Setup</div>
                            </li>
                            <li class="dd-item dd3-item" data-id="4">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">Role Setup</div>
                            </li>
                            <li class="dd-item dd3-item" data-id="171122">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">Master Fund</div>
                            </li>
                        </ol>
                    </li>
                </ol>
            </div>
            coba -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
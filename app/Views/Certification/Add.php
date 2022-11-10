<?= $this->extend('layouts/Container.php'); ?>
<?= $this->section('content'); ?>
<!-- dropzonejs -->
<link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
<div class="card border-top border-0 border-4 border-success">
    <div class="card-body">
        <div class="border p-4 rounded">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-success"></i>
                </div>
                <h5 class="mb-0 text-success">ADD CERTIFICATION</h5>

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
            <form class="form-horizontal" action="/Certification/insert" method="post" autocomplete="off" enctype="multipart/form-data">
                <?= csrf_field(); ?>


                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Certification Number</label>
                    <div class="col-sm-4">
                        <input type="text" name="certification_number" id="certification_number" class="form-control<?= ($validation->hasError('certification_number')) ? ' is-invalid' : ''; ?>" value="<?= old('certification_number'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('certification_number'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">Scope</label>
                    <div class="col-md-4">
                        <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple" id="audit_experience_scope_id" name="audit_experience_scope_id[]">
                            <?= $scope; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">Field Code</label>
                    <div class="col-md-4">
                        <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple" id="fieldcode_id" name="fieldcode_id[]">
                            <?= $field_code; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">Certification Type</label>
                    <div class="col-md-4">
                        <select class="single-select" id="certification_type_id" name="certification_type_id" class="form-control<?= ($validation->hasError('certification_type_id')) ? ' is-invalid' : ''; ?>" value="<?= old('certification_type_id'); ?>">
                            <?= $certification_type; ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('certification_type_id'); ?></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">Auditor Level</label>
                    <div class="col-md-4">
                        <select class="single-select" id="level_auditor" name="level_auditor" class="form-control<?= ($validation->hasError('level_auditor')) ? ' is-invalid' : ''; ?>" value="<?= old('level_auditor'); ?>">
                            <option value="">Please Select</option>
                            <option value="1">Auditor Mula / Provisional Auditor</option>
                            <option value="2">Auditor / Auditor</option>
                            <option value="3">Auditor Kepala / Lead Auditor</option>
                            <option value="4">Auditor Utama / Bussiness Improvement Auditor</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('level_auditor'); ?></div>
                    </div>
                </div>

                <hr>

                <br>

                <!-- accordion -->
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Education
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="row mb-3">
                                    <label class="col-md-2 control-label" style="text-align:right">Level</label>
                                    <div class="col-md-4">
                                        <select class="single-select" id="level" name="level" class="form-control<?= ($validation->hasError('level')) ? ' is-invalid' : ''; ?>" value="<?= old('level'); ?>">
                                            <option value="">Please Select</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                        <div class="invalid-feedback"><?= $validation->getError('level'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">University</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="university" id="university" class="form-control<?= ($validation->hasError('university')) ? ' is-invalid' : ''; ?>" value="<?= old('university'); ?>">
                                        <div class="invalid-feedback"><?= $validation->getError('university'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Major</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="major" id="major" class="form-control<?= ($validation->hasError('major')) ? ' is-invalid' : ''; ?>" value="<?= old('major'); ?>">
                                        <div class="invalid-feedback"><?= $validation->getError('major'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Start Date</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="date" name="start_date_education" id="start_date_education" class="form-control<?= ($validation->hasError('start_date_education')) ? ' is-invalid' : ''; ?>" value="<?= old('start_date_education'); ?>">
                                            <div class="invalid-feedback"><?= $validation->getError('start_date_education'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">End Date</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="date" name="end_date_education" id="end_date_education" class="form-control<?= ($validation->hasError('end_date_education')) ? ' is-invalid' : ''; ?>" value="<?= old('end_date_education'); ?>">
                                            <div class="invalid-feedback"><?= $validation->getError('end_date_education'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Certificate Number</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="certificate_number" id="certificate_number" class="form-control<?= ($validation->hasError('certificate_number')) ? ' is-invalid' : ''; ?>" value="<?= old('certificate_number'); ?>">
                                        <div class="invalid-feedback"><?= $validation->getError('certificate_number'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-2 control-label" style="text-align:right">Acreditation Status</label>
                                    <div class="col-md-4">
                                        <select class="single-select" id="accreditation_status" name="accreditation_status" class="form-control<?= ($validation->hasError('accreditation_status')) ? ' is-invalid' : ''; ?>" value="<?= old('accreditation_status'); ?>">
                                            <option value="">Please Select</option>
                                            <option value="T">Tidak/Belum Terakreditasi</option>
                                            <option value="A">Terakreditasi A</option>
                                            <option value="B">Terakreditasi B</option>
                                            <option value="C">Terakreditasi C</option>
                                        </select>
                                        <div class="invalid-feedback"><?= $validation->getError('accreditation_status'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Upload Certificate</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="file" id="doc_path_education" name="doc_path_education">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Experience
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">

                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Company Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="company_name" id="company_name" class="form-control<?= ($validation->hasError('company_name')) ? ' is-invalid' : ''; ?>" value="<?= old('company_name'); ?>">
                                        <div class="invalid-feedback"><?= $validation->getError('company_name'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-2 control-label" style="text-align:right">Departement</label>
                                    <div class="col-md-4">
                                        <select class="single-select" id="departement_id" name="departement_id" class="form-control<?= ($validation->hasError('departement_id')) ? ' is-invalid' : ''; ?>" value="<?= old('departement_id'); ?>">
                                            <option value="">Please Select</option>
                                            <option value="1">Sales/Marketing</option>
                                            <option value="2">Finance</option>
                                            <option value="3">IT</option>
                                            <option value="4">Administration</option>
                                            <option value="5">HRD</option>
                                            <option value="6">Other</option>
                                        </select>
                                        <div class="invalid-feedback"><?= $validation->getError('departement_id'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Position</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="position" id="position" class="form-control<?= ($validation->hasError('position')) ? ' is-invalid' : ''; ?>" value="<?= old('position'); ?>">
                                        <div class="invalid-feedback"><?= $validation->getError('position'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Start Date</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="date" name="start_date_experience" id="start_date_experience" class="form-control<?= ($validation->hasError('start_date_experience')) ? ' is-invalid' : ''; ?>" value="<?= old('start_date_experience'); ?>">
                                            <div class="invalid-feedback"><?= $validation->getError('start_date_experience'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">End Date</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="date" name="end_date_experience" id="end_date_experience" class="form-control<?= ($validation->hasError('end_date_experience')) ? ' is-invalid' : ''; ?>" value="<?= old('end_date_experience'); ?>">
                                            <div class="invalid-feedback"><?= $validation->getError('end_date_experience'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Upload Reference Letter</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="file" id="doc_path_experience" name="doc_path_experience">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Auditor Experience
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">

                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Company Address</label>
                                    <div class="col-sm-4">
                                        <textarea name="company_addres" id="company_addres" class="form-control<?= ($validation->hasError('company_addres')) ? ' is-invalid' : ''; ?>"><?= old('company_addres'); ?></textarea>
                                        <div class="invalid-feedback"><?= $validation->getError('company_addres'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-2 control-label" style="text-align:right">Scope</label>
                                    <div class="col-md-4">
                                        <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple" id="scope_id" name="scope_id[]">
                                            <?= $scope; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-2 control-label" style="text-align:right">Peran</label>
                                    <div class="col-md-4">
                                        <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple" id="role_id" name="role_id[]">
                                            <?= $peran; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Company Phone</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="company_phone" id="company_phone" class="form-control<?= ($validation->hasError('company_phone')) ? ' is-invalid' : ''; ?>" value="<?= old('company_phone'); ?>">
                                        <div class="invalid-feedback"><?= $validation->getError('company_phone'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Contact Person</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="contact_person" id="contact_person" class="form-control<?= ($validation->hasError('contact_person')) ? ' is-invalid' : ''; ?>" value="<?= old('contact_person'); ?>">
                                        <div class="invalid-feedback"><?= $validation->getError('contact_person'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Start Date</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="date" name="start_date_audit_experience" id="start_date_audit_experience" class="form-control<?= ($validation->hasError('start_date_audit_experience')) ? ' is-invalid' : ''; ?>" value="<?= old('start_date_audit_experience'); ?>">
                                            <div class="invalid-feedback"><?= $validation->getError('start_date_audit_experience'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">End Date</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="date" name="end_date_audit_experience" id="end_date_audit_experience" class="form-control<?= ($validation->hasError('end_date_audit_experience')) ? ' is-invalid' : ''; ?>" value="<?= old('end_date_audit_experience'); ?>">
                                            <div class="invalid-feedback"><?= $validation->getError('end_date_audit_experience'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Upload Audit Plan</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="file" id="doc_audit_plan_path" name="doc_audit_plan_path">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Upload Work Order</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="file" id="doc_work_order_path" name="doc_work_order_path">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                Training
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                            <div class="accordion-body">

                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Provider Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="provider_name" id="provider_name" class="form-control<?= ($validation->hasError('provider_name')) ? ' is-invalid' : ''; ?>" value="<?= old('provider_name'); ?>">
                                        <div class="invalid-feedback"><?= $validation->getError('provider_name'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Start Date</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="date" name="start_date_training" id="start_date_training" class="form-control<?= ($validation->hasError('start_date_training')) ? ' is-invalid' : ''; ?>" value="<?= old('start_date_training'); ?>">
                                            <div class="invalid-feedback"><?= $validation->getError('start_date_training'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">End Date</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="date" name="end_date_training" id="end_date_training" class="form-control<?= ($validation->hasError('end_date_training')) ? ' is-invalid' : ''; ?>" value="<?= old('end_date_training'); ?>">
                                            <div class="invalid-feedback"><?= $validation->getError('end_date_training'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Training Topic</label>
                                    <div class="col-sm-4">
                                        <textarea name="training_topic" id="training_topic" class="form-control<?= ($validation->hasError('training_topic')) ? ' is-invalid' : ''; ?>"><?= old('training_topic'); ?></textarea>
                                        <div class="invalid-feedback"><?= $validation->getError('training_topic'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Relation Status</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="relation_status" id="relation_status" class="form-control<?= ($validation->hasError('relation_status')) ? ' is-invalid' : ''; ?>" value="<?= old('relation_status'); ?>">
                                        <div class="invalid-feedback"><?= $validation->getError('relation_status'); ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 control-label" style="text-align:right">Upload Training</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="file" id="doc_path_training" name="doc_path_training">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- accordion -->
                <label class="col-sm-2 control-label"></label>
                <button type="submit" class="col-sm-1 btn btn-success">Save</button>
                <a href="/Certification/main" class="col-sm-1 btn btn-warning">Cancel</a>
            </form>

        </div>
    </div>
</div>







<?= $this->endSection(); ?>
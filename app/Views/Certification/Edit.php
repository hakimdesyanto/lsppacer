<?= $this->extend('layouts/Container.php'); ?>
<?= $this->section('content'); ?>
<div class="card border-top border-0 border-4 border-success">
    <div class="card-body">
        <div class="border p-4 rounded">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-success"></i>
                </div>
                <h5 class="mb-0 text-success">EDIT CERTIFICATION</h5>

            </div>
            <hr />

            <?php if ($pesan != '') { ?>
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Sukses!</h6>
                            <div class="text-white"><?= $pesan; ?></div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <?php if ($pesan2 != '') { ?>
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Gagal!</h6>
                            <div class="text-white"><?= $pesan2 ?></div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <form class="form-horizontal" action="/Certification/update/<?= $certification['certification_id'] ?>" method="post" autocomplete="off">
                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Certification Number</label>
                    <div class="col-sm-3">
                        <input type="text" name="certification_number" id="certification_number" class="form-control<?= ($validation->hasError('certification_number')) ? ' is-invalid' : ''; ?>" value="<?= $certification['certification_number']; ?>">
                        <div class="invalid-feedback"><?= $validation->getError('certification_number'); ?></div>
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
                    <label class="col-md-2 control-label" style="text-align:right">Field Code</label>
                    <div class="col-md-4">
                        <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple" id="fieldcode_id" name="fieldcode_id[]">
                            <?= $field_code; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">Certification Type</label>
                    <div class="col-md-3">
                        <select class="single-select" id="certification_type_id" name="certification_type_id" class="form-control<?= ($validation->hasError('certification_type_id')) ? ' is-invalid' : ''; ?>" value="<?= $certification['certification_type_id']; ?>">
                            <?= $certification_type; ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('certification_type_id'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">Auditor Level</label>
                    <div class="col-md-3">
                        <select class="single-select" id="level_auditor" name="level_auditor" class="form-control<?= ($validation->hasError('level_auditor')) ? ' is-invalid' : ''; ?>">
                            <option value="">Please Select</option>
                            <option value="1" <?= ($certification['level_auditor'] == '1') ? ' selected' : '' ?>>Auditor Mula / Provisional Auditor</option>
                            <option value="2" <?= ($certification['level_auditor'] == '2') ? ' selected' : '' ?>>Auditor / Auditor</option>
                            <option value="3" <?= ($certification['level_auditor'] == '3') ? ' selected' : '' ?>>Auditor Kepala / Lead Auditor</option>
                            <option value="4" <?= ($certification['level_auditor'] == '4') ? ' selected' : '' ?>>Auditor Utama / Bussiness Improvement Auditor</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('level_auditor'); ?></div>
                    </div>
                </div>

                <hr>
                <label class="col-sm-2 control-label"></label>
                <button type="submit" class="col-sm-1 btn btn-success">Save</button>
                <a href="/Certification/main" class="col-sm-1 btn btn-warning">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
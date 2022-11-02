<?= $this->extend('layouts/Container.php'); ?>
<?= $this->section('content'); ?>
<div class="card border-top border-0 border-4 border-success">
    <div class="card-body">
        <div class="border p-4 rounded">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-success"></i>
                </div>
                <h5 class="mb-0 text-success">ADD CERTIFICATION TYPE</h5>

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
            <form class="form-horizontal" action="/CertificationType/insert" method="post" autocomplete="off">
                <?= csrf_field(); ?>


                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Description</label>
                    <div class="col-sm-3">
                        <input type="text" name="description" id="description" class="form-control<?= ($validation->hasError('description')) ? ' is-invalid' : ''; ?>" value="<?= old('description'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('description'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Cost</label>
                    <div class="col-sm-3">
                        <input type="text" name="cost" id="cost" class="form-control<?= ($validation->hasError('cost')) ? ' is-invalid' : ''; ?>" value="<?= old('cost'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('cost'); ?></div>
                    </div>
                </div>

                <hr>
                <label class="col-sm-2 control-label"></label>
                <button type="submit" class="col-sm-1 btn btn-success">Save</button>
                <a href="/CertificationType/main" class="col-sm-1 btn btn-warning">Cancel</a>
            </form>


        </div>
    </div>
</div>
<?= $this->endSection(); ?>
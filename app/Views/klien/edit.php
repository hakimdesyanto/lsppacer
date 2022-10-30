<?= $this->extend('layouts/admin/main-form.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Edit Klien</h6>
<hr />
<a href="/klien" class="btn btn-outline-primary mb-3"><i class="bx bx-share"></i></a>
<div class="card">
    <div class="card-body">
        <div class="panel-body">
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
            <form class="form-horizontal" action="/klien/update/<?= $klien['klien_id']; ?>" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Klien</label>
                    <div class="col-sm-3">
                        <input type="text" name="gklien" id="gklien" class="form-control<?= ($validation->hasError('gklien')) ? ' is-invalid' : ''; ?>" value="<?= $klien['nm_klien']; ?>">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gklien'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-3">
                        <textarea name="galamat" id="galamat" class="form-control<?= ($validation->hasError('galamat')) ? ' is-invalid' : ''; ?>"><?= $klien['alamat']; ?></textarea>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('galamat'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No. Telp</label>
                    <div class="col-sm-3">
                        <input type="text" name="gtelp" id="gtelp" class="form-control<?= ($validation->hasError('gtelp')) ? ' is-invalid' : ''; ?>" value="<?= $klien['no_telp']; ?>">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gtelp'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No. Fax</label>
                    <div class="col-sm-3">
                        <input type="text" name="gfax" id="gfax" class="form-control<?= ($validation->hasError('gfax')) ? ' is-invalid' : ''; ?>" value="<?= $klien['no_fax']; ?>">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gfax'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-3">
                        <input type="text" name="gmail" id="gmail" class="form-control<?= ($validation->hasError('gmail')) ? ' is-invalid' : ''; ?>" value="<?= (Old('gmail')) ? Old('gmail') : $klien['email']; ?>">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gmail'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">User Login</label>
                    <div class="col-sm-3">
                        <input type="text" name="guserlogin" id="guserlogin" class="form-control<?= ($validation->hasError('guserlogin')) ? ' is-invalid' : ''; ?>" value="<?= $klien['user_login']; ?>">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('guserlogin'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-3">
                        <input type="password" name="gpassword" id="gpassword" class="form-control<?= ($validation->hasError('gpassword')) ? ' is-invalid' : ''; ?>">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gpassword'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Konfirm Password</label>
                    <div class="col-sm-3">
                        <input type="password" name="gkpassword" id="gkpassword" class="form-control<?= ($validation->hasError('gkpassword')) ? ' is-invalid' : ''; ?>">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gkpassword'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label text-danger" style="width:200px;text-align:left">*)Wajib diisi</label>
                </div>
                <br />
                <button type="submit" class="btn btn-success">Simpan Klien</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->extend('layouts/admin/main-form.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Tambah Soal Test</h6>
<hr />
<a href="/soal" class="btn btn-outline-primary mb-3"><i class="bx bx-share"></i></a>
<div class="card">
    <div class="card-body">
        <div class="panel-body">
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
            <form class="form-horizontal" action="/soal/insert" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Pertanyaan</label>
                    <div class="col-sm-3">
                        <textarea name="gpertanyaan" id="gpertanyaan" class="form-control<?= ($validation->hasError('gpertanyaan')) ? ' is-invalid' : ''; ?>"><?= old('gpertanyaan'); ?></textarea>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gpertanyaan'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">A</label>
                    <div class="col-sm-3">
                        <textarea name="gjawaba" id="gjawaba" class="form-control<?= ($validation->hasError('gjawaba')) ? ' is-invalid' : ''; ?>"><?= old('gjawaba'); ?></textarea>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gjawaba'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">B</label>
                    <div class="col-sm-3">
                        <textarea name="gjawabb" id="gjawabb" class="form-control<?= ($validation->hasError('gjawabb')) ? ' is-invalid' : ''; ?>"><?= old('gjawabb'); ?></textarea>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gjawabb'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">C</label>
                    <div class="col-sm-3">
                        <textarea name="gjawabc" id="gjawabc" class="form-control<?= ($validation->hasError('gjawabc')) ? ' is-invalid' : ''; ?>"><?= old('gjawabc'); ?></textarea>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gjawabc'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">D</label>
                    <div class="col-sm-3">
                        <textarea name="gjawabd" id="gjawabd" class="form-control<?= ($validation->hasError('gjawabd')) ? ' is-invalid' : ''; ?>"><?= old('gjawabd'); ?></textarea>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gjawabd'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jawaban</label>
                    <div class="col-sm-3">
                        <select name="gjawaban" id="gjawaban" class="form-select" data-placeholder="Pilih Status">
                            <?= $jawaban; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Bobot</label>
                    <div class="col-sm-3">
                        <input type="text" name="gbobot" id="gbobot" class="form-control<?= ($validation->hasError('gbobot')) ? ' is-invalid' : ''; ?>" value="<?= old('gbobot'); ?>">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gbobot'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label text-danger" style="width:200px;text-align:left">*)Wajib diisi</label>
                </div>
                <br />
                <button type="submit" class="btn btn-success">Simpan Soal</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->extend('layouts/admin/main-form.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Tambah Posisi Pekerjaan</h6>
<hr />
<a href="/posisi" class="btn btn-outline-primary mb-3"><i class="bx bx-share"></i></a>
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
            <form class="form-horizontal" action="/posisi/insert" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-danger">Nama Posisi*</label>
                    <div class="col-sm-3">
                        <input type="text" name="gposisi" id="gposisi" class="form-control<?= ($validation->hasError('gposisi')) ? ' is-invalid' : ''; ?>" value="<?= old('gposisi'); ?>">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gposisi'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-danger">Nama Klien*</label>
                    <div class="col-sm-4">
                        <select name="gklien" id="gklien" class="single-select" data-placeholder="Pilih Klien">
                            <?= $klien; ?>
                        </select>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gklien'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-danger">Tanggal Order*</label>
                    <div class="col-sm-2">
                        <input type="date" name="gtglorder" id="gtglorder" class="form-control<?= ($validation->hasError('gtglorder')) ? ' is-invalid' : ''; ?>" value="<?= Old('gtglorder'); ?>">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gtglorder'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-4">
                        <textarea name="gketerangan" id="gketerangan" class="form-control"><?= old('gketerangan'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-danger">Kebutuhan*</label>
                    <div class="col-sm-1">
                        <input type="text" name="gkebutuhan" id="gkebutuhan" class="form-control<?= ($validation->hasError('gkebutuhan')) ? ' is-invalid' : ''; ?>" value="<?= old('gkebutuhan'); ?>" style="text-align: right;">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gkebutuhan'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-3">
                        <select name="gstatus" id="gstatus" class="form-select" data-placeholder="Pilih Status">
                            <?= $status; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label text-danger" style="width:200px;text-align:left">*)Wajib diisi</label>
                </div>
                <br />
                <button type="submit" class="btn btn-success">Simpan Posisi</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
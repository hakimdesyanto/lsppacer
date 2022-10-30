<?= $this->extend('layouts/admin/main-form.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Edit Jadwal Test</h6>
<hr />
<div class="col mb-3">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="/jadwaltest" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Kembali"><i class="bx bx-share"></i>
        </a>
        <form method="POST" action="/jadwaltest/<?= $jadwaltest['jadwal_id']; ?>" class="d-inline">
            <?php csrf_field(); ?>
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Anda yakin akan hapus?')"><i class="bx bx-trash"></i>
            </button>
        </form>
    </div>
</div>
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
            <form class="form-horizontal" action="/jadwaltest/update/<?= $jadwaltest['jadwal_id'] ?>" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Keterangan*</label>
                    <div class="col-sm-3">
                        <textarea name="gketerangan" id="gketerangan" class="form-control<?= ($validation->hasError('gketerangan')) ? ' is-invalid' : ''; ?>"><?php echo $jadwaltest['keterangan']; ?></textarea>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gketerangan'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Test</label>
                    <div class="col-sm-2">
                        <input type="date" name="gtgltest" id="gtgltest" class="form-control<?= ($validation->hasError('gtgltest')) ? ' is-invalid' : ''; ?>" value="<?= $jadwaltest['tgl_test']; ?>">
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gtgltest'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label text-danger" style="width:200px;text-align:left">*)Wajib diisi</label>
                </div>
                <br />
                <button type="submit" class="btn btn-success">Simpan Jadwal Test</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
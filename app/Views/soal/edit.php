<?= $this->extend('layouts/admin/main-form.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Edit Soal Test</h6>
<hr />
<div class="col mb-3">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="/soal" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Kembali"><i class="bx bx-share"></i>
        </a>
        <form method="POST" action="/soal/<?= $soal['soal_id']; ?>" class="d-inline">
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
            <form class="form-horizontal" action="/soal/update/<?= $soal['soal_id'] ?>" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Pertanyaan</label>
                    <div class="col-sm-3">
                        <textarea name="gpertanyaan" id="gpertanyaan" class="form-control<?= ($validation->hasError('gpertanyaan')) ? ' is-invalid' : ''; ?>"><?= $soal['pertanyaan']; ?></textarea>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gpertanyaan'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">A</label>
                    <div class="col-sm-3">
                        <textarea name="gjawaba" id="gjawaba" class="form-control<?= ($validation->hasError('gjawaba')) ? ' is-invalid' : ''; ?>"><?= $soal['jawab_a']; ?></textarea>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gjawaba'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">B</label>
                    <div class="col-sm-3">
                        <textarea name="gjawabb" id="gjawabb" class="form-control<?= ($validation->hasError('gjawabb')) ? ' is-invalid' : ''; ?>"><?= $soal['jawab_b']; ?></textarea>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gjawabb'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">C</label>
                    <div class="col-sm-3">
                        <textarea name="gjawabc" id="gjawabc" class="form-control<?= ($validation->hasError('gjawabc')) ? ' is-invalid' : ''; ?>"><?= $soal['jawab_c']; ?></textarea>
                    </div>
                    <div class="invalid-feedback"><?= $validation->getError('gjawabc'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">D</label>
                    <div class="col-sm-3">
                        <textarea name="gjawabd" id="gjawabd" class="form-control<?= ($validation->hasError('gjawabd')) ? ' is-invalid' : ''; ?>"><?= $soal['jawab_d']; ?></textarea>
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
                        <input type="text" name="gbobot" id="gbobot" class="form-control<?= ($validation->hasError('gbobot')) ? ' is-invalid' : ''; ?>" value="<?= $soal['bobot']; ?>">
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
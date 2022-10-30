<?= $this->extend('layouts/admin/main-form2.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Profile Pelamar</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="panel-body">
            <table style="width: 100%">
                <tr>
                    <td>No. Pendaftaran</td>
                    <td><?= $pelamar['no_daftar']; ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td><?= $pelamar['nm_pelamar']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?= $pelamar['alamat']; ?></td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td><?= $pelamar['no_telp']; ?></td>
                </tr>
                <tr>
                    <td>No. KTP</td>
                    <td><?= $pelamar['no_ktp']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $pelamar['email']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><?= ($pelamar['jenis_kelamin'] == 1) ? "Laki-laki" : "Perempuan"; ?></td>
                </tr>
                <tr>
                    <td>Status Kawin</td>
                    <td><?= $pelamar['status_kawin']; ?></td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td><?= $pelamar['pendidikan']; ?></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><?= $pelamar['jurusan']; ?></td>
                </tr>
                <tr>
                    <td>Universitas</td>
                    <td><?= $pelamar['universitas']; ?></td>
                </tr>
                <tr>
                    <td>Pengalaman</td>
                    <td><?= $pelamar['pengalaman']; ?></td>
                </tr>
                <tr>
                    <td>Posisi</td>
                    <td><?= $pelamar['nm_posisi']; ?></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td><?= $pelamar['tmp_lahir']; ?></td>
                </tr>
                <tr>
                    <td>Tgl Lahir</td>
                    <td><?= $pelamar['tgl_lahir']; ?></td>
                </tr>
                <tr>
                    <td>Nilai Tes</td>
                    <td><?= $pelamar['nilai_tes']; ?></td>
                </tr>
                <?php if ($pelamar['status'] <> '' and  intval($pelamar['nilai_tes']) > 0) {
                ?>
                    <tr>
                        <td>Status</td>
                        <td><?= $pelamar['status']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <br />
            <?php
            if ($pelamar['status'] <> '' and  intval($pelamar['nilai_tes']) > 0) {
                if (!file_exists('files/' . $pelamar['no_daftar'] . '.pdf')) {
            ?>
                    <form action="/pelamar/uploadberkas/<?= $pelamar['no_daftar']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="row">
                            <label class="col-sm-2 control-label">Upload Berkas (File PDF Maks. 1MB)</label>
                            <div class="col-sm-4">
                                <input type="file" name="berkas" id="field-file" class="form-control" accept="application/pdf">
                            </div>
                        </div>
                        <button type="submit" name="upload" class="btn btn-success">Upload</button>
                    </form>
                <?php
                }
            }
            if (file_exists('files/' . $pelamar['no_daftar'] . '.pdf')) {
                ?>
                Data berkas. Silahkan didownload di sini : <br />
                <a href="<?php echo base_url(); ?>/files/<?php echo $pelamar['no_daftar']; ?>.pdf" download="<?php echo $pelamar['no_daftar']; ?>">
                    <img src="<?php echo base_url(); ?>/assets/images/pdf.jpg" alt="<?php echo $pelamar['no_daftar'] . '.pdf'; ?>"><?php echo $pelamar['no_daftar']; ?>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
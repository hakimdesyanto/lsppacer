<?= $this->extend('layouts/admin/main-form.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Detail Pelamar</h6>
<hr />
<div class="col mb-3">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="/pelamar" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Kembali"><i class="bx bx-share"></i>
        </a>
        <form method="POST" action="/pelamar/<?= $pelamar['no_daftar']; ?>" class="d-inline">
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
            <?php if ($pelamar['status'] == '' and  intval($pelamar['nilai_tes']) > 0) {
            ?>
                <button type="submit" class="btn btn-success" onclick="location.href='/pelamar/diterima/<?= $pelamar['no_daftar']; ?>'">Diterima
                </button>
                <button type="submit" class="btn btn-danger" onclick="location.href='/pelamar/ditolak/<?= $pelamar['no_daftar']; ?>'">Ditolak
                </button>
            <?php
            }
            if (file_exists('files/' . $pelamar['no_daftar'] . '.pdf')) {
            ?>
                Data berkas. Silahkan didownload di sini : <br />
                <a href="<?php echo base_url(); ?>/files/<?php echo $pelamar['no_daftar']; ?>.pdf" download="<?php echo $pelamar['no_daftar']; ?>" style="text-decoration: none;">
                    <img src="<?php echo base_url(); ?>/assets/images/pdf.jpg" alt="<?php echo $pelamar['no_daftar'] . '.pdf'; ?>"><?php echo $pelamar['no_daftar']; ?>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
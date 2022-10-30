<?= $this->extend('layouts/admin/main-table.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Data Pelamar</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. Registrasi</th>
                        <th>Nama Pelamar</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Jurusan</th>
                        <th>Umur</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pelamar as $p) { ?>
                        <tr>
                            <td><?= ++$no; ?></td>
                            <td><?= $p['no_daftar']; ?></td>
                            <td><?= $p['nm_pelamar']; ?></td>
                            <td><?= ($p['jenis_kelamin'] == 1) ? 'Laki-laki' : 'Perempuan'; ?></td>
                            <td><?= $p['pendidikan']; ?></td>
                            <td><?= $p['jurusan']; ?></td>
                            <td style="text-align: right;"><?= round((strtotime(date('Y-m-d')) - strtotime($p['tgl_lahir'])) / 31536000, 2); ?></td>
                            <td>
                                <a class="btn btn-outline-success btn-sm" href="<?= base_url() ?>/pelamar/detail/<?= $p['no_daftar']; ?>"><i class="bx bx-glasses"></i> Lihat</a>
                            </td>
                        </tr>
                    <?php } ?>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>No. Registrasi</th>
                        <th>Nama Pelamar</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Jurusan</th>
                        <th>Umur</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
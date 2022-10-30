<?= $this->extend('layouts/admin/main-table.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Daftar Posisi Pekerjaan</h6>
<hr />
<a href="/posisi/create" class="btn btn-success btn-sm mb-3">Tambah Posisi</a>
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
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;width: 100px">No.</th>
                        <th style="text-align: center;">Nama Posisi</th>
                        <th style="text-align: center;">Klien</th>
                        <th style="text-align: center;width: 100px">Atur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $num = 1;
                    foreach ($posisi as $value) {
                    ?>
                        <tr class="gradeX">
                            <td><?php echo $num; ?></td>
                            <td><?php echo $value['nm_posisi']; ?></td>
                            <td><?php echo $value['nm_klien']; ?></td>
                            <td style="text-align: center;">
                                <a class="btn btn-outline-success btn-sm" href="<?= base_url() ?>/posisi/edit/<?= $value['posisi_id']; ?>"><i class="bx bx-message-edit"></i> Edit</a>
                            </td>
                        </tr>
                    <?php
                        $num++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Nama Posisi</th>
                        <th style="text-align: center;">Klien</th>
                        <th style="text-align: center;">Atur</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
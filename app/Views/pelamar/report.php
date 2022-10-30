<?= $this->extend('layouts/admin/main-table.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Data Pelamar</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div id="invoice">
            <div class="toolbar hidden-print">
                <div class="text-end">
                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> Export as Excel</button>
                </div>
                <hr />
            </div>
            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="row">
                            <div class="col">
                                <a href="javascript:;">
                                    <img src="<?= base_url(); ?>/assets/images/logo-icon.png" width="80" alt="" />
                                </a>
                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                                    <a target="_blank" href="javascript:;">
                                        PT Dinamika Inti Perkasa
                                    </a>
                                </h2>
                                <div>Jl. Kartini Raya No. 47 B Pancoran Mas Depok</div>
                                <div>(021) 2909 7507</div>
                                <div>info@jasaoutsourcing.co.id</div>
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                            </div>
                            <div class="col invoice-details">
                                <h1 class="invoice-id">LAPORAN PELAMAR</h1>
                                <div class="date">Tgl Laporan: <?= date('d M Y') ?></div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th style="text-align: center;width: 100px">No.</th>
                                    <th style="text-align: center;">No.Pendaftaran</th>
                                    <th style="text-align: center;">Nama Lengkap</th>
                                    <th style="text-align: center;">Jenis Kelamin</th>
                                    <th style="text-align: center;">Tgl Lahir</th>
                                    <th style="text-align: center;">Pendidikan</th>
                                    <th style="text-align: center;">Posisi</th>
                                    <th style="text-align: center;">Nilai Tes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num = 1;
                                foreach ($pelamar as $value) {
                                ?>
                                    <tr class="gradeX">
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $value['no_daftar']; ?></td>
                                        <td><?php echo $value['nm_pelamar']; ?></td>
                                        <td style="text-align: center"><?php echo $value['jenis_kelamin']; ?></td>
                                        <td style="text-align: center"><?php echo date('d M Y', strtotime($value['tgl_lahir'])); ?></td>
                                        <td style="text-align: center"><?php echo $value['pendidikan']; ?></td>
                                        <td><?php echo $value['nm_posisi']; ?></td>
                                        <td style="text-align: right"><?php echo $value['nilai_tes']; ?></td>
                                    </tr>
                                <?php
                                    $num++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </main>
                    <footer>Laporan ini dibuat secara sistem</footer>
                </div>
                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                <div></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
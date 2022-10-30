<?= $this->extend('layouts/admin/main-form2.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Hasil Test</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="panel-body">
            <?php
            if ($sudahUjian) {
            ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
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
                                            <h1 class="invoice-id">Hasil Test Online</h1>
                                            <div class="date">Tanggal : <?= date('d M Y') ?></div>
                                        </div>
                                    </div>
                                </main>
                            </div>
                            <div class="panel-body">
                                <p>Dengan ini pelamar sebagaimana tercantum di bawah :</p>
                                <table width="30%">
                                    <tr>
                                        <td>No. Daftar</td>
                                        <td>:</td>
                                        <td><?= $pelamar['no_daftar']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. KTP</td>
                                        <td>:</td>
                                        <td><?= $pelamar['no_ktp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>:</td>
                                        <td><?= $pelamar['nm_pelamar']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $pelamar['alamat']; ?></td>
                                    </tr>
                                </table>
                                <p>telah melakukan test secara online dengan hasil test : <?= $pelamar['nilai_tes']; ?></p>
                                Informasi diterima atau tidaknya akan diberitahukan 3 hari setelah ujian di halaman pengumuman.
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <h4>Anda belum melakukan test online</h4>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
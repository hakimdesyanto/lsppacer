<?= $this->extend('layouts/admin/main-form.php'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Detail Pelamar</h4>
            </div>
            <div class="panel-body">
                <table style="width: 100%">
                    <tr>
                        <td>No. Pendaftaran</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>No. KTP</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Status Kawin</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Universitas</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Pengalaman</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Posisi</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tgl Lahir</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nilai Tes</td>
                        <td></td>
                    </tr>
                    <!-- <?php //if ($VIEW['pelamar']['status'] <> '' and  intval($VIEW['pelamar']['nilai_tes']) > 0) {; 
                            ?> -->
                    <tr>
                        <td>Status</td>
                        <td></td>
                    </tr>
                    <!-- <?php //} 
                            ?> -->
                </table>
                <!-- <?php //if ($VIEW['pelamar']['status'] == '' and  intval($VIEW['pelamar']['nilai_tes']) > 0) {; 
                        ?> -->
                <button type="submit" class="btn btn-success" onclick="location.href='?act=pdt&iid=<?php //echo $VIEW['pelamar']['no_daftar']; 
                                                                                                    ?>'">Diterima
                </button>
                <button type="submit" class="btn btn-danger" onclick="location.href='?act=pdto&iid=<?php //echo $VIEW['pelamar']['no_daftar']; 
                                                                                                    ?>'">Tidak
                    diterima
                </button>
                <!-- <?php
                        //}
                        // if (file_exists('files/' . $VIEW['pelamar']['no_daftar'] . '.pdf')) {
                        ?> -->
                <br />
                Data berkas. Silahkan didownload di sini : <br />
                <a href="<?php //$CONFIG['site']['url']; 
                            ?>files/<?php //echo $VIEW['pelamar']['no_daftar']; 
                                    ?>.pdf" download="<?php //echo $VIEW['pelamar']['no_daftar']; 
                                                                                        ?>">
                    <img src="<?php //$CONFIG['site']['url']; 
                                ?>files/<?php //echo $VIEW['pelamar']['no_daftar']; 
                                        ?>.pdf" alt="<?php //echo $VIEW['pelamar']['no_daftar'] . '.pdf'; 
                                                                                        ?>">
                </a>
                <!-- <?php
                        // }
                        ?> -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
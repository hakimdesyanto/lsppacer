<?= $this->extend('layouts/admin/main-form2.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Test Online</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="panel-body">
            <?php
            if (!$sudahUjian) {
                if ($jadwalhariini) {
            ?>
                    <form class="form-horizontal" action="/pelamar/prosessoal/<?= $nodaftar; ?>/<?= $jadwalhariini['jadwal_id']; ?>" method="post" autocomplete="off">
                        <table style="width: 100%">
                            <?php
                            $no = 1;
                            foreach ($soal as $value) {
                            ?>
                                <tr>
                                    <td width="30px">
                                        <strong><?php echo $no; ?></strong>
                                        <input type="hidden" name="soal<?php echo $no; ?>" id="soal<?php echo $no; ?>" value="<?php echo $value['soal_id']; ?>">
                                    </td>
                                    <td><?php echo $value['pertanyaan']; ?></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="radio" name="gpilih<?php echo $no; ?>" id="gpilih<?php echo $no; ?>" value="A">&nbsp;A.&nbsp;<?php echo $value['jawab_a']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="radio" name="gpilih<?php echo $no; ?>" id="gpilih<?php echo $no; ?>" value="B">&nbsp;B.&nbsp;<?php echo $value['jawab_b']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="radio" name="gpilih<?php echo $no; ?>" id="gpilih<?php echo $no; ?>" value="C">&nbsp;C.&nbsp;<?php echo $value['jawab_c']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="radio" name="gpilih<?php echo $no; ?>" id="gpilih<?php echo $no; ?>" value="D">&nbsp;D.&nbsp;<?php echo $value['jawab_d']; ?>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </table>
                        <input type="hidden" name="soal" id="soal" value="<?= $no - 1; ?>" />
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                <?php
                } else {
                ?>
                    <h4>Hari ini tidak ada jadwal test</h4>
                    <?php
                    if ($jadwalakandatang) {
                    ?>
                        <h6><?= $jadwalakandatang['keterangan'] . ' dilaksanakan pada tanggal ' . date('j M Y', strtotime($jadwalakandatang['tgl_test'])); ?></h6>
                    <?php
                    }
                    ?>
                <?php
                }
            } else {
                ?>
                <h4>Anda sudah melakukan test online</h4>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
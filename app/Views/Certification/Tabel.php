<table id="example2" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="text-align: center;width: 50px">No.</th>
            <th style="text-align: center;width: 100px">Action</th>
            <th style="text-align: center;">Certification ID</th>
            <th style="text-align: center;">Certification Number</th>
            <th style="text-align: center;">Apply Date</th>
            <th style="text-align: center;">Certification Type</th>
            <th style="text-align: center;">Level Auditor</th>
            <th style="text-align: center;">Created At</th>
            <th style="text-align: center;">Updated At</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $num = 1;
        foreach ($certification as $value) {
        ?>
            <tr class="gradeX">
                <td style="text-align: center;"><?= $num; ?></td>
                <td style="text-align: center;">
                    <a class="btn btn-outline-success btn-sm" href="<?= base_url() ?>/Certification/edit/<?= $value['certification_id']; ?>"><i class="bx bx-message-edit"></i></a>
                    <a class="btn btn-outline-danger btn-sm" href="<?= base_url() ?>/Certification/delete/<?= $value['certification_id']; ?>" title="Hapus" onclick="return confirm('Anda yakin akan hapus?')"><i class=" bx bx-trash"></i></a>
                </td>
                <td style="text-align: center;"><?= $value['certification_id']; ?></td>
                <td style="text-align: left;"><?= $value['certification_number']; ?></td>
                <td style="text-align: left;"><?= $value['apply_date']; ?></td>
                <td style="text-align: left;"><?= $value['description']; ?></td>
                <?php
                switch ($value['level_auditor']) {
                    case "1":
                        $leve_auditor = "Auditor Mula / Provisional Auditor";
                        break;
                    case "2":
                        $leve_auditor = "Auditor / Auditor";
                        break;
                    case "3":
                        $leve_auditor = "Auditor Kepala / Lead Auditor";
                        break;
                    case "4":
                        $leve_auditor = "Auditor Utama / Bussiness Improvement Auditor";
                        break;
                    default:
                        $level_auditor = '';
                        break;
                }
                ?>
                <td style="text-align: left;"><?= $leve_auditor; ?></td>
                <td style="text-align: left;"><?= $value['createdAt']; ?></td>
                <td style="text-align: left;"><?= $value['updatedAt']; ?></td>
            </tr>
        <?php
            $num++;
        }
        ?>
    </tbody>

</table>
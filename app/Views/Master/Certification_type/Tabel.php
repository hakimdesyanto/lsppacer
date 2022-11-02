<table id="example2" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="text-align: center;width: 50px">No.</th>
            <th style="text-align: center;width: 100px">Action</th>
            <th style="text-align: center;">Description</th>
            <th style="text-align: center;">Cost</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $num = 1;
        foreach ($certification_type as $value) {
        ?>
            <tr class="gradeX">
                <td style="text-align: center;"><?= $num; ?></td>
                <td style="text-align: center;">
                    <a class="btn btn-outline-success btn-sm" href="<?= base_url() ?>/CertificationType/edit/<?= $value['certification_type_id']; ?>"><i class="bx bx-message-edit"></i></a>
                    <a class="btn btn-outline-danger btn-sm" href="<?= base_url() ?>/CertificationType/delete/<?= $value['certification_type_id']; ?>" title="Hapus" onclick="return confirm('Anda yakin akan hapus?')"><i class=" bx bx-trash"></i></a>
                </td>
                <td style="text-align: left;"><?= $value['description']; ?></td>
                <td style="text-align: right;"><?= $value['cost']; ?></td>
            </tr>
        <?php
            $num++;
        }
        ?>
    </tbody>

</table>
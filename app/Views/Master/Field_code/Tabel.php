<table id="example2" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="text-align: center;width: 50px">No.</th>
            <th style="text-align: center;width: 100px">Action</th>
            <th style="text-align: center;">Field Code</th>
            <th style="text-align: center;">Description</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $num = 1;
        foreach ($field_code as $value) {
        ?>
            <tr class="gradeX">
                <td style="text-align: center;"><?= $num; ?></td>
                <td style="text-align: center;">
                    <a class="btn btn-outline-success btn-sm" href="<?= base_url() ?>/FieldCode/edit/<?= $value['fieldcode_id']; ?>"><i class="bx bx-message-edit"></i></a>
                    <a class="btn btn-outline-danger btn-sm" href="<?= base_url() ?>/FieldCode/delete/<?= $value['fieldcode_id']; ?>" title="Hapus" onclick="return confirm('Anda yakin akan hapus?')"><i class=" bx bx-trash"></i></a>
                </td>
                <td style="text-align: center;"><?= $value['fieldcode_code']; ?></td>
                <td style="text-align: left;"><?= $value['fieldcode_description']; ?></td>
            </tr>
        <?php
            $num++;
        }
        ?>
    </tbody>

</table>
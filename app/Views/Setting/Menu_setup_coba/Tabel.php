<table id="example2" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="text-align: center;width: 50px">No.</th>
            <th style="text-align: center;width: 100px">Action</th>
            <th style="text-align: center;">Menu ID</th>
            <th style="text-align: center;">Menu Parent</th>
            <th style="text-align: center;">Menu Title</th>
            <th style="text-align: center;">Menu URL</th>
            <th style="text-align: center;">Menu Type</th>
            <th style="text-align: center;">Menu Icon</th>
            <th style="text-align: center;">Position</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $num = 1;
        foreach ($menu_setup as $value) {
        ?>
            <tr class="gradeX">
                <td style="text-align: center;"><?= $num; ?></td>
                <td style="text-align: center;">
                    <a class="btn btn-outline-success btn-sm" href="<?= base_url() ?>/MenuSetup/edit/<?= $value['menu_id']; ?>"><i class="bx bx-message-edit"></i></a>
                    <a class="btn btn-outline-danger btn-sm" href="<?= base_url() ?>/MenuSetup/delete/<?= $value['menu_id']; ?>" title="Hapus" onclick="return confirm('Anda yakin akan hapus?')"><i class=" bx bx-trash"></i></a>
                </td>
                <td style="text-align: center;"><?= $value['menu_id']; ?></td>
                <td style="text-align: center;"><?= $value['menu_parent']; ?></td>
                <td style="text-align: left;"><?= $value['menu_title']; ?></td>
                <td style="text-align: left;"><?= $value['menu_url']; ?></td>
                <td style="text-align: center;"><?= $value['menu_type']; ?></td>
                <td style="text-align: left;"><?= $value['menu_icon_parent']; ?></td>
                <td style="text-align: center;"><?= $value['position']; ?></td>
            </tr>
        <?php
            $num++;
        }
        ?>
    </tbody>

</table>
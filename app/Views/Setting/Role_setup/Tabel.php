<table id="example2" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="text-align: center;width: 50px">No.</th>
            <th style="text-align: center;width: 100px">Action</th>
            <th style="text-align: center;">Role ID</th>
            <th style="text-align: center;">Role Name</th>
            <th style="text-align: center;">Description</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $num = 1;
        foreach ($role_setup as $value) {
        ?>
            <tr class="gradeX">
                <td style="text-align: center;"><?= $num; ?></td>
                <td style="text-align: center;">
                    <a class="btn btn-outline-success btn-sm" href="<?= base_url() ?>/RoleSetup/edit/<?= $value['role_id']; ?>"><i class="bx bx-message-edit"></i></a>
                    <a class="btn btn-outline-danger btn-sm" href="<?= base_url() ?>/RoleSetup/delete/<?= $value['role_id']; ?>" title="Hapus" onclick="return confirm('Anda yakin akan hapus?')"><i class=" bx bx-trash"></i></a>
                    <a class="btn btn-outline-info btn-sm" href="<?= base_url() ?>/RoleSetup/edit_privilage/<?= $value['role_id']; ?>"> <i class=" bx bx-check"></i></a>
                </td>
                <td style="text-align: center;"><?= $value['role_id']; ?></td>
                <td style="text-align: center;"><?= $value['role_name']; ?></td>
                <td style="text-align: left;"><?= $value['role_desc']; ?></td>
            </tr>
        <?php
            $num++;
        }
        ?>
    </tbody>

</table>
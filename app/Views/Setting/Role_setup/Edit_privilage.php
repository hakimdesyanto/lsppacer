<?= $this->extend('layouts/Container.php'); ?>
<?= $this->section('content'); ?>
<div class="card border-top border-0 border-4 border-success">
    <div class="card-body">
        <div class="border p-4 rounded">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-success"></i>
                </div>
                <h5 class="mb-0 text-success">EDIT PRIVILAGE</h5>

            </div>
            <hr />

            <?php if ($pesan != '') { ?>
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Gagal!</h6>
                            <div class="text-white"><?= $pesan ?></div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <form class="form-horizontal" action="/RoleSetup/update_priviledge/<?= $role_setup['role_id'] ?>" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <!-- <form id="form_edit_role_priviledge" class="form-horizontal"> -->
                <!-- <input type="hidden" id="role_id" name="role_id"> -->

                <input type="checkbox" id="select_all"> Select All
                <hr size="1">
                <div id="menu-role"></div>
                <?= $edit_privilage; ?>
                <!-- </form> -->

                <hr>
                <label class="col-sm-2 control-label"></label>
                <button type="submit" class="col-sm-1 btn btn-success">Save</button>
                <a href="/RoleSetup/main" class="col-sm-1 btn btn-warning">Cancel</a>
            </form>


        </div>
    </div>
</div>

<script>
    $("#select_all").livequery('click', function() {
        if ($(this).is(':checked') == true) {
            alert('Centang Semua');
            $("#menu-role input[type='checkbox']").prop('checked', true);
        } else {
            alert('Un Centang Semua');
            $("#menu-role input[type='checkbox']").prop('checked', false);
        }
    })
</script>


<?= $this->endSection(); ?>
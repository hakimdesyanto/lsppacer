<?= $this->extend('layouts/Container.php'); ?>
<?= $this->section('content'); ?>
<div class="card border-top border-0 border-4 border-success">
    <div class="card-body">
        <div class="border p-4 rounded">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-success"></i>
                </div>
                <h5 class="mb-0 text-success">EDIT MENU</h5>

            </div>
            <hr />

            <?php if ($pesan != '') { ?>
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Sukses!</h6>
                            <div class="text-white"><?= $pesan; ?></div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <?php if ($pesan2 != '') { ?>
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Gagal!</h6>
                            <div class="text-white"><?= $pesan2 ?></div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <form class="form-horizontal" action="/MenuSetup/update/<?= $menu_setup['menu_id'] ?>" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label class="col-md-2 control-label" style="text-align:right">Menu Parent</label>
                    <div class="col-md-3">
                        <select class="form-control" id="menu_parent" name="menu_parent">
                            <option value="0">IS PARENT</option>
                            <?php foreach ($menu_parents as $menu_parent) : ?>
                                <option value="<?php echo $menu_parent['menu_id'] ?>" <?= ($menu_parent['menu_id'] == $menu_setup['menu_parent']) ? ' selected' : '' ?>><?php echo (($menu_parent['menu_parent'] != '') ? $menu_parent['menu_parent'] . ' | ' : '') . $menu_parent['menu_title'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('menu_parent'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Menu Titel</label>
                    <div class="col-sm-3">
                        <input type="text" name="menu_title" id="menu_title" class="form-control<?= ($validation->hasError('menu_title')) ? ' is-invalid' : ''; ?>" value="<?= $menu_setup['menu_title']; ?>">
                        <div class="invalid-feedback"><?= $validation->getError('menu_title'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Menu URL</label>
                    <div class="col-sm-3">
                        <input type="text" name="menu_url" id="menu_url" class="form-control<?= ($validation->hasError('menu_url')) ? ' is-invalid' : ''; ?>" value="<?= $menu_setup['menu_url']; ?>">
                        <div class="invalid-feedback"><?= $validation->getError('menu_url'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Menu Type</label>
                    <div class="col-sm-3">
                        <select id="menu_type" name="menu_type" class="form-control<?= ($validation->hasError('menu_type')) ? ' is-invalid' : ''; ?>" value="<?= $menu_setup['menu_type']; ?>">
                            <option value="0">Normal Menu</option>
                            <option value="1">Classic Menu</option>
                            <option value="2">Mega Menu</option>
                            <option value="3">Mega Menu FULL</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('menu_type'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 control-label" style="text-align:right">Menu Icon</label>
                    <div class="col-sm-3">
                        <input type="text" name="menu_icon_parent" id="menu_icon_parent" class="form-control<?= ($validation->hasError('menu_icon_parent')) ? ' is-invalid' : ''; ?>" value="<?= $menu_setup['menu_icon_parent']; ?>">
                        <div class="invalid-feedback"><?= $validation->getError('menu_icon_parent'); ?></div>
                    </div>
                </div>
                <hr>
                <label class="col-sm-2 control-label"></label>
                <button type="submit" class="col-sm-1 btn btn-success">Save</button>
                <a href="/MenuSetup/main" class="col-sm-1 btn btn-warning">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
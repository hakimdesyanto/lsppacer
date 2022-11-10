<?= $this->extend('layouts/Container.php'); ?>
<?= $this->section('content'); ?>
<!-- <h6 class="mb-0 text-uppercase">MENU SETUP</h6> -->
<hr />
<a href="/Certification/add" class="btn btn-success btn-sm mb-3">Add Certification</a>
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
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <?= $this->include('Certification/Tabel'); ?>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
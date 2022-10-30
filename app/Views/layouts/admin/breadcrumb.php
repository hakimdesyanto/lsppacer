<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3"><?= $title; ?></div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <?php if ($breadcrumbs) { ?>
                    <li class="breadcrumb-item"><i class="bx <?= $icon ?>"></i></li>
                <?php }
                foreach ($breadcrumbs as $breadcrumb) { ?>
                    <li class="breadcrumb-item active" aria-current="page"><?= $breadcrumb; ?></li>
                <?php } ?>
            </ol>
        </nav>
    </div>
</div>
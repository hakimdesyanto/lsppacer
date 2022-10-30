<?= $this->extend('layouts/admin/main-table.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">Daftar Klien</h6>
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
<script>
    var site_url = "<?php echo base_url(); ?>";
</script>

<link href="<?php echo base_url() ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/assets/global/plugins/ui/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/assets/global/plugins/jqGrid/css/ui.jqgrid.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/assets/global/plugins/confirm/jquery-confirm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/assets/admin/layout/css/template.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url() ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/jqGrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/confirm/jquery-confirm.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>

<!-- tambahan -->
<link href="<?php echo base_url() ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/assets/global/plugins/chosen/chosen.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/assets/global/css/components.min.css" id="style_components" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url() ?>/assets/admin/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/assets/admin/layout/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="<?php echo base_url() ?>/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url() ?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/bootstrap-hover-dropdown.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/jqGrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/ui/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/jquery.livequery.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/jquery.maskmoney.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/jquery.form.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/jquery.nestable.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/highcharts/code/highcharts.js"></script>
<script src="<?php echo base_url() ?>/assets/global/plugins/highcharts/code/modules/exporting.js"></script>
<script src="<?php echo base_url() ?>/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/global/scripts/template.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/js/coba.js" type="text/javascript"></script>

<h1>Hello World</h1>
<div class="container portlet light" id="FormGrid">
    <div class="portlet-title">
        <div class="caption title-1">
            <i class="fa fa-group"></i> USER SETUP
        </div>
    </div>
    <div class="portlet-body">
        <div class="wrapper-jqGrid">
            <table id="jqgrid_data"></table>
            <div id="jqgrid_data_pager"></div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
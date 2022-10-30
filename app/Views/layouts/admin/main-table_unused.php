<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?= base_url() ?>/assets/admin/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?= base_url() ?>/assets/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?= base_url() ?>/assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= base_url() ?>/assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>/assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?= base_url() ?>/assets/admin/css/pace.min.css" rel="stylesheet" />
	<script src="<?= base_url() ?>/assets/admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= base_url() ?>/assets/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?= base_url() ?>/assets/admin/css/app.css" rel="stylesheet">
	<link href="<?= base_url() ?>/assets/admin/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/css/dark-theme.css" />
	<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/css/semi-dark.css" />
	<link rel="stylesheet" href="<?= base_url() ?>/assets/admin/css/header-colors.css" />
	<title><?= $title; ?></title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<?= $this->include('layouts/admin/logo'); ?>
			<!--navigation-->
			<?= $this->include('layouts/admin/navigation'); ?>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?= $this->include('layouts/admin/header'); ?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<?= $this->include('layouts/admin/breadcrumb'); ?>
				<!--end breadcrumb-->
				<?= $this->renderSection('content'); ?>
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright ©<?= date('Y'); ?> All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->

	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="<?= base_url() ?>/assets/admin/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?= base_url() ?>/assets/admin/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>/assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?= base_url() ?>/assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?= base_url() ?>/assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="<?= base_url() ?>/assets/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>/assets/admin/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$('html').attr('class', 'color-sidebar sidebarcolor3');
		$("html").addClass("color-header headercolor4"), $("html").removeClass("headercolor1 headercolor2 headercolor3 headercolor5 headercolor6 headercolor7 headercolor8")
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable({
				lengthChange: true,
				buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
			});

			table.buttons().container()
				.appendTo('#example2_wrapper .col-md-6:eq(0)');
		});
	</script>
	<!--app JS-->
	<script src="<?= base_url() ?>/assets/admin/js/app.js"></script>
</body>

</html>
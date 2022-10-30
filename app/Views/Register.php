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
	<link href="<?= base_url() ?>/assets/admin/plugins/select2/css/select2.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>/assets/admin/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
	<link href="<?= base_url() ?>/assets/admin/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
	<link href="<?= base_url() ?>/assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= base_url() ?>/assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
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

	<div class="card border-top border-0 border-4 border-success">
		<div class="card-body">
			<div class="border p-4 rounded">
				<div class="card-title d-flex align-items-center">
					<div><i class="bx bxs-user me-1 font-22 text-success"></i>
					</div>
					<h5 class="mb-0 text-success">REGISTER</h5>

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
				<form class="form-horizontal" action="/Register/insert" method="post" autocomplete="off">
					<?= csrf_field(); ?>

					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">Full Name</label>
						<div class="col-sm-3">
							<input type="text" name="full_name" id="full_name" class="form-control<?= ($validation->hasError('full_name')) ? ' is-invalid' : ''; ?>" value="<?= old('full_name'); ?>">
							<div class="invalid-feedback"><?= $validation->getError('full_name'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">Birth Place</label>
						<div class="col-sm-3">
							<input type="text" name="birth_place" id="birth_place" class="form-control<?= ($validation->hasError('birth_place')) ? ' is-invalid' : ''; ?>" value="<?= old('birth_place'); ?>">
							<div class="invalid-feedback"><?= $validation->getError('birth_place'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">Birth Date</label>
						<div class="col-sm-3">
							<input type="date" name="birth_date" id="birth_date" class="form-control<?= ($validation->hasError('birth_date')) ? ' is-invalid' : ''; ?>" value="<?= old('birth_date'); ?>">
							<div class="invalid-feedback"><?= $validation->getError('birth_date'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">Gender</label>
						<div class="col-sm-3">
							<select id="gender" name="gender" class="form-control<?= ($validation->hasError('gender')) ? ' is-invalid' : ''; ?>" value="<?= old('gender'); ?>">
								<option value="">Please Select</option>
								<option value="1">Man</option>
								<option value="2">Woman</option>
							</select>
							<div class="invalid-feedback"><?= $validation->getError('gender'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">Address</label>
						<div class="col-sm-3">
							<textarea name="address" id="address" class="form-control<?= ($validation->hasError('address')) ? ' is-invalid' : ''; ?>" value="<?= old('address'); ?>"></textarea>
							<div class="invalid-feedback"><?= $validation->getError('address'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-md-2 control-label" style="text-align:right">Province</label>
						<div class="col-md-3">
							<select class="single-select" id="province_id" name="province_id" class="form-control<?= ($validation->hasError('province_id')) ? ' is-invalid' : ''; ?>" value="<?= old('province_id'); ?>">
								<?= $province; ?>
							</select>
							<div class="invalid-feedback"><?= $validation->getError('province_id'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-md-2 control-label" style="text-align:right">District</label>
						<div class="col-md-3">
							<select class="single-select" id="district_id" name="district_id" class="form-control<?= ($validation->hasError('district_id')) ? ' is-invalid' : ''; ?>" value="<?= old('district_id'); ?>">
								<?= $district; ?>
							</select>
							<div class="invalid-feedback"><?= $validation->getError('district_id'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-md-2 control-label" style="text-align:right">Sub District</label>
						<div class="col-md-3">
							<select class="single-select" id="subdistrict_id" name="subdistrict_id" class="form-control<?= ($validation->hasError('subdistrict_id')) ? ' is-invalid' : ''; ?>" value="<?= old('subdistrict_id'); ?>">
								<?= $district; ?>
							</select>
							<div class="invalid-feedback"><?= $validation->getError('subdistrict_id'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-md-2 control-label" style="text-align:right">Village</label>
						<div class="col-md-3">
							<select class="single-select" id="village_id" name="village_id" class="form-control<?= ($validation->hasError('village_id')) ? ' is-invalid' : ''; ?>" value="<?= old('village_id'); ?>">
								<?= $district; ?>
							</select>
							<div class="invalid-feedback"><?= $validation->getError('village_id'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">Email</label>
						<div class="col-sm-3">
							<input type="email" name="email" id="email" class="form-control<?= ($validation->hasError('email')) ? ' is-invalid' : ''; ?>" value="<?= old('email'); ?>">
							<div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">Mobile Phone</label>
						<div class="col-sm-3">
							<input type="text" name="mobile_phone" id="mobile_phone" class="form-control<?= ($validation->hasError('mobile_phone')) ? ' is-invalid' : ''; ?>" value="<?= old('mobile_phone'); ?>">
							<div class="invalid-feedback"><?= $validation->getError('mobile_phone'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">Phone</label>
						<div class="col-sm-3">
							<input type="text" name="phone" id="phone" class="form-control<?= ($validation->hasError('phone')) ? ' is-invalid' : ''; ?>" value="<?= old('phone'); ?>">
							<div class="invalid-feedback"><?= $validation->getError('phone'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">ID Card Number</label>
						<div class="col-sm-3">
							<input type="text" name="idcard_number" id="idcard_number" class="form-control<?= ($validation->hasError('idcard_number')) ? ' is-invalid' : ''; ?>" value="<?= old('idcard_number'); ?>">
							<div class="invalid-feedback"><?= $validation->getError('idcard_number'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">Doc ID Card Path</label>
						<div class="col-sm-3">
							<input type="text" name="doc_idcard_path" id="doc_idcard_path" class="form-control<?= ($validation->hasError('doc_idcard_path')) ? ' is-invalid' : ''; ?>" value="<?= old('doc_idcard_path'); ?>">
							<div class="invalid-feedback"><?= $validation->getError('doc_idcard_path'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">User Name</label>
						<div class="col-sm-3">
							<input type="text" name="user_name" id="user_name" class="form-control<?= ($validation->hasError('user_name')) ? ' is-invalid' : ''; ?>" value="<?= old('user_name'); ?>">
							<div class="invalid-feedback"><?= $validation->getError('user_name'); ?></div>
						</div>

					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">User Password</label>
						<div class="col-sm-3">
							<input type="password" name="user_password" id="user_password" class="form-control<?= ($validation->hasError('user_password')) ? ' is-invalid' : ''; ?>" value="<?= old('user_password'); ?>">
							<div class="invalid-feedback"><?= $validation->getError('user_password'); ?></div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 control-label" style="text-align:right">Confirm Password</label>
						<div class="col-sm-3">
							<input type="password" name="confirm_password" id="confirm_password" class="form-control<?= ($validation->hasError('confirm_password')) ? ' is-invalid' : ''; ?>" value="<?= old('confirm_password'); ?>">
							<div class="invalid-feedback"><?= $validation->getError('confirm_password'); ?></div>
						</div>
					</div>
					<hr>
					<label class="col-sm-2 control-label"></label>
					<button type="submit" class="col-sm-1 btn btn-success">Save</button>
					<a href="/Front" class="col-sm-1 btn btn-warning">Cancel</a>
				</form>
			</div>
		</div>
	</div>
	<!--end row-->

	<!--end page wrapper -->
	<!--start overlay-->
	<div class="overlay toggle-icon"></div>
	<!--end overlay-->
	<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
	<!--End Back To Top Button-->
	<footer class="page-footer">
		<p class="mb-0">Copyright © <?= date('Y') ?>. All right reserved.</p>
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
	<script src="<?= base_url() ?>/assets/admin/plugins/input-tags/js/tagsinput.js"></script>
	<script src="<?= base_url() ?>/assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?= base_url() ?>/assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="<?= base_url() ?>/assets/admin/plugins/select2/js/select2.min.js"></script>
	<script>
		$('html').attr('class', 'color-sidebar sidebarcolor3');
		$("html").addClass("color-header headercolor4"), $("html").removeClass("headercolor1 headercolor2 headercolor3 headercolor5 headercolor6 headercolor7 headercolor8")
	</script>
	<script>
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	</script>
	<!--app JS-->
	<script src="<?= base_url() ?>/assets/admin/js/app.js"></script>
</body>

</html>
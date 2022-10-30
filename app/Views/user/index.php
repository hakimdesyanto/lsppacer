<?= $this->extend('layouts/Container.php'); ?>
<?= $this->section('content'); ?>
<h6 class="mb-0 text-uppercase">USER LIST</h6>
<hr />
<a href="/user/create" class="btn btn-success btn-sm mb-3">Add User</a>
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
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;width: 100px">Action</th>
                        <th style="text-align: center;width: 100px">No.</th>
                        <th style="text-align: center;">Full Name</th>
                        <th style="text-align: center;">Birth Place</th>
                        <th style="text-align: center;">Birth Date</th>
                        <th style="text-align: center;">Gender</th>
                        <th style="text-align: center;">Address</th>
                        <th style="text-align: center;">Province</th>
                        <th style="text-align: center;">District</th>
                        <th style="text-align: center;">Sub District</th>
                        <th style="text-align: center;">Village</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Mobile Phone</th>
                        <th style="text-align: center;">Phone</th>
                        <th style="text-align: center;">User Type</th>
                        <th style="text-align: center;">ID Card Number </th>
                        <th style="text-align: center;">Doc ID Card Path</th>
                        <th style="text-align: center;">User Name</th>
                        <th style="text-align: center;">User Password</th>
                        <th style="text-align: center;">Created At</th>
                        <th style="text-align: center;">Updated dAt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $num = 1;
                    foreach ($user as $value) {
                    ?>
                        <tr class="gradeX">
                            <td style="text-align: center;">
                                <a class="btn btn-outline-success btn-sm" href="<?= base_url() ?>/user/edit/<?= $value['user_id']; ?>"><i class="bx bx-message-edit"></i></a>
                                <a class="btn btn-outline-danger btn-sm" href="<?= base_url() ?>/user/delete/<?= $value['user_id']; ?>" title="Hapus" onclick="return confirm('Anda yakin akan hapus?')"><i class=" bx bx-trash"></i></a>
                            </td>
                            <td style="text-align: center;"><?= $num; ?></td>
                            <td style="text-align: left;"><?= $value['full_name']; ?></td>
                            <td style="text-align: left;"><?= $value['birth_place']; ?></td>
                            <td style="text-align: center;"><?= $value['birth_date']; ?></td>
                            <td style="text-align: left;"><?= $value['gender']; ?></td>
                            <td style="text-align: left;"><?= $value['address']; ?></td>
                            <td style="text-align: left;"><?= $value['province_name']; ?></td>
                            <td style="text-align: left;"><?= $value['district_name']; ?></td>
                            <td style="text-align: left;"><?= $value['subdistrict_name']; ?></td>
                            <td style="text-align: left;"><?= $value['village_name']; ?></td>
                            <td style="text-align: left;"><?= $value['email']; ?></td>
                            <td style="text-align: center;"><?= $value['mobile_phone']; ?></td>
                            <td style="text-align: left;"><?= $value['phone']; ?></td>
                            <td style="text-align: left;"><?= $value['user_type']; ?></td>
                            <td style="text-align: left;"><?= $value['idcard_number']; ?></td>
                            <td style="text-align: left;"><?= $value['doc_idcard_path']; ?></td>
                            <td style="text-align: left;"><?= $value['user_name']; ?></td>
                            <td style="text-align: left;"><?= $value['user_password']; ?></td>
                            <td style="text-align: center;"><?= $value['createdAt']; ?></td>
                            <td style="text-align: center;"><?= $value['updatedAt']; ?></td>
                        </tr>
                    <?php
                        $num++;
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
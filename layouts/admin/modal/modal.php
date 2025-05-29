<?php
$inv_medicine = $controllers->getAllMedicineInventory();
?>
<style>
    #datatable_inventory_soonexpired_modal,
    #datatable_inventory_zero_modal,
    #datatable_inventory_orderlevel_modal,
    #datatable_inventory_expired_modal,
    #datatable_inventory_available_modal thead {
        height: 5px !important;
        font-size: 13px;
        margin: 0px !important;
    }
</style>
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card " style="background:#D8EBE0">
                    <div class="card-body p-3">
                        <form id="cupdatePersonnel" method="post">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-center p-1 gap-2">
                                        <label class="w-40 d-flex justify-content-end ">Current Password</label>
                                        <div class="input-group input-group-sm p-1 ">
                                            <input type="password" class="form-control" id="cpassword_update" name="cpassword" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-center p-1 gap-2">
                                        <label class="w-40 d-flex justify-content-end ">Username</label>
                                        <div class="input-group input-group-sm p-1 ">
                                            <input type="text" class="form-control" name="username" value="<?= $admin_info->username; ?>" disabled required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="d-flex align-items-center p-1 gap-2">
                                        <label class="w-40 d-flex justify-content-end ">Password</label>
                                        <div class="input-group input-group-sm p-1 ">
                                            <input type="password" class="form-control" name="password" disabled>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="d-flex align-items-center p-1 gap-2">
                                        <label class="w-40 d-flex justify-content-end ">Retype Password</label>
                                        <div class="input-group input-group-sm p-1 ">
                                            <input type="password" class="form-control" name="repassword" disabled>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-center p-1 gap-2">
                                        <label class="w-40 d-flex justify-content-end ">Lastname</label>
                                        <div class="input-group input-group-sm p-1 ">
                                            <input type="text" class="form-control" name="lname" value="<?= $admin_info->patient_lname; ?>" disabled required>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-center p-1 gap-2">
                                        <label class="w-40 d-flex justify-content-end ">Firstname</label>
                                        <div class="input-group input-group-sm p-1 ">
                                            <input type="text" class="form-control" name="fname" value="<?= $admin_info->patient_fname; ?>" disabled required>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-center p-1 gap-2">
                                        <label class="w-40 d-flex justify-content-end ">Middlename</label>
                                        <div class="input-group input-group-sm p-1 ">
                                            <input type="text" class="form-control" name="mname" value="<?= $admin_info->patient_mname; ?>" disabled required>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-center p-1 gap-2">
                                        <label class="w-40 d-flex justify-content-end">Sex</label>
                                        <div class="input-group input-group-sm p-1">
                                            <select class="form-select" name="gender" disabled required>
                                                <option value="" <?= $admin_info->patient_gender === '' ? 'selected' : '' ?>></option>
                                                <option value="male" <?= $admin_info->patient_gender === 'male' ? 'selected' : '' ?>>Male</option>
                                                <option value="female" <?= $admin_info->patient_gender === 'female' ? 'selected' : '' ?>>Female</option>
                                            </select>
                                        </div>
                                        <div id="sexError" class="error-text"></div>
                                    </div>
                                </div>



                                <div class="col-xl-12">
                                    <div class="d-flex align-items-center p-1 gap-2">
                                        <label class="w-40 d-flex justify-content-end">User Type</label>
                                        <div class="input-group input-group-sm p-1">
                                            <select class="form-select" name="usertype" disabled required>
                                                <option value="staff" <?= $admin_info->patient_type === 'staff' ? 'selected' : '' ?>>Staff</option>
                                                <option value="admin" <?= $admin_info->patient_type === 'admin' ? 'selected' : '' ?>>Administrator</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id_pass" value="<?= $admin_info->patient_id; ?>">
                                <div class="col-xl-12">
                                    <button type="submit" name="updatePersonnel" class="mt-3 btn btn-sm bg-gradient-success w-100" disabled>Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="soonExpiredModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Soon To Expired</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card " style="background:#D8EBE0;">
                    <div class="card-body">
                        <div class="table-responsived">
                            <table id="datatable_inventory_soonexpired_modal" class="table table-borderless w-100">
                                <thead class="bg-gradient-success text-white w-100">
                                    <tr>
                                        <th>No.</th>

                                        <th>Medicine</th>
                                        <th>Bacth Date</th>
                                        <th>Expiry Date </th>
                                        <th>Total Count</th>
                                        <th>Total Issued</th>
                                        <th>Available</th>
                                        <th>Order Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;

                                    foreach ($inv_medicine as $lists) :
                                        $expirationDate = new DateTime($lists->inv_expiration);
                                        $currentDate = new DateTime();

                                        if ($expirationDate > $currentDate) :
                                            $threeMonthsFromNow = $currentDate->modify('+3 months');

                                            if ($expirationDate <= $threeMonthsFromNow) :
                                    ?>
                                                <tr>
                                                    <td><?= $counter++ ?></td>
                                                    <td><?= $lists->med_generic . ', ' . $lists->med_brand; ?></td>
                                                    <td><?= $lists->inv_batchdate; ?></td>
                                                    <td><?= $lists->inv_expiration; ?></td>
                                                    <td><?= $lists->inv_totalcount; ?></td>
                                                    <td><?= $lists->inv_issued; ?></td>
                                                    <td><?= $lists->inv_remaining; ?></td>
                                                    <td><?= $lists->inv_orderlevel; ?></td>
                                                </tr>
                                    <?php
                                            endif;
                                        endif;
                                    endforeach;
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?= URL; ?>admin/inventory?r=mstocks" class="btn btn-primary <?= isset($permission['per_consultation']) && $permission['per_consultation'] == "1"; ?>">MEDICINE STOCK</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="zeroCountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Zero Count</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card " style="background:#D8EBE0;">
                    <div class="card-body">
                        <div class="table-responsived">
                            <table id="datatable_inventory_zero_modal" class="table table-borderless w-100">
                                <thead class="bg-gradient-success text-white w-100">
                                    <tr>
                                        <th>No.</th>

                                        <th>Medicine</th>
                                        <th>Bacth Date</th>
                                        <th>Expiry Date </th>
                                        <th>Total Count</th>
                                        <th>Total Issued</th>
                                        <th>Available</th>
                                        <th>Order Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1;

                                    foreach ($inv_medicine as $lists) : ?>
                                        <?php if ((int)$lists->inv_remaining === 0) : ?>
                                            <tr>
                                                <td><?= $counter++ ?></td>
                                                <td><?= $lists->med_generic . ', ' . $lists->med_brand; ?></td>
                                                <td><?= $lists->inv_batchdate; ?></td>
                                                <td><?= $lists->inv_expiration; ?></td>
                                                <td><?= $lists->inv_totalcount; ?></td>
                                                <td><?= $lists->inv_issued; ?></td>
                                                <td><?= $lists->inv_remaining; ?></td>
                                                <td><?= $lists->inv_orderlevel; ?></td>

                                            </tr>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?= URL; ?>admin/inventory?r=mstocks" class="btn btn-primary <?= isset($permission['per_consultation']) && $permission['per_consultation'] == "1"; ?>">MEDICINE STOCK</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="orderLevelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Order Level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card " style="background:#D8EBE0;">
                    <div class="card-body">
                        <div class="table-responsived">
                            <table id="datatable_inventory_orderlevel_modal" class="table table-borderless w-100">
                                <thead class="bg-gradient-success text-white w-100">
                                    <tr>
                                        <th>No.</th>

                                        <th>Medicine</th>
                                        <th>Bacth Date</th>
                                        <th>Expiry Date </th>
                                        <th>Total Count</th>
                                        <th>Total Issued</th>
                                        <th>Available</th>
                                        <th>Order Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1;

                                    foreach ($inv_medicine as $lists) : ?>
                                        <?php if ((int)$lists->inv_orderlevel >=  (int)$lists->inv_remaining) : ?>
                                            <tr>
                                                <td><?= $counter++ ?></td>
                                                <td><?= $lists->med_generic . ', ' . $lists->med_brand; ?></td>
                                                <td><?= $lists->inv_batchdate; ?></td>
                                                <td><?= $lists->inv_expiration; ?></td>
                                                <td><?= $lists->inv_totalcount; ?></td>
                                                <td><?= $lists->inv_issued; ?></td>
                                                <td><?= $lists->inv_remaining; ?></td>
                                                <td><?= $lists->inv_orderlevel; ?></td>

                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?= URL; ?>admin/inventory?r=mstocks" class="btn btn-primary <?= isset($permission['per_consultation']) && $permission['per_consultation'] == "1"; ?>">MEDICINE STOCK</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="expiredModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Expired</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card " style="background:#D8EBE0;">
                    <div class="card-body">
                        <div class="table-responsived">
                            <table id="datatable_inventory_expired_modal" class="table table-borderless w-100">
                                <thead class="bg-gradient-success text-white w-100">
                                    <tr>
                                        <th>No.</th>

                                        <th>Medicine</th>
                                        <th>Bacth Date</th>
                                        <th>Expiry Date </th>
                                        <th>Total Count</th>
                                        <th>Total Issued</th>
                                        <th>Available</th>
                                        <th>Order Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1;

                                    foreach ($inv_medicine as $lists) :
                                        $expirationDate = new DateTime($lists->inv_expiration);
                                        $currentDate = new DateTime();

                                        if ($expirationDate <= $currentDate) :
                                    ?>
                                            <tr>
                                                <td><?= $counter++ ?></td>
                                                <td><?= $lists->med_generic . ', ' . $lists->med_brand; ?></td>
                                                <td><?= $lists->inv_batchdate; ?></td>
                                                <td><?= $lists->inv_expiration; ?></td>
                                                <td><?= $lists->inv_totalcount; ?></td>
                                                <td><?= $lists->inv_issued; ?></td>
                                                <td><?= $lists->inv_remaining; ?></td>
                                                <td><?= $lists->inv_orderlevel; ?></td>

                                            </tr>
                                    <?php
                                        endif;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?= URL; ?>admin/inventory?r=mstocks" class="btn btn-primary <?= isset($permission['per_consultation']) && $permission['per_consultation'] == "1"; ?>">MEDICINE STOCK</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="availableModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Available</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card " style="background:#D8EBE0;">
                    <div class="card-body">
                        <div class="table-responsived">
                            <table id="datatable_inventory_available_modal" class="table table-borderless w-100">
                                <thead class="bg-gradient-success text-white w-100">
                                    <tr>
                                        <th>No.</th>

                                        <th>Medicine</th>
                                        <th>Bacth Date</th>
                                        <th>Expiry Date </th>
                                        <th>Total Count</th>
                                        <th>Total Issued</th>
                                        <th>Available</th>
                                        <th>Order Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;

                                    foreach ($inv_medicine as $lists) :
                                        $expirationDate = new DateTime($lists->inv_expiration);
                                        $currentDate = new DateTime();

                                        if ($expirationDate > $currentDate) :
                                          
                                    ?>
                                                <tr>
                                                    <td><?= $counter++ ?></td>
                                                    <td><?= $lists->med_generic . ', ' . $lists->med_brand; ?></td>
                                                    <td><?= $lists->inv_batchdate; ?></td>
                                                    <td><?= $lists->inv_expiration; ?></td>
                                                    <td><?= $lists->inv_totalcount; ?></td>
                                                    <td><?= $lists->inv_issued; ?></td>
                                                    <td><?= $lists->inv_remaining; ?></td>
                                                    <td><?= $lists->inv_orderlevel; ?></td>
                                                </tr>
                                    <?php
                                         
                                        endif;
                                    endforeach;
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?= URL; ?>admin/consultation" class="btn btn-primary <?= isset($permission['per_consultation']) && $permission['per_consultation'] == "1"; ?>">CONSULTATION</a>
                <a href="<?= URL; ?>admin/inventory?r=mstocks" class="btn btn-primary <?= isset($permission['per_consultation']) && $permission['per_consultation'] == "1"; ?>">MEDICINE STOCK</a>
            </div>
        </div>
    </div>
</div>
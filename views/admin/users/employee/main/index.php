<?php
$employee_list = $controllers->getAllPatient();
?>
<style>
    .dropdown-toggle::after {
        display: none !important;
    }

    .dropdown-toggle i {
        font-weight: bold !important;
    }
</style>
<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <h4 class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-success">EMPLOYEE LIST</h5>
                        <a href="<?= URL ?>admin/users?r=employee&add" class="d-x btn bg-gradient-success"><i class="fa fa-plus-square"></i>&nbsp;Add new employee</a>
                    </div>
                </h4>
                <div class="table-responsived">
                    <table id="datatable" class="table table-borderless">
                        <thead class="bg-gradient-success text-white">
                            <tr>
                                <th style="width:50px">#</th>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Office</th>
                                <th>Position</th>
                                <th class="d-one" style="width:160px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1;

                            foreach ($employee_list as $lists) : 
                                $of = $controllers->getByIdOffice($lists->patient_office_id);
                                ?>
                                <?php if ($lists->patient_type == 'employee') : ?>
                                    <tr>
                                        <td><?= $counter++ ?></td>
                                        <td><?= $lists->patient_idno; ?></td>
                                        <td><?= $lists->patient_fname . ' ' . $lists->patient_lname . ', ' .  $lists->patient_mname; ?></td>
                                        <td><?= $lists->patient_age; ?></td>
                                        <td><?= $lists->patient_gender; ?></td>
                                        <td><?= $of->office_name; ?></td>
                                        <td><?= $lists->patient_position; ?></td>
                                        <td class="d-nvone">
                                            <div class="dropdown d-flex justify-content-center">
                                                <button class="btn btn-secondary btn-custom btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <div class="dropdown-item">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <a href="<?= URL ?>admin/users?r=employee&edit=<?= $controllers->urlEncode($lists->patient_id); ?>" class="btn btn-sm btn-warning "><i class="fa fa-pencil-square-o"></i></a>
                                                            <button onclick="deleteEmployee(<?= $lists->patient_id; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
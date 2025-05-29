<?php
$patient_list = $controllers->getAllPatient();
?>
<style>
    .dropdown-toggle::after {
        display: none !important;
    }

    .dropdown-toggle i {
        font-weight: bold !important;
    }

    #datatable_reg_fac thead {
        height: 5px !important;
        font-size: 13px;
        margin: 0px !important;
    }

    .dataTables_filter {
        display: none;
    }
</style>

<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <h4 class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-success">TOTAL FACULTY REGISTERED</h5>
                        <a href="<?= URL ?>admin/reports?r=medicine" class="btn bg-gradient-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <hr>
                <div class="row mt-2 g-3 ">
                    <div class="col-auto row ">
                        <div class="col-auto">
                            <label class="form-control-plaintext">By College:</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1">
                                <select class="form-select" id="reg-semester" style="width:12em">
                                    <option value="all">All</option>
                                    <?php
                                    $addedValues = array();
                                    foreach ($patient_list as $lists) {
                                        if ($value = $controllers->getByIdCollege($lists->patient_college_id)) {
                                            $name = $value->college_name;
                                            if (!in_array($name, $addedValues)) {
                                                $addedValues[] = $name;
                                    ?>
                                                <option value="<?= $name ?>"><?= $name ?></option>
                                    <?php

                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto row">
                        <div class="col-auto">
                            <label class="form-control-plaintext">Filter Year:</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1">
                                <select class="form-select" id="reg-sy" style="width:12em">
                                    <option value="all">All</option>
                                    <?php
                                    $addedValues = array();
                                    foreach ($patient_list as $lists) {
                                        $value = date("Y", strtotime($lists->timestamp));
                                        if (!in_array($value, $addedValues)) {
                                            $addedValues[] = $value;
                                    ?>
                                            <option value="<?= $value ?>"><?= $value ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable_reg_fac" class="table table-borderless w-100">
                        <thead class="bg-gradient-success text-white">
                            <tr>
                                <th>No.</th>
                                <th class="d-none exclude-print">Timestamp</th>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Sex</th>
                                <th>Age</th>

                                <th>College</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            foreach ($patient_list as $lists) {

                                $cl = $controllers->getByIdCollege($lists->patient_college_id);
                                if ($lists->patient_type == "faculty") {
                            ?>
                                    <tr>
                                        <td><?= $counter++; ?></td>
                                        <td class="d-none"><?= $lists->timestamp; ?></td>
                                        <td><?= $lists->patient_idno; ?></td>
                                        <td><?= ucfirst($lists->patient_lname) . ", " . ucfirst($lists->patient_fname) . " " . ucfirst($lists->patient_mname); ?></td>
                                        <td><?= ucfirst($lists->patient_gender); ?></td>
                                        <td><?= $lists->patient_age; ?></td>

                                        <td><?= $cl->college_name; ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
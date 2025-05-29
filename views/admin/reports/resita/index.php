<?php
$patient_list = $controllers->getAllTreatment();
?>
<style>
    .dropdown-toggle::after {
        display: none !important;
    }

    .dropdown-toggle i {
        font-weight: bold !important;
    }

    #datatable_resita thead {
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
                        <h5 class="m-0 font-weight-bold text-success">RESITA ISSUED REPORT</h5>
                        <a href="<?= URL ?>admin/reports?r=medicine" class="btn bg-gradient-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <hr>
                <div class="row mt-2 g-3 ">
                    <div class="col-auto row ">
                        <div class="col-xl-12 d-none">
                            <div class=" d-flex gap-3 mb-0 p-0 justify-content-start align-items-center" style="margin-left: 80px;">
                                <div class="d-flex mb-0 p-0  align-items-center justify-content-between gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="searchInvMethod" value="invid" checked>
                                        <label class="form-check-label " style="font-size: 11px;" for="flexRadiocDefault2">
                                            ID Number
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input d-none" type="radio" name="searchInvMethod" value="invlastname">
                                        <label class="form-check-label d-none" style="font-size: 11px;" for="flexRadiocDefault2">
                                            Lastname
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1 ">
                                <input type="search" class="form-control" style="width:17em" id="indv-filter">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="button" id="invprint-btn" class="btn btn-primary btn-sm mt-1 d-none" disabled>Print</button>
                        </div>
                    </div>
                    <div class="col-auto row">

                        <div class="col-auto">
                            <label class="form-control-plaintext">Filter Type:</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1 ">
                                <select class="form-select" id="invfilter-type" style="width:12em">
                                    <option value="student">Student</option>
                                    <option value="faculty">Faculty</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto row">

                        <div class="col-auto">
                            <label class="form-control-plaintext">Filter S.Y:</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1 ">
                                <select class="form-select" id="invfilter-sy" style="width:12em">
                                    <option value="">All</option>
                                    <?php
                                    $addedValues = array();
                                    foreach ($treatment_list as $lists) {
                                        $value = $lists->treat_sy;
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
            </div>
            <hr>
            <div class="table-responsive">
                <table id="datatable_resita" class="table table-borderless w-100">
                    <thead class="bg-gradient-success text-white">
                        <tr>
                            <th>No.</th>
                            <th class="d-none exclude-print">Type</th>
                            <th class="d-none exclude-print">ID number</th>
                            <th class="d-none exclude-print">SY</th>
                            <th>Name</th>
                            <th>Resita / Medication</th>
                            <th>Action Taken</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Personnel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 1;
                        foreach ($patient_list as $lists) {

                            $com = $controllers->getByIdIllness($lists->treat_illness_id);
                            $pat = $controllers->getByIdPatient($lists->treat_patient_id);

                        ?>
                            <tr>
                                <td><?= $counter++; ?></td>
                                <td class="d-none"><?= $pat->patient_type; ?></td>
                                <td class="d-none"><?= $pat->patient_idno; ?></td>
                                <td class="d-none"><?= $lists->treat_sy; ?></td>
                                <td><?= ucfirst($pat->patient_lname) . ", " . ucfirst($pat->patient_fname) . " " . ucfirst($pat->patient_mname); ?></td>
                                <td><?= $lists->treat_med; ?></td>
                                <td><?= $lists->treat_action; ?></td>
                                <td><?= date("F d, Y", strtotime($lists->treat_date)); ?></td>
                                <td><?= date("h:m a", strtotime($lists->treat_time)); ?></td>
                                <td><?= $lists->personnel_custom; ?></td>
                            </tr>
                        <?php

                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
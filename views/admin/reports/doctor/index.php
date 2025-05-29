<?php
$treatment_list = $controllers->getAllTreatment();
?>
<style>
    .dropdown-toggle::after {
        display: none !important;
    }

    .dropdown-toggle i {
        font-weight: bold !important;
    }

    #datatable_doctor thead {
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
                        <h5 class="m-0 font-weight-bold text-success">DOCTOR PER DUTY REPORT</h5>
                        <a href="<?= URL ?>admin/reports?r=health" class="btn bg-gradient-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <hr>
                <div class="row mt-2 g-3">
                    <div class="col-auto row">

                        <div class="col-auto">
                            <label class="form-control-plaintext">SELECT DOCTOR/PERSONNEL:</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1 ">
                                <select class="form-select" id="hhfilter-option" style="width:12em">
                                    <option value="all">All</option>
                                   
                                    <?php
                                    $addedValues = array();
                                    foreach ($treatment_list as $lists) {
                                        $value = $lists->personnel_custom;
                                        if (!in_array($value, $addedValues)) {
                                            $addedValues[] = $value;
                                    ?>
                                            <option value="<?= $value ?>"><?= ucfirst($value) ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                 
                    <div class="col-lg-auto row">
                     
                        <div class="col-auto ">
                            <label class="form-control-plaintext">Month:</label>
                        </div>
                        <div class="col-auto">  
                            <div class="input-group input-group-sm p-1">
                                <select class="form-select" id="hhmonth" style="width:12em">
                                    <option value="all">All</option>
                                    <?php
                                    $months = array(
                                        "January", "February", "March", "April", "May", "June",
                                        "July", "August", "September", "October", "November", "December"
                                    );

                                    foreach ($months as $month) {
                                        echo "<option value=\"$month\">$month</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-auto ">
                            <label class="form-control-plaintext">Semester:</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1">
                                <select class="form-select" id="hhsemester" style="width:12em">
                                    <option value="all">All Semester</option>
                                    <option value="1">First Semester</option>
                                    <option value="2">Second Semester</option>
                                </select>
                            </div>
                        </div>


                    </div>
                

                </div>
                <hr>
                <div id="printContainer">

                    <div class="table-responsived">
                        <table id="datatable_doctor" class="table table-borderless w-100">
                            <thead class="bg-gradient-success text-white">
                                <tr>
                                    <th>No.</th>
                                    <th class="d-noxne ">Doctor / Personnel</th>
                                    <th class="d-none exclude-print">Semester</th>
                                   
                                    <th class="d-noxne ">Patient Name</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Date</th>
                                    <th>Complaints</th>
                                    <th>Medication</th>
                                    <th>Action Taken</th>

                                    <th>Remarks</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1;

                                foreach ($treatment_list as $lists) :
                                    $com = $controllers->getByIdIllness($lists->treat_illness_id);
                                    $pat = $controllers->getByIdPatient($lists->treat_patient_id);
                                ?>

                                    <tr>
                                        <td><?= $counter++; ?></td>
                                        <td class="d-xnone"><?= ucfirst($lists->personnel_custom); ?></td>
                                        <td class="d-none"><?= $lists->treat_semester; ?></td>
                                       
                                        <td><?= ucfirst($pat->patient_lname) . ', ' . ucfirst($pat->patient_fname); ?></td>
                                        <td><?= $pat->patient_age; ?></td>
                                        <td><?= ucfirst($pat->patient_gender); ?></td>
                                        <td><?= $lists->treat_date; ?></td>
                                        <td><?= $com->illness_name; ?></td>
                                        <td><?= $lists->treat_med; ?></td>
                                        <td><?= ucfirst($lists->treat_action); ?></td>
                                        <td><?= ucfirst($lists->treat_remarks); ?></td>

                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>